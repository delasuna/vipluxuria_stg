<?php
// Conexão
$conexao = require_once '../php/conecta_mysql.php';

// Função anti_injection
function anti_injection($str)
{
    return addslashes(strip_tags(trim($str)));
}

// SEO - Para página de Transex
$whereSEO = " descricao = 'Transex' ";

$sql = "SELECT * 
        FROM seo 
        INNER JOIN tipoSeo ON seo.idTipoSeo = tipoSeo.idTipoSeo 
        WHERE $whereSEO";

$resultado = mysqli_query($conexao, $sql);
if (!$resultado) {
    die("Impossível visualizar SEO: " . mysqli_error($conexao));
}

$seo = mysqli_fetch_assoc($resultado);
$title = $seo['title'] ?? 'Transex - Vip Luxúria';
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

        <div class="main-content">
            <div class="container">
                
                <!-- Título da Página -->
                <div class="page-header-elegant">
                    <h1>Transex <?= htmlspecialchars($cidade) ?></h1>
                    <p class="subtitle-page">As mais belas T-gatas para momentos inesquecíveis</p>
                </div>

                <!-- Filtros -->
                <?php include '../filters.php' ?>

                <?php include("../conteudo/trust-bar.php"); ?>

                <!-- Grid de Acompanhantes -->
                <section class="acompanhantes-section">
                    <div class="grid-premium">
                        <?php
                        // Montar WHERE
                        $where = " WHERE flagAtivo = 'Sim' ";
                        if (!empty($_REQUEST["nome"])) {
                            $nome = mysqli_real_escape_string($conexao, $_REQUEST["nome"]);
                            $where .= " AND nome LIKE '%$nome%'";
                        }

                        // Query conforme cidade
                        if (!empty($_REQUEST["idCidade"])) {
                            $idCidade = (int) $_REQUEST["idCidade"];
                            $sql = "SELECT transex.* FROM transex
                                    JOIN transexCidade ON (transex.idTransex = transexCidade.idTransex AND transexCidade.idCidade = $idCidade)
                                    $where
                                    ORDER BY RAND()";
                        } else {
                            $sql = "SELECT * FROM transex
                                    $where
                                    ORDER BY RAND()";
                        }

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
                            $nomeCompleto = htmlspecialchars($nome . ' ' . $sobrenome);
                        ?>
                            <a href="<?= $linkPerfil ?>" class="text-decoration-none">
                                <div class="acompanhante-card hover-lift">
                                    <?php if ($flagVerificada == 'Sim'): ?>
                                        <span class="badge-verificada">✔ Verificada</span>
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

                            <?php 
                            // Banner de destaque após 18 cards
                            if (++$contadorCarrossel == 18) { ?>
                                <div class="carousel-container">
                                    <?php include("../php/carousel.php"); ?>
                                </div>
                                <?php $contadorCarrossel = 0; // Reset contador ?>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </section>

           

            </div>
        </div>

        <!-- Cards de Dicas e Dúvidas -->
        <div class="info-cards-container">
            <a href="/conteudo/dicas-contratar-acompanhante.php" class="info-card card-dicas">
                <div class="icon-wrapper">
                    <i class="bi bi-lightbulb-fill"></i>
                </div>
                <div class="card-content">
                    <h3>Dicas Importantes</h3>
                    <p>O que saber antes de contratar</p>
                </div>
            </a>
            
            <a href="/conteudo/duvidas-frequentes.php" class="info-card card-duvidas">
                <div class="icon-wrapper">
                    <i class="bi bi-question-circle-fill"></i>
                </div>
                <div class="card-content">
                    <h3>Dúvidas Frequentes</h3>
                    <p>Respostas para suas perguntas</p>
                </div>
            </a>
        </div>
<!-- Banner Não Encontrou  -->
                <?php include("../nao-encontrou.php"); ?>
    
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