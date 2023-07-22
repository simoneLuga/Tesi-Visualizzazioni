<?php
class DatabaseHelper
{
   private $db;

   public function __construct($servername, $username, $password, $dbname, $port)
   {
      $this->db = new mysqli($servername, $username, $password, $dbname, $port);
      if ($this->db->connect_error) {
         die("Connection failed: " . $this->db->connect_error);
      }
   }

   //TODO: da rifare appena il prof risponde
   public function login($nome, $cognome, $type, $password)
   {
      // Usando statement sql 'prepared' non sarà possibile attuare un attacco di tipo SQL injection.
      if ($stmt = $this->db->prepare("SELECT ID, nome, cognome FROM user WHERE email = ? LIMIT 1")) {
         $stmt->bind_param('s', $email); // esegue il bind del parametro '$email'.
         $stmt->execute(); // esegue la query appena creata.
         $stmt->store_result();
         $stmt->bind_result($user_id, $username, $db_password, $salt); // recupera il risultato della query e lo memorizza nelle relative variabili.
         $stmt->fetch();
         $password = hash('sha512', $password . $salt); // codifica la password usando una chiave univoca.
         if ($stmt->num_rows == 1) { // se l'utente esiste
            // verifichiamo che non sia disabilitato in seguito all'esecuzione di troppi tentativi di accesso errati.
            if ($this->checkbrute($user_id) == true) {
               // Account disabilitato
               return false;
            } else {
               if ($db_password == $password) { // Verifica che la password memorizzata nel database corrisponda alla password fornita dall'utente.
                  // Password corretta!            
                  $user_browser = $_SERVER['HTTP_USER_AGENT']; // Recupero il parametro 'user-agent' relativo all'utente corrente.

                  $user_id = preg_replace("/[^0-9]+/", "", $user_id); // ci proteggiamo da un attacco XSS
                  $_SESSION['user_id'] = $user_id;
                  $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // ci proteggiamo da un attacco XSS
                  $_SESSION['username'] = $username;
                  $_SESSION['login_string'] = hash('sha512', $password . $user_browser);
                  // Login eseguito con successo.
                  $_SESSION['foto_profilo'] = $this->get_img_user_session($user_id)[0]['foto_profilo'];
                  return true;
               } else {
                  // Password incorretta.
                  // Registriamo il tentativo fallito nel database.
                  $now = time();
                  $this->db->query("INSERT INTO login_attempt (user_id, time) VALUES ('$user_id', '$now')");
                  return false;
               }
            }
         } else {
            // L'utente inserito non esiste.
            return false;
         }
      }
   }
   
   public function get_test_creator(){
      if ($stmt = $this->db->prepare("SELECT * from test as t, visualizzation as v where t.UtenteCreatore_ID = ? 
         and t.ID = v.ID_Test_Padre")) {
         $stmt->bind_param('i', $idCreator);
         $stmt->execute();
         $result = $stmt->get_result();
         return $result->fetch_all(MYSQLI_ASSOC);
      }
   }

   public function get_history( $idVisualizzation){
      if ($stmt = $this->db->prepare("SELECT * from registrazione as r where r.ID_Visualizzation = ? order by Momento asc")) {
         $stmt->bind_param('i', $idVisualizzation);
         $stmt->execute();
         $result = $stmt->get_result();
         return $result->fetch_all(MYSQLI_ASSOC);
      }
   }

   public function save_test_X($idUtente, $idVisualizzation, $cor_x, $cor_y){
      $momento = time();
      if($stmt = $this->db->prepare("INSERT INTO registrazione(Momento, Coordinata_X, Coordinata_Y, ID_utente, ID_Visualizzation) VALUES (?, ?, ?, ?, ?)")){
         $stmt->bind_param('iffii', $momento, $cor_x, $cor_y, $idUtente, $idVisualizzation);
         // Eseguo la query ottenuta.
         return $stmt->execute();
      }
   }

   public function save_new_test($titolo, $idUtenteCreatore) {
      if($stmt = $this->db->prepare("INSERT INTO  test(Nome, UtenteCreatore_id) VALUES (?, ?)")){
         $stmt->bind_param('si', $titolo, $idUtenteCreatore);
         // Eseguo la query ottenuta.
         $stmt->execute();
         return $stmt->insert_id; //return id del test appena caricato
      }
   }

   public function save_new_visualizzation_link($idTest, $link){
      if($stmt = $this->db->prepare("INSERT INTO visualizzation(
         link, ID_Test_Padre) VALUES (?, ?)")){
         $stmt->bind_param('si', $link, $idTest);
         // Eseguo la query ottenuta.
         return $stmt->execute();
      }
   }

   public function save_new_visualizzation_photo($idTest, $pathPhoto){
      if($stmt = $this->db->prepare("INSERT INTO visualizzation(
         Photo, ID_Test_Padre) VALUES (?, ?)")){
         $stmt->bind_param('si', $pathPhoto, $idTest);
         // Eseguo la query ottenuta.
         return $stmt->execute();
      }
   }


}


?>