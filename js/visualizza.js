var wrapperListVisualizzaTest = 1;
var wrapperListVisualizzaPagine = 1;
var pagineTestArrayVisualizza = [];

function showVisualizzaTest(e) {
    switchButton(e)
    window.onscroll = null;
    axios.post("../api/api_visualizza_test.php"
    ).then(response => {
        main.innerHTML = response.data;
        wrapperListVisualizzaTest = document.querySelector(".wrapperVisualizzaTest");
        wrapperListVisualizzaPagine = document.querySelector(".wrapperVisualizzaPagine");
    });
};


function openPageTest(element) {
    for (var i = 0; i < wrapperListVisualizzaTest.childNodes.length; i++) {
        if (wrapperListVisualizzaTest.childNodes[i].tagName == "DIV")
            wrapperListVisualizzaTest.childNodes[i].style.border = "none";
    }
    element.style.border = "1px solid #222529";
    element.style.borderRadius = "4px";

    //chiamta per caricare le pagine 
    var idTest = element.id;
    caricaPagine(idTest);
}

function caricaPagine(idTest){
    wrapperListVisualizzaPagine.innerHTML = "";
    const formData = new FormData();
    formData.append("idTest", idTest);
    axios.post("../api/api_get_pagineTest.php", formData
    ).then(response => {
        pagineTestArrayVisualizza = response.data;
        pagineTestArrayVisualizza.forEach(function (tripla, index) {
            tripla.id = index;
            var element = "<div class='item row m-1' style='width: 90%;' id=" + tripla.id + " onclick='openPagePage(this)'>\
            <span class='col-12' style='margin-top: 8px; text-align: center;'>Pagina "+ index + "</span>\
            </div>";
            wrapperListVisualizzaPagine.innerHTML += element;
            index++;
        });
    });
}

function openPagePage(element) {
    for (var i = 0; i < wrapperListVisualizzaPagine.childNodes.length; i++) {
        if (wrapperListVisualizzaPagine.childNodes[i].tagName == "DIV")
            wrapperListVisualizzaPagine.childNodes[i].style.border = "none";
    }
    element.style.border = "1px solid #222529";
    element.style.borderRadius = "4px";

    var x = element.id;
    tempElementV = pagineTestArrayVisualizza[x];
    var preview = document.getElementById("preview");
    preview.innerHTML = "";
    if (tempElementV.Photo != null) {
        preview.innerHTML = "<img class= ' mx-auto d-block responsive col-12' src=../../img/" + tempElementV.Photo + ">"
    } else {
        preview.innerHTML = " <iframe class= ' mx-auto d-block responsive col-12 ' src = " + tempElementV.link + "></iframe>"
    }
}

function delTest(idTest) {
    const formData = new FormData();
    formData.append("idTest", idTest);
    axios.post("../api/api_del_test.php", formData
    ).then(response => {
        console.log("eliminazione di " + idTest + " avvenuta con successo");
        axios.post("../api/api_visualizza_test.php"
        ).then(response => {
            main.innerHTML = response.data;
            wrapperListVisualizzaTest = document.querySelector(".wrapperVisualizzaTest");
            wrapperListVisualizzaPagine = document.querySelector(".wrapperVisualizzaPagine");
        });
    });
}

function openModificaTest(idTest,Nome){
    caricaPagine(idTest);
    switchButton(document.getElementById("btn_creaTest"));
    window.onscroll = null;
    axios.post("../api/api_crea_test.php"
    ).then(response => {
        main.innerHTML = response.data;
        const dragArea = document.querySelector(".wrapper");
        new Sortable(dragArea,{
            animation: 350
        });
        wrapperListCreateTest = document.querySelector(".wrapper");
        pagineTestArray=[];
        pagineTestArrayVisualizza.forEach(function(row,index){
            pagineTestArray.push({ id: index, type: row.Photo != null ? "photo" : "link", value: row.Photo != null ? row.Photo: row.link });
        })
        creaHtmlPagine(pagineTestArray);
        document.getElementById("inputTitle").value=Nome;
    });
}