const main = document.getElementById("feed");
var wrapperListCreateTest = 1;
const div_console = document.getElementById("div_console");

var inp_check = document.getElementById("btn-check");
var btn_forward = document.getElementById("btn_forward");
var btn_backward = document.getElementById("btn_backward");

const buttonsWithSwitchClass = document.querySelectorAll("button.switch");

function switchButton(e){
    buttonsWithSwitchClass.forEach((btn) => {
        btn.classList.remove("active");
    });
    e.classList.add("active");
}

document.addEventListener("DOMContentLoaded", function() {
    window.onscroll = null;
    axios.post("../api/api_storico.php"
    ).then(response => {
        main.innerHTML = response.data;
        consoleHideSwitch(true);
        wrapperListVisualizzaTestStorico = document.querySelector(".wrapperVisualizzaTestStorico");
        wrapperListVisualizzaUserStorico = document.querySelector(".wrapperVisualizzaUserStorico");
        wrapperListVisualizzaPagineStorico = document.querySelector(".wrapperVisualizzaPagineStorico");

    });
});

function consoleHideSwitch(hidden){
    if(hidden){
        div_console.style.visibility = "hidden";
    }else{
        div_console.style.visibility = "visible";
    }
}

function showTestConfigurazione(e) {
    switchButton(e)
    window.onscroll = null;
    axios.post("../api/api_test_configurazione.php"
    ).then(response => {
        main.innerHTML = response.data;
        consoleHideSwitch(true);
    });
}

function startConf(){
    document.getElementById("btn_start").style.display="none";
    document.getElementById("btn_stop").style.display="inline";

    webgazer.setGazeListener(function (data, elapsedTime) {
        if (data == null) {
            return;
        }
        var xprediction = data.x; //these x coordinates are relative to the viewport
        var yprediction = data.y; //these y coordinates are relative to the viewport
        console.log("x: " + xprediction + " y: " + yprediction);
    }).begin();
}

function stopConf(){
    window.location.reload()
}

function logout(){
    window.location.replace("../api/api_logout.php");
}