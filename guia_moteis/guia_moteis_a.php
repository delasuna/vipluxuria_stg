<? 	$conexao = require_once '../php/conecta_mysql.php';  ?>
<?
	$sql = " SELECT * FROM seo, tipoSeo Where seo.idTipoSeo = tipoSeo.idTipoSeo AND descricao = 'GuiasDeMotel'"; 

	$resultado = mysql_query($sql, $conexao);
	if(!$resultado){
		die("Impossível visualizar SEO: " . mysql_error() . '<br>');
	}

							
	$sts = mysql_query($sql); 
	$registros = mysql_num_rows($sts);
	if ($registros>0) {
		while($row = mysql_fetch_array($resultado)) {
			$title = $row['title']; 
			$description = $row['description'];
			$keywords = $row['keywords'];     
		} 
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />  
<meta name="robots" content="index,follow">
<meta name="description" content="<?=$description?>" />
<meta name="keywords" content="<?=$keywords?>" />

<title>Guia de Motéis - Vip Luxúria</title>

<!--CSS-->
<link href="../css-js/estilos-2.css" rel="stylesheet" type="text/css" />
<link href="../css-js/menu-2.css" rel="stylesheet" type="text/css" />
<!--CSS-->
<!--FONTES-->
<script src="../css-js/cufon-yui.js" type="text/javascript"></script>
<script src="../css-js/nome_400.font.js" type="text/javascript"></script>
<script src="../css-js/titulo_400.font.js" type="text/javascript"></script>
<!--FONTES-->        
</head>

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
						<a href="https://www.foumotel.com.br/" target="_blank"><img src="../imagens/banner-moteis/fou.png"></a><br><br>
						<a href="https://www.motelmedieval.com.br/" target="_blank"><img src="../imagens/banner-moteis/medieval.png"></a><br><br>
						<a href="https://www.motelsherwood.com.br/" target="_blank"><img src="../imagens/banner-moteis/sherwood.png"></a><br><br>						
						<a href="https://moteisvisavis.com.br/porto-alegre" target="_blank"><img src="../imagens/banner-moteis/vis-a-vis.png"></a><br><br>
						
						<a href="https://www.motelcalidon.com.br/" target="_blank"><img src="../imagens/banner-moteis/calidon.png"></a><br><br>
						<a href="https://motelcozumel.com.br/" target="_blank"><img src="../imagens/banner-moteis/cozumel.png"></a><br><br>
						<a href="https://www.moteldosalpes.com.br/" target="_blank"><img src="../imagens/banner-moteis/alpes.png"></a><br><br>						
						<a href="https://www.motelsahara.com.br/" target="_blank"><img src="../imagens/banner-moteis/sahara.png"></a><br><br>						

						
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