let temp_fotoPage;
var titleTest = "titolo";
var pagineTestArray = [];
var idDaEliminare = 0;
var photoOrLink = 0;
var eliminaMod = false;

var idTestMod = "";

function showCreaTest() {
    window.onscroll = null;
    axios.post("../api/api_crea_test.php"
    ).then(response => {
        main.innerHTML = response.data;
        consoleHideSwitch(true);
        wrapperListCreateTest = document.querySelector(".wrapper");
        pagineTestArray = [];
        idTestMod = "";
        isMod = false;
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
    photoOrLink = e;
    if (e == 1) {
        document.getElementById("divPhoto").style.removeProperty("display");
        document.getElementById("divIframe").style.display = "none";
    } else {
        document.getElementById("divPhoto").style.display = "none";
        document.getElementById("divIframe").style.removeProperty("display");
    }
}

function openDelPage(id) {
    idDaEliminare = id;
    eliminaMod = false;
}

function modDelPage(id) {
    idDaEliminare = id;
    eliminaMod = true;
}

function confermaEliminazione() {
    if (eliminaMod) {
        const formData = new FormData();
        formData.append("idPage", idDaEliminare);
        axios.post("../api/api_del_Page.php", formData
        ).then(response => {
            const formData = new FormData();
            formData.append("idTest", idTestMod);
            axios.post("../api/api_get_pagineTest.php", formData
            ).then(response => {
                pagineTestArrayStorico = response.data;
                creaHtmlPagine();
            });
        });
    } else {
        pagineTestArray.splice(idDaEliminare, 1);
        creaHtmlPagine();
    }

    document.getElementById("preview").innerHTML = "";

}

function aggiungiPagina() {
    if(photoOrLink==1  && temp_fotoPage!= null){
        var id = pagineTestArray.length;
        pagineTestArray.push({ id: id, type: "photo", value: temp_fotoPage });
    }
    if(photoOrLink==0  &&  document.getElementById("iframeCustom").src != ""){
        var id = pagineTestArray.length;
        pagineTestArray.push({ id: id, type: "link", value: document.getElementById("iframeCustom").src });
    }
    
    creaHtmlPagine(pagineTestArray);
    clearPage();
}

function creaHtmlPagine() {
    var wrapper = document.querySelector(".wrapper");
    wrapper.innerHTML = "";
    var generlaIndex = 0;
    indexPag = 0;
    //ci sono pagine caricate precedentemente?
    if (isMod) {
        pagineTestArrayStorico.forEach(function (pagina) {
            var element = "<div class='item row m-1' id=" + pagina.ID + " onclick='openPageMod(this)'>\
        <i class='fas fa-bars col-1' style='margin-top: 10px'></i>\
        <span class='col-7' style='margin-top: 8px; text-align: center;'>Mod pagina  "+ generlaIndex + " </span>\
        <button type='button' class='btn btn-outline-danger col-2 offset-2' data-bs-toggle='modal'\
            data-bs-target='#delModal' onclick='modDelPage("+ pagina.ID + ")' >DEL</button>\</div>";
            wrapper.innerHTML += element;
            generlaIndex++;
            indexPag++;
        });
    }

    var indexNewPage = 0;
    pagineTestArray.forEach(function (tripla) {
        tripla.id = indexNewPage;
        var element = "<div class='item row m-1' id=" + tripla.id + " onclick='openPageCreate(this)'>\
        <i class='fas fa-bars col-1' style='margin-top: 10px'></i>\
        <span class='col-7' style='margin-top: 8px; text-align: center;'>Pagina "+ generlaIndex + " </span>\
        <button type='button' class='btn btn-outline-danger col-2 offset-2' data-bs-toggle='modal'\
            data-bs-target='#delModal' onclick='openDelPage("+ tripla.id + ")' >DEL</button>\</div>";
        wrapper.innerHTML += element;
        indexNewPage++;
        generlaIndex++;
    });
}

function openPageCreate(element) {
    wrapperListCreateTest = document.querySelector(".wrapper");
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
        preview.innerHTML = "<img class= ' mx-auto d-block responsive col-12' src=" + URL.createObjectURL(new Blob([tempElement.value])) + ">"

    } else {
        preview.innerHTML = " <iframe class= ' mx-auto d-block responsive col-12 ' src = " + tempElement.value + "></iframe>"
    }
}

function openPageMod(element) {
    wrapperListCreateTest = document.querySelector(".wrapper");
    for (var i = 0; i < wrapperListCreateTest.childNodes.length; i++) {
        if (wrapperListCreateTest.childNodes[i].tagName == "DIV")
            wrapperListCreateTest.childNodes[i].style.border = "none";
    }
    element.style.border = "1px solid #222529";
    element.style.borderRadius = "4px";
    var x = + element.id;
    var tempElement = "";
    for (var i = 0; i < pagineTestArrayStorico.length; i++) {
        if (pagineTestArrayStorico[i].ID === x) {
            tempElement = pagineTestArrayStorico[i];
            break;
        }
    }
    var preview = document.getElementById("preview");
    preview.innerHTML = "";

    if (tempElement.Photo != null) {
        preview.innerHTML = "<img class= ' mx-auto d-block responsive col-12' src=../../img/" + tempElement.Photo + ">"

    } else {
        preview.innerHTML = " <iframe class= ' mx-auto d-block responsive col-12 ' src = " + tempElement.link + "></iframe>"
    }
}

function saveTest() {
    if (isMod) {
        pagineTestArray.forEach(function (tripla) {
            const formData = new FormData();
            formData.append("idPadre", idTestMod);
            formData.append("src", tripla.value);
            formData.append("type", tripla.type);
            axios.post("../api/api_add_pagina.php", formData).then(response2 => {
                console.log(response2.data);
                var wrapper = document.querySelector(".wrapper");
                wrapper.innerHTML = "";
                document.getElementById("inputTitle").value = "";
                titleTest = "";
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
        });
    } else {
        saveNewTest();
    }
}

function saveNewTest() {
    if (titleTest != "") {
        const formData = new FormData();
        formData.append("title", titleTest);
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
                        /* console.log(response2.data); */
                        var wrapper = document.querySelector(".wrapper");
                        wrapper.innerHTML = "";
                        document.getElementById("inputTitle").value = "";
                        titleTest = "";
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
                    pagineTestArray = [];
                });
            } else {
                console.log("NOt done")
            }
        });
    }
}


function clearPage() {
    // Trova l'elemento del corpo del modal e reimposta il suo contenuto
    document.getElementById("iframeCustom").src = "";
    document.getElementById("imgCustom").src = "";
    document.getElementById("inputlink").value = "";
}
