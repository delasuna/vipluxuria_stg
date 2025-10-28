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
            
            <!-- Topo-2 agora inclui o banner/slider integrado -->
            <div id="topo"><?php include("php/topo-2.php"); ?></div>
        </div>

        <!-- NOVO: Badges de Categoria APÓS o banner -->
        <div class="category-badges-section">
            <div class="container">
                <div class="category-badges-container">
                    <a href="javascript:carregaAnunciantes('Mulheres')" class="badge-category-main">
                        <i class="bi bi-gender-female"></i>
                        <span>Mulheres</span>
                    </a>
                    <a href="javascript:carregaAnunciantes('Transex')" class="badge-category-main">
                        <i class="bi bi-gender-trans"></i>
                        <span>Transex</span>
                    </a>
                    <a href="javascript:carregaAnunciantes('Casais')" class="badge-category-main">
                        <i class="bi bi-people-fill"></i>
                        <span>Casais</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Filtros logo após as badges -->
        <?php include 'filters.php' ?>

        <div class="main-content">
            <div class="container">

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
                        for($i = 1; $i <= 3; $i++) {
                            if (!empty($row["imagemCentral{$i}"])) {
                                $previewImages[] = "https://www.vipluxuria.com/sistema/content/" . $row["imagemCentral{$i}"];
                            }
                        }
                        ?>
                        
                        <div class="preview-slides">
                            <img src="<?= "https://www.vipluxuria.com/sistema/content/" . htmlspecialchars($imagemCapa) ?>" 
                                 class="preview-img active" alt="Foto 1">
                            <?php foreach($previewImages as $index => $img): ?>
                                <img src="<?= htmlspecialchars($img) ?>" 
                                     class="preview-img" alt="Foto <?= $index + 2 ?>">
                            <?php endforeach; ?>
                        </div>
                        
                        <?php if(count($previewImages) > 0): ?>
                            <button class="preview-nav preview-prev" onclick="changePreview(event, -1)">‹</button>
                            <button class="preview-nav preview-next" onclick="changePreview(event, 1)">›</button>
                            
                            <div class="preview-dots">
                                <span class="dot active" onclick="currentSlide(event, 1)"></span>
                                <?php foreach($previewImages as $index => $img): ?>
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
                            <?php if($row['flagWhats'] == 'S'): ?>
                                <p><i class="bi bi-whatsapp"></i> Disponível</p>
                            <?php endif; ?>
                            <?php if($row['flag24Horas'] == 'Sim'): ?>
                                <p><i class="bi bi-clock"></i> 24 Horas</p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="preview-actions">
                            <button class="btn-preview-whats" onclick="event.preventDefault(); event.stopPropagation(); window.open('https://wa.me/55<?= preg_replace('/\D/', '', $row['ddd'] . $row['telefone']) ?>', '_blank')">
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
                <p class="nome-acompanhante"><?= $nomeCompleto ?></p>
            </div>
        </div>
    </a>
</div>

                            <?php if (++$contadorCarrossel == 18) { ?>
                                <!-- Espaço para banner/carrossel futuro -->
                            <?php } ?>
                        <?php } ?>
                    </div>
                </section>

               <!-- Seção de Confiança com SEO -->
