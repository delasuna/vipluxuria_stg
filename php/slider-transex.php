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
$sql = "SELECT * FROM bannerTransex ORDER BY RAND()";
$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Impossível visualizar os banners: " . mysqli_error($conexao) . '<br>');
}

while ($row = mysqli_fetch_assoc($resultado)) {
    $idBannerTransex = $row['idBannerTransex'];
    $descricao = $row['descricao'];
    $imagem = $row['imagem'];
    $site = $row['site'];
    ?>
    <div class="slide">
        <a href="<?php echo htmlspecialchars($site); ?>" target="_blank">
            <img src="<?php echo "/sistema/content/".$imagem; ?>" width="378" height="150" />
        </a>
    </div>
    <?php
}
?>
</div>    
</div>
