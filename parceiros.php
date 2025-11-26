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
mysqli_free_result($resultado_seo);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php include 'head.php'; ?>

<body>
    <div id="wrap">
        <div>
            <?php include("php/menu-2.php"); ?>
        </div>
        
        <div class="degrade text-light py-4">
            <div class="container">
                
                <!-- Título -->
                <div class="text-center mb-5">
                    <h1 class="display-6 fw-bold">Parceiros</h1>
                </div>

                <!-- Seja nosso parceiro -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="p-4 bg-secondary rounded">
                            <h2 class="mb-3">Seja nosso Parceiro!</h2>
                            <p>Para fazer uma parceria com o nosso site, copie o código-fonte abaixo, e cole em seu site.
                            Envie-nos um e-mail (<a href="mailto:vipluxuria@hotmail.com" class="text-warning">vipluxuria@hotmail.com</a>) informando que você deseja ser nosso parceiro, e junto, anexe o seu banner (.gif, .jpg, .png e .swf - no formato 468 x 60 pixels) ou código-fonte para incorporação.</p>
                            
                            <div class="text-center my-4">
                                <a href="https://www.vipluxuria.com" target="_blank">
                                    <img src="/imagens/parceiros/vip-luxuria.gif" alt="Vip Luxúria" class="img-fluid">
                                </a>
                            </div>
                            
                            <pre class="bg-dark p-3 rounded">
                                <code>
                                    &lt;a href="https://www.vipluxuria.com" target="_blank"&gt;
                                    &lt;img src="https://vipluxuria.com/imagens/parceiros/vip-luxuria.gif" 
                                    alt="Vip Luxúria - O guia erótico mais completo do Brasil" border="0"&gt;
                                    &lt;/a&gt;
                                </code>
                            </pre>
                            
                            <p class="alert alert-info mt-3">
                                <em>Obs.: Somente aceitamos Parceiros fora da região de Porto Alegre e Grande Porto Alegre. Agradecemos a compreensão.</em>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Lista de Parceiros -->
                <?php
                $sql_parceiros = "SELECT parceiro.idParceiro, parceirotitulo.idParceiroTitulo, parceirotitulo.titulo, 
                                  parceiro.descricao, parceiro.imagem, parceiro.flagSWF
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
                        if (!$primeiroTitulo) echo '</div>';
                        $primeiroTitulo = false;
                        echo '<h3 class="mt-4 mb-3">' . htmlspecialchars($titulo) . '</h3>';
                        echo '<div class="row g-3">';
                    }
                    $tituloAux = $titulo;

                    echo '<div class="col-md-6 text-center">';
                    if ($flagSWF === "S" && $imagem !== "") {
                        ?>
                        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" 
                                codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" 
                                width="468" height="60">
                            <param name="movie" value="<?= "/sistema/content/".$imagem ?>">
                            <param name="quality" value="high">
                            <embed src="<?= "/sistema/content/".$imagem ?>" 
                                   quality="high" 
                                   pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" 
                                   type="application/x-shockwave-flash" width="468" height="60"></embed>
                        </object>
                        <?php
                    } else if ($imagem != "") {
                        echo '<a href="'.htmlspecialchars($descricao).'" target="_blank"><img src="/sistema/content/'.$imagem.'" class="img-fluid" alt="Parceiro"></a>';
                    } else {
                        echo html_entity_decode($descricao);
                    }
                    echo '</div>';
                }
                if (!$primeiroTitulo) echo '</div>';
                ?>

                <?php include("banner_informativo.php") ?>
                <?php include("banner_informativo2.php") ?>
                <?php include("banner_informativo3.php") ?>
            </div>
        </div>

        <?php include("rodape-novo.php"); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <?php include("php/google.php"); ?>
</body>
</html>