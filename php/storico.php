<div class="container">
    <div class="row">
        <div class="col-md-3 tipoSezione3">
            <div class="wrapperVisualizzaTest">
                <div class="item row m-1" onclick="openPageTest(this)">
                    <i class="fas fa-bars col-1" style="margin-top: 10px"></i>
                    <span class="col-7" style="margin-top: 8px; text-align: center;">Primo Test</span>
                    <!-- <input type="checkbox" class="btn-check col-2" id="btncheck1" autocomplete="off"> -->
                    <!-- <label class="btn btn-outline-dark col-2" for="btncheck1">HIDE</label> -->
                </div>
                <div class="item row m-1" onclick="openPageTest(this)">
                    <i class="fas fa-bars col-1" style="margin-top: 10px"></i>
                    <span class="col-7" style="margin-top: 8px; text-align: center;">2 Test</span>
                    <!-- <input type="checkbox" class="btn-check col-2" id="btncheck1" autocomplete="off"> -->
                    <!-- <label class="btn btn-outline-dark col-2" for="btncheck1">HIDE</label> -->
                </div>
                <div class="item row m-1" onclick="openPageTest(this)">
                    <i class="fas fa-bars col-1" style="margin-top: 10px"></i>
                    <span class="col-7" style="margin-top: 8px; text-align: center;">3 Test</span>
                    <!-- <input type="checkbox" class="btn-check col-2" id="btncheck1" autocomplete="off"> -->
                    <!-- <label class="btn btn-outline-dark col-2" for="btncheck1">HIDE</label> -->
                </div>
                <div class="item row m-1" onclick="openPageTest(this)">
                    <i class="fas fa-bars col-1" style="margin-top: 10px"></i>
                    <span class="col-7" style="margin-top: 8px; text-align: center;">4 Test</span>
                    <!-- <input type="checkbox" class="btn-check col-2" id="btncheck1" autocomplete="off"> -->
                    <!-- <label class="btn btn-outline-dark col-2" for="btncheck1">HIDE</label> -->
                </div>
            </div>
        </div>
        <div class="col-md-2 tipoSezione3">
            <div class="wrapperVisualizzaPagine">
                <div class="item row m-1" onclick="openPagePage(this)">
                    <span class="col-12" style="margin-top: 8px; text-align: center;">Pagina 1</span>
                </div>
            </div>
        </div>
        <div class="col-md-2 tipoSezione3">
            <div class="wrapperVisualizzaUser">
                <div class="item row m-1" onclick="openPageUser(this)">
                    <span class="col-12" style="margin-top: 8px; text-align: center;">Utente 1</span>
                </div>
            </div>
        </div>
        <div class="col-md-5 row m-0 tipoSezione2" style="margin-top: 20% !important;">
            <img src="../img/provaMappa.png" class=" mx-auto d-block responsive col-12" alt="...">
            <div class="col-7"></div>
            <button type="button" class="btn btn-secondary btn-sm btnMoveCarosel m-1" data-bs-toggle="modal"
                data-bs-target="#myModal"><i class="fa-solid fa-expand"></i></button>
            <button type="button" class="btn btn-secondary btn-sm btnMoveCarosel m-1"><i
                    class="fa-solid fa-arrow-left"></i></button>
            <button type="button" class="btn btn-secondary btn-sm btnMoveCarosel m-1"><i
                    class="fa-solid fa-arrow-right"></i></button>
        </div>

        <!-- Modal -->
        <div class="modal fade " id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class=" modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Primo test > Pagina 1 > Utente 1</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="../img/provaMappa.png" class=" mx-auto d-block responsive col-12" style="height: 700px; width: 750px;" alt="...">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm btnMoveCarosel m-1" data-bs-toggle="modal"
                            data-bs-target="#myModal"><i class="fa-solid fa-compress"></i></button>
                        <button type="button" class="btn btn-secondary btn-sm btnMoveCarosel m-1"><i
                                class="fa-solid fa-arrow-left"></i></button>
                        <button type="button" class="btn btn-secondary btn-sm btnMoveCarosel m-1"><i
                                class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>