<?php
// perfil.php - versão atualizada para mysqli e correções
mb_internal_encoding('UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Conexão (assume que ../php/conecta_mysql.php retorna/define $conexao como mysqli)
$conexao = require_once '../php/conecta_mysql.php';
if (!isset($conexao) && isset($GLOBALS['conexao'])) {
    $conexao = $GLOBALS['conexao'];
}

// Se $conexao não for um mysqli, tente recuperar variável global nomeada
if (!($conexao instanceof mysqli)) {
    // opcional: tentar conectar com valores padrão (comente/descomente conforme necessário)
    // $conexao = mysqli_connect('localhost','usuario','senha','banco');
    // if (!$conexao) die('Erro na conexão MySQLi: ' . mysqli_connect_error());
}

/**
 * anti_injection - sanitiza entradas (remove palavras-chave perigosas e aplica escaping)
 * @param string $str
 * @param mysqli|null $link
 * @return string
 */
function anti_injection($str, $link = null)
{
    if (!isset($str)) return '';
    // remove palavras que contenham sintaxe SQL (case-insensitive)
    $pattern = '/\b(from|select|insert|delete|where|having|union|drop table|sleep|show tables|--|#|\*|\\\\)\b/i';
    $str = preg_replace($pattern, '', $str);
    $str = trim($str);
    $str = strip_tags($str);
    // aplica mysqli_real_escape_string se possível
    if ($link instanceof mysqli) {
        $str = mysqli_real_escape_string($link, $str);
    } else {
        // fallback
        $str = addslashes($str);
    }
    return $str;
}

// ==================================================
//  ENVIO DE INDICAÇÃO (FORMULÁRIO "Me indique")
// ==================================================
if (isset($_POST['amigoIndicado']) && anti_injection($_POST['amigoIndicado'], $conexao) === 'S') {
    $nomeQuemIndicou = anti_injection($_POST['nomeQuemIndicou'] ?? '', $conexao);
    $emailQuemIndicou = anti_injection($_POST['emailQuemIndicou'] ?? '', $conexao);
    $nomeAmigo = anti_injection($_POST['nomeAmigo'] ?? '', $conexao);
    $emailAmigo = anti_injection($_POST['emailAmigo'] ?? '', $conexao);
    $nomeAnunciante = anti_injection($_POST['nomeAnunciante'] ?? '', $conexao);
    $linkAnunciante = anti_injection($_POST['linkAnunciante'] ?? '', $conexao);

    if ($nomeQuemIndicou !== '' && $emailQuemIndicou !== '' && $nomeAmigo !== '' && $emailAmigo !== '') {
        // Monta corpo do e-mail
        $corpo = htmlspecialchars($nomeAmigo, ENT_QUOTES, 'UTF-8') . "! <br>";
        $corpo .= "<br> O seu amigo <strong>" . htmlspecialchars($nomeQuemIndicou, ENT_QUOTES, 'UTF-8') . "</strong> está lhe indicando a <strong>" . htmlspecialchars($nomeAnunciante, ENT_QUOTES, 'UTF-8') . "</strong>";
        $corpo .= "<br> Veja o seu perfil acessando o link: <a href='" . htmlspecialchars($linkAnunciante, ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($linkAnunciante, ENT_QUOTES, 'UTF-8') . "</a>";
        $corpo .= "<br> Equipe Vip Luxúria.";

        // Envio com PHPMailer (mantive sua configuração; ajuste credenciais se quiser)
        require_once 'PHPMailer/class.phpmailer.php';
        $mail = new PHPMailer(true);
        try {
            $mail->CharSet = "UTF-8";
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->Port = 587;
            $mail->Host = "smtp.vipluxuria.com";
            $mail->Username = "felipevip@vipluxuria.com";
            $mail->Password = "felipe2016";
            $mail->SetFrom("felipevip@vipluxuria.com", $nomeQuemIndicou . " <" . $emailQuemIndicou . ">");
            $mail->AddAddress($emailAmigo, $nomeAmigo);
            $mail->Subject = $nomeQuemIndicou . ' indicou uma Anunciante!';
            $mail->MsgHTML($corpo);
            $mail->Send();
            // opcional: registrar log ou mensagem de sucesso
        } catch (Exception $e) {
            // opcional: registrar $mail->ErrorInfo ou $e->getMessage()
        }
    }
}

// ==================================================
//  VOTAÇÃO
// ==================================================
if (isset($_REQUEST['votacao']) && $_REQUEST['votacao'] === 'S') {
    $ip = $_SERVER['REMOTE_ADDR'] ?? getenv('REMOTE_ADDR');
    $idReq = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
    if ($idReq > 0 && ($conexao instanceof mysqli)) {
        // Verifica se já votou
        $stmt = $conexao->prepare("SELECT id FROM votacaomulher WHERE idMulher = ? AND ip = ?");
        $stmt->bind_param('is', $idReq, $ip);
        $stmt->execute();
        $stmt->store_result();
        $already = $stmt->num_rows;
        $stmt->close();

        if ($already == 0) {
            if (isset($_REQUEST['voto']) && $_REQUEST['voto'] === 'aprovado') {
                $upd = $conexao->prepare("UPDATE mulher SET quantidadeVotos = IFNULL(quantidadeVotos, 0) + 1 WHERE idMulher = ?");
                $upd->bind_param('i', $idReq);
                $upd->execute();
                $upd->close();
            } elseif (isset($_REQUEST['voto']) && $_REQUEST['voto'] === 'reprovado') {
                // decrementa mas não permite negativo
                $upd = $conexao->prepare("UPDATE mulher SET quantidadeVotos = IF(quantidadeVotos > 0, quantidadeVotos - 1, 0) WHERE idMulher = ?");
                $upd->bind_param('i', $idReq);
                $upd->execute();
                $upd->close();
            }
            // registra IP para não votar novamente
            $ins = $conexao->prepare("INSERT INTO votacaomulher (idMulher, ip) VALUES (?, ?)");
            $ins->bind_param('is', $idReq, $ip);
            $ins->execute();
            $ins->close();
        }
    }
}

// ==================================================
// Buscar perfil da tabela 'mulher' (id via REQUEST)
// ==================================================
$perfil = null;
if (!empty($_REQUEST['id']) && ($conexao instanceof mysqli)) {
    $idMulher = intval($_REQUEST['id']);
    $stmt = $conexao->prepare("SELECT * FROM mulher WHERE flagAtivo = 'Sim' AND idMulher = ?");
    $stmt->bind_param('i', $idMulher);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // atribui campos como no original
        $perfil = $row; // usar chaves $perfil['nome'], etc.
    }
    $stmt->close();
}

// Se não encontrou perfil, mostra 404 simples (você pode customizar)
if (!$perfil) {
    header("HTTP/1.1 404 Not Found");
    echo "<!doctype html><html><head><meta charset='utf-8'><title>Perfil não encontrado</title></head><body><h1>Perfil não encontrado</h1><p>Verifique o parâmetro id.</p></body></html>";
    exit;
}

// Agora temos $perfil com todos os campos. Para facilitar o uso no HTML, mapeamos variáveis antigas:
extract($perfil, EXTR_PREFIX_ALL, "p"); // ex: $p_nome, $p_sobrenome, $p_imagemCentral1, ...

// Função para recuperar URL atual
function curPageURL()
{
    $pageURL = 'http';
    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') $pageURL .= 's';
    $pageURL .= '://';
    $pageURL .= $_SERVER['SERVER_NAME'];
    if ($_SERVER['SERVER_PORT'] != '80' && $_SERVER['SERVER_PORT'] != '') $pageURL .= ':' . $_SERVER['SERVER_PORT'];
    $pageURL .= $_SERVER['REQUEST_URI'];
    return $pageURL;
}

// Determina tipo (corrigindo bug do código original)
$tipo = '';
if (!empty($p_flagTipo)) {
    if ($p_flagTipo === 'Lo') $tipo = 'Loira';
    elseif ($p_flagTipo === 'Mo') $tipo = 'Morena';
    elseif ($p_flagTipo === 'Mu') $tipo = 'Mulata';
}

// Constrói array de FOTOS PROFISSIONAIS (imagemCentral 1-8)
$fotosProfissionais = [];
for ($i = 1; $i <= 8; $i++) {
    $key = "imagemCentral{$i}";
    if (!empty($perfil[$key])) {
        $fotosProfissionais[] = 'https://vipluxuria.com/sistema/content/' . $perfil[$key];
    }
}

// Constrói array de FOTOS CASEIRAS (imagemExtra 1-6)
$fotosCaseiras = [];
if (!empty($p_flagMostraConteudoExtra) && $p_flagMostraConteudoExtra === 'S') {
    for ($i = 1; $i <= 6; $i++) {
        $key = "imagemExtra{$i}";

        // Verifica se o campo existe e não está vazio
        if (!empty($perfil[$key])) {
            $extensao = strtolower(pathinfo($perfil[$key], PATHINFO_EXTENSION));

            // Só adiciona se a extensão for de imagem
            if (in_array($extensao, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                $fotosCaseiras[] = 'https://vipluxuria.com/sistema/content/' . $perfil[$key];
            }
        }
    }
}

$itensFaco = [
    'Beijo na Boca' => $p_flagBeijoBoca ?? '',
    'Oral' => $p_flagOral ?? '',
    'Sexo Anal' => $p_flagAnal ?? '',
    'Dominação' => $p_flagDominacao ?? '',
    'Inversão' => $p_flagInversao ?? '',
    'Massagem' => $p_flagMassagem ?? '',
    'Fantasias' => $p_flagFantasias ?? '',
    'Atendo eles' => $p_flagAtendoEles ?? '',
    'Atendo elas' => $p_flagAtendoElas ?? '',
    'Atendo casais' => $p_flagAtendoCasais ?? '',
    'Acessórios' => $p_flagAcessorios ?? '',
    'Eventos' => $p_flagEventos ?? '',
    'Viagens' => $p_flagViagens ?? '',
    'Tenho amigas' => $p_flagTenhoAmigas ?? '',
];

// Separa em Sim/Não/Talvez
$facaSim = array_filter($itensFaco, fn($v) => $v === 'Sim');
$facaNao = array_filter($itensFaco, fn($v) => $v === 'Não');
$facaTalvez = array_filter($itensFaco, fn($v) => $v === 'Talvez');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index,follow">
    <meta name="description" content="Vip Luxúria é um classificados de anúncio de Acompanhantes de Porto Alegre." />
    <meta name="keywords" content="Acompanhantes Porto Alegre, Acompanhantes em Porto Alegre, Acompanhante" />
    <title><?php echo htmlspecialchars($p_nome . ' ' . $p_sobrenome . ' - Vip Luxúria - Acompanhantes Porto Alegre', ENT_QUOTES, 'UTF-8'); ?></title>

    <!-- CSS -->
    <link href="../../css-js/estilos-2.css" rel="stylesheet" type="text/css" />
    <link href="../../css-js/menu-2.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Fontes / scripts -->
    <script src="../../css-js/cufon-yui.js" type="text/javascript"></script>
    <script src="../../css-js/nome_400.font.js" type="text/javascript"></script>
    <script src="../../css-js/titulo_400.font.js" type="text/javascript"></script>

    <script type="text/javascript">
        function gravaVotacao(voto) {
            document.form2.votacao.value = 'S';
            document.form2.voto.value = voto;
            document.form2.submit();
        }

        function indicaAmigo() {
            if (document.form3.nomeQuemIndicou.value == "") {
                alert("Informe seu nome!");
                return;
            }
            if (document.form3.emailQuemIndicou.value == "") {
                alert("Informe seu e-mail!");
                return;
            }
            if (document.form3.nomeAmigo.value == "") {
                alert("Informe o nome de seu amigo!");
                return;
            }
            if (document.form3.emailAmigo.value == "") {
                alert("Informe o e-mail de seu amigo!");
                return;
            }
            alert('Obrigada por me indicar!');
            document.form3.amigoIndicado.value = 'S';
            document.form3.submit();
        }
    </script>

</head>

<body>

    <form name="form2" method="post" action="perfil.php?id=<?php echo intval($_REQUEST['id']); ?>">
        <input type="hidden" name="votacao" id="votacao" value="N">
        <input type="hidden" name="voto" id="voto" value="N">
        <input type="hidden" name="id" value="<?php echo intval($_REQUEST['id']); ?>">
    </form>

    <div id="wrap">
        <div>
            <?php include("../php/menu-2.php"); ?>

        </div>
        <div class="degrade">
            <!-- Modal da Galeria -->

            <div class="container pt-4 pb-5">
                <!-- Nome e WhatsApp Centralizados -->
                <div class="text-center mb-5">
                    <h1 class="perfil-nome">
                        <?php echo htmlspecialchars($p_nome . ' ' . $p_sobrenome, ENT_QUOTES, 'UTF-8'); ?>
                        <?php if (!empty($p_flagVerificada) && $p_flagVerificada === 'Sim'): ?>
                            <span class="badge-verificada-inline">✓ Verificada</span>
                        <?php endif; ?>
                    </h1>

                    <?php if (!empty($p_flagWhats) && $p_flagWhats === 'S'): ?>
                        <a class="btn btn-wpp-perfil d-inline-flex align-items-center mt-3"
                            href="https://api.whatsapp.com/send?phone=<?php echo '55' . preg_replace('/\D+/', '', $p_ddd . $p_telefone); ?>&text=<?php echo urlencode('Tudo bem? Te vi no site Vip Luxuria. Gostaria de saber mais sobre o seu atendimento!'); ?>"
                            target="_blank">
                            <i class="bi bi-whatsapp me-2"></i>
                            WhatsApp: (<?php echo htmlspecialchars($p_ddd, ENT_QUOTES, 'UTF-8'); ?>) <?php echo htmlspecialchars($p_telefone, ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Galeria de Fotos Profissionais Centralizada -->
                <?php if (!empty($fotosProfissionais)): ?>
                    <div class="mb-5">
                        <div class="photos-grid mx-auto" style="max-width: 1100px;">
                            <?php foreach ($fotosProfissionais as $index => $foto): ?>
                                <div class="photo-item" onclick='openGallery(<?= json_encode($fotosProfissionais) ?>, <?= $index ?>)'>
                                    <img src="<?= htmlspecialchars($foto) ?>" alt="Foto <?= $index + 1 ?>" loading="lazy">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Layout 2 Colunas para Informações -->
                <div class="perfil-container-2col">

                    <!-- COLUNA ESQUERDA -->
                    <div class="perfil-col-left">

                        <!-- Como Sou -->
                        <div class="mb-4">
                            <h2 class="section-title-perfil">Como Sou</h2>
                            <div class="perfil-dados">
                                <?php if (isset($p_idade)): ?><div><span>Idade:</span> <strong><?= htmlspecialchars($p_idade) ?> anos</strong></div><?php endif; ?>
                                <?php if (isset($p_altura)): ?><div><span>Altura:</span> <strong><?= htmlspecialchars($p_altura) ?>m</strong></div><?php endif; ?>
                                <?php if (isset($p_peso)): ?><div><span>Peso:</span> <strong><?= htmlspecialchars($p_peso) ?>kg</strong></div><?php endif; ?>
                                <?php if (isset($p_olhos)): ?><div><span>Olhos:</span> <strong><?= htmlspecialchars($p_olhos) ?></strong></div><?php endif; ?>
                                <?php if (isset($p_cabelos)): ?><div><span>Cabelos:</span> <strong><?= htmlspecialchars($p_cabelos) ?></strong></div><?php endif; ?>
                                <?php if (isset($p_busto)): ?><div><span>Busto:</span> <strong><?= htmlspecialchars($p_busto) ?> cm</strong></div><?php endif; ?>
                                <?php if (isset($p_quadril)): ?><div><span>Quadril:</span> <strong><?= htmlspecialchars($p_quadril) ?> cm</strong></div><?php endif; ?>
                                <?php if (isset($p_cintura)): ?><div><span>Cintura:</span> <strong><?= htmlspecialchars($p_cintura) ?> cm</strong></div><?php endif; ?>
                                <?php if (isset($p_pes)): ?><div><span>Pés:</span> <strong><?= htmlspecialchars($p_pes) ?></strong></div><?php endif; ?>
                                <?php if (isset($p_manequim)): ?><div><span>Manequim:</span> <strong><?= htmlspecialchars($p_manequim) ?></strong></div><?php endif; ?>
                            </div>
                        </div>

                        <!-- Informações de Atendimento -->
                        <div class="mb-4">
                            <h2 class="section-title-perfil">Atendimento</h2>
                            <div class="perfil-dados">
                                <div><span>Cachê:</span> <strong><?= htmlspecialchars($p_cache ?? '') ?></strong></div>
                                <div><span>Locais:</span> <strong><?= htmlspecialchars($p_locais ?? '') ?></strong></div>
                                <div><span>Cidades:</span> <strong><?= htmlspecialchars($p_cidades ?? '') ?></strong></div>
                                <div><span>Horário:</span> <strong><?= htmlspecialchars($p_horario ?? $p_horarioAtendimento ?? '') ?></strong></div>
                                <?php if ($p_aceitoCartao == "Sim"): ?>
                                    <div id="cartoes"><img src="/imagens/estrutura/aceito-cartoes.png" alt="Aceito Cartões"></div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if (!empty($p_email) || !empty($p_site) || !empty($p_outros) || !empty($p_twitter)) : ?>
                            <!-- Informações de links externos -->
                            <div class="mb-4">
                                <h2 class="section-title-perfil">Outros links</h2>
                                <div class="perfil-dados">
                                    <?php if (!empty($p_email)) : ?><div><span><strong><?= htmlspecialchars($p_email ?? '') ?></strong></span></div><?php endif; ?>
                                    <?php if (!empty($p_site)) : ?><div><span><strong><?= htmlspecialchars($p_site ?? '') ?></strong></span></div><?php endif; ?>
                                    <?php if (!empty($p_outros)) : ?><div><span><strong><?= htmlspecialchars($p_outros ?? '') ?></strong></span></div><?php endif; ?>
                                    <?php if (!empty($p_twitter)) : ?><div><span><strong><?= htmlspecialchars($p_twitter ?? '') ?></strong></span></div><?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Vídeo -->
                        <?php if (!empty($p_video) && (!isset($p_flagTemVideo) || $p_flagTemVideo !== 'Nao')): ?>
                            <div class="mb-4">
                                <h2 class="section-title-perfil">Vídeo</h2>
                                <video class="w-100 rounded shadow-sm" controls>
                                    <source src="https://vipluxuria.com/sistema/content/<?= htmlspecialchars($p_video) ?>" type="video/mp4">
                                    Seu navegador não suporta a reprodução de vídeo.
                                </video>
                            </div>
                        <?php endif; ?>

                    </div>

                    <!-- COLUNA DIREITA -->
                    <div class="perfil-col-right">

                        <!-- Sobre Mim -->
                        <?php if (!empty($p_mensagem1)): ?>
                            <div class="mb-4">
                                <h2 class="section-title-perfil">Sobre Mim</h2>
                                <p style="color: rgba(255,255,255,0.85); line-height: 1.7;">
                                    <?php echo $p_mensagem1 ?>
                                </p>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($facaSim) || !empty($facaTalvez) || !empty($facaNao)): ?>
                            <!-- O que Faço -->
                            <div class="mb-4">
                                <h2 class="section-title-perfil">O que Faço</h2>

                                <?php if (!empty($facaSim)): ?>
                                    <h4 style="color: #50ff2c; font-size: 1.1rem; margin-top: 20px; margin-bottom: 10px;">✓ Sim</h4>
                                    <div class="tags-faco-sim">
                                        <?php foreach (array_keys($facaSim) as $nome): ?>
                                            <span class="badge bg-success my-1"><?= htmlspecialchars($nome) ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($facaTalvez)): ?>
                                    <h4 style="color: #ffc107; font-size: 1.1rem; margin-top: 20px; margin-bottom: 10px;">~ Talvez</h4>
                                    <div class="tags-faco-talvez">
                                        <?php foreach (array_keys($facaTalvez) as $nome): ?>
                                            <span class="badge bg-warning my-1"><?= htmlspecialchars($nome) ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($facaNao)): ?>
                                    <h4 style="color: #ff3a65; font-size: 1.1rem; margin-top: 20px; margin-bottom: 10px;">✗ Não</h4>
                                    <div class="tags-faco-nao">
                                        <?php foreach (array_keys($facaNao) as $nome): ?>
                                            <span class="badge bg-danger my-1"><?= htmlspecialchars($nome) ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <!-- Fotos Caseiras -->
                        <?php if (!empty($fotosCaseiras)): ?>
                            <div class="mb-4">
                                <h2 class="section-title-perfil">Fotos Caseiras</h2>
                                <div class="photos-grid-caseiras mx-auto">
                                    <?php foreach ($fotosCaseiras as $index => $foto): ?>
                                        <div class="photo-item" onclick='openGallery(<?= json_encode($fotosCaseiras) ?>, <?= $index ?>)'>
                                            <img src="<?= htmlspecialchars($foto) ?>" alt="Foto caseira <?= $index + 1 ?>" loading="lazy">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>

                </div>

                <div class="mt-5"></div>
                <?php include '../profile-badges.php' ?>

                <?php include 'dicas-e-duvidas.php' ?>

            </div>

            <div class="modal fade" id="galleryModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-fullscreen">
                    <div class="modal-content bg-dark border-0">
                        <button type="button"
                            class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                            data-bs-dismiss="modal"
                            aria-label="Fechar"></button>


                        <div class="modal-body d-flex align-items-center justify-content-center p-0">
                            <div id="galleryCarousel"
                                class="carousel slide w-100"
                                data-bs-touch="true"
                                data-bs-interval="false">

                                <div class="carousel-inner carousel-inner-profile" id="carouselImages"></div>

                                <button class="carousel-control-prev"
                                    type="button"
                                    data-bs-target="#galleryCarousel"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </button>

                                <button class="carousel-control-next"
                                    type="button"
                                    data-bs-target="#galleryCarousel"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="rodape"><?php include("../rodape-novo.php"); ?></div>
    </div><!-- WRAP -->

    <script type="text/javascript">
        Cufon.now();
    </script>
    <?php include("../php/google.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let galleryModal;

        document.addEventListener('DOMContentLoaded', () => {
            galleryModal = new bootstrap.Modal(
                document.getElementById('galleryModal')
            );
        });

        function openGallery(images, startIndex) {
            const carouselInner = document.getElementById('carouselImages');
            carouselInner.innerHTML = '';

            images.forEach((src, index) => {
                carouselInner.innerHTML += `
            <div class="carousel-item ${index === startIndex ? 'active' : ''}">
                <img src="${src}"
                     class="d-block mx-auto"
     style="
        max-width: 100%;
        max-height: 90vh;
        object-fit: contain;
     ">
            </div>
        `;
            });

            galleryModal.show();
        }
    </script>
</body>

</html>