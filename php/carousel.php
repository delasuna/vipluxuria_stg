<div class="carousel">
    <div class="slider-content-carousel">
        <script type="text/javascript">
            $(document).ready(function(){
                $('.bxslider-carousel').bxSlider({
                    auto: true,  // booleano correto
                    slideWidth: 370,
                    minSlides: 3,
                    maxSlides: 6,
                    slideMargin: 10
                });
            });
        </script>
        <div class="bxslider-carousel">
            <?php
            $sqlCarrossel = "SELECT * FROM mulher WHERE flagAtivo = 'Sim' AND flagCarrossel = 'S' ORDER BY flagPreferencial DESC, RAND()";
            $resultadoCarrossel = mysqli_query($conexao, $sqlCarrossel);

            if (!$resultadoCarrossel) {
                die("Impossível visualizar as anunciantes: " . mysqli_error($conexao));
            }

            while ($row = mysqli_fetch_assoc($resultadoCarrossel)) {
                $idMulher = $row['idMulher'];
                $nome = htmlspecialchars($row['nome']);
                $sobrenome = htmlspecialchars($row['sobrenome']);
                $imagemCapa = htmlspecialchars($row['imagemCapa']);

                $urlNome = tirarAcentos($nome);
                if ($sobrenome != "") {
                    $urlNome .= "-" . tirarAcentos(str_replace(" ", "-", $sobrenome));
                }
                ?>
                <a href="/perfil/<?= $idMulher ?>/<?= $urlNome ?>">
                    <img src="<?= "https://www.vipluxuria.com/sistema/content/" . $imagemCapa ?>" width="370" />
                    <p class="nome"><?= $nome ?> <?= $sobrenome ?></p>
                </a>
            <?php
            }

            mysqli_free_result($resultadoCarrossel);
            ?>
        </div>
    </div>
</div><!-- Carousel -->
