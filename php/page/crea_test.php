<div class="container">
    <div class="row">
        <div id="primaSezioneCreaTest" class="col-md-12 tipoSezione1">
            <div class="row g-1 align-items-center">
                <div class="col-2 offset-1">
                    <label for="inputTitle" class="col-form-label">Titolo</label>
                </div>
                <div class="col-2">
                    <input type="text" id="inputTitle" class="form-control" onchange="changeTitleTest(this)">
                </div>
                <div class="d-grid col-6 offset-1">
                    <button type="button" class="btn btn-outline-dark" onclick="saveNewTest()">SALVA</button>
                </div>
                <div class="d-grid col-12">
                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal"
                        data-bs-target="#newPageModal">Aggiungi
                        pagina</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="height: 100%;">
        <div class="col-md-7 tipoSezione2 ">
            <div class="wrapper">
            </div>
        </div>
        <div class="col-md-5 row tipoSezione2 m-0 mt-5 mb-5" id="preview">
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newPageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuova Pagina</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row text-center p-1">
                        <input type="radio" class="btn-check" name="options" id="option1" onclick="rangeChange(0)" autocomplete="off" checked>
                        <label class="btn btn-outline-dark col-6 " for="option1">Link</label>
                        <input type="radio" class="btn-check" name="options" id="option2" onclick="rangeChange(1)" autocomplete="off">
                        <label class="btn btn-outline-dark col-6 " for="option2">Photo</label>    

                        <div id="divIframe" class="row m-0">
                            <div class="col-8 offset-1">
                                <input type="text" id="inputlink" class="form-control" placeholder="link pagina...">
                            </div>
                            <button type="button" class="btn btn-outline-dark col-2"
                                onclick="caricaIframe()">carica</button>
                            <iframe id="iframeCustom" height="200" width="300" title="custom Iframe"></iframe>
                        </div>
                        <div id="divPhoto" class="row m-0 " style="display: none;">
                            <button type="button" class="btn btn-outline-dark offset-1 col-10"
                                onclick="cambia_fotoPage()">carica</button>
                            <img id="imgCustom" src="" height="200" width="300" title="custom image">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-dark" onclick="aggiungiPagina()"
                        data-bs-dismiss="modal">Add</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel" id="titleDelModal">Stai per eliminare la pagina
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row" id="bodyDelModal">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                        onclick="confermaEliminazione()">Si, Elimina</button>
                </div>
            </div>
        </div>
    </div>
</div>