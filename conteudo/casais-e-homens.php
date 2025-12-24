<?php include_once '../age-gate.php'; ?>
<?php
// Conexão
$conexao = require_once '../php/conecta_mysql.php';

// Função anti_injection
function anti_injection($str)
{
    return addslashes(strip_tags(trim($str)));
}

// SEO - Para página de Homens
$whereSEO = " descricao = 'Homens' ";

$sql = "SELECT * 
        FROM seo 
        INNER JOIN tipoSeo ON seo.idTipoSeo = tipoSeo.idTipoSeo 
        WHERE $whereSEO";

$resultado = mysqli_query($conexao, $sql);
if (!$resultado) {
    die("Impossível visualizar SEO: " . mysqli_error($conexao));
}

$seo = mysqli_fetch_assoc($resultado);
$title = $seo['title'] ?? 'Casais e Homens - Vip Luxúria';
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
                        <h1>Casais e Homens <?= htmlspecialchars($cidade) ?></h1>
                        <p class="subtitle-page">Profissionais masculinos e casais para suas fantasias</p>

                        <?php include '../profile-badges.php' ?>

                        <?php include '../search-bar.php' ?>

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
                                    $sql = "SELECT homem.* FROM homem
                    JOIN homemCidade ON (homem.idHomem = homemCidade.idHomem 
                    AND homemCidade.idCidade = $idCidade)
                    $where
                    ORDER BY RAND()";
                                } else {
                                    $sql = "SELECT * FROM homem
                    $where
                    ORDER BY RAND()";
                                }

                                $resultado = mysqli_query($conexao, $sql);
                                if (!$resultado) {
                                    die("Impossível visualizar os anunciantes: " . mysqli_error($conexao));
                                }

                                $contadorCarrossel = 0;

                                $comAcentos = ['à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú'];
                                $semAcentos = ['a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U'];

                                while ($row = mysqli_fetch_assoc($resultado)) {

                                    $idHomem = $row['idHomem'];
                                    $nome = $row['nome'];
                                    $sobrenome = $row['sobrenome'];
                                    $imagemComNome = $row['imagemComNome'];
                                    $flagVerificada = $row['flagVerificada'] ?? 'Não';

                                    $linkPerfil = "/perfil-homens/" . $idHomem . "/" . str_replace($comAcentos, $semAcentos, $nome);
                                    if (!empty($sobrenome)) {
                                        $linkPerfil .= "-" . str_replace(" ", "-", str_replace($comAcentos, $semAcentos, $sobrenome));
                                    }

                                    $linkPerfil = htmlspecialchars($linkPerfil);
                                    $nomeCompleto = htmlspecialchars($nome . ' ' . $sobrenome);
                                ?>

                                    <a href="<?= $linkPerfil ?>" class="acompanhante-card hover-lift">
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
                                    </a>

                                    <?php
                                    // Banner de destaque a cada 18 cards
                                    if (++$contadorCarrossel == 18) {
                                    ?>
                                        <div class="carousel-container-full">
                                            <?php include("../php/carousel.php"); ?>
                                        </div>
                                <?php
                                        $contadorCarrossel = 0;
                                    }
                                }
                                ?>
                            </div>
                        </section>

                        <?php include("../conteudo/trust-bar.php"); ?>

                    </div>
                </div>

                <?php include '../profile-badges.php' ?>

                <?php include 'dicas-e-duvidas.php' ?>

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