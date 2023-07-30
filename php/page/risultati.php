<div class="row" id="preview">
    <?php
    if ($templateParams['page']['Photo'] != null) {
        echo "<img class= 'mx-auto d-block responsive col-12' src=../../img/" . $templateParams['page']['Photo'] . ">";
    } else {
        echo "<iframe class= 'mx-auto d-block responsive col-12 '  
            scrolling = 'no' onload='onloadIframeResult(this)' frameborder = '0' src = " . $templateParams['page']['link'] . "></iframe>";
    }
    ?>
    <div class='heatmap'></div>
</div>