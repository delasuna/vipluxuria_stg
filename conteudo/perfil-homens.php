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
function anti_injection($str, $link = null) {
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

// Função para criar URL amigável (remove acentos etc.)


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
        $stmt = $conexao->prepare("SELECT id FROM votacaohomem WHERE idHomem = ? AND ip = ?");
        $stmt->bind_param('is', $idReq, $ip);
        $stmt->execute();
        $stmt->store_result();
        $already = $stmt->num_rows;
        $stmt->close();

        if ($already == 0) {
            if (isset($_REQUEST['voto']) && $_REQUEST['voto'] === 'aprovado') {
                $upd = $conexao->prepare("UPDATE homem SET quantidadeVotos = IFNULL(quantidadeVotos, 0) + 1 WHERE idHomem = ?");
                $upd->bind_param('i', $idReq);
                $upd->execute();
                $upd->close();
            } elseif (isset($_REQUEST['voto']) && $_REQUEST['voto'] === 'reprovado') {
                // decrementa mas não permite negativo
                $upd = $conexao->prepare("UPDATE homem SET quantidadeVotos = IF(quantidadeVotos > 0, quantidadeVotos - 1, 0) WHERE idHomem = ?");
                $upd->bind_param('i', $idReq);
                $upd->execute();
                $upd->close();
            }
            // registra IP para não votar novamente
            $ins = $conexao->prepare("INSERT INTO votacaohomem (idHomem, ip) VALUES (?, ?)");
            $ins->bind_param('is', $idReq, $ip);
            $ins->execute();
            $ins->close();
        }
    }
}

