const main = document.getElementById("feed");

function showTestConfigurazione() {
    window.onscroll = null;
    axios.post("../php/api/api_test_Configurazione.php"
    ).then(response => {
        main.innerHTML = response.data;
        webgazer.setGazeListener(function (data, elapsedTime) {
            if (data == null) {
                return;
            }
            var xprediction = data.x; //these x coordinates are relative to the viewport
            var yprediction = data.y; //these y coordinates are relative to the viewport
            console.log("x: " + xprediction + " y: " + yprediction);
        }).begin();
    });
}

function showStorico() {
    window.onscroll = null;
    axios.post("../php/api/api_storico.php"
    ).then(response => {
        main.innerHTML = response.data;
    });
}

function showCreaTest() {
    window.onscroll = null;
    axios.post("../php/api/api_crea_test.php"
    ).then(response => {
        main.innerHTML = response.data;
    });
}

function showVisualizzaTest() {
    window.onscroll = null;
    axios.post("../php/api/api_visualizza_test.php"
    ).then(response => {
        main.innerHTML = response.data;
    });
}