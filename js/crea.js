let temp_fotoPage;
var titleTest = "titolo";
var pagineTestArray = [];
var idDaEliminare = 0;
var photoOrLink = 0;

function showCreaTest(e) {
    switchButton(e)
    window.onscroll = null;
    axios.post("../api/api_crea_test.php"
    ).then(response => {
        main.innerHTML = response.data;
        consoleHideSwitch(true);
        const dragArea = document.querySelector(".wrapper");
        new Sortable(dragArea,{
            animation: 350
        });
        wrapperListCreateTest = document.querySelector(".wrapper");
        pagineTestArray = [];
    });
}


function changeTitleTest(e) {
    titleTest = e.value;
}


function cambia_fotoPage() {
    const input = document.createElement('input');
    input.type = 'file';

    input.onchange = e => {
        temp_fotoPage = e.target.files[0];
        document.getElementById("imgCustom").src = URL.createObjectURL(new Blob([temp_fotoPage]));
    }

    input.click();
}

function caricaIframe() {
    var x = document.getElementById("inputlink").value;
    document.getElementById("iframeCustom").src = x;
}

function rangeChange(e) {
    photoOrLink = e.value;
    if (e.value == 1) {
        document.getElementById("divPhoto").style.removeProperty("display");
        document.getElementById("divIframe").style.display = "none";
    } else {
        document.getElementById("divPhoto").style.display = "none";
        document.getElementById("divIframe").style.removeProperty("display");
    }
}

function openDelPage(id) {
    idDaEliminare = id;
    if (pagineTestArray[id].type == "link") {
        document.getElementById("bodyDelModal").innerHTML = "<iframe src=" + pagineTestArray[id].value + " height='200' width='300' ></iframe>";
    } else {
        document.getElementById("bodyDelModal").innerHTML = "<img  src=" + pagineTestArray[id].value + " height='200' width='300'></img>";
    }
}

function confermaEliminazione() {
    pagineTestArray.splice(idDaEliminare, 1);
    creaHtmlPagine();
}

function aggiungiPagina() {
    var id = pagineTestArray.length;
    pagineTestArray.push({ id: id, type: photoOrLink == 1 ? "photo" : "link", value: photoOrLink == 1 ? temp_fotoPage : document.getElementById("iframeCustom").src });
    creaHtmlPagine(pagineTestArray);
}

function creaHtmlPagine(array) {
    var wrapper = document.querySelector(".wrapper");
    wrapper.innerHTML = "";
    var index = 0;
    array.forEach(function (tripla) {
        tripla.id = index;
        var element = "<div class='item row m-1' id=" + tripla.id + " onclick='openPageCreate(this)'>\
        <i class='fas fa-bars col-1' style='margin-top: 10px'></i>\
        <span class='col-7' style='margin-top: 8px; text-align: center;'>Pagina "+ tripla.id + " </span>\
        <button type='button' class='btn btn-outline-danger col-2 offset-2' data-bs-toggle='modal'\
            data-bs-target='#delModal' onclick='openDelPage("+ tripla.id + ")' >DEL</button>\</div>";
        wrapper.innerHTML += element;
        index++;
    });
}

function openPageCreate(element) {
    for (var i = 0; i < wrapperListCreateTest.childNodes.length; i++) {
        if (wrapperListCreateTest.childNodes[i].tagName == "DIV")
            wrapperListCreateTest.childNodes[i].style.border = "none";
    }
    element.style.border = "1px solid #222529";
    element.style.borderRadius = "4px";

    var x = element.id;
    tempElement = pagineTestArray[x];
    var preview = document.getElementById("preview");
    preview.innerHTML = "";
    if (tempElement.type == "photo") {
        preview.innerHTML = "<img class= ' mx-auto d-block responsive col-12' src=" + URL.createObjectURL(new Blob([tempElement.value])) +">"
        
    } else {
        preview.innerHTML = " <iframe class= ' mx-auto d-block responsive col-12 ' src = " + tempElement.value + "></iframe>"
    }
}

function fix(e,src){
    e.src = src;
}

function saveNewTest() {
    const formData = new FormData();
    formData.append("title", titleTest);
    formData.append("pagineTestArray", JSON.stringify(pagineTestArray));
    axios.post("../api/api_add_test.php", formData
    ).then(response => {
        if (response.data) {
            const idPadre = response.data;
            pagineTestArray.forEach(function (tripla) {
                const formData = new FormData();
                formData.append("idPadre", idPadre);
                formData.append("src", tripla.value);
                formData.append("type", tripla.type);
                axios.post("../api/api_add_pagina.php", formData).then(response2 => {
                    console.log(response2.data);
                });
            });
            var wrapper = document.querySelector(".wrapper");
            wrapper.innerHTML = "";
            pagineTestArray = [];
            document.getElementById("inputTitle").value="";
        } else {
            console.log("NON done")
        }
    });
}