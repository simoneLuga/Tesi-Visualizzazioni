<div class="container">
    <div class="row">
        <div id="primaSezioneCreaTest" class="col-md-12 tipoSezione1">
            <div class="row g-1 align-items-center">
                <div class="col-2 offset-1">
                    <label for="inputTitle" class="col-form-label">Titolo</label>
                </div>
                <div class="col-2">
                    <input type="text" id="inputTitle" class="form-control" onchange="changeTitleTest(this)" value="<?php if ($templateParams['isMod']) {
                        echo $templateParams['testName'];
                    } ?>"  <?php if ($templateParams['isMod']) {
                        echo 'disabled';
                    } ?>>
                </div>
                <div class="d-grid col-6 offset-1">
                    <button type="button" class="btn btn-secondary" onclick="saveTest()">SALVA</button>
                </div>
                <div class="d-grid col-12">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                        data-bs-target="#newPageModal">Aggiungi
                        pagina</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="height: 100%;">
        <div class="col-md-7 tipoSezione2 ">
            <div class="wrapper">
            <?php if ($templateParams['isMod']) {
             $index = 0; 
            foreach ($templateParams['pages'] as $page): ?>
                <div class='item row m-1' id=" <?php echo $page['ID']; ?> " onclick='openPageMod(this)'>
                    <i class='fas fa-bars col-1' style='margin-top: 10px'></i>
                    <span class='col-7' style='margin-top: 8px; text-align: center;'>Mod pagina <?php echo $index; ?> </span>
                    <button type='button' class='btn btn-outline-danger col-2 offset-2' data-bs-toggle='modal' 
                        data-bs-target='#delModal' onclick='modDelPage(<?php echo $page["ID"]; ?> )'>DEL</button>
                </div>
                <?php 
                $index++;
                endforeach; }?>
            </div>
        </div>
        <div class="col-md-5 row tipoSezione2 m-0 mt-5 mb-5" id="preview" onload="creaHtmlPagine()">
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newPageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuova Pagina</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  onclick=""></button>
                </div>
                <div class="modal-body">
                    <form class="row text-center p-1">
                        <input type="radio" class="btn-check" name="options" id="option1" onclick="rangeChange(0)"
                            autocomplete="off" checked>
                        <label class="btn btn-outline-secondary col-6 " for="option1">Link</label>
                        <input type="radio" class="btn-check" name="options" id="option2" onclick="rangeChange(1)"
                            autocomplete="off">
                        <label class="btn btn-outline-secondary col-6 " for="option2">Photo</label>

                        <div id="divIframe" class="row m-0">
                            <div class="col-8 offset-1">
                                <input type="text" id="inputlink" class="form-control" placeholder="link pagina...">
                            </div>
                            <button type="button" class="btn btn-secondary col-2"
                                onclick="caricaIframe()">carica</button>
                            <iframe id="iframeCustom" height="200" width="300" title="custom Iframe"></iframe>
                        </div>
                        <div id="divPhoto" class="row m-0 " style="display: none;">
                            <button type="button" class="btn btn-secondary offset-1 col-10"
                                onclick="cambia_fotoPage()">carica</button>
                            <img id="imgCustom" src="" height="200" width="300" title="custom image">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal" onclick="">Close</button>
                    <button type="button" class="btn btn-secondary" onclick="aggiungiPagina();"
                        data-bs-dismiss="modal">Add</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel" id="titleDelModal">Attenzione
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row" id="bodyDelModal" style=" font-family: Arial, sans-serif;font-size: 20px;">
                    Stai per eliminare la pagina sicuro di voler continuare? qualora fosse una pagina già testata i tuoi dati andranno persi.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                        onclick="confermaEliminazione()">Si, Elimina</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
</script>