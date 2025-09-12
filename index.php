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
        
        <!-- Hero Section Premium -->
        <section class="hero-premium">
            <div class="hero-overlay"></div>
            <div class="container position-relative">
                <div class="hero-content text-center">
                    <h1 class="hero-title">
                        <span class="gold-text">ACOMPANHANTES DE LUXO</span>
                        <br>
                        <span class="subtitle-hero">Porto Alegre e Região</span>
                    </h1>
                    <p class="hero-description">
                        Mais de 500 acompanhantes verificadas • Fotos reais • Atendimento 24h
                    </p>
                    <div class="hero-badges">
                        <span class="badge-hero"><i class="bi bi-shield-check"></i> Site Seguro</span>
                        <span class="badge-hero"><i class="bi bi-patch-check"></i> Perfis Verificados</span>
                        <span class="badge-hero"><i class="bi bi-star-fill"></i> Desde 2007</span>
                    </div>
                </div>
            </div>
        </section>

        <?php include("php/slider.php"); ?>
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
                        $comAcentos = ['à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú'];
                        $semAcentos = ['a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','O','U','U','U'];

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
                            <div class="acompanhante-card hover-lift fade-in">
                                <?php if($flagVerificada == 'Sim'): ?>
                                    <span class="badge-verificada">✓ Verificada</span>
                                <?php endif; ?>
                                <a href="<?= $linkPerfil ?>" class="text-decoration-none">
                                    <div class="card-img-wrapper">
                                        <img src="<?= "https://www.vipluxuria.com/sistema/content/" . htmlspecialchars($imagemCapa) ?>" 
                                             class="card-img" alt="<?= $nomeCompleto ?>" loading="lazy">
                                    </div>
                                    <div class="card-info">
                                        <p class="nome-acompanhante"><?= $nomeCompleto ?></p>
                                    </div>
                                </a>
                            </div>

                            <?php if (++$contadorCarrossel == 18) { ?>
                                <div class="carousel-container">
                                    <?php include("php/carousel.php"); ?>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </section>

                <!-- CTA Premium para Anunciantes -->
                <section class="cta-anunciantes">
                    <div class="cta-card-premium">
                        <div class="cta-content">
                            <div class="cta-icon">
                                <i class="bi bi-stars"></i>
                            </div>
                            <div class="cta-text">
                                <h2>Torne-se uma Anunciante VIP</h2>
                                <p>Alcance milhares de clientes premium em Porto Alegre</p>
                                <ul class="cta-benefits">
                                    <li><i class="bi bi-check-circle"></i> Perfil destacado com selo de verificação</li>
                                    <li><i class="bi bi-check-circle"></i> Suporte personalizado via WhatsApp</li>
                                    <li><i class="bi bi-check-circle"></i> Estatísticas de visualização em tempo real</li>
                                </ul>
                            </div>
                            <div class="cta-action">
                                <a href="/como-anunciar/" class="btn-premium-gold">
                                    <span>Quero Anunciar</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                <p class="cta-whatsapp">
                                    <i class="bi bi-whatsapp"></i> (51) 98144-0470
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Banner Não Encontrou -->
                <section class="banner-nao-encontrou">
                    <h2>Não encontrou o que procura?</h2>
                    <p>Temos mais de 500 acompanhantes cadastradas. Use os filtros ou entre em contato.</p>
                    <a href="/mulheres-acompanhantes-porto-alegre-poa/" class="btn-ver-todas">Ver Todas Acompanhantes</a>
                    <p class="whatsapp-text">
                        <i class="bi bi-whatsapp"></i> WhatsApp: (51) 98144-0470
                    </p>
                </section>

                <!-- Seção de Confiança -->
                <section class="trust-section">
                    <div class="trust-container">
                        <h2 class="section-title">Por que somos líderes há 17 anos?</h2>
                        <div class="trust-grid">
                            <div class="trust-item">
                                <div class="trust-icon">
                                    <i class="bi bi-shield-fill-check"></i>
                                </div>
                                <h3>Verificação Rigorosa</h3>
                                <p>100% das acompanhantes passam por verificação presencial com documentação</p>
                            </div>
                            <div class="trust-item">
                                <div class="trust-icon">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </div>
                                <h3>Cobertura Regional</h3>
                                <p>Porto Alegre e mais de 14 cidades da região metropolitana</p>
                            </div>
                            <div class="trust-item">
                                <div class="trust-icon">
                                    <i class="bi bi-clock-fill"></i>
                                </div>
                                <h3>Atendimento 24h</h3>
                                <p>Acompanhantes disponíveis a qualquer hora do dia ou da noite</p>
                            </div>
                            <div class="trust-item">
                                <div class="trust-icon">
                                    <i class="bi bi-lock-fill"></i>
                                </div>
                                <h3>Total Discrição</h3>
                                <p>Sigilo absoluto e segurança em todas as transações</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Newsletter Premium -->
                <section class="newsletter-premium">
                    <div class="newsletter-card">
                        <div class="newsletter-icon">
                            <i class="bi bi-envelope-heart"></i>
                        </div>
                        <h3>Ofertas Exclusivas para Anunciantes</h3>
                        <p>Receba promoções e novidades em primeira mão</p>
                        <form class="newsletter-form-premium" onsubmit="return false;">
                            <input type="email" placeholder="Digite seu melhor e-mail" required>
                            <button type="submit" class="btn-newsletter">
                                <span>Cadastrar</span>
                                <i class="bi bi-send"></i>
                            </button>
                        </form>
                        <small>Respeitamos sua privacidade. Sem spam.</small>
                    </div>
                </section>

            </div>
        </div>

        <?php include("rodape-novo.php"); ?>
    </div>
    <!-- Estilos Específicos da Home -->
    <style>
    /* Variáveis CSS */
    :root {
        --rosa-primary: #E91E63;
        --rosa-dark: #AD1457;
        --rosa-light: #F8BBD0;
        --bg-black: #0a0a0a;
        --card-gray: #2c2c2c;
        --card-hover: #3a3a3a;
        --text-light: #cccccc;
        --success-green: #4CAF50;
        --gold: #FFD700;
        --gold-premium: #FFA500;
    }

    /* Hero Section */
    .hero-premium {
        position: relative;
        background: linear-gradient(135deg, var(--rosa-dark), var(--rosa-primary));
        padding: 100px 0 80px;
        overflow: hidden;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('/imagens/pattern-luxury.png') repeat;
        opacity: 0.1;
    }

    .hero-title {
        font-size: 48px;
        font-weight: 900;
        margin-bottom: 20px;
        text-shadow: 0 5px 20px rgba(0,0,0,0.3);
    }

    .gold-text {
        background: linear-gradient(135deg, var(--gold), var(--gold-premium));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .subtitle-hero {
        font-size: 36px;
        color: white;
    }

    .hero-description {
        font-size: 20px;
        color: rgba(255,255,255,0.9);
        margin-bottom: 30px;
    }

    .hero-badges {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .badge-hero {
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(10px);
        padding: 10px 20px;
        border-radius: 25px;
        color: white;
        font-weight: 600;
    }

    /* Main Content */
    .main-content {
        background: var(--bg-black);
        padding: 60px 0;
    }

    /* Acompanhantes Section */
    .acompanhantes-section {
        padding: 40px 0;
    }

    .grid-premium {
        display: grid;
        gap: 25px;
        padding: 40px 0;
    }

    @media (min-width: 1400px) {
        .grid-premium { grid-template-columns: repeat(6, 1fr); }
    }

    @media (min-width: 1200px) and (max-width: 1399px) {
        .grid-premium { grid-template-columns: repeat(5, 1fr); }
    }

    @media (min-width: 992px) and (max-width: 1199px) {
        .grid-premium { grid-template-columns: repeat(4, 1fr); }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        .grid-premium { grid-template-columns: repeat(3, 1fr); }
    }

    @media (max-width: 767px) {
        .grid-premium { grid-template-columns: repeat(2, 1fr); }
    }

    /* Cards */
    .acompanhante-card {
        background: var(--card-gray);
        border-radius: 16px;
        overflow: hidden;
        position: relative;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        box-shadow: 0 4px 20px rgba(0,0,0,0.5);
    }

    .acompanhante-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, transparent, rgba(233, 30, 99, 0.1));
        opacity: 0;
        transition: opacity 0.3s;
        z-index: 1;
    }

    .acompanhante-card:hover::before {
        opacity: 1;
    }

    .acompanhante-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 60px rgba(233, 30, 99, 0.4);
    }

    .card-img-wrapper {
        position: relative;
        overflow: hidden;
        height: 250px;
    }

    .acompanhante-card .card-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .acompanhante-card:hover .card-img {
        transform: scale(1.1);
    }

    .card-info {
        padding: 15px;
        background: linear-gradient(180deg, var(--card-gray), rgba(44,44,44,0.8));
        position: relative;
    }

    .card-info .nome-acompanhante {
        color: white;
        font-weight: 600;
        text-align: center;
        font-size: 15px;
        text-transform: capitalize;
        letter-spacing: 0.5px;
        margin: 0;
    }

    .badge-verificada {
        position: absolute;
        top: 10px;
        right: 10px;
        background: linear-gradient(135deg, var(--gold), var(--gold-premium));
        color: var(--bg-black);
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        box-shadow: 0 4px 15px rgba(255, 215, 0, 0.5);
        z-index: 2;
    }

    /* CTA Premium */
    .cta-anunciantes {
        margin: 80px 0;
    }

    .cta-card-premium {
        background: linear-gradient(135deg, #1a1a1a, var(--card-gray));
        border: 2px solid var(--gold);
        border-radius: 30px;
        padding: 60px 40px;
        position: relative;
        overflow: hidden;
    }

    .cta-card-premium::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, var(--gold), transparent);
        opacity: 0.1;
    }

    .cta-content {
        display: grid;
        grid-template-columns: auto 1fr auto;
        gap: 40px;
        align-items: center;
        position: relative;
    }

    .cta-icon {
        font-size: 60px;
        color: var(--gold);
    }

    .cta-text h2 {
        color: white;
        font-size: 32px;
        margin-bottom: 10px;
    }

    .cta-text p {
        color: var(--text-light);
        font-size: 18px;
        margin-bottom: 20px;
    }

    .cta-benefits {
        list-style: none;
        padding: 0;
    }

    .cta-benefits li {
        color: white;
        margin-bottom: 10px;
    }

    .cta-benefits i {
        color: var(--success-green);
        margin-right: 10px;
    }

    .btn-premium-gold {
        background: linear-gradient(135deg, var(--gold), var(--gold-premium));
        color: var(--bg-black);
        padding: 18px 40px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: 700;
        font-size: 18px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s;
    }

    .btn-premium-gold:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(255, 215, 0, 0.5);
        color: var(--bg-black);
    }

    .cta-whatsapp {
        margin-top: 20px;
        color: var(--success-green);
        font-size: 16px;
        font-weight: 600;
    }

    /* Banner Não Encontrou */
    .banner-nao-encontrou {
        background: linear-gradient(135deg, var(--rosa-primary), var(--rosa-dark));
        padding: 60px 30px;
        text-align: center;
        border-radius: 20px;
        margin: 40px 0;
    }

    .banner-nao-encontrou h2 {
        color: white;
        font-size: 36px;
        margin-bottom: 20px;
    }

    .banner-nao-encontrou p {
        color: rgba(255,255,255,0.9);
        font-size: 18px;
        margin-bottom: 30px;
    }

    .btn-ver-todas {
        background: white;
        color: var(--rosa-primary);
        padding: 15px 40px;
        border-radius: 30px;
        text-decoration: none;
        font-weight: bold;
        display: inline-block;
        transition: all 0.3s;
    }

    .btn-ver-todas:hover {
        transform: translateY(-3px);
        color: var(--rosa-primary);
        box-shadow: 0 10px 30px rgba(255,255,255,0.3);
    }

    .whatsapp-text {
        color: white;
        margin-top: 20px;
        font-size: 16px;
    }

    /* Trust Section */
    .trust-section {
        background: linear-gradient(180deg, var(--bg-black), #1a1a1a);
        padding: 80px 0;
        margin: 60px 0;
    }

    .section-title {
        font-size: 42px;
        font-weight: 800;
        text-align: center;
        margin-bottom: 50px;
        background: linear-gradient(135deg, white, var(--rosa-light));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .trust-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 40px;
        margin-top: 50px;
    }

    .trust-item {
        text-align: center;
        padding: 30px;
        background: var(--card-gray);
        border-radius: 20px;
        transition: all 0.3s;
    }

    .trust-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(233, 30, 99, 0.2);
    }

    .trust-icon {
        font-size: 50px;
        color: var(--rosa-primary);
        margin-bottom: 20px;
    }

    .trust-item h3 {
        color: white;
        font-size: 20px;
        margin-bottom: 15px;
    }

    .trust-item p {
        color: var(--text-light);
        line-height: 1.6;
    }

    /* Newsletter Premium */
    .newsletter-premium {
        margin: 80px 0;
    }

    .newsletter-card {
        background: linear-gradient(135deg, var(--rosa-primary), var(--rosa-dark));
        padding: 60px;
        border-radius: 30px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .newsletter-icon {
        font-size: 50px;
        color: white;
        margin-bottom: 20px;
    }

    .newsletter-card h3 {
        color: white;
        font-size: 28px;
        margin-bottom: 10px;
    }

    .newsletter-card p {
        color: rgba(255,255,255,0.9);
        font-size: 18px;
        margin-bottom: 30px;
    }

    .newsletter-form-premium {
        display: flex;
        gap: 15px;
        max-width: 500px;
        margin: 0 auto;
    }

    .newsletter-form-premium input {
        flex: 1;
        padding: 15px 25px;
        border-radius: 30px;
        border: 2px solid rgba(255,255,255,0.3);
        background: rgba(255,255,255,0.1);
        color: white;
        font-size: 16px;
    }

    .newsletter-form-premium input::placeholder {
        color: rgba(255,255,255,0.6);
    }

    .btn-newsletter {
        padding: 15px 35px;
        border-radius: 30px;
        background: white;
        color: var(--rosa-primary);
        border: none;
        font-weight: 700;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s;
    }

    .btn-newsletter:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 30px rgba(255,255,255,0.3);
    }

    .newsletter-card small {
        display: block;
        margin-top: 20px;
        color: rgba(255,255,255,0.7);
    }
    /* Animações */
    .fade-in {
        animation: fadeInUp 0.8s ease-out;
    }

    @keyframes fadeInUp {
        from { 
            opacity: 0; 
            transform: translateY(20px);
        }
        to { 
            opacity: 1; 
            transform: translateY(0);
        }
    }

    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    }

    /* Responsividade */
    @media (max-width: 991px) {
        .cta-content {
            grid-template-columns: 1fr;
            text-align: center;
        }
        
        .hero-title {
            font-size: 32px;
        }
        
        .subtitle-hero {
            font-size: 24px;
        }
    }

    @media (max-width: 767px) {
        .hero-premium {
            padding: 60px 0 40px;
        }
        
        .newsletter-form-premium {
            flex-direction: column;
        }
        
        .trust-grid {
            grid-template-columns: 1fr;
        }
        
        .acompanhante-card .card-img {
            height: 200px;
        }
    }
    </style>
    
    <script type="text/javascript">Cufon.now();</script>
    <?php include("php/google.php"); mysqli_close($conexao); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>