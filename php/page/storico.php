<div class="container">
    <div class="row">
        <div class="col-md-4 tipoSezione3">
            <div class="wrapperVisualizzaTestStorico">
                <?php foreach ($templateParams["tests"] as $test): ?>
                    <div class="item row m-1" id="<?php echo $test['ID'] ?>" style="height: 35px;" onclick="openPageTestStorico(this)">
                        <span class="col-8 p-1" style=" text-align: center;">
                            <?php echo $test['Nome'] ?>
                        </span>
                        <div class="btn-group col-4 " role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-sm btn-secondary">Try</button>
                            <button type="button" class="btn btn-sm btn-secondary" onclick="delTest(<?php echo $test['ID'] ?>)" >Del</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-4 tipoSezione3">
            <div class="wrapperVisualizzaPagineStorico">
            </div>
        </div>
        <div class="col-md-4 tipoSezione3">
            <div class="wrapperVisualizzaUserStorico">

            </div>
        </div>

    </div>
</div>