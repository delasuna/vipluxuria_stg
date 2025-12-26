<?php
$conexao = require_once 'php/conecta_mysql.php';

$sql = "SELECT * FROM seo, tipoSeo WHERE seo.idTipoSeo = tipoSeo.idTipoSeo AND descricao = 'ConhecaVL'";
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
    $title = "Conheça o Vip Luxúria - Sobre Nós";
    $description = "";
    $keywords = "";
}
mysqli_free_result($resultado);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php include 'head.php'; ?>

<body>
    <div id="wrap">
        <div>
            <?php include("php/menu-2.php"); ?>
            
        </div>
        <div class="degrade">

        <?php include("site-badges.php"); ?>

        <div class="text-light py-4">
            <div class="container">
                
                <!-- Header Elegante -->
                <div class="about-header-vip">
                    <h1 class="about-title-main">
                        Conhe&ccedil;a o <span class="text-gold-gradient">VIP LUX&Uacute;RIA</span>
                    </h1>
                    <p class="about-subtitle">A refer&ecirc;ncia em acompanhantes de luxo no Sul do Brasil</p>
                    
                   <div class="about-stats-row">
    <div class="stat-box-vip">
        <div class="stat-value">Desde 2008</div>
        <div class="stat-label">No Mercado</div>
    </div>
    <div class="stat-box-vip">
        <div class="stat-value">100%</div>
        <div class="stat-label">Verificadas</div>
    </div>
    <div class="stat-box-vip">
        <div class="stat-value">24/7</div>
        <div class="stat-label">Dispon&iacute;vel</div>
    </div>
