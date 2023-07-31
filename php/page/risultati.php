
<label for="idUtente"  style="width: 100%; text-align: center;">
        idUtente: 
        <b id="idUtenteAnonimo"><?php echo $templateParams['idUtenteAnonimo'] ?></b>
        idPagina: 
        <b id="idPagina"><?php echo $templateParams['page']['ID'] ?></b>
    </label>
<div class="row" id="preview">
    <?php
    if ($templateParams['page']['Photo'] != null) {
        echo "<img id='page' class= 'mx-auto d-block responsive col-12' onload='onloadImg(this)' src=../../img/" . $templateParams['page']['Photo'] . ">";
    } else {
        echo "<iframe id='page' class= 'mx-auto d-block responsive col-12 '  
            scrolling = 'no' onload='onloadIframeResult(this)' frameborder = '0' src = " . $templateParams['page']['link'] . "></iframe>";
    }
    ?>
    <div class='heatmap'></div>
</div>
