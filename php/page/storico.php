<div class="container">
    <div class="row">
        <div class="col-md-4 tipoSezione3">
            <div class="wrapperVisualizzaTestStorico">
                <?php foreach ($templateParams["tests"] as $test): ?>
                    <div class="item row m-1" id="<?php echo $test['ID'] ?>" style="height: 37px;"
                        onclick="openPageTestStorico(this)">
                        <span class="col-7 p-1" style=" text-align: center;">
                            <?php echo $test['Nome'] ?>
                        </span>
                        <div class="btn-group col-5 " role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal"
                                data-bs-target="#modalDelete<?php echo $test['ID'] ?>">Del</button>
                            <!-- Modal -->
                            <div class="modal fade" id="modalDelete<?php echo $test['ID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Attenzione</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Sei sicuro di voler eliminare il test selezionato?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No,
                                                chiudi.</button>
                                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal"
                                                onclick="delTest(<?php echo $test['ID'] ?>)">SI.</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-secondary"
                                onclick="eseguiTest(<?php echo $test['ID'] ?>)">Try
                            </button>
                            <button type="button"
                                class="btn btn-sm <?php if ($test['attivo']) {
                                    echo 'btn-success';
                                } else {
                                    echo 'btn-danger';
                                } ?>"
                                onclick="AttivaDisattivaTest(this,<?php echo $test['ID'] ?>)"><?php if ($test['attivo']) {
                                       echo 'on';
                                   } else {
                                       echo 'off';
                                   } ?>
                            </button>
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