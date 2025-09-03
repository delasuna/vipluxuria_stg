<?php
// Conexão com MySQL
$conexao = require_once '../php/conecta_mysql.php';

// Buscar SEO
$sql = "SELECT * FROM seo 
        JOIN tipoSeo ON seo.idTipoSeo = tipoSeo.idTipoSeo 
        WHERE descricao = 'Homens'";

$resultado = mysqli_query($conexao, $sql);
if (!$resultado) {
    die("Impossível visualizar SEO: " . mysqli_error($conexao) . '<br>');
}

$title = $description = $keywords = "";
if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    $title = $row['title'];
    $description = $row['description'];
    $keywords = $row['keywords'];
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<?php include 'head.php'; ?>

<body>
<div id="wrap">
    <div id="bg-rosa">
        <div id="topo">
            <?php include("../php/topo-2.php"); ?>
        </div>
        <div id="menu">
            <?php include("../php/menu-2.php"); ?>
        </div>
    </div>

    <div id="bg-couro">    
        <div id="principal">
            <div id="principal-content-full">
                <div id="coluna-full" style="padding-top:20px; text-align:center;">
                    <?php include("../php/slider-homens.php"); ?>
                    <br/>
                    <div id="titulo-pagina"><img src="/imagens/estrutura/titulo-casais.png" width="760" height="41" /></div>

                    <ul id="thumbs-homens">
                    <?php
                    $sql = "SELECT * FROM homem WHERE flagAtivo = 'Sim' ORDER BY RAND()";
                    $resultado = mysqli_query($conexao, $sql);

                    $contador = 0;
                    $comAcentos = array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú');
                    $semAcentos = array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','O','U','U','U');

                    if ($resultado && mysqli_num_rows($resultado) > 0) {
                        while($row = mysqli_fetch_assoc($resultado)) {
                            $idHomem = $row['idHomem'];
                            $nome = $row['nome'];
                            $sobrenome = $row['sobrenome'];
                            $imagemComNome = $row['imagemComNome'];
                            $contador++;

                            $urlNome = str_replace($comAcentos, $semAcentos, $nome);
                            if ($sobrenome != "") {
                                $urlSobrenome = "-" . str_replace($comAcentos, $semAcentos, str_replace(" ", "-", $sobrenome));
                            } else {
                                $urlSobrenome = "";
                            }

                            $classLi = ($contador < 7) ? "zoom_img" : "last zoom_img";
                            if ($contador >= 7) $contador = 0;
                            ?>
                            <li class="<?php echo $classLi; ?>">
                                <a href="/perfil-homens/<?php echo $idHomem . "/" . $urlNome . $urlSobrenome; ?>">
                                    <img src="<?php echo "/sistema/content/".$imagemComNome; ?>" width="112" height="149" />
                                    <p class="nome"><?php echo $nome . " " . $sobrenome; ?></p>
                                </a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                    </ul>                    
                    <div class="clear"></div>                    
                    <div class="bt-voltar"><a href="javascript:window.history.go(-1)"><img src="/imagens/estrutura/bt-voltar.png" /></a></div>                
                </div><!--COLUNA-1-->
                <div class="clear"></div>

                <div id="box-texto">
                    <h2>Casais e Homens</h2>
                    <p>Nessa pagina do Vip Luxúria você vai encontrar casais profissionais pagos, para encontros de swing!!!</p><br><br>

                    <h2>O que é Swing?</h2>
                    <p>O swing é uma prática na qual casais consentem em trocar parceiros sexualmente temporariamente, com o objetivo de vivenciar novas experiências e explorar sua sexualidade em um ambiente seguro e consensual. É importante destacar que a participação no swing é uma escolha pessoal, devendo sempre ser baseado no respeito mútuo e na comunicação aberta entre os parceiros.</p>
                </div>					
            </div><!--PRINCIPAL CONTENT-->
        </div><!--PRINCIPAL-->
    </div><!--BG-COURO-->

    <div id="rodape">
        <?php include("../php/rodape-2.php"); ?>
    </div><!--RODAPE-->
    <div id="tags">
        <?php include("../php/tags-homens.php"); ?>
    </div><!--TAGS-->
</div><!--wrap-->

<script type="text/javascript"> Cufon.now(); </script>
<?php include("../php/google.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
