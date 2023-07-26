const main = document.getElementById("feed");
var wrapperListCreateTest = 1;

var wrapperListVisualizzaUser = 1;
const buttonsWithSwitchClass = document.querySelectorAll("button.switch");

function switchButton(e){
    buttonsWithSwitchClass.forEach((btn) => {
        btn.classList.remove("active");
    });
    e.classList.add("active");
}

function showTestConfigurazione(e) {
    switchButton(e)
    window.onscroll = null;
    axios.post("../api/api_test_Configurazione.php"
    ).then(response => {
        main.innerHTML = response.data;
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

function showStorico(e) {
    switchButton(e)
    window.onscroll = null;
    axios.post("../api/api_storico.php"
    ).then(response => {
        main.innerHTML = response.data;
        wrapperListVisualizzaTest = document.querySelector(".wrapperVisualizzaTest");
        wrapperListVisualizzaUser = document.querySelector(".wrapperVisualizzaUser");
        wrapperListVisualizzaPagine = document.querySelector(".wrapperVisualizzaPagine");

    });
}



function openPageUser(element){
    for (var i = 0; i < wrapperListVisualizzaUser.childNodes.length; i++) {
        if( wrapperListVisualizzaUser.childNodes[i].tagName == "DIV" )
        wrapperListVisualizzaUser.childNodes[i].style.border = "none";
    }
    element.style.border = "1px solid #222529";
    element.style.borderRadius = "4px";
}