</div>
                </div>

                <!-- Conteúdo Principal em Grid -->
                <div class="row g-4 mb-5">
                    <div class="col-lg-8">
                        <!-- Card Principal -->
                        <div class="about-content-card">
                            <h2 class="section-title-vip">Nossa Plataforma</h2>
                            
                            <p class="about-lead">
                                O <strong>VIP LUX&Uacute;RIA</strong> &eacute; a plataforma l&iacute;der em an&uacute;ncios de acompanhantes premium, 
                                conectando profissionais de alto n&iacute;vel a clientes exigentes h&aacute; mais de 15 anos.
                            </p>

                            <div class="about-highlight-box">
                                <i class="bi bi-shield-check"></i>
                                <div>
                                    <h4>Transpar&ecirc;ncia Total</h4>
                                    <p>Somos uma plataforma de divulga&ccedil;&atilde;o. N&atilde;o temos v&iacute;nculo empregat&iacute;cio com as anunciantes - 
                                    cada profissional &eacute; independente e respons&aacute;vel por seu pr&oacute;prio servi&ccedil;o.</p>
                                </div>
                            </div>

                            <h3 class="section-subtitle-vip">Como Funciona</h3>
                            
                            <div class="process-timeline">
                                <div class="timeline-item">
                                    <span class="timeline-number">01</span>
                                    <div class="timeline-content">
                                        <h5>Verifica&ccedil;&atilde;o</h5>
                                        <p>Anunciantes comparecem ao est&uacute;dio com documentos para autoriza&ccedil;&atilde;o de imagem</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <span class="timeline-number">02</span>
                                    <div class="timeline-content">
                                        <h5>Publica&ccedil;&atilde;o</h5>
                                        <p>Perfil aprovado &eacute; publicado com fotos e informa&ccedil;&otilde;es fornecidas</p>
                                    </div>
                                </div>
                                <div class="timeline-item">
                                    <span class="timeline-number">03</span>
                                    <div class="timeline-content">
                                        <h5>Contato Direto</h5>
                                        <p>Clientes contactam diretamente as profissionais sem intermedia&ccedil;&atilde;o</p>
                                    </div>
                                </div>
                            </div>

                            <div class="about-example-card">
                                <div class="example-header">
                                    <i class="bi bi-lightbulb"></i>
                                    <span>Exemplo Pr&aacute;tico</span>
                                </div>  
                                <p>Assim como um jornal vende espa&ccedil;os publicit&aacute;rios, o Vip Lux&uacute;ria oferece uma vitrine digital. 
                                Se um an&uacute;ncio n&atilde;o corresponde &agrave; realidade, a responsabilidade &eacute; do anunciante, n&atilde;o da plataforma.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <!-- Sidebar com Navegação -->
                        <div class="about-sidebar-card">
                            <h3 class="sidebar-title">Navega&ccedil;&atilde;o R&aacute;pida</h3>
                            
                            <div class="nav-category">
                                <h5><i class="bi bi-gender-female"></i> Mulheres</h5>
                                <div class="nav-links">
                                    <a href="/Acompanhantes-Loiras">- Loiras</a>
                                    <a href="/Acompanhantes-Morenas">- Morenas</a>
                                    <a href="/Acompanhantes-Mulatas">- Mulatas</a>
                                    <a href="/Acompanhantes-ComVideo">- Com V&iacute;deo</a>
                                    <a href="/Acompanhantes-Atende24Horas">- 24 Horas</a>
                                </div>
                            </div>

                            <div class="nav-category">
                                <h5><i class="bi bi-gender-trans"></i> Transex</h5>
                                <div class="nav-links">
                                    <a href="/conteudo/transex.php">- Ver Todas</a>
                                </div>
                            </div>

                            <div class="nav-category">
                                <h5><i class="bi bi-gender-male"></i> Casais e Homens</h5>
                                <div class="nav-links">
                                    <a href="/conteudo/casais-e-homens.php">- Ver Todos</a>
                                </div>
                            </div>

                        </div>

                        <!-- Card de Regiões -->
                        <div class="about-regions-card">
                            <h4 class="regions-title">Por Regi&atilde;o</h4>
                            <div class="region-pills">
                                <a href="/Acompanhantes/1/Porto-Alegre" class="region-pill">Porto Alegre</a>
                                <a href="/Acompanhantes/2/Novo-Hamburgo" class="region-pill">Novo Hamburgo</a>
                                <a href="/Acompanhantes/6/Grande-Porto-Alegre" class="region-pill">Grande POA</a>
                                <a href="/Acompanhantes/3/Vale-dos-Sinos" class="region-pill">Vale dos Sinos</a>
                                <a href="/Acompanhantes/5/Litoral-Gaucho" class="region-pill">Litoral</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Diferenciais -->
                <div class="about-features-grid">
                    <div class="feature-card-vip">
                        <i class="bi bi-shield-lock-fill"></i>
                        <h4>Seguran&ccedil;a</h4>
                        <p>SSL e prote&ccedil;&atilde;o total de dados</p>
                    </div>
                    <div class="feature-card-vip">
                        <i class="bi bi-patch-check-fill"></i>
                        <h4>Verifica&ccedil;&atilde;o</h4>
                        <p>Todos os perfis autenticados</p>
                    </div>
                    <div class="feature-card-vip">
                        <i class="bi bi-incognito"></i>
                        <h4>Discri&ccedil;&atilde;o</h4>
                        <p> O mais confi&aacute;vel catalogo de acompanhantes de Porto Alegre e regi&atilde;o.</p>
                    </div>
                    <div class="feature-card-vip">
                        <i class="bi bi-star-fill"></i>
                        <h4>Qualidade</h4>
                        <p>Apenas profissionais premium</p>
                    </div>
                </div>

                <!-- Aviso Legal -->
                <div class="legal-notice-vip">
                    <i class="bi bi-info-circle-fill"></i>
                    <div>
                        <h5>Aviso Legal</h5>
                        <p>O VIP LUX&Uacute;RIA n&atilde;o intermedia contatos. As informa&ccedil;&otilde;es dos an&uacute;ncios s&atilde;o de responsabilidade 
                        dos anunciantes. Somos exclusivamente uma plataforma de divulga&ccedil;&atilde;o.</p>
                    </div>
                </div>

            
            </div>
        </div>
        </div>
        <?php include("rodape-novo.php"); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <?php include("php/google.php"); ?>
</body>
</html>