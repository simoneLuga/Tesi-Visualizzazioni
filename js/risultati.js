
function onloadIframeResult(e) {
    e.style.height = e.contentWindow.document.body.scrollHeight + 'px';
    document.getElementById("preview").style.height = e.style.height;
}

function loadHeatMap(e) {
    if (e.checked) {
        inp_range.disabled = true;

        //caricamento
        {
            document.querySelector('.heatmap').style.position = "relative";
            document.querySelector('.heatmap').innerHTML = "";
            heatmapInstance = h337.create({
                // only container is required, the rest will be defaults
                container: document.querySelector('.heatmap')
            });
            document.querySelector('.heatmap').style.position = "absolute";
            // now generate some random data
            var points = [];
            var max = 0;
            var len = 300;

            while (len--) {
                var val = 10;
                // now also with custom radius
                var radius = 10;

                max = Math.max(max, val);
                var point = {
                    x: Math.floor(Math.random() * heatmapInstance._renderer.canvas.width),
                    y: Math.floor(Math.random() * heatmapInstance._renderer.canvas.height),
                    value: val,
                    // radius configuration on point basis
                    radius: radius
                };
                points.push(point);
            }
            // heatmap data format
            var data = {
                max: max,
                data: points
            };
            // if you have a set of datapoints always use setData instead of addData
            // for data initialization
            heatmapInstance.setData(data);
        }
    }
    else {
        inp_range.disabled = false;
    }

}

