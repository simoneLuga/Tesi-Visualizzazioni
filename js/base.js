const main = document.getElementById("feed");
var wrapperListCreateTest = 1;
var wrapperListVisualizzaTest = 1;
var wrapperListVisualizzaPagine = 1;
var wrapperListVisualizzaUser = 1;


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
        wrapperListVisualizzaTest = document.querySelector(".wrapperVisualizzaTest");
        wrapperListVisualizzaUser = document.querySelector(".wrapperVisualizzaUser");
        wrapperListVisualizzaPagine = document.querySelector(".wrapperVisualizzaPagine");

    });
}

function showCreaTest() {
    window.onscroll = null;
    axios.post("../php/api/api_crea_test.php"
    ).then(response => {
        main.innerHTML = response.data;
        const dragArea = document.querySelector(".wrapper");
        new Sortable(dragArea,{
            animation: 350
        });
        wrapperListCreateTest = document.querySelector(".wrapper");
    });
    document.getElementById("btn_creaTest").classList.add="active";
}

function showVisualizzaTest() {
    window.onscroll = null;
    axios.post("../php/api/api_visualizza_test.php"
    ).then(response => {
        main.innerHTML = response.data;
        wrapperListVisualizzaTest = document.querySelector(".wrapperVisualizzaTest");
        wrapperListVisualizzaPagine = document.querySelector(".wrapperVisualizzaPagine");
    });
};

function openPageCreate(element){
    for (var i = 0; i < wrapperListCreateTest.childNodes.length; i++) {
        if( wrapperListCreateTest.childNodes[i].tagName == "DIV" )
            wrapperListCreateTest.childNodes[i].style.border = "none";
    }
    element.style.border = "1px solid #222529";
    element.style.borderRadius = "4px";
}

function openPageTest(element){
    for (var i = 0; i < wrapperListVisualizzaTest.childNodes.length; i++) {
        if( wrapperListVisualizzaTest.childNodes[i].tagName == "DIV" )
        wrapperListVisualizzaTest.childNodes[i].style.border = "none";
    }
    element.style.border = "1px solid #222529";
    element.style.borderRadius = "4px";
}

function openPageUser(element){
    for (var i = 0; i < wrapperListVisualizzaUser.childNodes.length; i++) {
        if( wrapperListVisualizzaUser.childNodes[i].tagName == "DIV" )
        wrapperListVisualizzaUser.childNodes[i].style.border = "none";
    }
    element.style.border = "1px solid #222529";
    element.style.borderRadius = "4px";
}

function openPagePage(element){
    for (var i = 0; i < wrapperListVisualizzaPagine.childNodes.length; i++) {
        if( wrapperListVisualizzaPagine.childNodes[i].tagName == "DIV" )
        wrapperListVisualizzaPagine.childNodes[i].style.border = "none";
    }
    element.style.border = "1px solid #222529";
    element.style.borderRadius = "4px";
}