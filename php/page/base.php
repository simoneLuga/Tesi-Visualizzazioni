<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualization</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/heatmap.js/2.0.0/heatmap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
    <!--     <?php session_start();
    echo $_SESSION['IdUtente'] ?> -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Visualization</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <button class="nav-link switch active" onclick="showStorico(this)"
                            aria-label="button test ">Statistics</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link switch" onclick="showTestConfigurazione(this)"
                            aria-label="button test ">test webgazer</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link switch" onclick="logout()" aria-label="button test ">logout</button>
                    </li>
                </ul>
            </div>
            <fieldset class="d-flex row" id="div_console" style="color: #9B9D9E; visibility: hidden;">

                <button type="button" class=" col-4 btn btn-secondary btnMoveCarosel p-1 btn-sm m-1"
                    onclick="btn_checkFunc(this)" id="btn_lineDotSwitch">LINE</button>

                <button type="button" class="col-2 btn btn-secondary btn-sm btnMoveCarosel m-1" id="btn_backward"
                    onclick="backward()"><i class="fa-solid fa-arrow-left"></i></button>
                <button type="button" class="col-2 btn btn-secondary btn-sm btnMoveCarosel m-1" id="btn_forward"
                    onclick="forward()"><i class="fa-solid fa-arrow-right"></i></button>
            </fieldset>
        </div>
    </nav>


    <div id="feed"></div>

    <footer>
        Simone Lugaresi &copy 2023 Tesi-visualization
    </footer>
    <script src="../../js/base.js"></script>
    <script src="../../js/crea.js"></script>
    <script src="../../js/storico.js"></script>
    <script src="../../js/risultati.js"></script>
    <script src="../../js/webgazer.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../../css/style.css" type="text/css">

</body>

</html>