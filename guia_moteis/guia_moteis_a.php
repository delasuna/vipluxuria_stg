<?php 
$conexao = require_once '../php/conecta_mysql.php';  

$sql = "SELECT * FROM seo, tipoSeo WHERE seo.idTipoSeo = tipoSeo.idTipoSeo AND descricao = 'GuiasDeMotel'";
$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Impossível visualizar SEO: " . mysqli_error($conexao) . '<br>');
}

if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    $title = $row['title'];
    $description = $row['description'];
    $keywords = $row['keywords'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR"> 

<?php include 'head.php'; ?>

<body>
<div id="wrap">
    <div id="bg-rosa">
        <div id="topo">
            <?php include("../php/topo-2.php"); ?>
        </div><!--TOPO-->
        <div id="menu">
            <?php include("../php/menu-2.php"); ?>
        </div><!--MENU-->
    </div><!--BG ROSA-->
    <div id="bg-couro">    
        <div id="principal">
            <div id="principal-content-full">
                <div id="coluna-full">
                    <div id="titulo-pagina"><img src="../imagens/estrutura/titulo-guia-moteis.png" width="760" height="41" /></div>            
                    <?php
                    // Lista de banners de motéis
                    $banners = [
                        ["link" => "https://www.foumotel.com.br/", "img" => "fou.png"],
                        ["link" => "https://www.motelmedieval.com.br/", "img" => "medieval.png"],
                        ["link" => "https://www.motelsherwood.com.br/", "img" => "sherwood.png"],
                        ["link" => "https://moteisvisavis.com.br/porto-alegre", "img" => "vis-a-vis.png"],
                        ["link" => "https://www.motelcalidon.com.br/", "img" => "calidon.png"],
                        ["link" => "https://motelcozumel.com.br/", "img" => "cozumel.png"],
                        ["link" => "https://www.moteldosalpes.com.br/", "img" => "alpes.png"],
                        ["link" => "https://www.motelsahara.com.br/", "img" => "sahara.png"]
                    ];

                    foreach ($banners as $banner) {
                        echo '<a href="'.htmlspecialchars($banner['link']).'" target="_blank"><img src="../imagens/banner-moteis/'.$banner['img'].'" /></a><br><br>';
                    }
                    ?>
                    <div class="clear"></div>                    
                </div><!-- COLUNA-FULL -->
                
                <div class="clear"></div>

                <div id="box-texto">
                    <h2>Guia de Motéis</h2>
                    <p>Nessa pagina vocês vão encontrar link e endereço para os melhores motéis de Porto Alegre e grande Porto Alegre.</p><br><br>
                    
                    <h2>O que é um motel?</h2>
                    <p>Os motéis são estabelecimentos que oferecem quartos privativos e confortáveis para momentos de intimidade. Ao contrário dos hotéis convencionais, os motéis geralmente são voltados para estadias curtas, onde casais e indivíduos podem aproveitar a privacidade e a discrição em um ambiente projetado especificamente para encontros românticos.</p>
                </div>                

            </div><!--PRINCIPAL CONTENT FULL-->
        </div><!--PRINCIPAL-->
    </div><!--BG-COURO-->
    <div id="rodape">
        <?php include("../php/rodape-2.php"); ?>
    </div><!--RODAPE-->
    <div id="tags">
        <?php include("../php/tags-moteis.php"); ?>
    </div><!--TAGS-->
</div><!--wrap-->
<script type="text/javascript"> Cufon.now(); </script>
<?php include("../php/google.php"); ?>

</body>
</html>