// ==================================================
// Buscar perfil da tabela 'homem' (id via REQUEST)
// ==================================================
$perfil = null;
if (!empty($_REQUEST['id']) && ($conexao instanceof mysqli)) {
    $idHomem = intval($_REQUEST['id']);
    $stmt = $conexao->prepare("SELECT * FROM homem WHERE flagAtivo = 'Sim' AND idHomem = ?");
    $stmt->bind_param('i', $idHomem);
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
function curPageURL() {
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

// Constrói array de imagens central (mantendo até 8)
$arrImgs = [];
for ($i=1; $i<=8; $i++) {
    $key = "imagemCentral{$i}";
    if (!empty($perfil[$key])) $arrImgs[] = 'https://vipluxuria.com/sistema/content/' . $perfil[$key];
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<head>
<meta charset="utf-8" />
<meta name="robots" content="index,follow">
<meta name="description" content="Vip Luxúria é um classificados de anúncio de Acompanhantes de Porto Alegre." />
<meta name="keywords" content="Acompanhantes Porto Alegre, Acompanhantes em Porto Alegre, Acompanhante" />
<title><?php echo htmlspecialchars($p_nome . ' ' . $p_sobrenome . ' - Vip Luxúria - Acompanhantes Porto Alegre', ENT_QUOTES, 'UTF-8'); ?></title>

<!-- CSS -->
<link href="../../css-js/estilos-2.css" rel="stylesheet" type="text/css" />
<link href="../../css-js/menu-2.css" rel="stylesheet" type="text/css" />
<link href="../../css-js/ampliacao-2.css" rel="stylesheet" type="text/css" />

<!-- Fontes / scripts -->
<script src="../../css-js/cufon-yui.js" type="text/javascript"></script>
<script src="../../css-js/nome_400.font.js" type="text/javascript"></script>
<script src="../../css-js/titulo_400.font.js" type="text/javascript"></script>
<script src="https://vipluxuria.com/Scripts/swfobject_modified.js" type="text/javascript"></script>

<!-- Visualizador / lightbox -->
<script type="text/javascript" src="https://vipluxuria.com/css-js/visualizador/jquery.js"></script>
<script type="text/javascript" src="https://vipluxuria.com/css-js/visualizador/jquery.lightbox-0.5.js"></script>
<script type="text/javascript" src="https://vipluxuria.com/css-js/visualizador/common.js"></script>

<script type="text/javascript">
    // array de imagens para o visualizador
    var arrImg = <?php echo json_encode($arrImgs, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE); ?>;

    function gravaVotacao(voto) {
        document.form2.votacao.value = 'S';
        document.form2.voto.value = voto;
        document.form2.submit();
    }

    function indicaAmigo() {
        if (document.form3.nomeQuemIndicou.value == "") { alert("Informe seu nome!"); return; }
        if (document.form3.emailQuemIndicou.value == "") { alert("Informe seu e-mail!"); return; }
        if (document.form3.nomeAmigo.value == "") { alert("Informe o nome de seu amigo!"); return; }
        if (document.form3.emailAmigo.value == "") { alert("Informe o e-mail de seu amigo!"); return; }
        alert('Obrigada por me indicar!');
        document.form3.amigoIndicado.value = 'S';
        document.form3.submit();
    }
</script>

<!-- desabilita botão direito (mantive como no original) -->
<script type="text/javascript">
// desabilitação do menu de contexto (original)
function desabilitaMenu(e) {
    if (window.Event) {
        if (e.which == 2 || e.which == 3) return false;
    } else {
        event.cancelBubble = true;
        event.returnValue = false;
        return false;
    }
}
function desabilitaBotaoDireito(e) {
    if (window.Event) {
        if (e.which == 2 || e.which == 3) return false;
    } else if (event.button == 2 || event.button == 3) {
        event.cancelBubble = true;
        event.returnValue = false;
        return false;
    }
}
if (window.Event) document.captureEvents(Event.MOUSEUP);
if (document.layers) document.captureEvents(Event.MOUSEDOWN);
document.oncontextmenu = desabilitaMenu;
document.onmousedown = desabilitaBotaoDireito;
document.onmouseup = desabilitaBotaoDireito;
</script>

<link rel="stylesheet" type="text/css" href="/css-js/jquery.fancybox.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

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
		<div id="topo"><?php include("../php/topo-2.php"); ?></div>
	</div>

<div class="perfil-wrapper container mt-3">
    <div class="row">
        <!-- Coluna esquerda: foto + galeria -->
        <div class="col-12 col-lg-5 mb-4">
            <div class="perfil-foto text-center d-flex">
                <img src="<?php echo htmlspecialchars('https://vipluxuria.com/sistema/content/'.$p_imagemCentral1 ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                     alt="Foto de <?php echo htmlspecialchars($p_nome . ' ' . $p_sobrenome, ENT_QUOTES, 'UTF-8'); ?>" 
                     id="fotoPerfil" 
                     class="img-fluid rounded"/>
            </div>

            <!-- Galeria -->
            <div class="perfil-galeria mt-3 d-flex flex-wrap gap-2 justify-content-center">
                <?php
                // Galeria principal
                for ($i = 1; $i <= 8; $i++) {
                    $k = "imagemCentral{$i}";
                    if (!empty($perfil[$k])) {
                        $src = 'https://vipluxuria.com/sistema/content/' . $perfil[$k];
                        echo '<img class="thumb-galeria img-thumbnail" src="'.htmlspecialchars($src, ENT_QUOTES, 'UTF-8').'" 
                              onclick="document.getElementById(\'fotoPerfil\').src=\''.htmlspecialchars($src, ENT_QUOTES, 'UTF-8').'\'" />';
                    }
                }

                // Fotos caseiras
                if (!empty($p_flagMostraConteudoExtra) && $p_flagMostraConteudoExtra === 'S') {
                    for ($i = 1; $i <= 6; $i++) {
                        $k = 'imagemExtra' . $i;
                        if (!empty($perfil[$k])) {
                            $src = 'https://vipluxuria.com/sistema/content/' . $perfil[$k];
                            echo '<img class="thumb-galeria img-thumbnail" src="'.htmlspecialchars($src, ENT_QUOTES, 'UTF-8').'" 
                                  onclick="document.getElementById(\'fotoPerfil\').src=\''.htmlspecialchars($src, ENT_QUOTES, 'UTF-8').'\'" />';
                        }
                    }
                }
                ?>
            </div>

            <!-- Vídeo -->
            <?php if (!empty($p_video) && (!isset($p_flagTemVideo) || $p_flagTemVideo !== 'Nao')): ?>
                <div class="perfil-video mt-5">
                    <video class="w-100 rounded shadow-sm" controls>
                        <source src="https://vipluxuria.com/sistema/content/<?php echo htmlspecialchars($p_video, ENT_QUOTES, 'UTF-8'); ?>" type="video/mp4">
                        Seu navegador não suporta a reprodução de vídeo.
                    </video>
                </div>
            <?php endif; ?>
        </div>

        <!-- Coluna direita: informações -->
        <div class="col-12 col-lg-7">
            <div class="perfil-info mb-3">
                <h1 class="perfil-nome text-center">
                    <?php echo htmlspecialchars($p_nome . ' ' . $p_sobrenome, ENT_QUOTES, 'UTF-8'); ?>
                </h1>

                <!-- Infos básicas -->
                 <div>
                    <!-- Botão WhatsApp -->
                     <div class="text-center w-100">
                         <?php if (!empty($p_flagWhats) && $p_flagWhats === 'S'): ?>
                             <a class="btn btn-success d-inline-flex align-items-center mb-3 w-75 justify-content-center"
                             href="https://api.whatsapp.com/send?phone=<?php echo '55' . preg_replace('/\D+/', '', $p_ddd . $p_telefone); ?>&text=<?php echo urlencode('Tudo bem? Te vi no site Vip Luxuria. Gostaria de saber mais sobre o seu atendimento!'); ?>" 
                             target="_blank">
                                 <i class="bi bi-whatsapp me-2"></i>
                                 WhatsApp: (<?php echo htmlspecialchars($p_ddd, ENT_QUOTES, 'UTF-8'); ?>) <?php echo htmlspecialchars($p_telefone, ENT_QUOTES, 'UTF-8'); ?>
                             </a>
                         <?php endif; ?>
                     </div>
                    <div class="perfil-dados">
                        <div><span>Cachê</span><strong><?php echo htmlspecialchars($p_cache ?? '', ENT_QUOTES, 'UTF-8'); ?></strong></div>
                        <div><span>Locais</span><strong><?php echo htmlspecialchars($p_locais ?? '', ENT_QUOTES, 'UTF-8'); ?></strong></div>
                        <div><span>Cidades</span><strong><?php echo htmlspecialchars($p_cidades ?? '', ENT_QUOTES, 'UTF-8'); ?></strong></div>
                        <div><span>Horário</span><strong><?php echo htmlspecialchars($p_horario ?? $p_horarioAtendimento ?? '', ENT_QUOTES, 'UTF-8'); ?></strong></div>
                    </div>
                 </div>
            </div>

            <!-- Sobre mim -->
            <div class="bloco sobre-mim mb-3 p-3 rounded">
                <h2>Sobre Mim</h2>
                <p><?php echo nl2br($p_mensagem1 ?? ''); ?></p>
            </div>

            <!-- Como sou e O que faço -->
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <div class="bloco como-sou p-3 rounded h-100">
                        <h2>Como Sou</h2>
                        <ul class="list-unstyled">
                            <li><span>Idade:</span> <?php echo htmlspecialchars($p_idade ?? '', ENT_QUOTES, 'UTF-8'); ?> anos</li>
                            <li><span>Altura:</span> <?php echo htmlspecialchars($p_altura ?? '', ENT_QUOTES, 'UTF-8'); ?>m</li>
                            <li><span>Peso:</span> <?php echo htmlspecialchars($p_peso ?? '', ENT_QUOTES, 'UTF-8'); ?>kg</li>
                            <li><span>Olhos:</span> <?php echo htmlspecialchars($p_olhos ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                            <li><span>Cabelos:</span> <?php echo htmlspecialchars($p_cabelos ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                            <li><span>Busto:</span> <?php echo htmlspecialchars($p_busto ?? '', ENT_QUOTES, 'UTF-8'); ?> cm</li>
                            <li><span>Quadril:</span> <?php echo htmlspecialchars($p_quadril ?? '', ENT_QUOTES, 'UTF-8'); ?> cm</li>
                            <li><span>Cintura:</span> <?php echo htmlspecialchars($p_cintura ?? '', ENT_QUOTES, 'UTF-8'); ?> cm</li>
                            <li><span>Pés:</span> <?php echo htmlspecialchars($p_pes ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                            <li><span>Manequim:</span> <?php echo htmlspecialchars($p_manequim ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="bloco o-que-faco p-3 rounded h-100">
                        <h2>O que Faço</h2>
                        <div class="tags-faco">
                            <?php if (!empty($p_flagBeijoBoca) && $p_flagBeijoBoca === 'Sim') echo '<span class="badge bg-dark">Beijo na Boca</span>'; ?>
                            <?php if (!empty($p_flagOral) && $p_flagOral === 'Sim') echo '<span class="badge bg-dark">Oral</span>'; ?>
                            <?php if (!empty($p_flagAnal) && $p_flagAnal === 'Sim') echo '<span class="badge bg-dark">Sexo Anal</span>'; ?>
                            <?php if (!empty($p_flagDominacao) && $p_flagDominacao === 'Sim') echo '<span class="badge bg-dark">Dominação</span>'; ?>
                            <?php if (!empty($p_flagInversao) && $p_flagInversao === 'Sim') echo '<span class="badge bg-dark">Inversão</span>'; ?>
                            <?php if (!empty($p_flagMassagem) && $p_flagMassagem === 'Sim') echo '<span class="badge bg-dark">Massagem</span>'; ?>
                            <?php if (!empty($p_flagFantasias) && $p_flagFantasias === 'Sim') echo '<span class="badge bg-dark">Fantasias</span>'; ?>
                            <?php if (!empty($p_flagAtendoEles) && $p_flagAtendoEles === 'Sim') echo '<span class="badge bg-dark">Atendo eles</span>'; ?>
                            <?php if (!empty($p_flagAtendoElas) && $p_flagAtendoElas === 'Sim') echo '<span class="badge bg-dark">Atendo elas</span>'; ?>
                            <?php if (!empty($p_flagAtendoCasais) && $p_flagAtendoCasais === 'Sim') echo '<span class="badge bg-dark">Atendo casais</span>'; ?>
                            <?php if (!empty($p_flagAcessorios) && $p_flagAcessorios === 'Sim') echo '<span class="badge bg-dark">Acessórios</span>'; ?>
                            <?php if (!empty($p_flagEventos) && $p_flagEventos === 'Sim') echo '<span class="badge bg-dark">Eventos</span>'; ?>
                            <?php if (!empty($p_flagViagens) && $p_flagViagens === 'Sim') echo '<span class="badge bg-dark">Viagens</span>'; ?>
                            <?php if (!empty($p_flagTenhoAmigas) && $p_flagTenhoAmigas === 'Sim') echo '<span class="badge bg-dark">Tenho amigas</span>'; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div id="rodape"><?php include("../rodape-novo.php"); ?></div>
</div><!-- WRAP -->

<script type="text/javascript"> Cufon.now(); </script>
<?php include("../php/google.php"); ?>
<script type="text/javascript" src="https://vipluxuria.com/css-js/visualizador/perfil.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="/css-js/jquery.fancybox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
