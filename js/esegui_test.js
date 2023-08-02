var xPerc;
var yPerc;
var eyeTracker = document.getElementById('preview');
var eyeTrackerRect = eyeTracker.getBoundingClientRect();
var uuid;
var webgazer;

function generateUUID() {

    uuid = 'xxxxxxxx-xxxx'.replace(/[xy]/g, function (c) {
        var r = Math.random() * 16 | 0,
            v = c == 'x' ? r : (r & 0x3 | 0x8);
        return v.toString(16);
    });

    const formData = new FormData();
    formData.append("idPage", pagine[indexPag].ID);
    axios.post("../api/api_get_anonymous_user.php", formData
    ).then(response => {
        do {
            uuid = 'xxxxxxxx-xxxx'.replace(/[xy]/g, function (c) {
                var r = Math.random() * 16 | 0,
                    v = c == 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        }
        while (response.data.some(item => item.IndexUtenteAnonimo === uuid));
    });

}


document.addEventListener('DOMContentLoaded', function () {
    console.log("CARICAMENTO utente");
    generateUUID();
    console.log(uuid);
    if(pagine){
        console.log(pagine);
        initWebGazer();
    }else{
        console.log("pagine non caricate");
    }
    
});

function initWebGazer() {
    webgazer.setGazeListener(function (data, elapsedTime) {
        if (data == null) {
            return;
        }
        var x = data.x; //these x coordinates are relative to the viewport
        var y = data.y; //these y coordinates are relative to the viewport

        eyeTrackerRect = eyeTracker.getBoundingClientRect();

        if (x >= eyeTrackerRect.left && x <= eyeTrackerRect.left + eyeTrackerRect.width &&
            y >= eyeTrackerRect.top && y <= eyeTrackerRect.top + eyeTrackerRect.height) {
            coords = trasformaPercentuale(x - eyeTrackerRect.left, y - eyeTrackerRect.top);
            //console.log(coords.x);
            const formData = new FormData();
            formData.append("coord_x", coords.x);
            formData.append("coord_y", coords.y);
            formData.append("idPage", pagine[indexPag].ID);
            formData.append("uuid", uuid);
            axios.post("../api/api_add_coordinate.php", formData
            ).then(response => {
                console.log(response.data);
             });
        } else {
            // Il tracciamento è fuori dal quadrato, nascondi il punto di tracciamento degli occhi
            console.log('nothing');
        }

    }).begin();
}


function onloadIframeEsegui(e) {
    e.style.height = e.contentWindow.document.body.scrollHeight + 'px';
    document.getElementById("preview").style.height = e.style.height;
}

function trasformaPercentuale(x, y) {
    xPerc = (x * 100) / eyeTrackerRect.width;
    yPerc = (y * 100) / eyeTrackerRect.height;
    //console.log('x:', xPerc, 'y:', yPerc);
    return { x: xPerc, y: yPerc };
}

function forward() {
    if (pagine.length > indexPag + 1) {
        webgazer.pause();
        indexPag++;
        if (pagine[indexPag].Photo != null) {
            document.getElementById("preview").innerHTML = "<img class= 'mx-auto d-block responsive col-12' src=../../img/" + pagine[indexPag].Photo + ">";
        } else {
            document.getElementById("preview").innerHTML = "<iframe class= 'mx-auto d-block responsive col-12' scrolling = 'no' onload='onloadIframeEsegui(this)' frameborder = '0' src = " + pagine[indexPag].link + "></iframe>";
        }
        webgazer.resume();
    }
}

function backward() {
    if (indexPag - 1 >= 0) {
        webgazer.pause();
        indexPag--;
        if (pagine[indexPag].Photo != null) {
            document.getElementById("preview").innerHTML = "<img class= 'mx-auto d-block responsive col-12' src=../../img/" + pagine[indexPag].Photo + ">";
        } else {
            document.getElementById("preview").innerHTML = "<iframe class= 'mx-auto d-block responsive col-12' scrolling = 'no' onload='onloadIframeEsegui(this)' frameborder = '0' src = " + pagine[indexPag].link + "></iframe>";
        }
        webgazer.resume();
    }
}

/* function stop_reset(e){
    if(e.innerHTML == "STOP"){
        e.innerHTML = "START";
        webgazer.pause();
    }else{
        e.innerHTML = "STOP";
        webgazer.resume();
    }
} */

