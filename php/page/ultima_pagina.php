<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tesi_Visualizzation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Visualization</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                <?php if ($templateParams['giaLoggato'] == true){
                    ?> 
                    <li class="nav-item">
                        <button class="nav-link switch active" onclick="returnBack()"
                            aria-label="button test ">Statistics</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link switch" onclick="logout()" aria-label="button test ">logout</button>
                    </li>
                    <?php
                }else {
                    ?> 
                    <li class="nav-item">
                        <button class="nav-link switch" id="btn_creaTest" onclick="logout()"
                            aria-label="button test ">login</button>
                    </li>
                    <?php
                } ?>
                </ul>
            </div>
        </div>
    </nav>

    <div id="feed">
        <div class='d-flex align-items-center justify-content-center'>
            <div class='text-center'>
                <h2 class='display-1 fw-bold'>FINE</h2>
                <p class='fs-3'> <span class='text-success'>Il test si è concluso in maniera corretta.</span></p>
                <p class='lead'>
                    Grazie di aver utilizzato il sito per testare le tue visualizzazioni.</span>
                </p>
            </div>
        </div>
    </div>

    <footer>
        Simone Lugaresi &copy 2023 Tesi-visualization
    </footer>
    <script>
        function logout() {
            window.location.replace("../api/api_logout.php");
        }
        function returnBack(){
            window.location.assign("../page/base.php");
        }
    </script>
    
    <link rel="stylesheet" href="../../css/style.css" type="text/css">

</body>

</html>