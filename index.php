<?php
// Conexão
$conexao = require_once 'php/conecta_mysql.php';

// SEO - MANTER COMO ESTÁ
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
        <div class="hero-badges">
            <span class="badge-hero"><i class="bi bi-shield-check"></i> Site Seguro</span>
            <span class="badge-hero"><i class="bi bi-patch-check"></i> Perfis Verificados</span>
            <span class="badge-hero"><i class="bi bi-star-fill"></i> Desde 2007</span>
        </div>
        <?php include 'filters.php' ?>

        <div class="main-content">
            <div class="container">

                <!-- Slider de Destaques -->
                <div class="destaques-section mb-5">
                    <?php include("php/slider-2020.php"); ?>
                </div>

                <!-- Grid de Acompanhantes -->
                <section class="acompanhantes-section">
                    <div class="grid-premium">
                        <?php
                        $sql = "SELECT * FROM mulher WHERE flagAtivo = 'Sim' ORDER BY flagPreferencial DESC, flagAgenciada ASC, RAND()";
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

                            <?php if (++$contadorCarrossel == 18) { ?>
                                <div class="carousel-container">
                                    <?php include("php/carousel.php"); ?>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </section>

                <!-- Banner Não Encontrou  -->
                <div class="banner-nao-encontrou-suave">
    <div class="nao-encontrou-content">
        <div class="icon-search-suave">
            <i class="bi bi-search-heart"></i>
        </div>
        
        <h2>Não encontrou o que procura?</h2>
        <p>Temos mais de 500 acompanhantes cadastradas. Use os filtros ou entre em contato.</p>
        
        <div class="action-buttons">
            <a href="/conteudo/mulheres.php" class="btn-ver-todas-suave">
                <i class="bi bi-grid-3x3-gap"></i> Ver Todas Acompanhantes
            </a>
        </div>
        
        <div class="whatsapp-help-suave">
            <span>Precisa de ajuda?</span>
            <a href="https://wa.me/5551981440470" class="whatsapp-link-suave">
                <i class="bi bi-whatsapp"></i> (51) 98144-0470
            </a>
        </div>
    </div>
</div>

               <!-- CTA Anunciantes - Layout Horizontal Compacto -->
<!-- OPÇÃO ALTERNATIVA: CTA com 3 benefícios reais -->
<div class="cta-anunciantes">
    <div class="cta-card-premium-center">
        <div class="cta-stars">
            <i class="bi bi-stars"></i>
        </div>
        
        <h2>Torne-se uma Anunciante VIP</h2>
        <p class="cta-subtitle">Alcance milhares de clientes premium em Porto Alegre</p>
        
        <div class="cta-benefits-horizontal">
            <div class="benefit-item-horizontal">
                <i class="bi bi-patch-check-fill benefit-icon-horizontal"></i>
                <span class="benefit-text-horizontal">Perfil destacado com selo de verificação</span>
            </div>
            
            <div class="benefit-item-horizontal">
                <i class="bi bi-headset benefit-icon-horizontal"></i>
                <span class="benefit-text-horizontal">Suporte personalizado via WhatsApp</span>
            </div>
        
            <div class="benefit-item-horizontal">
                <i class="bi bi-people-fill benefit-icon-horizontal"></i>
                <span class="benefit-text-horizontal">Alcance de +10.000 visitantes diários</span>
            </div>
        </div>
        
        <div class="cta-footer-horizontal">
            <a href="#" class="btn-premium-gold-compact">
                Quero Anunciar <i class="bi bi-arrow-right"></i>
            </a>
            
        </div>
    </div>
</div>

                <!-- Seção de Confiança -->
                <section class="trust-section-leaders">
    <div class="container">
        <h2 class="trust-title-leaders">Há 17 anos trabalhando com as melhores acompanhantes</h2>
        
        <div class="trust-grid-leaders">
            <!-- Card 1: Verificação Rigorosa -->
            <div class="trust-card-leader">
                <div class="trust-icon-leader">
                    <i class="bi bi-shield-check-fill"></i>
                </div>
                <h3 class="trust-card-title">Verificação Rigorosa</h3>
                <p class="trust-card-description">
                    <span class="trust-card-stat">100%</span> das acompanhantes passam por verificação presencial com documentação
                </p>
            </div>
            
            <!-- Card 2: Cobertura Regional -->
            <div class="trust-card-leader">
                <div class="trust-icon-leader">
                    <i class="bi bi-geo-alt-fill"></i>
                </div>
                <h3 class="trust-card-title">Cobertura Regional</h3>
                <p class="trust-card-description">
                    Porto Alegre e mais de <span class="trust-card-stat">14 cidades</span> da região metropolitana
                </p>
            </div>
            
            <!-- Card 3: Atendimento 24h -->
            <div class="trust-card-leader">
                <div class="trust-icon-leader">
                    <i class="bi bi-clock-fill"></i>
                </div>
                <h3 class="trust-card-title">Atendimento 24h</h3>
                <p class="trust-card-description">
                    Acompanhantes disponíveis a qualquer hora do dia ou da noite
                </p>
            </div>
            
            <!-- Card 4: Total Discrição -->
            <div class="trust-card-leader">
                <div class="trust-icon-leader">
                    <i class="bi bi-lock-fill"></i>
                </div>
                <h3 class="trust-card-title">Total Discrição</h3>
                <p class="trust-card-description">
                    Sigilo absoluto e segurança em todas as transações
                </p>
            </div>
        </div>
    </div>
</section>
            </div>

            <?php include("rodape-novo.php"); ?>

            <script type="text/javascript">
                Cufon.now();
            </script>
            <?php include("php/google.php");
            mysqli_close($conexao); ?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</body>

</html>
