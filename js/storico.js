var wrapperListVisualizzaTest = 1;
var wrapperListVisualizzaPagine = 1;
var wrapperListVisualizzaPagineStorico = 1;


function showStorico(e) {
    switchButton(e)
    window.onscroll = null;
    axios.post("../api/api_storico.php"
    ).then(response => {
        main.innerHTML = response.data;
        wrapperListVisualizzaTestStorico = document.querySelector(".wrapperVisualizzaTestStorico");
        wrapperListVisualizzaUserStorico = document.querySelector(".wrapperVisualizzaUserStorico");
        wrapperListVisualizzaPagineStorico = document.querySelector(".wrapperVisualizzaPagineStorico");

    });
}

function openPageTestStorico(element) {
    for (var i = 0; i < wrapperListVisualizzaTestStorico.childNodes.length; i++) {
        if (wrapperListVisualizzaTestStorico.childNodes[i].tagName == "DIV")
            wrapperListVisualizzaTestStorico.childNodes[i].style.border = "none";
    }
    element.style.border = "1px solid #222529";
    element.style.borderRadius = "4px";

    //chiamta per caricare le pagine 
    var idTest = element.id;
    caricaPagineStorico(idTest);
}

function openPageStorico(element){
    for (var i = 0; i < wrapperListVisualizzaPagineStorico.childNodes.length; i++) {
        if (wrapperListVisualizzaPagineStorico.childNodes[i].tagName == "DIV")
            wrapperListVisualizzaPagineStorico.childNodes[i].style.border = "none";
    }
    element.style.border = "1px solid #222529";
    element.style.borderRadius = "4px";

        //chiamta per caricare utenti che hanno visualizzato 
    var idPage = element.id;
    caricaStoricoUser(idPage);
}

function caricaStoricoUser(idPage){
    wrapperListVisualizzaUserStorico.innerHTML = "";
    const formData = new FormData();
    formData.append("idPage", idPage);
    axios.post("../api/api_get_registrazioniPage.php", formData
    ).then(response => {
        registrazioniPage = response.data;
        registrazioniPage.forEach(function(row, index){
            var element = "<div class='item row m-1' id="+row.IndexUtenteAnonimo+" onclick='openPageUserStorico(this)'>\
                <span class='col-12' style='text-align: center;''>Utente "+(index+1)+"</span>\
                </div>";
            wrapperListVisualizzaUserStorico.innerHTML += element;
        });
    });
}

function caricaPagineStorico(idTest){
    wrapperListVisualizzaPagineStorico.innerHTML = "";
    const formData = new FormData();
    formData.append("idTest", idTest);
    axios.post("../api/api_get_pagineTest.php", formData
    ).then(response => {
        pagineTestArrayStorico = response.data;
        pagineTestArrayStorico.forEach(function (tripla, index) {
            var element = "<div class='item row m-1' style='width: 90%;' id=" + tripla.ID + " onclick='openPageStorico(this)'>\
            <span class='col-12' style='text-align: center;'>Pagina "+ (index+1) + "</span>\
            </div>";
            wrapperListVisualizzaPagineStorico.innerHTML += element;
        });
    });
}