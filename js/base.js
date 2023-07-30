const main = document.getElementById("feed");
var wrapperListCreateTest = 1;
const div_console = document.getElementById("div_console");
var checkRisultati = false;

var inp_range = document.getElementById("customRange1");
var inp_check = document.getElementById("btn-check");
var btn_forward = document.getElementById("btn_forward");
var btn_backward = document.getElementById("btn_backward");

var wrapperListVisualizzaUser = 1;
const buttonsWithSwitchClass = document.querySelectorAll("button.switch");

function switchButton(e){
    buttonsWithSwitchClass.forEach((btn) => {
        btn.classList.remove("active");
    });
    e.classList.add("active");
}

function disabledConsole(page, heatmap){
    if(page){
        div_console.disabled = false;
        inp_range.disabled = heatmap? false: true;
        inp_check.disabled = heatmap? false: true;
    }
}

function showTestConfigurazione(e) {
    switchButton(e)
    window.onscroll = null;
    axios.post("../api/api_test_Configurazione.php"
    ).then(response => {
        main.innerHTML = response.data;
        disabledConsole(false,false);
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




function openPageUser(element){
    for (var i = 0; i < wrapperListVisualizzaUser.childNodes.length; i++) {
        if( wrapperListVisualizzaUser.childNodes[i].tagName == "DIV" )
        wrapperListVisualizzaUser.childNodes[i].style.border = "none";
    }
    element.style.border = "1px solid #222529";
    element.style.borderRadius = "4px";
}

function logout(){
    window.location.replace("../api/api_logout.php");
}