<section class="trust-section-leaders">
    <div class="container">
        <!-- Título Principal -->
        <h2 class="trust-title-leaders">Há 17 anos trabalhando com as melhores acompanhantes.</h2>
        
        <!-- Texto SEO em Collapse -->
        <div class="seo-content-wrapper">
            <button class="btn-expand-seo" type="button" data-bs-toggle="collapse" data-bs-target="#seoContent" aria-expanded="false" aria-controls="seoContent">
                <span>Saiba mais sobre nossos serviços exclusivos</span>
                <i class="bi bi-chevron-down"></i>
            </button>
            
            <div class="collapse" id="seoContent">
                <div class="seo-text-content">
                    <p class="lead-text">
                        Porto Alegre, uma cidade vibrante e cheia de opções culturais e sociais, é também um destino ideal para quem busca descrição e sofisticação na hora de contratar acompanhantes Porto Alegre-RS. Quando se trata de contratar acompanhantes de luxo, há uma série de benefícios que tornam essa escolha única e atraente.
                    </p>
                    
                    <p>
                        Veja os benefícios e como a contratação de acompanhantes Porto Alegre-RS pela plataforma Vip Luxúria pode ser uma experiência gratificante, seja para momentos de lazer, jantares sociais ou outros eventos especiais.
                    </p>

                    <h3>Companheirismo Sofisticado e Exclusivo</h3>
                    <p>
                        O companheirismo sofisticado e exclusivo oferecido por uma acompanhante Porto Alegre-RS é um serviço que vai muito além das expectativas convencionais. Combinando inteligência, sofisticação e um profundo entendimento sobre os desejos de seus acompanhantes, essas profissionais proporcionam experiências únicas e personalizadas para cada cliente.
                    </p>
                    
                    <p>
                        Muitas garotas de programa em Porto Alegre-RS investem em seu desenvolvimento pessoal e cultural, frequentando cursos, aprimorando idiomas e mantendo-se constantemente atualizadas sobre diversos temas. Isso permite que elas estejam confortáveis em qualquer cenário.
                    </p>

                    <p>
                        Seja em eventos sociais, jantares de negócios ou momentos privados, a capacidade de adaptação e o refinamento dessas acompanhantes transformam cada encontro em uma experiência marcante e inesquecível.
                    </p>

                    <p>
                        A exclusividade dos serviços não está restrita apenas na garantia aos mínimos detalhes que garantem conforto e discrição. As acompanhantes entendem que cada cliente busca mais do que apenas companhia: procuram conexão genuína e momentos que sejam tanto agradáveis quanto memoráveis.
                    </p>

                    <p>
                        Por isso, muitas garotas de programa em Porto Alegre-RS são conhecidas por seu estilo impecável, que alia moda, bom gosto e sofisticação. A habilidade de criar conversas estimulantes e engajantes faz com que os encontros transcorram com leveza e naturalidade, deixando o cliente à vontade e valorizado. Esse nível de atenção ao cliente é o que diferencia um serviço de qualidade de uma experiência única e de alta qualidade.
                    </p>

                    <p>
                        Porto Alegre, uma cidade vibrante e cheia de charme, proporciona o cenário ideal para que esse companheirismo sofisticado floresça. Seja em restaurantes renomados, eventos culturais ou passeios pelos pontos turísticos, onde uma garota de programa de luxo Porto Alegre-RS saberá tornar cada momento ainda mais especial e prazeroso, cada momento com sua presença elegante. Elas sabem como equilibrar charme e discrição, garantindo que cada cliente se sinta especial e plenamente atendido.
                    </p>

                    <p>
                        A cidade oferece uma vasta gama de opções para experiências únicas, que, quando acompanhadas de uma profissional tão habilidosa, criam memórias que transcendem o ordinário. Essa combinação de exclusividade, sofisticação e conexão genuína faz do serviço de uma garota de programa em Porto Alegre-RS uma escolha perfeita para momentos especiais.
                    </p>

                    <h3>Atendimento Personalizado e Exclusivo</h3>
                    <p>
                        As acompanhantes Porto Alegre-RS costumam oferecer um serviço altamente personalizado. Isso significa que, ao contratar um acompanhante, você pode escolher os detalhes específicos que deseja viver.
                    </p>

                    <p>
                        Se está oferecendo um jantar formal, uma noite de lazer ou até mesmo uma viagem, as acompanhantes em Porto Alegre-RS são conhecedoras das nuances que tornam esses momentos inesquecíveis. O atendimento é sempre exclusivo e adaptado às suas preferências, garantindo que a experiência seja feita sob medida.
                    </p>

                    <h3>Discrição e Confidencialidade</h3>
                    <p>
                        Outro benefício essencial ao contratar uma acompanhante Porto Alegre-RS é a discrição. Profissionais de alto nível sabem como garantir que seus clientes se sintam à vontade e seguros com a privacidade que merecem.
                    </p>

                    <p>
                        Elas mantêm total confidencialidade sobre seus encontros, respeitando sua privacidade em todos os momentos. Se você procura um momento de intimidade e exclusividade sem preocupações com sua imagem pública, as acompanhantes Porto Alegre-RS são a escolha ideal.
                    </p>

                    <h3>Acompanhamento em Eventos e Jantares Sociais com suas acompanhantes Porto Alegre-RS</h3>
                    <p>
                        A presença de uma acompanhante em eventos sociais importantes, como reuniões de negócios, galas, lançamentos e outros encontros de alto nível, pode ser uma excelente forma de impressionar seus colegas e fazer com que você se sinta ainda mais confiante e confortável em ambientes de alta exigência social.
                    </p>

                    <p>
                        Ter acompanhantes em Porto Alegre-RS ao seu lado pode ser uma excelente forma de impressionar seus colegas e fazer com que você se sinta ainda mais confiante e confortável em ambientes de alta exigência social.
                    </p>

                    <h3>Relaxamento e Escapismo</h3>
                    <p>
                        O foco do companheirismo em Porto Alegre, as acompanhantes Porto Alegre-RS também podem proporcionar momentos de relaxamento e escapismo. Seja para um encontro mais íntimo e tranquilo, ou para simplesmente desfrutar de um tempo de qualidade fora das obrigações do dia a dia, esses profissionais são especialistas em criar um ambiente de descontração e prazer.
                    </p>

                    <p>
                        O foco é proporcionar uma experiência agradável com nossas acompanhantes de luxo Porto Alegre-RS, onde o cliente possa relaxar, desfrutar de boa conversa e sentir-se bem consigo mesmo.
                    </p>

                    <h3>Qualidade e Profissionalismo</h3>
                    <p>
                        A qualidade por contratar uma acompanhante em porto alegre-RS pela plataforma Vip Luxúria, pode ter certeza de que está lidando com uma habilidade profissional. A maioria das acompanhantes de luxo em Porto Alegre é altamente sólida em diversas áreas, como etiqueta social, comunicação e até mesmo idiomas.
                    </p>

                    <p>
                        Isso significa que você terá uma companhia que não é apenas atraente fisicamente, mas também inteligente, articulada e capaz de participar de conversas interessantes e complexas, tornando o encontro ainda mais agradável com suas acompanhantes Porto Alegre-RS.
                    </p>

                    <h3>Momentos de Alta Qualidade com nossas acompanhantes Porto Alegre-RS</h3>
                    <p>
                        Ao contratar acompanhantes Porto Alegre-RS, você tem a garantia de que o tempo que passar com elas será de alta qualidade. Isso vai desde o cuidado com a aparência até a maneira como ela interage com você, garantindo que cada momento seja inesquecível.
                    </p>

                    <p>
                        Se você procura uma experiência de qualidade, seja para relaxar ou para se divertir, contratar uma acompanhante de luxo pode ser a melhor maneira de garantir uma experiência realmente especial.
                    </p>

                    <h3>Flexibilidade para Diversas Ocasiões</h3>
                    <p>
                        As acompanhantes de porto alegre-RS oferecem flexibilidade para uma variedade de benefícios. Seja para um evento corporativo, uma noite de gala, uma comemoração especial ou até mesmo uma simples companhia durante uma viagem, esses profissionais estão disponíveis para diversas ocasiões.
                    </p>

                    <p>
                        Isso garante que você possa contar com uma companhia comprometida em qualquer situação, tornando sua experiência ainda mais segura.
                    </p>

                    <h3>Uma Experiência de Alto Nível com nossas acompanhantes de porto alegre-RS</h3>
                    <p>
                        Porto Alegre é uma cidade cheia de cultura, história e charme. Com muitas opções de restaurantes, bares, cafés, clubes e eventos, a cidade oferece um cenário perfeito para aproveitar momentos ao lado de nossas acompanhantes Porto Alegre-RS.
                    </p>

                    <p>
                        Seja para passeios turísticos, jantares sofisticados ou até mesmo para relaxar em uma experiência mais privada, a presença de um acompanhante de luxo pode tornar sua visita à cidade ainda mais externa.
                    </p>

                    <h3>Alta Disponibilidade e Facilidade de Acesso</h3>
                    <p>
                        Outro benefício de contratar nossa acompanhante de porto alegre-RS é a facilidade de acesso ao serviço. Muitos profissionais oferecem canais diretos de contato, seja por meio de sites, aplicativos ou mesmo por telefone, tornando o processo de contratação rápido e seguro.
                    </p>

                    <p>
                        A flexibilidade de horários e a disponibilidade dos acompanhantes garantem que você possa escolher o momento que melhor se adequa às suas necessidades.
                    </p>

                    <p>
                        Contratar acompanhante de luxo porto alegre-RS oferece uma experiência única e sofisticada, ideal para quem busca momentos exclusivos e de alta qualidade. A cidade oferece um cenário perfeito para divulgar a companhia de profissionais curiosos e discretos, que sabem como transformar qualquer encontro em uma experiência específica.
                    </p>

                    <p>
                        Se você está procurando uma companhia de classe, que combine elegância, sofisticação e profissionalismo, Porto Alegre é o lugar ideal para encontrar o serviço que você procura.
                    </p>
                </div>
            </div>
        </div>

        <!-- Grid de Cards de Confiança -->
        <div class="trust-grid-leaders">
            <!-- Card 1: Verificação Rigorosa -->
            <div class="trust-card-leader">
                <div class="trust-icon-leader">
                    <i class="bi bi-shield-fill-check"></i>
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
                    O mais confiável catalogo de acompanhantes de Porto Alegre e região.
                </p>
            </div>
        </div>
    </div>
</section>
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
                    const event = { target: nextBtn, preventDefault: () => {}, stopPropagation: () => {} };
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
        </body>

</html>
