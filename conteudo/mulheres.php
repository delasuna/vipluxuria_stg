<?php include_once '../age-gate.php'; ?>
<?php
// Conexão
$conexao = require_once '../php/conecta_mysql.php';

// Função anti_injection
function anti_injection($str)
{
    return addslashes(strip_tags(trim($str)));
}

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
        </div>
        <div class="degrade">
            <div class="main-content">
                <div class="container">

                    <!-- Título da Página -->
                    <div class="page-header-elegant">
                        <h1>Acompanhantes <?= htmlspecialchars($cidade) ?></h1>
                        <p class="subtitle-page">Escolha entre profissionais verificadas e confiáveis</p>
                    </div>

                    <?php include '../profile-badges.php' ?>

                    <?php include '../search-bar.php' ?>

                    <!-- Filtros -->
                    <?php include '../filters.php' ?>

                    <!-- Aviso para Sexo Virtual se aplicável -->
                    <?php if (!empty($_REQUEST["flagTipo"]) && anti_injection($_REQUEST["flagTipo"]) == "SexoVirtual"): ?>
                        <div class="virtual-notice-simple">
                            <i class="bi bi-camera-video-fill"></i>
                            <span>Serviços virtuais: Shows privados, fotos e vídeos personalizados via WhatsApp</span>
                        </div>
                    <?php endif; ?>

                    <!-- Grid de Acompanhantes -->
                    <section class="acompanhantes-section">
                        <div class="grid-premium">
                            <?php
                            // Montar WHERE (mantém como está)
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
                                case "Ruivas":
                                    $where .= " AND flagTipo = 'Ru' ";
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
                                <div class="acompanhante-card-wrapper">
                                    <a href="<?= $linkPerfil ?>" class="text-decoration-none">
                                        <div class="acompanhante-card hover-lift fade-in"
                                            data-id="<?= $idMulher ?>"
                                            data-nome="<?= $nomeCompleto ?>"
                                            data-cache="<?= htmlspecialchars($row['cache'] ?? 'Consulte') ?>"
                                            data-local="<?= htmlspecialchars($row['locais'] ?? '') ?>"
                                            data-cidade="<?= htmlspecialchars($row['cidades'] ?? 'Porto Alegre') ?>"
                                            data-whats="<?= htmlspecialchars($row['flagWhats'] ?? 'N') ?>"
                                            data-telefone="<?= htmlspecialchars(($row['ddd'] ?? '') . ' ' . ($row['telefone'] ?? '')) ?>">

                                            <?php if ($flagVerificada == 'Sim'): ?>
                                                <span class="badge-verificada">✓ Verificada</span>
                                            <?php endif; ?>

                                            <div class="card-img-wrapper">
                                                <img src="<?= "https://www.vipluxuria.com/sistema/content/" . htmlspecialchars($imagemCapa) ?>"
                                                    class="card-img" alt="<?= $nomeCompleto ?>" loading="lazy">

                                                <!-- Preview ao Hover -->
                                                <div class="card-preview">
                                                    <div class="preview-gallery">
                                                        <?php
                                                        // Buscar até 3 imagens adicionais para o preview
                                                        $previewImages = [];
                                                        for ($i = 1; $i <= 3; $i++) {
                                                            if (!empty($row["imagemCentral{$i}"])) {
                                                                $previewImages[] = "https://www.vipluxuria.com/sistema/content/" . $row["imagemCentral{$i}"];
                                                            }
                                                        }
                                                        ?>

                                                        <div class="preview-slides">
                                                            <img src="<?= "https://www.vipluxuria.com/sistema/content/" . htmlspecialchars($imagemCapa) ?>"
                                                                class="preview-img active" alt="Foto 1">
                                                            <?php foreach ($previewImages as $index => $img): ?>
                                                                <img src="<?= htmlspecialchars($img) ?>"
                                                                    class="preview-img" alt="Foto <?= $index + 2 ?>">
                                                            <?php endforeach; ?>
                                                        </div>

                                                        <?php if (count($previewImages) > 0): ?>
                                                            <button class="preview-nav preview-prev" onclick="changePreview(event, -1)">‹</button>
                                                            <button class="preview-nav preview-next" onclick="changePreview(event, 1)">›</button>

                                                            <div class="preview-dots">
                                                                <span class="dot active" onclick="currentSlide(event, 1)"></span>
                                                                <?php foreach ($previewImages as $index => $img): ?>
                                                                    <span class="dot" onclick="currentSlide(event, <?= $index + 2 ?>)"></span>
                                                                <?php endforeach; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="preview-info">
                                                        <h4><?= $nomeCompleto ?></h4>
                                                        <div class="preview-details">
                                                            <p><i class="bi bi-geo-alt"></i> <?= htmlspecialchars($row['cidades'] ?? 'Porto Alegre') ?></p>
                                                            <p><i class="bi bi-cash"></i> <?= htmlspecialchars($row['cache'] ?? 'Consulte') ?></p>
                                                            <?php if ($row['flagWhats'] == 'S'): ?>
                                                                <p><i class="bi bi-whatsapp"></i> Disponível</p>
                                                            <?php endif; ?>
                                                            <?php if ($row['flagAtende24Horas'] == 'Sim'): ?>
                                                                <p><i class="bi bi-clock"></i> 24 Horas</p>
                                                            <?php endif; ?>
                                                        </div>

                                                        <div class="preview-actions">
                                                            <button class="btn-preview-whats"
                                                                onclick="event.preventDefault(); event.stopPropagation(); window.open('https://wa.me/55<?= preg_replace('/\D/', '', $row['ddd'] . $row['telefone']) ?>', '_blank')">
                                                                <i class="bi bi-whatsapp"></i> WhatsApp
                                                            </button>
                                                            <span class="btn-preview-perfil">
                                                                <i class="bi bi-eye"></i> Ver Perfil
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-info">
                                                <p class="nome-acompanhante mx-auto"><?= $nomeCompleto ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            <?php
                                if (++$contadorCarrossel == 18) {
                                    // espaço para banner se quiser depois
                                }
                            } ?>
                        </div>
                        <?php 
                            if (mysqli_num_rows($resultado) == 0) {
                                echo '<div class="sem-resultados text-center pb-5">
                                        <i class="bi bi-search mb-3" style="font-size:48px;color:#999;"></i>
                                        <h3 class="fw-bold">Nenhuma acompanhante encontrada</h3>
                                        <p>Tente ajustar os filtros ou buscar por outra cidade.</p>
                                    </div>';
                            }
                        ?>
                    </section>

                    <?php include("../conteudo/trust-bar.php"); ?>

                </div>
            </div>

            <?php include '../profile-badges.php' ?>

            <?php include 'dicas-e-duvidas.php' ?>

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