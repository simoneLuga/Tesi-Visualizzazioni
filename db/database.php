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

   public function login($email, $password)
   {
      // Usando statement sql 'prepared' non sarà possibile attuare un attacco di tipo SQL injection.
      if ($stmt = $this->db->prepare("SELECT * FROM utente WHERE email = ? LIMIT 1")) {
         $stmt->bind_param('s', $email); // esegue il bind del parametro '$email'.
         $stmt->execute(); // esegue la query appena creata.
         $stmt->store_result();
         $stmt->bind_result($user_id, $email, $pass, $type); // recupera il risultato della query e lo memorizza nelle relative variabili.
         $stmt->fetch();
         if ($stmt->num_rows == 1) { // se l'utente esiste
            if ($pass == $password) {
               $_SESSION["type"] = $type;
               $_SESSION["IdUtente"] = $user_id;
               return true;
            }
            return false;
         }
      }
      return false;
   }

   public function updateimg_view($id_page, $location)
   {
      if ($insert_stmt = $this->db->prepare("UPDATE visualizzation SET Photo = ? WHERE ID = ?")) {
         $insert_stmt->bind_param('si', $location, $id_page);
         // Esegui la query ottenuta. 
         return $insert_stmt->execute();
      }
   }

   public function get_all_anonymous_users($id_page){
      if (
         $stmt = $this->db->prepare("SELECT distinct(IndexUtenteAnonimo) FROM registrazione where ID_Visualizzation = ?")
      ) {
         $stmt->bind_param('i', $id_page);
         $stmt->execute();
         $result = $stmt->get_result();
         return $result->fetch_all(MYSQLI_ASSOC);
      }
   }

   //da rivedere
   public function get_test_creator()
   {
      if (
         $stmt = $this->db->prepare("SELECT * from test as t where t.UtenteCreatore_ID = ?")
      ) {
         $stmt->bind_param('i', $_SESSION["IdUtente"]);
         $stmt->execute();
         $result = $stmt->get_result();
         return $result->fetch_all(MYSQLI_ASSOC);
      }
   }

   public function get_pagine_test($idTest)
   {
      if ($stmt = $this->db->prepare("SELECT * from visualizzation as v where v.ID_Test_Padre = ?")) {
         $stmt->bind_param('i', $idTest);
         $stmt->execute();
         $result = $stmt->get_result();
         return $result->fetch_all(MYSQLI_ASSOC);
      }
   }

   public function get_registrazioni_test($idPage, $idUtente){
      if ($stmt = $this->db->prepare("SELECT Momento as 'time', Coordinata_X as x, Coordinata_Y as y from registrazione as r where r.ID_Visualizzation = ? and r.IndexUtenteAnonimo = ? order by Momento asc")) {
         $stmt->bind_param('is', $idPage, $idUtente);
         $stmt->execute();
         $result = $stmt->get_result();
         return $result->fetch_all(MYSQLI_ASSOC);
      }
   }

   public function get_all_test()
   {
      if ($stmt = $this->db->prepare("SELECT * from test as t")) {
         $stmt->execute();
         $result = $stmt->get_result();
         return $result->fetch_all(MYSQLI_ASSOC);
      }
   }


   //da rivedere
   public function save_test_X($idVisualizzation, $coor_x, $coor_y, $uuid)
   {
      $momento = time();
      if ($stmt = $this->db->prepare("INSERT INTO registrazione(Momento, Coordinata_X, Coordinata_Y, IndexUtenteAnonimo, ID_Visualizzation) VALUES (CURTIME(3), ?, ?, ?, ?)")) {
         $stmt->bind_param('ddsi', $coor_x, $coor_y, $uuid, $idVisualizzation);
         // Eseguo la query ottenuta.
         return $stmt->execute();
      }
   }

   public function save_new_test($titolo)
   {
      if ($stmt = $this->db->prepare("INSERT INTO  test(Nome, UtenteCreatore_id) VALUES (?, ?)")) {
         $stmt->bind_param('si', $titolo, $_SESSION["IdUtente"]);
         // Eseguo la query ottenuta.
         $stmt->execute();
         return $stmt->insert_id; //return id del test appena caricato
      }
   }

   public function save_new_visualizzation_link($idTestPadre, $link)
   {
      if (
         $stmt = $this->db->prepare("INSERT INTO visualizzation(
         link, ID_Test_Padre) VALUES (?, ?)")
      ) {
         $stmt->bind_param('si', $link, $idTestPadre);
         // Eseguo la query ottenuta.
         return $stmt->execute();
      }
   }

   public function save_new_visualizzation_noPhoto($idTestPadre)
   {
      if ($stmt = $this->db->prepare("INSERT INTO visualizzation( ID_Test_Padre) VALUES (?)")) {
         $stmt->bind_param('i', $idTestPadre);
         // Eseguo la query ottenuta.
         $stmt->execute();
         return $stmt->insert_id;
      }
   }

   public function del_test($idTest)
   {
      //elimino le registrazioni
      if ($del_stmt = $this->db->prepare("DELETE from registrazione where ID_Visualizzation in (select ID from visualizzation where ID_Test_Padre = ?)")) {
         $del_stmt->bind_param('i', $idTest);
         $del_stmt->execute();
         //elimino le pagine
         if ($del_stmt = $this->db->prepare("DELETE from visualizzation where ID_Test_Padre = ?")) {
            $del_stmt->bind_param('i', $idTest);
            $del_stmt->execute();
            //elimino il test
            if ($del_stmt = $this->db->prepare("DELETE from test where ID = ?")) {
               $del_stmt->bind_param('i', $idTest);
             
               return   $del_stmt->execute();
            }
            return false;
         }
         return false;
      }
      return false;
   }
}
?>