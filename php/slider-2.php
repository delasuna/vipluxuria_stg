<div id="slider-content-2">
<script type="text/javascript">
$(document).ready(function(){
    $('.bxslider-2').bxSlider({
        auto: true,
        slideWidth: 378,
        minSlides: 2,
        maxSlides: 4,
        slideMargin: 10
    });
});
</script>

<div class="bxslider-2">
<?php
$sql = "SELECT * FROM bannercentral3 ORDER BY RAND()";
$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Impossível visualizar os banners: " . mysqli_error($conexao));
}

if (mysqli_num_rows($resultado) > 0) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $idBannerCentral3 = $row['idBannerCentral3'];
        $descricao = $row['descricao'];
        $imagem = $row['imagem'];
        $site = $row['site'];
        ?>
        <div class="slide">
            <a href="<?= htmlspecialchars($site) ?>" target="_blank">
                <img src="<?= "/sistema/content/" . htmlspecialchars($imagem) ?>" width="378" height="150" alt="<?= htmlspecialchars($descricao) ?>" />
            </a>
        </div>
        <?php
    }
}
?>
</div>
</div>
