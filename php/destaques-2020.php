<div id="destaques-2020">

    <div id="slider-content-destaques">
        <script type="text/javascript">
            $(document).ready(function(){
                $('.bxslider-destaques').bxSlider({
                    auto: true,   // booleano correto
                    slideWidth: 150,
                    minSlides: 2,
                    maxSlides: 6,
                    slideMargin: 10
                });
            });
        </script>
        <div class="bxslider-destaques">
            <?php
            $sql = "SELECT * FROM bannerlateral ORDER BY RAND()";
            $resultado = mysqli_query($conexao, $sql);
            if (!$resultado) {
                die("Impossível visualizar os banners: " . mysqli_error($conexao));
            }

            while ($row = mysqli_fetch_assoc($resultado)) {
                $site = htmlspecialchars($row['site']);
                $imagem = htmlspecialchars($row['imagem']);
                ?>
                <div style="width: 150px;">
                    <a href="<?= $site ?>" target="_blank">
                        <img src="<?= "/sistema/content/" . $imagem ?>" width="150" height="200" />
                    </a>
                </div>
            <?php
            }
            mysqli_free_result($resultado);
            ?>
        </div>      
    </div>
</div><!--DESTAQUES 2020-->
