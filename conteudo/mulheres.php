<?php
$conexao = require_once '../php/conecta_mysql.php';

// Função anti_injection
function anti_injection($str) {
    $str = trim($str);
    $str = strip_tags($str);
    $str = addslashes($str);
    return $str;
}

// SEO
$whereSEO = " descricao = 'Home' ";
if (!empty($_REQUEST["flagTipo"])) {
    $flag = anti_injection($_REQUEST["flagTipo"]);
    $map = [
        "Loiras"        => "descricao = 'Loiras'",
        "Morenas"       => "descricao = 'Morenas'",
        "Mulatas"       => "descricao = 'Mulatas'",
        "Atende24Horas" => "descricao = 'Atende24Horas'",
        "ComVideo"      => "descricao = 'ComVideo'",
        "ComLocal"      => "descricao = 'ComLocal'",
        "SexoVirtual"   => "descricao = 'SexoVirtual'"
    ];
    if (isset($map[$flag])) {
        $whereSEO = $map[$flag];
    }
}

$sql = "SELECT * FROM seo, tipoSeo WHERE seo.idTipoSeo = tipoSeo.idTipoSeo AND $whereSEO";
$resultado = mysqli_query($conexao, $sql) or die("Impossível visualizar SEO: " . mysqli_error($conexao));

$title = $description = $keywords = "";
if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    $title = $row['title'];
    $description = $row['description'];
    $keywords = $row['keywords'];
}
mysqli_free_result($resultado);

// Cidade
$cidade = "Porto Alegre";
if (!empty($_REQUEST["idCidade"])) {
    $idCidade = (int) $_REQUEST["idCidade"];
    $sql = "SELECT cidade FROM cidade WHERE idCidade = $idCidade";
    $resultado = mysqli_query($conexao, $sql);
    if ($row = mysqli_fetch_assoc($resultado)) {
        $cidade = $row['cidade'];
    }
    mysqli_free_result($resultado);
}
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
        <?php include("../php/slider.php"); ?>
        <?php include '../filters.php' ?>
        
        <div class="bg-dark text-light py-4">
            <div class="container">
                
                <!-- Título -->
                <div class="text-center mb-5">
                    <h1 class="display-6 fw-bold">Acompanhantes <?= $cidade ?></h1>
                    
                    <?php if (!empty($_REQUEST["flagTipo"]) && anti_injection($_REQUEST["flagTipo"]) == "SexoVirtual"): ?>
                    <div class="alert alert-info mt-3">
                        <p>Este espaço é destinado a destacar as acompanhantes que fazem shows privados pelo WhatsApp e venda de pacote de fotos, venda de vídeos!</p>
                        <p><strong>Consulte diretamente com a anunciante os serviços oferecidos por ela!</strong></p>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Lista de Mulheres -->
                <div class="row g-4">
                    <?php
                    // Montar WHERE
                    $where = " WHERE flagAtivo = 'Sim' ";
                    if (!empty($_REQUEST["nome"])) {
                        $nome = mysqli_real_escape_string($conexao, $_REQUEST["nome"]);
                        $where .= " AND nomeURL LIKE '%$nome%'";
                    }

                    $flagTipo = !empty($_REQUEST["flagTipo"]) ? anti_injection($_REQUEST["flagTipo"]) : "";
                    switch ($flagTipo) {
                        case "Loiras":        $where .= " AND flagTipo = 'Lo' "; break;
                        case "Morenas":       $where .= " AND flagTipo = 'Mo' "; break;
                        case "Mulatas":       $where .= " AND flagTipo = 'Mu' "; break;
                        case "Atende24Horas": $where .= " AND flagAtende24Horas = 'Sim' "; break;
                        case "ComVideo":      $where .= " AND flagTemVideo = 'Sim' "; break;
                        case "ComLocal":      $where .= " AND atendoLocalProprio = 'Sim' "; break;
                        case "SexoVirtual":   $where .= " AND flagSexoVirtual = 'S' "; break;
                    }

                    // Query conforme cidade
                    if (!empty($_REQUEST["idCidade"])) {
                        $idCidade = (int) $_REQUEST["idCidade"];
                        $sql = "SELECT mulher.* FROM mulher
                                JOIN mulherCidade ON (mulher.idMulher = mulherCidade.idMulher AND mulherCidade.idCidade = $idCidade)
                                $where
                                ORDER BY flagPreferencial DESC, flagAgenciada ASC, RAND()";
                    } else {
                        $sql = "SELECT * FROM mulher
                                $where
                                ORDER BY flagPreferencial DESC, flagAgenciada ASC, RAND()";
                    }

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
                                <?php include("../php/carousel.php"); ?>
                            </div>
                        <?php } ?>

                    <?php } ?>
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