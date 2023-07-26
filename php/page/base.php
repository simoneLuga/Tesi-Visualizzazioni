<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tesi_Visualizzation</title>
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
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <button class="nav-link switch" onclick="showVisualizzaTest(this)"
                            aria-label="button test configurazione">Visualizza Test</button>
                    </li>
                    <li class="nav-item"> 
                        <button class="nav-link switch" id="btn_creaTest" onclick="showCreaTest(this)"
                            aria-label="button test configurazione">Crea test</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link switch" onclick="showStorico(this)"
                            aria-label="button test configurazione">Storico</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link switch" onclick="showTestConfigurazione(this)"
                            aria-label="button test configurazione">Test configurazione</button>
                    </li>
                </ul>
            </div>
            <div class="navbar-brand d-flex" id="div_utente" >
                Tester
            </div>
        </div>
    </nav>


    <div id="feed">

    </div>


    <footer>
        Simone Lugaresi &copy 2023 Tesi-visualizzation
    </footer>
    <script src="../../js/base.js"></script>
    <script src="../../js/crea.js"></script>
    <script src="../../js/visualizza.js"></script>
    <script src="../../js/webgazer.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../../css/style.css" type="text/css">
</body>

</html>