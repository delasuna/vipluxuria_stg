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
<link href="https://vipluxuria.com/css-js/estilos-2.css" rel="stylesheet" type="text/css" />
<link href="https://vipluxuria.com/css-js/menu-2.css" rel="stylesheet" type="text/css" />
<link href="https://vipluxuria.com/css-js/ampliacao-2.css" rel="stylesheet" type="text/css" />

<!-- Fontes / scripts -->
<script src="https://vipluxuria.com/css-js/cufon-yui.js" type="text/javascript"></script>
<script src="https://vipluxuria.com/css-js/nome_400.font.js" type="text/javascript"></script>
<script src="https://vipluxuria.com/css-js/titulo_400.font.js" type="text/javascript"></script>
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

</head>
<body>

<form name="form2" method="post" action="perfil.php?id=<?php echo intval($_REQUEST['id']); ?>">
    <input type="hidden" name="votacao" id="votacao" value="N">
    <input type="hidden" name="voto" id="voto" value="N">
    <input type="hidden" name="id" value="<?php echo intval($_REQUEST['id']); ?>">
</form>

<div id="wrap">
    <div id="bg-rosa" style="position:absolute !important;">
        <div id="topo"><?php include("../php/topo-2.php"); ?></div>
        <div id="menu"><?php include("../php/menu-2.php"); ?></div>
    </div>

    <div id="bg-couro">
        <div id="principal">
            <div id="principal-perfil">
                <div id="perfil-content">
                    <div id="coluna-perfil-esq">
                        <div class="nome-acompanhante"><?php echo htmlspecialchars($p_nome . ' ' . $p_sobrenome, ENT_QUOTES, 'UTF-8'); ?></div>

                        <div id="telefone">
                            <?php
                            // operadoras
                            $opMap = [1=>'Oi',2=>'Tim',3=>'Claro',4=>'Vivo'];
                            if (!empty($p_idOperadora) || !empty($p_telefone)) {
                                $operadora = (!empty($p_idOperadora) && isset($opMap[$p_idOperadora])) ? $opMap[$p_idOperadora] : '';
                                if (!empty($p_flagWhats) && $p_flagWhats === 'S') {
                                    echo "<p class='n-whatsapp-op'>(" . htmlspecialchars($p_ddd, ENT_QUOTES, 'UTF-8') . ") " . htmlspecialchars($p_telefone, ENT_QUOTES, 'UTF-8') . ($operadora ? " <span class='operadora'>($operadora)</span>" : "") . "</p>";
                                } else {
                                    echo "<p class='n-telefone'>(" . htmlspecialchars($p_ddd, ENT_QUOTES, 'UTF-8') . ") " . htmlspecialchars($p_telefone, ENT_QUOTES, 'UTF-8') . ($operadora ? " <span class='operadora'>($operadora)</span>" : "") . "</p>";
                                }
                            }
                            if (!empty($p_telefone2)) {
                                $operadora2 = (!empty($p_idOperadora2) && isset($opMap[$p_idOperadora2])) ? $opMap[$p_idOperadora2] : '';
                                if (!empty($p_flagWhats2) && $p_flagWhats2 === 'S') {
                                    echo "<p class='n-whatsapp-op'>(" . htmlspecialchars($p_ddd2, ENT_QUOTES, 'UTF-8') . ") " . htmlspecialchars($p_telefone2, ENT_QUOTES, 'UTF-8') . ($operadora2 ? " <span class='operadora'>($operadora2)</span>" : "") . "</p>";
                                } else {
                                    echo "<p class='n-telefone'>(" . htmlspecialchars($p_ddd2, ENT_QUOTES, 'UTF-8') . ") " . htmlspecialchars($p_telefone2, ENT_QUOTES, 'UTF-8') . ($operadora2 ? " <span class='operadora'>($operadora2)</span>" : "") . "</p>";
                                }
                            }
                            ?>
                            <p class="aviso">Ligue e diga que me viu no Vip Luxúria!</p>
                        </div><!--TELEFONE-->

                        <div class="clear"></div>

                        <?php if (!empty($p_flagWhats) && $p_flagWhats === 'S'): ?>
                            <div id="bt-whatsapp">
                                <a href="https://api.whatsapp.com/send?phone=<?php echo '55' . preg_replace('/\D+/', '', $p_ddd . $p_telefone); ?>&text=<?php echo urlencode('Tudo bem? Te vi no site Vip Luxuria. Por gentileza, gostaria de saber mais sobre o seu atendimento!'); ?>" target="_blank">
                                    <img src="/imagens/estrutura/bt-whatsapp.png" width="264" height="48" alt="Whatsapp" />
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($p_flagSexoVirtual) && $p_flagSexoVirtual === 'S'): ?>
                            <div id="bt-video">
                                <a href="https://api.whatsapp.com/send?phone=<?php echo '55' . preg_replace('/\D+/', '', $p_ddd . $p_telefone); ?>&text=<?php echo urlencode('Tudo bem? Te vi no site Vip Luxuria. Gostaria de saber sobre Sexo Virtual!'); ?>" target="_blank">
                                    <img src="/imagens/estrutura/bt-video.png" width="264" height="48" alt="Meu Vídeo" />
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($p_email) || !empty($p_site) || !empty($p_outros) || !empty($p_twitter)): ?>
                            <div class="linha-horizontal"></div>
                            <div id="contatos">
                                <?php if (!empty($p_email)) echo '<p class="e-mail">' . htmlspecialchars($p_email, ENT_QUOTES, 'UTF-8') . '</p>'; ?>
                                <?php if (!empty($p_site)) echo '<p class="site">' . htmlspecialchars($p_site, ENT_QUOTES, 'UTF-8') . '</p>'; ?>
                                <?php if (!empty($p_twitter)) echo '<p class="twitter">' . htmlspecialchars($p_twitter, ENT_QUOTES, 'UTF-8') . '</p>'; ?>
                                <?php if (!empty($p_outros)) echo '<p class="outros">' . htmlspecialchars($p_outros, ENT_QUOTES, 'UTF-8') . '</p>'; ?>
                            </div>
                        <?php endif; ?>

                        <div class="linha-horizontal"></div>
                        <div id="atendimento">
                            <h3>Atendimento</h3>
                            <ul>
                                <li><span class="rotulo">Horários:</span> <?php echo htmlspecialchars($p_horario ?? $p_horarioAtendimento ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                                <li><span class="rotulo">Cachê:</span> <?php echo htmlspecialchars($p_cache ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                                <li><span class="rotulo">Locais:</span> <?php echo htmlspecialchars($p_locais ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                                <li><span class="rotulo">Cidades:</span> <?php echo htmlspecialchars($p_cidades ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                            </ul>

                            <?php if (!empty($p_aceitoCartao) && $p_aceitoCartao === 'Sim'): ?>
                                <div id="cartoes"><img src="/imagens/estrutura/aceito-cartoes.png" alt="Aceito Cartões"/></div>
                            <?php endif; ?>

                        </div>
                        <div class="linha-horizontal"></div>

                        <?php if (!empty($p_video) && (!isset($p_flagTemVideo) || $p_flagTemVideo !== 'Nao')): ?>
                            <div id="video">
                                <h3>Vídeo - Mídia de Comparação</h3>
                                <video width="320" height="240" controls>
                                    <source src="<?php echo htmlspecialchars('https://vipluxuria.com/sistema/content/'.$p_video, ENT_QUOTES, 'UTF-8'); ?>" type="video/mp4">
                                </video>
                            </div>
                            <div class="linha-horizontal"></div>
                        <?php endif; ?>

                        <?php
                        if (!empty($p_flagMostraConteudoExtra) && $p_flagMostraConteudoExtra === 'S') {
                            if (!empty($p_imagemExtra1) || !empty($p_imagemExtra2) || !empty($p_imagemExtra3)) {
                                echo '<div id="fotos-caseiras"><h3>Fotos Caseiras</h3>';
                                for ($i = 1; $i <= 6; $i++) {
                                    $k = 'imagemExtra' . $i;
                                    if (!empty($perfil[$k])) {
                                        $src = 'https://vipluxuria.com/sistema/content/' . $perfil[$k];
                                        echo '<div class="fc-thumb"><a href="'.htmlspecialchars($src, ENT_QUOTES, 'UTF-8').'" data-fancybox="images"><img src="'.htmlspecialchars($src, ENT_QUOTES, 'UTF-8').'" width="100" height="100" alt="Caseira"/></a></div>';
                                    }
                                }
                                echo '<div class="clear"></div></div><div class="linha-horizontal"></div>';
                            }
                        }
                        ?>

                        <div id="sou">
                            <h3>Como Sou</h3>
                            <ul>
                                <li><span class="rotulo">Idade:</span> <?php echo htmlspecialchars($p_idade ?? '', ENT_QUOTES, 'UTF-8'); ?> anos</li>
                                <li><span class="rotulo">Altura:</span> <?php echo htmlspecialchars($p_altura ?? '', ENT_QUOTES, 'UTF-8'); ?>m</li>
                                <li><span class="rotulo">Peso:</span> <?php echo htmlspecialchars($p_peso ?? '', ENT_QUOTES, 'UTF-8'); ?> Kg</li>
                                <li><span class="rotulo">Olhos:</span> <?php echo htmlspecialchars($p_olhos ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                                <li><span class="rotulo">Cabelos:</span> <?php echo htmlspecialchars($p_cabelos ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                                <li><span class="rotulo">Busto:</span> <?php echo htmlspecialchars($p_busto ?? '', ENT_QUOTES, 'UTF-8'); ?> cm</li>
                                <li><span class="rotulo">Quadril:</span> <?php echo htmlspecialchars($p_quadril ?? '', ENT_QUOTES, 'UTF-8'); ?> cm</li>
                                <li><span class="rotulo">Cintura:</span> <?php echo htmlspecialchars($p_cintura ?? '', ENT_QUOTES, 'UTF-8'); ?> cm</li>
                                <li><span class="rotulo">Pés:</span> <?php echo htmlspecialchars($p_pes ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                                <li><span class="rotulo">Manequim:</span> <?php echo htmlspecialchars($p_manequim ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                            </ul>
                        </div>

                        <div id="faco">
                            <h3>O que Faço</h3>
                            <ul>
                                <li><span class="rotulo">Beijo na Boca?</span> <?php echo htmlspecialchars($p_flagBeijoBoca ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                                <li><span class="rotulo">Faço Oral?</span> <?php echo htmlspecialchars($p_flagOral ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                                <li><span class="rotulo">Faço Anal?</span> <?php echo htmlspecialchars($p_flagAnal ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                                <li><span class="rotulo">Faço Dominação?</span> <?php echo htmlspecialchars($p_flagDominacao ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                                <li><span class="rotulo">Faço Inversão?</span> <?php echo htmlspecialchars($p_flagInversao ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                                <li><span class="rotulo">Atendo Eles?</span> <?php echo htmlspecialchars($p_flagAtendoEles ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                                <li><span class="rotulo">Atendo Elas?</span> <?php echo htmlspecialchars($p_flagAtendoElas ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                                <li><span class="rotulo">Atendo Casais?</span> <?php echo htmlspecialchars($p_flagAtendoCasais ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                                <li><span class="rotulo">Acessórios?</span> <?php echo htmlspecialchars($p_flagAcessorios ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                                <li><span class="rotulo">Eventos?</span> <?php echo htmlspecialchars($p_flagEventos ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                                <li><span class="rotulo">Viagens?</span> <?php echo htmlspecialchars($p_flagViagens ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                                <li><span class="rotulo">Tenho Amigas?</span> <?php echo htmlspecialchars($p_flagTenhoAmigas ?? '', ENT_QUOTES, 'UTF-8'); ?></li>
                            </ul>
                        </div>

                        <div class="clear"></div>
                    </div><!-- COLUNA ESQ -->

                    <div id="coluna-perfil-dir">
                        <div class="apresentacao"><?php echo $p_mensagem1 ?></div>

                        <div id="fotos">
                            <div id="thumbs-fotos">
                                <ul>
                                    <?php
                                    for ($i = 1; $i <= 8; $i++) {
                                        $k = "imagemCentral{$i}";
                                        if (!empty($perfil[$k])) {
                                            $src = '/sistema/content/' . $perfil[$k];
                                            echo '<li class="thumbPerfil"><a href="javascript:loadFoto(' . ($i-1) . ');"><img src="https://vipluxuria.com'.htmlspecialchars($src, ENT_QUOTES, 'UTF-8').'" width="50" height="50" alt="Imagem de '.htmlspecialchars($p_nome.' '.$p_sobrenome, ENT_QUOTES, 'UTF-8').' ' . $i . '" /></a></li>';
                                        }
                                    }
                                    ?>
                                </ul>
                            </div><!-- THUMBS -->
                            <div class="clear"></div>
                            <div id="ampliacao">
                                <div class="colunaFotoH" id="colunaFoto" style="display:none;"> </div>
                                <div id="imgLoader"> <img src="../imagens/ajax-loader.gif" alt="Carregando..."  /> </div>
                                <div align="center">
                                    <img src="<?php echo htmlspecialchars('https://vipluxuria.com/sistema/content/'.$p_imagemCentral1 ?? '', ENT_QUOTES, 'UTF-8'); ?>" id="fotoPerfil" />
                                </div>
                            </div><!-- Fim Ampliacao -->
                        </div><!-- FOTOS -->

                        <div class="clear"></div>

                        <div id="me-indique">
                            <h3>Me indique para um Amigo</h3>
                            <form name="form3" method="post" action="/perfil/<?php echo intval($_REQUEST['id']); ?>/<?php echo tirarAcentos($p_nome); ?><?php if (!empty($p_sobrenome)) echo '-' . tirarAcentos(str_replace(' ', '-', $p_sobrenome)); ?>">
                                <input type="hidden" name="amigoIndicado" id="amigoIndicado" value="N">
                                <input type="hidden" name="nomeAnunciante" id="nomeAnunciante" value="<?php echo htmlspecialchars($p_nome . ' ' . $p_sobrenome, ENT_QUOTES, 'UTF-8'); ?>">
                                <input type="hidden" name="linkAnunciante" id="linkAnunciante" value="<?php echo htmlspecialchars('https://vipluxuria.com/conteudo/perfil.php?id=' . intval($_REQUEST['id']), ENT_QUOTES, 'UTF-8'); ?>">
                                <input type="hidden" name="id" value="<?php echo intval($_REQUEST['id']); ?>">
                                <input name="nomeQuemIndicou" id="nomeQuemIndicou" type="text" placeholder="Seu Nome" />
                                <input name="emailQuemIndicou" id="emailQuemIndicou" type="text" placeholder="Seu E-mail" />
                                <input name="nomeAmigo" id="nomeAmigo" type="text" placeholder="Nome do Amigo" />
                                <input name="emailAmigo" id="emailAmigo" type="text" placeholder="E-mail do Amigo" />
                                <div class="bt-enviar"><img src="https://vipluxuria.com/imagens/estrutura/bt-enviar-indique.png" onclick="indicaAmigo()" alt="Botão para Indicar" /></div>
                            </form>
                            <div class="clear"></div>
                        </div>

                    </div><!-- COLUNA DIR -->

                    <div class="clear"></div>
                </div><!-- PERFIL CONTENT -->
            </div><!-- PRINCIPAL-PERFIL -->
        </div><!-- PRINCIPAL -->
    </div><!-- BG-COURO -->

    <div id="rodape"><?php include("../php/rodape-2.php"); ?></div>
    <div id="tags"><?php include("../php/tags-mulheres.php"); ?></div>
</div><!-- WRAP -->

<script type="text/javascript"> Cufon.now(); </script>
<?php include("../php/google.php"); ?>
<script type="text/javascript" src="https://vipluxuria.com/css-js/visualizador/perfil.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="/css-js/jquery.fancybox.min.js"></script>

</body>
</html>
