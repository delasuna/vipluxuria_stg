<div id="slider-content">
<script type="text/javascript">
    $(document).ready(function(){
        $('.bxslider').bxSlider({
            auto: true,
            mode: 'fade'
        });
    });
</script>

<ul class="bxslider">
<?php
// Query usando mysqli
$sql = "SELECT * FROM bannercentral2 ORDER BY RAND()";
$resultado = mysqli_query($conexao, $sql);

if(!$resultado){
    die("Impossível visualizar os banners: " . mysqli_error($conexao));
}

if(mysqli_num_rows($resultado) > 0) {
    while($row = mysqli_fetch_assoc($resultado)) {
        $idBannerCentral2 = $row['idBannerCentral2'];
        $descricao = $row['descricao'];
        $imagem = $row['imagem'];
        $site = $row['site'];
        ?>
        <li>
            <a href="<?= htmlspecialchars($site) ?>" target="_blank">
                <img src="<?= "/sistema/content/" . htmlspecialchars($imagem) ?>" width="1000" height="250" alt="<?= htmlspecialchars($descricao) ?>" />
            </a>
        </li>
        <?php
    }
}
?>
</ul>
</div>
