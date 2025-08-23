<? 	$conexao = require_once 'php/conecta_mysql.php';  ?>
<?
	$sql = " SELECT * FROM seo, tipoSeo Where seo.idTipoSeo = tipoSeo.idTipoSeo AND descricao = 'Parceiros'";

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

<title><?=$title?></title>

<!--CSS-->
<link href="/css-js/estilos-2.css" rel="stylesheet" type="text/css" />
<link href="/css-js/menu-2.css" rel="stylesheet" type="text/css" />
<!--CSS-->
<!--FONTES-->
<script src="/css-js/cufon-yui.js" type="text/javascript"></script>
<script src="/css-js/nome_400.font.js" type="text/javascript"></script>
<script src="/css-js/titulo_400.font.js" type="text/javascript"></script>
<!--FONTES-->     
</head>

<body>
<div id="wrap">
    <div id="bg-rosa">
        <div id="topo">
            <?php include("php/topo-2.php"); ?>
        </div><!--TOPO-->
        <div id="menu">
			<?php include("php/menu-2.php"); ?>
        </div><!--MENU-->
    </div><!--BG ROSA-->
    <div id="bg-couro">    
        <div id="principal">
            <div id="principal-content-full">
            	<div id="coluna-full">
					<div id="titulo-pagina"><img src="/imagens/estrutura/titulo-parceiros.png" width="760" height="41" /></div>
					<div id="icone"><img src="/imagens/estrutura/icone-parceiros.png" width="90" height="90" /></div>

	                <div id="parceiros">
                  		<p><strong>Seja nosso Parceiro!</strong></p>
                        <p>Para fazer uma parceria com o nosso site, copie o código-fonte abaixo, e cole em seu site. Envie-nos um e-mail (<a href="mailto:vipluxuria@hotmail.com">vipluxuria@hotmail.com</a>) informando que você deseja ser nosso parceiro, e junto, anexe o seu banner (.gif, .jpg, .png e .swf - no formato 468 x 60 pixels) ou código-fonte para incorporação.</p>

								<div style="text-align: center; margin-top: 20px; margin-bottom: 20px;"><a href="https://www.vipluxuriagold.net" target="_blank" ><img src="/imagens/parceiros/vip-luxuria.gif" alt="Vip Luxúria"></a></div>                       
                       
                        <pre>&lt;a href=&quot;https://www.vipluxuriagold.net&quot; target=&quot;_blank&quot;&gt;<br />&lt;img src=&quot;/imagens/parceiros/vip-luxuria.gif&quot; <br />alt=&quot;Vip Lux&uacute;ria - O guia er&oacute;tico mais completo do Brasil&quot; border=&quot;0&quot;&gt;&lt;/a&gt;</pre> <br/>
                         
                        <p><em>Obs.: Somente aceitamos Parceiros fora da região de Porto Alegre e Grande Porto Alegre. Agradecemos a compreensão.</em></p>                       
					</div><!--Parceiros-->
                    <br />
                    <br/>
                                        
						<?
						$sql = " SELECT idParceiro, parceirotitulo.idParceiroTitulo, titulo, descricao, imagem, flagSWF "
						 	 . " FROM parceiro " 
							 . " INNER JOIN parceirotitulo ON parceiro.idParceiroTitulo = parceirotitulo.idParceiroTitulo "
							 . " ORDER BY parceirotitulo.titulo; ";		 							 

						$resultado = mysql_query($sql, $conexao);
						if(!$resultado){
							die("Impossível visualizar os parceiros: " . mysql_error() . '<br>');
						}
						$sts = mysql_query($sql);
						$registros = mysql_num_rows($sts);
						$tituloAux = "";
						$primeiroTitulo = true;
													
						if ($registros>0) {
							while($row = mysql_fetch_array($resultado)) {
								$idParceiro = $row['idParceiro'];	
								$idParceiroTitulo = $row['idParceiroTitulo'];	
								$titulo = $row['titulo'];
								$descricao = $row['descricao'];
								$imagem = $row['imagem'];
								
								$flagSWF = $row['flagSWF'];
								
								if ($tituloAux != $titulo) { 
									if (!$primeiroTitulo) { 
										echo "</div>";
									}
									$primeiroTitulo = false;
									echo "<div class='bloco-parceiros'><h3>". $titulo . "</h3>";
								}
								$tituloAux = $titulo;
								 
								 echo "<div class='bn-parceiros'>";
								 if ($flagSWF != "" && $flagSWF == "S") {  ?>
									<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0" width="468" height="60">
									  <param name=movie value='<?="/sistema/content/".$imagem?>'>
									  <param name=quality value=high>
									  <embed src='<?="../sistema/content/".$imagem?>' quality=high pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="468" height="60">
									  </embed> 
									</object> 
								
								<? 
								} else {
								   if ($imagem != "") {  ?>
									<a href="<?=$descricao?>" target="_blank"><img src="<?="../sistema/content/".$imagem?>" border="0" height="60" width="468"/></a>
								<? }  else { ?>
									<?=$descricao?>
								<? }  
								}
								echo "</div>";
							 }  
						}  
						?>				
                    </div>                    
                    <div class="divisor" style="width:850px; margin-left:auto; margin-right:auto; margin-top:30px; margin-bottom:30px;"></div>
                    <div class="clear"></div>

   					<?php include("php/banner-parceiros.php"); ?>
            </div><!--coluna-full-->
				<div class="clear"></div>		
            </div><!--PRINCIPAL CONTENT FULL-->
        </div><!--PRINCIPAL-->
	</div><!--BG-COURO-->
    <div id="rodape">
		<?php include("php/rodape-2.php"); ?>
    </div><!--RODAPE-->
    <div id="tags">
		<?php include("php/tags-parceiros.php"); ?>
    </div><!--TAGS-->
</div><!--wrap-->
<script type="text/javascript"> Cufon.now(); </script>
<?php include("php/google.php"); ?>

</body>
</html>
