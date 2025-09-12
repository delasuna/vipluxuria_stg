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
        <?php include 'filters.php' ?>
        
        <div class="bg-dark text-light py-4">
            <div class="container">

                <!-- Slider -->
                <div class="mb-4">
                    <?php include("php/slider-2020.php"); ?>
                </div>

                <!-- Título Otimizado -->
                <div class="text-center mb-5">
                    <h1 class="display-4 fw-bold text-white">Acompanhantes de Luxo em Porto Alegre</h1>
                    <p class="lead opacity-75">Encontre as melhores acompanhantes verificadas da região metropolitana</p>
                </div>

                <!-- Grid Responsivo -->
                <div class="acompanhantes-grid">
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
                        <div class="acompanhante-card">
                            <a href="<?= $linkPerfil ?>" class="text-decoration-none">
                                <img src="<?= "https://www.vipluxuria.com/sistema/content/" . htmlspecialchars($imagemCapa) ?>" 
                                     class="card-img" alt="<?= $nomeCompleto ?>">
                                <div class="card-info">
                                    <p class="nome-acompanhante"><?= $nomeCompleto ?></p>
                                </div>
                            </a>
                        </div>

                        <?php if (++$contadorCarrossel == 24) { ?>
                            <div class="carousel-container">
                                <?php include("php/carousel.php"); ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>

              
                <!-- Banner Não Encontrou -->
                <div class="banner-nao-encontrou">
                    <h2>Não encontrou o que procura?</h2>
                    <p>Temos mais de 500 acompanhantes cadastradas. Use os filtros ou entre em contato.</p>
                    <a href="/mulheres-acompanhantes-porto-alegre-poa/" class="btn-ver-todas">Ver Todas Acompanhantes</a>
                    <p class="whatsapp-text">WhatsApp: (51) 98144-0470</p>
                </div>

                <!-- Seção SEO Collapse -->
                <div id="sobre-vip-luxuria" class="seo-section">
                    <div class="content-visible">
                        <h2>Acompanhantes Porto Alegre - Líder Desde 2007</h2>
                        <p class="highlight-text">
                            O <strong>Vip Luxúria</strong> é o site de acompanhantes mais tradicional de Porto Alegre, 
                            com <strong>17 anos conectando clientes a mais de 500 acompanhantes verificadas</strong> 
                            em toda região metropolitana. Garantimos fotos reais, perfis atualizados e total discrição.
                        </p>
                        <div class="stats-row">
                            <div class="stat">
                                <span class="number">500+</span>
                                <span class="label">Acompanhantes Verificadas</span>
                            </div>
                            <div class="stat">
                                <span class="number">17 Anos</span>
                                <span class="label">De Tradição</span>
                            </div>
                            <div class="stat">
                                <span class="number">100mil+</span>
                                <span class="label">Visitas Mensais</span>
                            </div>
                        </div>
                        <button class="btn-expand" onclick="toggleContent()">
                            <span>Saiba Mais Sobre Nós</span>
                            <i class="bi bi-chevron-down"></i>
                        </button>
                    </div>
                    
                    <div class="content-collapsed" style="display: none;">
                        <h3>Por que Escolher o Vip Luxúria?</h3>
                        <ul class="benefits-list">
                            <li>✓ <strong>Verificação Presencial:</strong> Todas as acompanhantes passam por verificação com documentação</li>
                            <li>✓ <strong>Cobertura Total:</strong> Porto Alegre e 14 cidades da região metropolitana</li>
                            <li>✓ <strong>Perfis com Vídeos:</strong> Pioneiros em vídeos verificados e selo de autenticidade</li>
                            <li>✓ <strong>Atendimento 24h:</strong> Opções com local próprio e deslocamento para motéis</li>
                        </ul>
                        <h3>Áreas de Atendimento</h3>
                        <p>Cobrimos <strong>Porto Alegre, Novo Hamburgo, Canoas, Gravataí, São Leopoldo</strong>, 
                        Sapiranga, Cachoeirinha, Vale dos Sinos, Serra Gaúcha e Litoral.</p>
                        <div class="trust-badges">
                            <span class="badge">🛡️ Site Seguro</span>
                            <span class="badge">🔐 Sigilo Garantido</span>
                            <span class="badge">✅ Perfis Verificados</span>
                            <span class="badge">📍 Atendimento Local</span>
                        </div>
                        <button class="btn-collapse" onclick="toggleContent()">
                            <span>Mostrar Menos</span>
                        </button>
                    </div>
                </div>
  <!-- Banner CTA Anunciantes -->
                <div class="banner-anunciante">
                    <h2>📣 É ACOMPANHANTE? ANUNCIE AQUI!</h2>
                    <p>Alcance milhares de clientes em Porto Alegre. Cadastro rápido e seguro.</p>
                    <a href="/como-anunciar/" class="btn-cta-anunciar">QUERO ANUNCIAR AGORA</a>
                </div>

                <!-- Newsletter -->
                <div class="newsletter-section">
                    <h3>📧 Receba Novidades e Promoções</h3>
                    <p>Cadastre-se e fique por dentro das melhores oportunidades para anunciantes</p>
                    <form class="newsletter-form" onsubmit="return false;">
                        <input type="email" placeholder="Seu melhor e-mail" required>
                        <button type="submit">Enviar</button>
                    </form>
                    <small>Prometemos não enviar spam. </small>
                </div>

            </div>
        </div>

        <?php include("rodape-novo.php"); ?>
    </div>

    <!-- Script Toggle -->
    <script>
    function toggleContent() {
        const collapsed = document.querySelector('.content-collapsed');
        const btnExpand = document.querySelector('.btn-expand');
        
        if (collapsed.style.display === 'none') {
            collapsed.style.display = 'block';
            btnExpand.style.display = 'none';
        } else {
            collapsed.style.display = 'none';
            btnExpand.style.display = 'flex';
        }
    }
    </script>
    
    <script type="text/javascript">Cufon.now();</script>
    <?php include("php/google.php"); mysqli_close($conexao); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>