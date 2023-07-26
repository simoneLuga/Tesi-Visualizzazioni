var wrapperListVisualizzaTest = 1;
var wrapperListVisualizzaPagine = 1;
var pagineTestArray = [];

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


function openPageTest(element){
    for (var i = 0; i < wrapperListVisualizzaTest.childNodes.length; i++) {
        if( wrapperListVisualizzaTest.childNodes[i].tagName == "DIV" )
        wrapperListVisualizzaTest.childNodes[i].style.border = "none";
    }
    element.style.border = "1px solid #222529";
    element.style.borderRadius = "4px";

    //chiaamta per caricare le pagine 
    var idTest = element.id;
    wrapperListVisualizzaPagine.innerHTML="";
    const formData = new FormData();
    formData.append("idTest", idTest);
    axios.post("../api/api_get_pagineTest.php", formData
    ).then( response=> {
        pagineTestArray = response.data;
        pagineTestArray.forEach(function (tripla,index) {
            tripla.id = index;
            var element = "<div class='item row m-1' style='width: 90%;' id="+tripla.id+" onclick='openPagePage(this)'>\
            <span class='col-12' style='margin-top: 8px; text-align: center;'>Pagina "+index+"</span>\
            </div>";
            wrapperListVisualizzaPagine.innerHTML += element;
            index++;
        });
    });
}

function openPagePage(element){
    for (var i = 0; i < wrapperListVisualizzaPagine.childNodes.length; i++) {
        if( wrapperListVisualizzaPagine.childNodes[i].tagName == "DIV" )
        wrapperListVisualizzaPagine.childNodes[i].style.border = "none";
    }
    element.style.border = "1px solid #222529";
    element.style.borderRadius = "4px";

    var x = element.id;
    tempElement = pagineTestArray[x];
    var preview = document.getElementById("preview");
    preview.innerHTML = "";
    if (tempElement.Photo != null) {
        preview.innerHTML = "<img class= ' mx-auto d-block responsive col-12' src=../../img/" +tempElement.Photo+ ">"
    } else {
        preview.innerHTML = " <iframe class= ' mx-auto d-block responsive col-12 ' src = " + tempElement.Link + "></iframe>"
    }
}