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

        <div class="degrade">
            <?php include 'profile-badges.php' ?>

            <?php include 'search-bar.php' ?>

            <!-- Filtros logo após as badges -->
            <?php include 'filters.php' ?>
            <?php include 'php/slider-2.php' ?>
            <div class="main-content">
                <div class="container">

                    <!-- Grid de Acompanhantes -->
                    <section class="acompanhantes-section">
                        <div class="grid-premium">
                            <?php
                            function gerarSlug($string) {
                                // garante UTF-8
                                $string = mb_convert_encoding($string, 'UTF-8', 'UTF-8');

                                // remove acentos corretamente
                                $string = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);

                                // minúsculas
                                $string = strtolower($string);

                                // remove tudo que não for letra, número ou espaço
                                $string = preg_replace('/[^a-z0-9\s-]/', '', $string);

                                // troca espaços por hífen
                                $string = preg_replace('/[\s-]+/', '-', $string);

                                return trim($string, '-');
                            }

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

                                $slugNome = gerarSlug($nome);
                                $slugSobrenome = gerarSlug($sobrenome);

                                $linkPerfil = "/perfil/{$idMulher}/{$slugNome}";

                                if (!empty($slugSobrenome)) {
                                    $linkPerfil .= "-{$slugSobrenome}";
                                }

                                $linkPerfil = htmlspecialchars($linkPerfil, ENT_QUOTES, 'UTF-8');
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
                                                <span class="badge-verificada">&#10003; Verificada</span>
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
                                                            <button class="preview-nav preview-prev" onclick="changePreview(event, -1)">&lt;</button>
                                                            <button class="preview-nav preview-next" onclick="changePreview(event, 1)">&gt;</button>

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
                                                                <p><i class="bi bi-whatsapp"></i> Dispon&iacute;vel</p>
                                                            <?php endif; ?>
                                                            <?php if ($row['flagAtende24Horas'] == 'Sim'): ?>
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
                                                <p class="nome-acompanhante mx-auto"><?= $nomeCompleto ?></p>
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
                            <h2 class="trust-title-leaders">H&aacute; 17 anos trabalhando com as melhores acompanhantes.</h2>

                            <!-- Texto SEO em Collapse -->
                            <div class="seo-content-wrapper">
                                <button class="btn-expand-seo" type="button" data-bs-toggle="collapse" data-bs-target="#seoContent" aria-expanded="false" aria-controls="seoContent">
                                    <span>Saiba mais sobre nossos servi&ccedil;os exclusivos</span>
                                    <i class="bi bi-chevron-down"></i>
                                </button>

                                <div class="collapse" id="seoContent">
                                    <div class="seo-text-content">
                                        <p class="lead-text">
                                            Porto Alegre, uma cidade vibrante e cheia de op&ccedil;&otilde;es culturais e sociais, &eacute; tamb&eacute;m um destino ideal para quem busca descri&ccedil;&atilde;o e sofistica&ccedil;&atilde;o na hora de contratar acompanhantes Porto Alegre-RS. Quando se trata de contratar acompanhantes de luxo, h&aacute; uma s&eacute;rie de benef&iacute;cios que tornam essa escolha &uacute;nica e atraente.
                                        </p>

                                        <p>
                                            Veja os benef&iacute;cios e como a contrata&ccedil;&atilde;o de acompanhantes Porto Alegre-RS pela plataforma Vip Lux&uacute;ria pode ser uma experi&ecirc;ncia gratificante, seja para momentos de lazer, jantares sociais ou outros eventos especiais.
                                        </p>

                                        <h3>Companheirismo Sofisticado e Exclusivo</h3>
                                        <p>
                                            O companheirismo sofisticado e exclusivo oferecido por uma acompanhante Porto Alegre-RS &eacute; um servi&ccedil;o que vai muito al&eacute;m das expectativas convencionais. Combinando intelig&ecirc;ncia, sofistica&ccedil;&atilde;o e um profundo entendimento sobre os desejos de seus acompanhantes, essas profissionais proporcionam experi&ecirc;ncias &uacute;nicas e personalizadas para cada cliente.
                                        </p>

                                        <p>
                                            Muitas garotas de programa em Porto Alegre-RS investem em seu desenvolvimento pessoal e cultural, frequentando cursos, aprimorando idiomas e mantendo-se constantemente atualizadas sobre diversos temas. Isso permite que elas estejam confort&aacute;veis em qualquer cen&aacute;rio.
                                        </p>

                                        <p>
                                            Seja em eventos sociais, jantares de neg&oacute;cios ou momentos privados, a capacidade de adapta&ccedil;&atilde;o e o refinamento dessas acompanhantes transformam cada encontro em uma experi&ecirc;ncia marcante e inesquec&iacute;vel.
                                        </p>

                                        <p>
                                            A exclusividade dos servi&ccedil;os n&atilde;o est&aacute; restrita apenas na garantia aos m&iacute;nimos detalhes que garantem conforto e discri&ccedil;&atilde;o. As acompanhantes entendem que cada cliente busca mais do que apenas companhia: procuram conex&atilde;o genu&iacute;na e momentos que sejam tanto agrad&aacute;veis quanto memor&aacute;veis.
                                        </p>

                                        <p>
                                            Por isso, muitas garotas de programa em Porto Alegre-RS s&atilde;o conhecidas por seu estilo impec&aacute;vel, que alia moda, bom gosto e sofistica&ccedil;&atilde;o. A habilidade de criar conversas estimulantes e engajantes faz com que os encontros transcorram com leveza e naturalidade, deixando o cliente &agrave; vontade e valorizado. Esse n&iacute;vel de aten&ccedil;&atilde;o ao cliente &eacute; o que diferencia um servi&ccedil;o de qualidade de uma experi&ecirc;ncia &uacute;nica e de alta qualidade.
                                        </p>

                                        <p>
                                            Porto Alegre, uma cidade vibrante e cheia de charme, proporciona o cen&aacute;rio ideal para que esse companheirismo sofisticado flores&ccedil;a. Seja em restaurantes renomados, eventos culturais ou passeios pelos pontos tur&iacute;sticos, onde uma garota de programa de luxo Porto Alegre-RS saber&aacute; tornar cada momento ainda mais especial e prazeroso, cada momento com sua presen&ccedil;a elegante. Elas sabem como equilibrar charme e discri&ccedil;&atilde;o, garantindo que cada cliente se sinta especial e plenamente atendido.
                                        </p>

                                        <p>
                                            A cidade oferece uma vasta gama de op&ccedil;&otilde;es para experi&ecirc;ncias &uacute;nicas, que, quando acompanhadas de uma profissional t&atilde;o habilidosa, criam mem&oacute;rias que transcendem o ordin&aacute;rio. Essa combina&ccedil;&atilde;o de exclusividade, sofistica&ccedil;&atilde;o e conex&atilde;o genu&iacute;na faz do servi&ccedil;o de uma garota de programa em Porto Alegre-RS uma escolha perfeita para momentos especiais.
                                        </p>

                                        <h3>Atendimento Personalizado e Exclusivo</h3>
                                        <p>
                                            As acompanhantes Porto Alegre-RS costumam oferecer um servi&ccedil;o altamente personalizado. Isso significa que, ao contratar um acompanhante, voc&ecirc; pode escolher os detalhes espec&iacute;ficos que deseja viver.
                                        </p>

                                        <p>
                                            Se est&aacute; oferecendo um jantar formal, uma noite de lazer ou at&eacute; mesmo uma viagem, as acompanhantes em Porto Alegre-RS s&atilde;o conhecedoras das nuances que tornam esses momentos inesquec&iacute;veis. O atendimento &eacute; sempre exclusivo e adaptado &agrave;s suas prefer&ecirc;ncias, garantindo que a experi&ecirc;ncia seja feita sob medida.
                                        </p>

                                        <h3>Discri&ccedil;&atilde;o e Confidencialidade</h3>
                                        <p>
                                            Outro benef&iacute;cio essencial ao contratar uma acompanhante Porto Alegre-RS &eacute; a discri&ccedil;&atilde;o. Profissionais de alto n&iacute;vel sabem como garantir que seus clientes se sintam &agrave; vontade e seguros com a privacidade que merecem.
                                        </p>

                                        <p>
                                            Elas mant&ecirc;m total confidencialidade sobre seus encontros, respeitando sua privacidade em todos os momentos. Se voc&ecirc; procura um momento de intimidade e exclusividade sem preocupa&ccedil;&otilde;es com sua imagem p&uacute;blica, as acompanhantes Porto Alegre-RS s&atilde;o a escolha ideal.
                                        </p>

                                        <h3>Acompanhamento em Eventos e Jantares Sociais com suas acompanhantes Porto Alegre-RS</h3>
                                        <p>
                                            A presen&ccedil;a de uma acompanhante em eventos sociais importantes, como reuni&otilde;es de neg&oacute;cios, galas, lan&ccedil;amentos e outros encontros de alto n&iacute;vel, pode ser uma excelente forma de impressionar seus colegas e fazer com que voc&ecirc; se sinta ainda mais confiante e confort&aacute;vel em ambientes de alta exig&ecirc;ncia social.
                                        </p>

                                        <p>
                                            Ter acompanhantes em Porto Alegre-RS ao seu lado pode ser uma excelente forma de impressionar seus colegas e fazer com que voc&ecirc; se sinta ainda mais confiante e confort&aacute;vel em ambientes de alta exig&ecirc;ncia social.
                                        </p>

                                        <h3>Relaxamento e Escapismo</h3>
                                        <p>
                                            O foco do companheirismo em Porto Alegre, as acompanhantes Porto Alegre-RS tamb&eacute;m podem proporcionar momentos de relaxamento e escapismo. Seja para um encontro mais &iacute;ntimo e tranquilo, ou para simplesmente desfrutar de um tempo de qualidade fora das obriga&ccedil;&otilde;es do dia a dia, esses profissionais s&atilde;o especialistas em criar um ambiente de descontra&ccedil;&atilde;o e prazer.
                                        </p>

                                        <p>
                                            O foco &eacute; proporcionar uma experi&ecirc;ncia agrad&aacute;vel com nossas acompanhantes de luxo Porto Alegre-RS, onde o cliente possa relaxar, desfrutar de boa conversa e sentir-se bem consigo mesmo.
                                        </p>

                                        <h3>Qualidade e Profissionalismo</h3>
                                        <p>
                                            A qualidade por contratar uma acompanhante em porto alegre-RS pela plataforma Vip Lux&uacute;ria, pode ter certeza de que est&aacute; lidando com uma habilidade profissional. A maioria das acompanhantes de luxo em Porto Alegre &eacute; altamente s&oacute;lida em diversas &aacute;reas, como etiqueta social, comunica&ccedil;&atilde;o e at&eacute; mesmo idiomas.
                                        </p>

                                        <p>
                                            Isso significa que voc&ecirc; ter&aacute; uma companhia que n&atilde;o &eacute; apenas atraente fisicamente, mas tamb&eacute;m inteligente, articulada e capaz de participar de conversas interessantes e complexas, tornando o encontro ainda mais agrad&aacute;vel com suas acompanhantes Porto Alegre-RS.
                                        </p>

                                        <h3>Momentos de Alta Qualidade com nossas acompanhantes Porto Alegre-RS</h3>
                                        <p>
                                            Ao contratar acompanhantes Porto Alegre-RS, voc&ecirc; tem a garantia de que o tempo que passar com elas ser&aacute; de alta qualidade. Isso vai desde o cuidado com a apar&ecirc;ncia at&eacute; a maneira como ela interage com voc&ecirc;, garantindo que cada momento seja inesquec&iacute;vel.
                                        </p>

                                        <p>
                                            Se voc&ecirc; procura uma experi&ecirc;ncia de qualidade, seja para relaxar ou para se divertir, contratar uma acompanhante de luxo pode ser a melhor maneira de garantir uma experi&ecirc;ncia realmente especial.
                                        </p>

                                        <h3>Flexibilidade para Diversas Ocasi&otilde;es</h3>
                                        <p>
                                            As acompanhantes de porto alegre-RS oferecem flexibilidade para uma variedade de benef&iacute;cios. Seja para um evento corporativo, uma noite de gala, uma comemora&ccedil;&atilde;o especial ou at&eacute; mesmo uma simples companhia durante uma viagem, esses profissionais est&atilde;o dispon&iacute;veis para diversas ocasi&otilde;es.
                                        </p>

                                        <p>
                                            Isso garante que voc&ecirc; possa contar com uma companhia comprometida em qualquer situa&ccedil;&atilde;o, tornando sua experi&ecirc;ncia ainda mais segura.
                                        </p>

                                        <h3>Uma Experi&ecirc;ncia de Alto N&iacute;vel com nossas acompanhantes de porto alegre-RS</h3>
                                        <p>
                                            Porto Alegre &eacute; uma cidade cheia de cultura, hist&oacute;ria e charme. Com muitas op&ccedil;&otilde;es de restaurantes, bares, caf&eacute;s, clubes e eventos, a cidade oferece um cen&aacute;rio perfeito para aproveitar momentos ao lado de nossas acompanhantes Porto Alegre-RS.
                                        </p>

                                        <p>
                                            Seja para passeios tur&iacute;sticos, jantares sofisticados ou at&eacute; mesmo para relaxar em uma experi&ecirc;ncia mais privada, a presen&ccedil;a de um acompanhante de luxo pode tornar sua visita &agrave; cidade ainda mais externa.
                                        </p>

                                        <h3>Alta Disponibilidade e Facilidade de Acesso</h3>
                                        <p>
                                            Outro benef&iacute;cio de contratar nossa acompanhante de porto alegre-RS &eacute; a facilidade de acesso ao servi&ccedil;o. Muitos profissionais oferecem canais diretos de contato, seja por meio de sites, aplicativos ou mesmo por telefone, tornando o processo de contrata&ccedil;&atilde;o r&aacute;pido e seguro.
                                        </p>

                                        <p>
                                            A flexibilidade de hor&aacute;rios e a disponibilidade dos acompanhantes garantem que voc&ecirc; possa escolher o momento que melhor se adequa &agrave;s suas necessidades.
                                        </p>

                                        <p>
                                            Contratar acompanhante de luxo porto alegre-RS oferece uma experi&ecirc;ncia &uacute;nica e sofisticada, ideal para quem busca momentos exclusivos e de alta qualidade. A cidade oferece um cen&aacute;rio perfeito para divulgar a companhia de profissionais curiosos e discretos, que sabem como transformar qualquer encontro em uma experi&ecirc;ncia espec&iacute;fica.
                                        </p>

                                        <p>
                                            Se voc&ecirc; est&aacute; procurando uma companhia de classe, que combine eleg&acirc;ncia, sofistica&ccedil;&atilde;o e profissionalismo, Porto Alegre &eacute; o lugar ideal para encontrar o servi&ccedil;o que voc&ecirc; procura.
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
                                    <h3 class="trust-card-title">Verifica&ccedil;&atilde;o Rigorosa</h3>
                                    <p class="trust-card-description">
                                        <span class="trust-card-stat">100%</span> das acompanhantes passam por verifica&ccedil;&atilde;o presencial com documenta&ccedil;&atilde;o
                                    </p>
                                </div>

                                <!-- Card 2: Cobertura Regional -->
                                <div class="trust-card-leader">
                                    <div class="trust-icon-leader">
                                        <i class="bi bi-geo-alt-fill"></i>
                                    </div>
                                    <h3 class="trust-card-title">Cobertura Regional</h3>
                                    <p class="trust-card-description">
                                        Porto Alegre e mais de <span class="trust-card-stat">14 cidades</span> da regi&atilde;o metropolitana
                                    </p>
                                </div>

                                <!-- Card 3: Atendimento 24h -->
                                <div class="trust-card-leader">
                                    <div class="trust-icon-leader">
                                        <i class="bi bi-clock-fill"></i>
                                    </div>
                                    <h3 class="trust-card-title">Atendimento 24h</h3>
                                    <p class="trust-card-description">
                                        Acompanhantes dispon&iacute;veis a qualquer hora do dia ou da noite
                                    </p>
                                </div>

                                <!-- Card 4: Total Discrição -->
                                <div class="trust-card-leader">
                                    <div class="trust-icon-leader">
                                        <i class="bi bi-lock-fill"></i>
                                    </div>
                                    <h3 class="trust-card-title">Total Discri&ccedil;&atilde;o</h3>
                                    <p class="trust-card-description">
                                        O mais confi&aacute;vel catalogo de acompanhantes de Porto Alegre e regi&atilde;o.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                </div>
            </div>
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