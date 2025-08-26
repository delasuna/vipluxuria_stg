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
$sql = "SELECT * FROM bannerHomem ORDER BY RAND()";
$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Impossível visualizar os banners: " . mysqli_error($conexao) . '<br>');
}

if (mysqli_num_rows($resultado) > 0) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $idBannerHomem = $row['idBannerHomem'];
        $descricao = $row['descricao'];
        $imagem = $row['imagem'];
        $site = $row['site'];
        ?>
        <div class="slide">
            <a href="<?php echo htmlspecialchars($site); ?>" target="_blank">
                <img src="<?php echo "/sistema/content/".$imagem; ?>" width="378" height="150" alt="<?php echo htmlspecialchars($descricao); ?>" />
            </a>
        </div>
        <?php
    }
}
?>
</div>
</div>
