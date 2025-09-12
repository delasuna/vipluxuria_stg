<?php
// Conexão
$conexao = require_once '../php/conecta_mysql.php';

// Função anti_injection
function anti_injection($str)
{
    return addslashes(strip_tags(trim($str)));
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

$sql = "SELECT * 
        FROM seo 
        INNER JOIN tipoSeo ON seo.idTipoSeo = tipoSeo.idTipoSeo 
        WHERE $whereSEO";

$resultado = mysqli_query($conexao, $sql);
if (!$resultado) {
    die("Impossível visualizar SEO: " . mysqli_error($conexao));
}

$seo = mysqli_fetch_assoc($resultado);
$title = $seo['title'] ?? '';
$description = $seo['description'] ?? '';
$keywords = $seo['keywords'] ?? '';
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
        <div class="hero-badges">
            <span class="badge-hero"><i class="bi bi-shield-check"></i> Site Seguro</span>
            <span class="badge-hero"><i class="bi bi-patch-check"></i> Perfis Verificados</span>
            <span class="badge-hero"><i class="bi bi-star-fill"></i> Desde 2007</span>
        </div>
        <?php include '../filters.php' ?>

        <div class="main-content">
            <div class="container">

                <!-- Título -->
                <div class="text-center mb-5">
                    <h1 class="section-title">Acompanhantes <?= htmlspecialchars($cidade) ?></h1>

                    <?php if (!empty($_REQUEST["flagTipo"]) && anti_injection($_REQUEST["flagTipo"]) == "SexoVirtual"): ?>
                        <div class="alert alert-info mt-3">
                            <p>Este espaço é destinado a destacar as acompanhantes que fazem shows privados pelo WhatsApp e venda de pacote de fotos, venda de vídeos!</p>
                            <p><strong>Consulte diretamente com a anunciante os serviços oferecidos por ela!</strong></p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Lista de Mulheres -->
                <section class="acompanhantes-section">
                    <div class="grid-premium">
                        <?php
                        // Montar WHERE
                        $where = " WHERE flagAtivo = 'Sim' ";
                        if (!empty($_REQUEST["nome"])) {
                            $nome = mysqli_real_escape_string($conexao, $_REQUEST["nome"]);
                            $where .= " AND nomeURL LIKE '%$nome%'";
                        }

                        $flagTipo = !empty($_REQUEST["flagTipo"]) ? anti_injection($_REQUEST["flagTipo"]) : "";
                        switch ($flagTipo) {
                            case "Loiras":
                                $where .= " AND flagTipo = 'Lo' ";
                                break;
                            case "Morenas":
                                $where .= " AND flagTipo = 'Mo' ";
                                break;
                            case "Mulatas":
                                $where .= " AND flagTipo = 'Mu' ";
                                break;
                            case "Atende24Horas":
                                $where .= " AND flagAtende24Horas = 'Sim' ";
                                break;
                            case "ComVideo":
                                $where .= " AND flagTemVideo = 'Sim' ";
                                break;
                            case "ComLocal":
                                $where .= " AND atendoLocalProprio = 'Sim' ";
                                break;
                            case "SexoVirtual":
                                $where .= " AND flagSexoVirtual = 'S' ";
                                break;
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
                        $comAcentos = ['à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú'];
                        $semAcentos = ['a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U'];

                        while ($row = mysqli_fetch_assoc($resultado)) {
                            $idMulher = $row['idMulher'];
                            $nome = $row['nome'];
                            $sobrenome = $row['sobrenome'];
                            $imagemCapa = $row['imagemCapa'];
                            $flagVerificada = $row['flagVerificada'] ?? 'Não';

                            $linkPerfil = "/perfil/" . $idMulher . "/" . str_replace($comAcentos, $semAcentos, $nome);
                            if (!empty($sobrenome)) {
                                $linkPerfil .= "-" . str_replace(" ", "-", str_replace($comAcentos, $semAcentos, $sobrenome));
                            }
                            $linkPerfil = htmlspecialchars($linkPerfil);
                            $nomeCompleto = htmlspecialchars($nome . ' ' . $sobrenome);
                        ?>
                            <a href="<?= $linkPerfil ?>" class="text-decoration-none">
                                <div class="acompanhante-card hover-lift fade-in">
                                    <?php if ($flagVerificada == 'Sim'): ?>
                                        <span class="badge-verificada">✓ Verificada</span>
                                    <?php endif; ?>
                                    <div class="card-img-wrapper">
                                        <img src="<?= "https://www.vipluxuria.com/sistema/content/" . htmlspecialchars($imagemCapa) ?>"
                                            class="card-img" alt="<?= $nomeCompleto ?>" loading="lazy">
                                    </div>
                                    <div class="card-info">
                                        <p class="nome-acompanhante"><?= $nomeCompleto ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </section>

                <?php include("../banner_informativo.php") ?>
                <?php include("../banner_informativo2.php") ?>
                <?php include("../banner_informativo3.php") ?>
            </div>
        </div>

        <?php include("../rodape-novo.php"); ?>

        <script type="text/javascript">
            Cufon.now();
        </script>
        <?php include("../php/google.php");
        mysqli_close($conexao); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    </div>
</body>

</html>