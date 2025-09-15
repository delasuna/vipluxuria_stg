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
        
        <?php include("../site-badges.php"); ?>
        
        <?php include '../filters.php' ?>

        <div class="main-content">
            <div class="container">

                <!-- Seção de Autoridade e Confiança -->
                <div class="authority-section">
                    <div class="authority-content">
                        <h1 class="authority-title">
                            Acompanhantes <?= htmlspecialchars($cidade) ?> 
                            <span class="authority-badge">Desde 2007</span>
                        </h1>
                        
                        <div class="authority-text">
                            <p class="lead-text">
                                O Vip Luxúria é a plataforma pioneira e mais confiável de acompanhantes do Sul do Brasil, 
                                com <strong>17 anos de experiência</strong> conectando clientes a profissionais verificadas.
                            </p>
                            
                            <div class="trust-points">
                                <div class="trust-item">
                                    <i class="bi bi-patch-check-fill"></i>
                                    <div>
                                        <strong>100% Verificadas</strong>
                                        <span>Todas as fotos são autenticadas por nossa equipe</span>
                                    </div>
                                </div>
                                <div class="trust-item">
                                    <i class="bi bi-shield-lock-fill"></i>
                                    <div>
                                        <strong>Total Discrição</strong>
                                        <span>Navegação segura com certificado SSL e proteção de dados</span>
                                    </div>
                                </div>
                                <div class="trust-item">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <div>
                                        <strong>Cobertura Regional</strong>
                                        <span>Atendemos toda região metropolitana com mais de 500 anunciantes ativas</span>
                                    </div>
                                </div>
                                <div class="trust-item">
                                    <i class="bi bi-award-fill"></i>
                                    <div>
                                        <strong>Referência no Mercado</strong>
                                        <span>Líder em qualidade e segurança desde nossa fundação</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="authority-stats">
                                <div class="stat-item">
                                    <span class="stat-number">17+</span>
                                    <span class="stat-label">Anos de Experiência</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number">500+</span>
                                    <span class="stat-label">Anunciantes Ativas</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number">100%</span>
                                    <span class="stat-label">Perfis Verificados</span>
                                </div>
                                <div class="stat-item">
                                    <span class="stat-number">24/7</span>
                                    <span class="stat-label">Suporte ao Cliente</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if (!empty($_REQUEST["flagTipo"]) && anti_injection($_REQUEST["flagTipo"]) == "SexoVirtual"): ?>
                    <div class="virtual-notice">
                        <div class="notice-icon">
                            <i class="bi bi-camera-video-fill"></i>
                        </div>
                        <div class="notice-content">
                            <h3>Serviços Virtuais Exclusivos</h3>
                            <p>Este espaço é destinado a destacar as acompanhantes que oferecem:</p>
                            <ul>
                                <li>Shows privados pelo WhatsApp</li>
                                <li>Venda de pacotes de fotos exclusivas</li>
                                <li>Vídeos personalizados</li>
                            </ul>
                            <p class="notice-alert"><i class="bi bi-info-circle"></i> Consulte diretamente com a anunciante os serviços oferecidos!</p>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Lista de Acompanhantes -->
                <section class="acompanhantes-section">
                    <div class="section-header">
                        <h2 class="section-subtitle">Escolha entre nossas profissionais verificadas</h2>
                    </div>
                    
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

                <!-- Seção de Segurança e Garantias -->
                <div class="security-section">
                    <h3>Por que escolher o Vip Luxúria?</h3>
                    <div class="security-grid">
                        <div class="security-item">
                            <i class="bi bi-fingerprint"></i>
                            <h4>Verificação Rigorosa</h4>
                            <p>Processo de verificação em múltiplas etapas para garantir autenticidade</p>
                        </div>
                        <div class="security-item">
                            <i class="bi bi-clock-history"></i>
                            <h4>Tradição e Confiança</h4>
                            <p>Primeira plataforma do segmento no RS, estabelecida em 2007</p>
                        </div>
                        <div class="security-item">
                            <i class="bi bi-headset"></i>
                            <h4>Suporte Dedicado</h4>
                            <p>Equipe especializada para auxiliar clientes e anunciantes</p>
                        </div>
                        <div class="security-item">
                            <i class="bi bi-shield-check"></i>
                            <h4>Segurança Total</h4>
                            <p>Proteção de dados e navegação anônima garantida</p>
                        </div>
                    </div>
                </div>

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