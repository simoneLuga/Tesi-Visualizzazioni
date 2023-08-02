
var wrapperListVisualizzaPagineStorico = 1;
var heatmapInstance;
var registrazioniPage;
var page;

var listUtenti;

function showStorico(e) {
    switchButton(e)
    window.onscroll = null;
    axios.post("../api/api_storico.php"
    ).then(response => {
        main.innerHTML = response.data;
        consoleHideSwitch(true);
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

function caricaPagineStorico(idTest) {
    wrapperListVisualizzaPagineStorico.innerHTML = "";
    const formData = new FormData();
    formData.append("idTest", idTest);
    axios.post("../api/api_get_pagineTest.php", formData
    ).then(response => {
        pagineTestArrayStorico = response.data;
        pagineTestArrayStorico.forEach(function (tripla, index) {
            var element = " <div class='item row m-1' id=" + index + " style='height: 37px;'  onclick='openPageStorico(this)'>\
                                <span class='col-12 p-1' style='text-align: center;'>Pagina "+ (index + 1) + "</span>\
                            </div>";
            wrapperListVisualizzaPagineStorico.innerHTML += element;
        });
    });
}

function openPageStorico(element) {
    for (var i = 0; i < wrapperListVisualizzaPagineStorico.childNodes.length; i++) {
        if (wrapperListVisualizzaPagineStorico.childNodes[i].tagName == "DIV")
            wrapperListVisualizzaPagineStorico.childNodes[i].style.border = "none";
    }
    element.style.border = "1px solid #222529";
    element.style.borderRadius = "4px";

    //chiamta per caricare utenti che hanno visualizzato 
    var index = element.id;
    tempElementR = pagineTestArrayStorico[index];
    page = tempElementR;
    caricaStoricoUser(tempElementR.ID);
}

function caricaStoricoUser(idPage) {
    wrapperListVisualizzaUserStorico.innerHTML = "";
    const formData = new FormData();
    formData.append("idPage", idPage);
    axios.post("../api/api_get_anonymous_user.php", formData
    ).then(response => {
        registrazioniPage = response.data;
        registrazioniPage.forEach(function (row, index) {
            var element = "<div class='item row m-1' id=" + row.IndexUtenteAnonimo + " style='height: 37px' onclick='openPageUserStorico(this)'>\
                <span class='col-12 p-1' style='text-align: center;''>Utente "+ (index + 1) + "</span>\
                </div>";
            wrapperListVisualizzaUserStorico.innerHTML += element;
        });
        listUtenti = registrazioniPage;
    });
}

function openPageUserStorico(element) {
    var idUtenteAnonimo = element.id;
    const formData = new FormData();
    formData.append("page", JSON.stringify(page));
    formData.append("idUtenteAnonimo", idUtenteAnonimo);
    axios.post("../api/api_storico_risultati.php", formData
    ).then(response => {
        main.innerHTML = response.data;
        consoleHideSwitch(false);
    });
}

function delTest(idTest) {
    const formData = new FormData();
    formData.append("idTest", idTest);
    axios.post("../api/api_del_test.php", formData
    ).then(response => {
        console.log("eliminazione di " + idTest + " avvenuta con successo");
        /* console.log(response.data); */
        axios.post("../api/api_storico.php"
        ).then(response => {
            main.innerHTML = response.data;
            wrapperListVisualizzaTestStorico = document.querySelector(".wrapperVisualizzaTestStorico");
            wrapperListVisualizzaUserStorico = document.querySelector(".wrapperVisualizzaUserStorico");
            wrapperListVisualizzaPagineStorico = document.querySelector(".wrapperVisualizzaPagineStorico");
        });
    });
}

function eseguiTest(idTest) {
    window.location.href = `../api/api_esegui_test.php?idTest=${idTest}`;
}

function AttivaDisattivaTest(e,idTest){
    var attivo;
    if(e.innerHTML == "on"){
        e.innerHTML = "off";
        e.classList.remove('btn-success');
        e.classList.add('btn-danger');
        attivo = 0;
    }
    else{
        e.innerHTML = "on";
        e.classList.add('btn-success');
        e.classList.remove('btn-danger');
        attivo = 1;
    }
    const formData = new FormData();
    formData.append("idTest", idTest);
    formData.append("attivo", attivo);
    axios.post("../api/api_AttivaDisattiva_test.php", formData
    ).then(response => {
        console.log(response.data);
    });
}

