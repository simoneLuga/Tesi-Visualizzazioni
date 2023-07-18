<div class="container">
    <div class="row">
        <div id="primaSezioneCreaTest" class="col-md-12 tipoSezione1">
            <div class="row g-1 align-items-center">
                <div class="col-2 offset-1">
                    <label for="inputTitle" class="col-form-label">Titolo</label>
                </div>
                <div class="col-2">
                    <input type="text" id="inputTitle" class="form-control">
                </div>
                <div class="col-2 offset-2">
                    <label for="inputPathTest" class="col-form-label">Link condivisibile</label>
                </div>
                <div class="col-2">
                    <input type="text" id="inputPathTest" class="form-control" disabled>
                </div>
                <div class="d-grid offset-1 col-10 ">
                    <button type="button" class="btn btn-outline-dark">SALVA</button>
                </div>
            </div>
        </div><!-- Colonna di margine a destra -->
    </div>
    <div class="row" style="height: 100%;">
        <div class="col-md-7 tipoSezione2 ">
            <div class="wrapper">
                <div class="item row m-1" onclick="openPageCreate(this)">
                    <i class="fas fa-bars col-1" style="margin-top: 10px"></i>
                    <span class="col-7" style="margin-top: 8px; text-align: center;">Elemento 1 </span>
                    <!-- <input type="checkbox" class="btn-check col-2" id="btncheck1" autocomplete="off"> -->
                    <!-- <label class="btn btn-outline-dark col-2" for="btncheck1">HIDE</label> -->
                    <button type="button" class="btn btn-outline-danger col-2 offset-2"  data-bs-toggle="modal"
                     data-bs-target="#delModal">DEL</button>
                </div>
                <div class="item row m-1" onclick="openPageCreate(this)">
                    <i class="fas fa-bars col-1" style="margin-top: 10px"></i>
                    <span class="col-7" style="margin-top: 8px; text-align: center;">Elemento 1 </span>
                    <!-- <input type="checkbox" class="btn-check col-2" id="btncheck1" autocomplete="off"> -->
                    <!-- <label class="btn btn-outline-dark col-2" for="btncheck1">HIDE</label> -->
                    <button type="button" class="btn btn-outline-danger col-2 offset-2"  data-bs-toggle="modal"
                     data-bs-target="#delModal">DEL</button>
                </div>
           </div>
        </div>
        <div class="col-md-5 row tipoSezione2 m-0 mt-5 mb-5">
            <img src="../img/provaMappa.png" class=" mx-auto d-block responsive col-12" alt="...">
        </div>
    </div>
    <div class="d-grid " >
        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal"
            data-bs-target="#newPageModal">Aggiungi
            pagina</button>
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
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-dark">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina - </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Stai per eliminare la pagina - -, l'operazione è irreversibile.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-danger">Si, Elimina</button>
                </div>
            </div>
        </div>
    </div>




</div>

<script>

</script>