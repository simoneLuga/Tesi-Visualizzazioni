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
    <style>
        .square-container {
            position: relative;
            width: 100%;
            height: 90vh;
        }

        .top-left,
        .top-right,
        .bottom-left,
        .bottom-right {
            position: absolute;
        }

        .top-left {
            top: 0;
            left: 200px;
        }

        .top-right {
            top: 0;
            right: 0;
        }

        .bottom-left {
            bottom: 0;
            left: 0;
        }

        .bottom-right {
            bottom: 0;
            right: 0;
        }

        .btnConf {
            border-radius: 10px;
            width: 50px;
            height: 50px;
            margin: 5px;
        }

        .center-div {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        p {
            font-family: Arial, sans-serif;
            /* Cambia il font */
            font-size: 20px;
            /* Cambia la dimensione del font */
        }
    </style>
    </style>
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
                    <li class="nav-item">
                        <button class="nav-link switch" id="btn_creaTest" onclick="logout()"
                            aria-label="button test ">login</button>
                    </li>
                </ul>
            </div>
            <fieldset class="d-flex row" id="div_console" style="color: #9B9D9E;" disabled>
                <button type="button" class="col-2 offset-9 btn btn-secondary btn-sm btnMoveCarosel m-1"
                    id="btn_backward" onclick="backward()"><i class="fa-solid fa-arrow-left"></i></button>
                <button type="button" class="col-2 btn btn-secondary btn-sm btnMoveCarosel m-1" id="btn_forward"
                    onclick="forward()"><i class="fa-solid fa-arrow-right"></i></button>
            </fieldset>
        </div>
    </nav>

    <div id="feed">
        <div class="row" id="preview">

            <?php
            $okVar = json_decode($templateParams['ok'], true);
            if ($okVar[0]['attivo']) {
                ?>
                <div class="col-12">
                    <div class="square-container center-div">
                        <button class="btn btn-secondary top-left btnConf" onclick="calibrazione(this)">5</button>
                        <button class="btn btn-secondary top-right btnConf" onclick="calibrazione(this)">5</button>
                        <button class="btn btn-secondary bottom-left btnConf" onclick="calibrazione(this)">5</button>
                        <button class="btn btn-secondary bottom-right btnConf" onclick="calibrazione(this)">5</button>

                        <p>Clicclare su tutti e 4 i bottoni finche non diventano <span style="color: green;">verdi</span>
                            per calibrare la
                            libreria</p>
                    </div>
                </div>
                <?php
            } else {
                echo "<div class='d-flex align-items-center justify-content-center'>
                <div class='text-center'>
                    <h2 class='display-1 fw-bold'>404</h2>
                    <p class='fs-3'> <span class='text-danger'>Opps!</span></p>
                    <p class='lead'>
                        Test non trovato</span>
                    </p>
                </div>
            </div>";
            }
            ?>
        </div>
    </div>
    </div>

    <footer>
        Simone Lugaresi &copy 2023 Tesi-visualization
    </footer>
    <script>
        var pagine = <?php if ($okVar[0]['attivo']) {
            echo $templateParams['pages'];
        } ?>;
        var indexPag = 0;
    </script>
    <script>
        function logout() {
            window.location.replace("../api/api_logout.php");
        }
    </script>
    <script src="../../js/esegui_test.js"></script>
    <script src="../../js/webgazer.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../../css/style.css" type="text/css">
</body>

</html>