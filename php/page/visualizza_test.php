<div class="container">
    <div class="row">
        <div class="col-md-5 tipoSezione3">
            <div class="wrapperVisualizzaTest">
                <?php foreach ($templateParams["tests"] as $test): ?>
                    <div class="item row m-1" id="<?php echo $test['ID'] ?>" onclick="openPageTest(this)">
                        <i class="fas fa-bars col-1" style="margin-top: 10px"></i>
                        <span class="col-5" style="margin-top: 8px; text-align: center;">
                            <?php echo $test['Nome'] ?>
                        </span>

                        <div class="btn-group col-4 " role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-dark">Try</button>
                            <button type="button" class="btn btn-outline-dark" onclick="openModificaTest(<?php echo $test['ID'] ?>)">Mod</button>
                            <button type="button" class="btn btn-outline-dark">Del</button>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-2 tipoSezione3">
            <div class="wrapperVisualizzaPagine">
            </div>
        </div>
        <div class="col-md-5 row m-0 tipoSezione2" style="margin-top: 12% !important;"  id="preview">
            <!--  <img src="../img/provaMappa.png" class=" mx-auto d-block responsive col-12" alt="..."> -->
        </div>
    </div>
</div>