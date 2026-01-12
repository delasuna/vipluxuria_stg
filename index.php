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
        </div>

        <div class="degrade">
            <section class="hero-home container pt-5">
                <div class="hero-content pt-5">

                    <h1 class="text-center">
                        O <span>maior catálogo</span> de<br>
                        acompanhantes de<br>
                        Porto Alegre
                    </h1>

                    <div class="hero-badges-home">
                        <span>+17 anos de mercado</span>
                        <span>+14 cidades atendidas</span>
                        <span>100% verificadas</span>
                    </div>

                    <a href="/como-anunciar/" class="btn-anunciar w-100 text-center">
                        Anunciar como acompanhante
                    </a>

                    <div class="row my-3 mx-auto w-100 search-bar">
                        <div class="col-12">
                            <form class="d-flex form-busca-nome" action="/mulheres-acompanhantes-porto-alegre-poa/" method="post">
                                <div class="input-group">
                                    <input
                                        type="search"
                                        class="form-control bg-black"
                                        placeholder="Buscar por nome..."
                                        name="nome"
                                        onfocus="this.value=''">
                                    <button class="btn btn-pink text-white px-4" type="submit">Buscar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="hero-links">
                        <h5>Links populares</h5>

                        <a href="/acompanhantes-porto-alegre/">
                            <i class="bi bi-person"></i> Ver acompanhantes
                        </a>

                        <a href="/vip-blog">
                            <i class="bi bi-journal-text"></i> Blog Vip Luxúria
                        </a>

                        <a href="/Acompanhantes-SexoVirtual">
                            <i class="bi bi-camera-video"></i> Sexo Virtual
                        </a>

                        <a href="/como-anunciar/">
                            <i class="bi bi-plus-circle"></i> Cadastrar como acompanhante
                        </a>

                        <a href="/duvidas.php">
                            <i class="bi bi-question-circle"></i> Dúvidas frequentes
                        </a>
                    </div>

                </div>
            </section>
            <section class="benefits-home">
                <div class="container">

                    <h2>Contrate com mais segurança e praticidade</h2>
                    <p>
                        No Vip Luxúria você encontra <strong>acompanhantes verificadas</strong>
                        e contrata sem complicações
                    </p>

                    <div class="benefits-grid">

                        <div class="benefit-item">
                            <i class="bi bi-shield-check"></i>
                            <h4>Verificação Rigorosa</h4>
                            <span>
                                100% das acompanhantes verificadas presencialmente
                                com documentação
                            </span>
                        </div>

                        <div class="benefit-item">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Cobertura Regional</h4>
                            <span>
                                Porto Alegre e mais de 14 cidades da região metropolitana do RS
                            </span>
                        </div>

                        <div class="benefit-item">
                            <i class="bi bi-clock"></i>
                            <h4>Atendimento 24h</h4>
                            <span>
                                Acompanhantes disponíveis a qualquer hora do dia ou da noite
                            </span>
                        </div>

                        <div class="benefit-item">
                            <i class="bi bi-eye-slash"></i>
                            <h4>Total Discrição</h4>
                            <span>
                                O catálogo mais discreto de Porto Alegre
                                com total privacidade
                            </span>
                        </div>

                    </div>

                </div>
            </section>

            <section class="cta-anunciar">
                <div class="container">

                    <h2>
                        Anuncie <span>grátis</span> no maior catálogo de<br>
                        acompanhantes de Porto Alegre
                    </h2>

                    <p>Aumente sua visibilidade e conquiste mais clientes</p>

                    <a href="/como-anunciar/" class="btn-cta">
                        Cadastre-se grátis
                    </a>

                    <div class="cta-metrics">

                        <div class="metric">
                            <i class="bi bi-clock-history"></i>
                            <span>17 anos de mercado</span>
                        </div>

                        <div class="metric">
                            <i class="bi bi-megaphone"></i>
                            <span>Anúncio grátis</span>
                        </div>

                        <div class="metric">
                            <i class="bi bi-people"></i>
                            <span>Milhares de acessos</span>
                        </div>

                        <div class="metric">
                            <i class="bi bi-patch-check"></i>
                            <span>Perfil verificado</span>
                        </div>

                    </div>

                </div>
            </section>

            <section class="categories-home">
                <div class="container">

                    <h2>Acompanhantes em Porto Alegre e Região</h2>
                    <p>Encontre acompanhantes por categoria e cidade</p>

                    <div class="categories-grid">

                        <a href="/mulheres-acompanhantes-porto-alegre-poa/" class="category-card">
                            <i class="bi bi-person"></i>
                            <h4>Acompanhantes Mulheres</h4>
                            <span>
                                Encontre acompanhantes mulheres para atendimentos
                                individuais, casais e eventos sociais em todo o RS.
                            </span>
                            <small>
                                Porto Alegre, Novo Hamburgo, Canoas, São Leopoldo,
                                Gravataí, Cachoeirinha, Gramado, Serra Gaúcha, Litoral Gaúcho.
                            </small>
                        </a>

                        <a href="/transex-porto-alegre-poa/" class="category-card">
                            <i class="bi bi-plus-circle"></i>
                            <h4>Acompanhantes Transex</h4>
                            <span>
                                Travestis, transexuais e trans em Porto Alegre e região.
                                Perfis verificados e atualizados.
                            </span>
                            <small>
                                Porto Alegre, Novo Hamburgo, Canoas, São Leopoldo,
                                Gravataí, Serra Gaúcha, Gramado.
                            </small>
                        </a>

                        <a href="/casais-e-homens-porto-alegre-poa/" class="category-card">
                            <i class="bi bi-people"></i>
                            <h4>Casais</h4>
                            <span>
                                Casais para encontros e fantasias. Atendimento para
                                casais, homens e mulheres.
                            </span>
                            <small>
                                Porto Alegre, Grande Porto Alegre, Vale dos Sinos,
                                Serra Gaúcha.
                            </small>
                        </a>

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
        <script>
            // Sistema de navegação do preview
            function changePreview(event, direction) {
                event.preventDefault();
                event.stopPropagation();

                const gallery = event.target.closest('.preview-gallery');
                const slides = gallery.querySelectorAll('.preview-img');
                const dots = gallery.querySelectorAll('.dot');

                let currentIndex = Array.from(slides).findIndex(slide => slide.classList.contains('active'));

                slides[currentIndex].classList.remove('active');
                dots[currentIndex].classList.remove('active');

                currentIndex = (currentIndex + direction + slides.length) % slides.length;

                slides[currentIndex].classList.add('active');
                dots[currentIndex].classList.add('active');
            }

            function currentSlide(event, slideIndex) {
                event.preventDefault();
                event.stopPropagation();

                const gallery = event.target.closest('.preview-gallery');
                const slides = gallery.querySelectorAll('.preview-img');
                const dots = gallery.querySelectorAll('.dot');

                slides.forEach(slide => slide.classList.remove('active'));
                dots.forEach(dot => dot.classList.remove('active'));

                slides[slideIndex - 1].classList.add('active');
                dots[slideIndex - 1].classList.add('active');
            }

            // Auto-play das imagens no hover
            document.querySelectorAll('.acompanhante-card').forEach(card => {
                let interval;

                card.addEventListener('mouseenter', function() {
                    const gallery = this.querySelector('.preview-gallery');
                    if (gallery && gallery.querySelectorAll('.preview-img').length > 1) {
                        interval = setInterval(() => {
                            const nextBtn = gallery.querySelector('.preview-next');
                            if (nextBtn) {
                                const event = {
                                    target: nextBtn,
                                    preventDefault: () => {},
                                    stopPropagation: () => {}
                                };
                                changePreview(event, 1);
                            }
                        }, 2000);
                    }
                });

                card.addEventListener('mouseleave', function() {
                    clearInterval(interval);
                });
            });
            // No final do index.php, verifique se este código está executando:
            document.addEventListener('DOMContentLoaded', function() {
                // Teste se o preview está funcionando
                console.log('Preview cards:', document.querySelectorAll('.card-preview').length);
            });
        </script>
    </div>
</body>

</html>