<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accesso</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>

<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand">Tesi_Visualizzation</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
  <div id="feed">
    <form action="action_page.php" method="post">
      <div class="imgcontainer">
      <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" value="A" id="btnradio1" autocomplete="off" onclick="checkRadio(this)">
            <label class="btn btn-outline-dark" for="btnradio1">Admin</label>

            <input type="radio" class="btn-check" name="btnradio" value="C" id="btnradio2" autocomplete="off" onclick="checkRadio(this)">
            <label class="btn btn-outline-dark" for="btnradio2">Creator</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradioTester" value="T" autocomplete="off" onclick="checkRadio(this)" checked>
            <label class="btn btn-outline-dark" for="btnradioTester">Tester-user</label>
          </div>
      </div>

      <div class="container">
        <label for="uname"><b>Nome</b></label>
        <input type="text" placeholder="Enter Username" name="uname" id="uname" required>

        <label for="uname"><b>Cognome</b></label>
        <input type="text" placeholder="Enter Surname" name="usurname" id="usurname" equired>

        <label id="labelPass" for="psw"><b>Password</b></label>
        <input  id="inputPass" type="password" placeholder="Enter Password" name="psw"  disabled>

        <button type="submit" class="btn btn-outline-dark">Login</button>
      </div>
    </form>
  </div>

  <footer>
    Simone Lugaresi &copy 2023 Tesi-visualizzation
  </footer>
  <script src="../js/login.js"></script>
  <script src="../js/base.js"></script>
  <script src="../js/webgazer.js" type="text/javascript"></script>
  <link rel="stylesheet" href="../css/style.css" type="text/css">
  <link rel="stylesheet" href="../css/login.css" type="text/css">
</body>

</html>