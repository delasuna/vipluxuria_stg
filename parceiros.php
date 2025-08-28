<?php
$conexao = require_once 'php/conecta_mysql.php';

// SEO - Parceiros
$sql_seo = "SELECT * FROM seo 
            INNER JOIN tipoSeo ON seo.idTipoSeo = tipoSeo.idTipoSeo 
            WHERE descricao = 'Parceiros'";

$resultado_seo = mysqli_query($conexao, $sql_seo);
if (!$resultado_seo) {
    die("Impossível visualizar SEO: " . mysqli_error($conexao));
}

$seo = mysqli_fetch_assoc($resultado_seo);
$title = $seo['title'] ?? '';
$description = $seo['description'] ?? '';
$keywords = $seo['keywords'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="robots" content="index,follow">
<meta name="description" content="<?= htmlspecialchars($description) ?>">
<meta name="keywords" content="<?= htmlspecialchars($keywords) ?>">

<title><?= htmlspecialchars($title) ?></title>

<!--CSS-->
<link href="/css-js/estilos-2.css" rel="stylesheet" type="text/css">
<link href="/css-js/menu-2.css" rel="stylesheet" type="text/css">
<!--FONTES-->
<script src="/css-js/cufon-yui.js" type="text/javascript"></script>
<script src="/css-js/nome_400.font.js" type="text/javascript"></script>
<script src="/css-js/titulo_400.font.js" type="text/javascript"></script>
<!--FONTES-->
</head>
<body>
<div id="wrap">
    <div id="bg-rosa">
        <div id="topo"><?php include("php/topo-2.php"); ?></div>
        <div id="menu"><?php include("php/menu-2.php"); ?></div>
    </div>

    <div id="bg-couro">
        <div id="principal">
            <div id="principal-content-full">
                <div id="coluna-full">
                    <div id="titulo-pagina"><img src="/imagens/estrutura/titulo-parceiros.png" width="760" height="41"></div>
                    <div id="icone"><img src="/imagens/estrutura/icone-parceiros.png" width="90" height="90"></div>

                    <div id="parceiros">
                        <p><strong>Seja nosso Parceiro!</strong></p>
                        <p>
                            Para fazer uma parceria com o nosso site, copie o código-fonte abaixo, e cole em seu site.
                            Envie-nos um e-mail (<a href="mailto:vipluxuria@hotmail.com">vipluxuria@hotmail.com</a>) informando que você deseja ser nosso parceiro, e junto, anexe o seu banner (.gif, .jpg, .png e .swf - no formato 468 x 60 pixels) ou código-fonte para incorporação.
                        </p>
                        <div style="text-align:center; margin:20px 0;">
                            <a href="https://www.vipluxuria.com" target="_blank">
                                <img src="/imagens/parceiros/vip-luxuria.gif" alt="Vip Luxúria">
                            </a>
                        </div>
                        <pre>
<a href="https://www.vipluxuria.com" target="_blank">
<img src="https://vipluxuria.com/imagens/parceiros/vip-luxuria.gif" 
alt="Vip Luxúria - O guia erótico mais completo do Brasil" border="0">
</a>
                        </pre>
                        <p><em>Obs.: Somente aceitamos Parceiros fora da região de Porto Alegre e Grande Porto Alegre. Agradecemos a compreensão.</em></p>
                    </div>

                    <?php
                    // Parceiros
                    $sql_parceiros = "SELECT parceiro.idParceiro, parceirotitulo.idParceiroTitulo, parceirotitulo.titulo, parceiro.descricao, parceiro.imagem, parceiro.flagSWF
                                      FROM parceiro
                                      INNER JOIN parceirotitulo ON parceiro.idParceiroTitulo = parceirotitulo.idParceiroTitulo
                                      ORDER BY parceirotitulo.titulo";

                    $resultado_parceiros = mysqli_query($conexao, $sql_parceiros);
                    if (!$resultado_parceiros) {
                        die("Impossível visualizar os parceiros: " . mysqli_error($conexao));
                    }

                    $tituloAux = '';
                    $primeiroTitulo = true;

                    while ($row = mysqli_fetch_assoc($resultado_parceiros)) {
                        $idParceiro = $row['idParceiro'];
                        $titulo = $row['titulo'];
                        $descricao = $row['descricao'];
                        $imagem = $row['imagem'];
                        $flagSWF = $row['flagSWF'];

                        if ($tituloAux != $titulo) {
                            if (!$primeiroTitulo) echo "</div>";
                            $primeiroTitulo = false;
                            echo "<div class='bloco-parceiros'><h3>" . htmlspecialchars($titulo) . "</h3>";
                        }
                        $tituloAux = $titulo;

                        echo "<div class='bn-parceiros'>";
                        if ($flagSWF === "S" && $imagem !== "") {
                            ?>
                            <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" 
                                    codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" 
                                    width="468" height="60">
                                <param name="movie" value="<?php echo "/sistema/content/".$imagem; ?>">
                                <param name="quality" value="high">
                                <embed src="<?php echo "/sistema/content/".$imagem; ?>" 
                                       quality="high" 
                                       pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" 
                                       type="application/x-shockwave-flash" width="468" height="60"></embed>
                            </object>
                            <?php
                        } else if ($imagem != "") {
                            echo '<a href="'.htmlspecialchars($descricao).'" target="_blank"><img src="/sistema/content/'.$imagem.'" border="0" height="60" width="468"></a>';
                        } else {
                            // Permite HTML cru
                            echo html_entity_decode($descricao);
                        }
                        echo "</div>";
                    }
                    if (!$primeiroTitulo) echo "</div>"; // fecha o último bloco
                    ?>

                    <div class="divisor" style="width:850px; margin:30px auto;"></div>
                    <div class="clear"></div>

                    <?php include("php/banner-parceiros.php"); ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>

    <div id="rodape"><?php include("php/rodape-2.php"); ?></div>
    <div id="tags"><?php include("php/tags-parceiros.php"); ?></div>
</div>

<script type="text/javascript"> Cufon.now(); </script>
<?php include("php/google.php"); ?>

</body>
</html>
