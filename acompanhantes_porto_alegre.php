<?php
$conexao = require_once 'php/conecta_mysql.php';

// SEO
$sql = "SELECT * 
        FROM seo 
        INNER JOIN tipoSeo ON seo.idTipoSeo = tipoSeo.idTipoSeo 
        WHERE descricao = 'Home'";

$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Impossível visualizar SEO: " . mysqli_error($conexao));
}

$seo = mysqli_fetch_assoc($resultado);
$title = $seo['title'] ?? '';
$description = $seo['description'] ?? '';
$keywords = $seo['keywords'] ?? '';

mysqli_free_result($resultado);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php include 'head.php'; ?>

<body>
    <div id="wrap">
        <div>
            <?php include("php/menu-2.php"); ?>
            <div id="topo"><?php include("php/topo-2.php"); ?></div>
        </div>
        <?php include("php/slider.php"); ?>
        <?php include 'filters.php' ?>
        
        <div class="bg-dark text-light py-4">
            <div class="container">

                <!-- Slider -->
                <div class="mb-4">
                    <?php include("php/slider-2020.php"); ?>
                </div>

                <!-- Título -->
                <div class="text-center mb-5">
                    <h1 class="display-6 fw-bold">Acompanhantes Porto Alegre-RS</h1>
                </div>

                <!-- Lista de Mulheres -->
                <div class="row g-4">
                    <?php
                    $sql = "SELECT * FROM mulher WHERE flagAtivo = 'Sim' ORDER BY flagPreferencial DESC, flagAgenciada ASC, RAND()";
                    $resultado = mysqli_query($conexao, $sql);
                    if (!$resultado) {
                        die("Impossível visualizar as anunciantes: " . mysqli_error($conexao));
                    }

                    $contadorCarrossel = 0;
                    $comAcentos = ['à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú'];
                    $semAcentos = ['a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','O','U','U','U'];

                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $idMulher = $row['idMulher'];
                        $nome = $row['nome'];
                        $sobrenome = $row['sobrenome'];
                        $imagemCapa = $row['imagemCapa'];

                        $linkPerfil = "/perfil/" . $idMulher . "/" . str_replace($comAcentos, $semAcentos, $nome);
                        if (!empty($sobrenome)) {
                            $linkPerfil .= "-" . str_replace(" ", "-", str_replace($comAcentos, $semAcentos, $sobrenome));
                        }
                        $linkPerfil = htmlspecialchars($linkPerfil);
                        $nomeCompleto = htmlspecialchars($nome . ' ' . $sobrenome);
                    ?>
                        <div class="col-6 col-sm-4 col-md-3 col-lg-custom">
                            <a href="<?= $linkPerfil ?>" class="text-decoration-none text-light">
                                <div class="card bg-secondary text-light shadow-sm h-100">
                                    <img src="<?= "https://www.vipluxuria.com/sistema/content/" . htmlspecialchars($imagemCapa) ?>" class="card-img-top" alt="<?= $nomeCompleto ?>">
                                    <div class="card-body p-2">
                                        <p class="card-text text-center fw-bold small"><?= $nomeCompleto ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <?php if (++$contadorCarrossel == 16) { ?>
                            <div class="col-12">
                                <?php include("php/carousel.php"); ?>
                            </div>
                        <?php } ?>

                    <?php } ?>
                </div>

                <!-- Texto SEO -->
                <div class="mt-5 p-4 bg-secondary rounded">
                    <h2>Companheirismo Sofisticado e Exclusivo</h2>
                    <p>Porto Alegre, uma cidade vibrante e cheia de opções culturais e sociais, é também um destino ideal para quem busca discrição e sofisticação na hora de contratar acompanhantes Porto Alegre-RS.</p>
                    
                    <h3 class="mt-4">Atendimento Personalizado e Exclusivo</h3>
                    <p>As acompanhantes Porto Alegre-RS costumam oferecer um serviço altamente personalizado. Isso significa que, ao contratar um acompanhante, você pode escolher os detalhes da experiência que deseja viver.</p>
                    
                    <h3 class="mt-4">Discrição e Confidencialidade</h3>
                    <p>Outro benefício essencial ao contratar uma acompanhante Porto Alegre-RS é a discrição. Profissionais de alto nível sabem como garantir que seus clientes se sintam à vontade e seguros em qualquer situação.</p>
                    
                    <h3 class="mt-4">Qualidade e Profissionalismo</h3>
                    <p>Quando você opta por contratar uma acompanhante em Porto Alegre-RS pela plataforma Vip Luxúria, pode ter certeza de que está lidando com uma habilidade profissional.</p>
                </div>

                <?php include("banner_informativo.php") ?>
                <?php include("banner_informativo2.php") ?>
                <?php include("banner_informativo3.php") ?>
            </div>
        </div>

        <?php include("rodape-novo.php"); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <?php include("php/google.php"); ?>
</body>
</html>