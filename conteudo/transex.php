<?php
$conexao = require_once '../php/conecta_mysql.php';

// SEO
$sql = "SELECT * FROM seo 
        INNER JOIN tipoSeo ON seo.idTipoSeo = tipoSeo.idTipoSeo 
        WHERE descricao = 'Transex'";

$resultado = mysqli_query($conexao, $sql);
if (!$resultado) {
    die("Impossível visualizar SEO: " . mysqli_error($conexao));
}

if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    $title = $row['title'];
    $description = $row['description'];
    $keywords = $row['keywords'];
} else {
    $title = "Transex - Vip Luxúria";
    $description = "";
    $keywords = "";
}
mysqli_free_result($resultado);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php include '../head.php'; ?>

<body>
    <div id="wrap">
        <div>
            <?php include("../php/menu-2.php"); ?>
            <div id="topo"><?php include("../php/topo-2.php"); ?></div>
        </div>
        <?php include("../php/slider-transex.php"); ?>
        <?php include '../filters.php' ?>

        <div class="text-light py-4">
            <div class="container">

                <!-- Título -->
                <div class="text-center mb-5">
                    <h1 class="display-6 fw-bold">Transex - Porto Alegre</h1>
                </div>

                <!-- Lista de Transex -->
                <section class="acompanhantes-section">
                    <div class="grid-premium">
                        <?php
                        $sql = "SELECT * FROM transex WHERE flagAtivo = 'Sim' ORDER BY RAND()";
                        $resultado = mysqli_query($conexao, $sql);

                        if (!$resultado) {
                            die("Impossível visualizar as anunciantes: " . mysqli_error($conexao));
                        }

                        $contadorCarrossel = 0;
                        $comAcentos = ['à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú'];
                        $semAcentos = ['a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U'];

                        while ($row = mysqli_fetch_assoc($resultado)) {
                            $idTransex = $row['idTransex'];
                            $nome = $row['nome'];
                            $sobrenome = $row['sobrenome'];
                            $imagemComNome = $row['imagemComNome'];
                            $flagVerificada = $row['flagVerificada'] ?? 'Não';

                            $linkPerfil = "/perfil-transex/" . $idTransex . "/" . str_replace($comAcentos, $semAcentos, $nome);
                            if (!empty($sobrenome)) {
                                $linkPerfil .= "-" . str_replace(" ", "-", str_replace($comAcentos, $semAcentos, $sobrenome));
                            }
                            $linkPerfil = htmlspecialchars($linkPerfil);
                            $nomeCompleto = htmlspecialchars(trim($nome . ' ' . $sobrenome));
                        ?>
                            <a href="<?= $linkPerfil ?>" class="text-decoration-none">
                                <div class="acompanhante-card hover-lift fade-in">
                                    <?php if ($flagVerificada == 'Sim'): ?>
                                        <span class="badge-verificada">✓ Verificada</span>
                                    <?php endif; ?>
                                    <div class="card-img-wrapper">
                                        <img src="<?= "https://www.vipluxuria.com/sistema/content/" . htmlspecialchars($imagemComNome) ?>"
                                            class="card-img" alt="<?= $nomeCompleto ?>" loading="lazy">
                                    </div>
                                    <div class="card-info">
                                        <p class="nome-acompanhante"><?= $nomeCompleto ?></p>
                                    </div>
                                </div>
                            </a>

                            <?php if (++$contadorCarrossel == 18) { ?>
                                <div class="carousel-container">
                                    <?php include("../php/carousel.php"); ?>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </section>


                <!-- Box de Texto SEO -->
                <div class="mt-5 p-4 bg-secondary rounded">
                    <h2>Transex</h2>
                    <p>Nessa página do Vip Luxúria você vai encontrar as mais belas transex de Porto Alegre e grande POA!</p>
                    <p>As mais belas transex para atendimento em Porto Alegre com local ou para atendimento em hotéis e motéis, disponíveis para sexo e serviços eróticos. Veja fotos e vídeos reais e entre em contato diretamente com a T-gata de sua escolha!</p>
                </div>

                <?php include("../banner_informativo.php") ?>
                <?php include("../banner_informativo2.php") ?>
                <?php include("../banner_informativo3.php") ?>
            </div>
        </div>

        <?php include("../rodape-novo.php"); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <?php include("../php/google.php"); ?>
</body>

</html>