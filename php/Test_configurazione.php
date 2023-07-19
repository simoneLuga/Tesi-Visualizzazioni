<button type="button" class="btn btn-outline-dark center" data-bs-toggle="modal" data-bs-target="#tryConf" id="btn_start">Inizia configurazione</button>
<button type="button" class="btn btn-outline-dark center" id="btn_stop" style="display: none;" onclick="stopConf()">Stop</button>
<div class="modal fade" id="tryConf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Configurazione</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Per configurare al meglio bisogna seguire con lo sguardo il proprio mouse e fare tanti click in punti dello schermo, poi spostare il mouse e farne altri.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal" onclick="startConf()">Ok, start</button>
                </div>
            </div>
        </div>
    </div>