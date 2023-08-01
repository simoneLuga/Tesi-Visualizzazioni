
function onloadIframeResult(e) {
    e.style.height = e.contentWindow.document.body.scrollHeight + 'px';
    document.getElementById("preview").style.height = e.style.height;
}

function onloadImg(e) {
    document.querySelector('.heatmap').style.height = e.height + 'px';
}

function btn_checkFunc(e) {
    if (document.getElementById('page').tagName == 'IMG') {
        onloadImg(document.getElementById('page'));
    } else {
        onloadIframeResult(document.getElementById('page'));
    }

    if (e.innerHTML == "DOT") {
        e.innerHTML = "LINE";
        loadHeatMap();
    }
    else {
        e.innerHTML = "DOT";
        loadLineMap();
    }
}

function trasformaFromPercentuale(x, y, rect) {
    xReal = (x * parseFloat(rect.width)) / 100;
    yReal = (y * parseFloat(rect.height)) / 100;
    return { x: xReal, y: yReal };
}

function loadHeatMap() {
    document.querySelector('.heatmap').style.position = "relative";
    document.querySelector('.heatmap').innerHTML = "";
    heatmapInstance = h337.create({
        // only container is required, the rest will be defaults
        container: document.querySelector('.heatmap')
    });
    document.querySelector('.heatmap').style.position = "absolute";

    //get data
    const formData = new FormData();
    formData.append("idPage", +document.getElementById("idPagina").innerHTML);
    formData.append("IDUtenteAnonimo", document.getElementById("idUtenteAnonimo").innerHTML);
    axios.post("../api/api_get_registrazioni.php", formData
    ).then(response => {
        var points = [];


        registrazione = response.data;
        registrazione.forEach(coordianta => {
            RealCoordiante = trasformaFromPercentuale(coordianta.x, coordianta.y, heatmapInstance._renderer.canvas);
            var point = {
                x: RealCoordiante.x,
                y: RealCoordiante.y,
                value: 10,
                // radius configuration on point basis
                radius: 10
            };
            points.push(point);
        });


        var data = {
            max: 10,
            data: points
        };
        heatmapInstance.setData(data);
    });
}

function loadLineMap() {

    const ctx = document.querySelector(".heatmap-canvas").getContext('2d');

    ctx.strokeStyle = 'blue'; // Colore della linea (puoi cambiarlo a tuo piacimento)
    ctx.lineWidth = 1;

    ctx.clearRect(0, 0, document.querySelector(".heatmap-canvas").width, document.querySelector(".heatmap-canvas").height);
    const formData = new FormData();
    formData.append("idPage", +document.getElementById("idPagina").innerHTML);
    formData.append("IDUtenteAnonimo", document.getElementById("idUtenteAnonimo").innerHTML);
    axios.post("../api/api_get_registrazioni.php", formData
    ).then(response => {
        ctx.beginPath();

        registrazione = response.data;
        registrazione.forEach(coordianta => {
            RealCoordiante = trasformaFromPercentuale(coordianta.x, coordianta.y, document.querySelector(".heatmap-canvas"));
            ctx.lineTo(RealCoordiante.x, RealCoordiante.y);
        });

        ctx.stroke();
    });
}

function backward() {
    var uuid = document.getElementById("idUtenteAnonimo").innerHTML;

    var index = listUtenti.findIndex(item => item.IndexUtenteAnonimo === uuid);

    if (index-1 >= 0) {
        index--;
        document.getElementById("btn_lineDotSwitch").innerHTML = "LINE";
        const formData = new FormData();
        formData.append("page", JSON.stringify(page));
        formData.append("idUtenteAnonimo", listUtenti[index].IndexUtenteAnonimo);
        axios.post("../api/api_storico_risultati.php", formData
        ).then(response => {
            main.innerHTML = response.data;
            consoleHideSwitch(false);
        });
    }

}
function forward() {
    var uuid = document.getElementById("idUtenteAnonimo").innerHTML;

    var index = listUtenti.findIndex(item => item.IndexUtenteAnonimo === uuid);

    if (listUtenti.length > index + 1) {
        index++;
        document.getElementById("btn_lineDotSwitch").innerHTML = "LINE";
        const formData = new FormData();
        formData.append("page", JSON.stringify(page));
        formData.append("idUtenteAnonimo", listUtenti[index].IndexUtenteAnonimo);
        axios.post("../api/api_storico_risultati.php", formData
        ).then(response => {
            main.innerHTML = response.data;
            consoleHideSwitch(false);
        });
    }
}

