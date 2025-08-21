<? 	$conexao = require_once 'php/conecta_mysql.php';  ?>
<?
	$sql = " SELECT * FROM seo, tipoSeo Where seo.idTipoSeo = tipoSeo.idTipoSeo AND descricao = 'Blog'";

	$resultado = mysql_query($sql, $conexao);
	if(!$resultado){
		die("Impossível visualizar SEO: " . mysql_error() . '<br>');
	}

							
	$sts = mysql_query($sql); 
	$registros = mysql_num_rows($sts);
	if ($registros>0) {
		while($row = mysql_fetch_array($resultado)) {
			$assunto = $row['assunto'];
			$title = $row['title']; 
			$description = $row['description'];
			$keywords = $row['keywords'];     
		} 
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="robots" content="index,follow">
<meta name="description" content="<?=$description?>" />
<meta name="keywords" content="<?=$keywords?>" />

<title><? Echo $title . " - " . $assunto; ?></title>

<!--CSS-->
<link href="/css-js/estilos-2.css" rel="stylesheet" type="text/css" />
<link href="/css-js/menu-2.css" rel="stylesheet" type="text/css" />
<!--CSS-->
<!--FONTES-->
<script src="/css-js/cufon-yui.js" type="text/javascript"></script> 
<script src="/css-js/nome_400.font.js" type="text/javascript"></script>
<script src="/css-js/titulo_400.font.js" type="text/javascript"></script>
<script type="text/javascript">
	Cufon.replace('h1');
	Cufon.replace('h1#titulo,.titulo-destaques,#menu-rodape-content',{ fontFamily: 'titulo' }); 
	Cufon.replace('p.nome, .nome-destaque',{ fontFamily: 'nome' }); 
</script>
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
					<div id="titulo-pagina"><img src="/imagens/estrutura/titulo-blog.png" width="760" height="41" /></div>
					<div id="icone"><img src="/imagens/estrutura/icone-blog.png" width="90" height="90" /></div>
					<div class="texto-sem-fundo">
						<?
						if (anti_injection2($_REQUEST["idBlog"]) != "") {
						
							$sql = " SELECT * FROM blog WHERE idBlog = " . anti_injection2($_REQUEST["idBlog"]);
							$resultado = mysql_query($sql, $conexao);
							if(!$resultado){
								die("Impossível visualizar o blog: " . mysql_error() . '<br>');
							}
							$sts = mysql_query($sql);
							$registros = mysql_num_rows($sts);
							$contador = 0;
														
							if ($registros>0) {
								while($row = mysql_fetch_array($resultado)) {
									$idBlog = $row['idBlog'];
									$assunto = $row['assunto'];	
									$mensagem = $row['mensagem'];														
									$imagem = $row['imagem'];
									$video = $row['video'];
									
									$nomeTag1 = $row['nomeTag1'];
									$paginaTag1 = $row['paginaTag1'];
									$nomeTag2 = $row['nomeTag2'];
									$paginaTag2 = $row['paginaTag2'];
									
									$dataPublicacao = $row['dataPublicacao']; 
								?>
								
									<div class="titulo-post"><?=$assunto?></div>
									<? if ($dataPublicacao != "") {?>
										<div class="data">Publicado em <?=$dataPublicacao?></div>
									<? }  ?>
									<div class="corpo-post"><?=$mensagem?></div>
									<? if ($imagem != "") {  ?>
										<BR><BR><img src="<?="/sistema/content/".$imagem?>" alt="<?=$assunto?>" />
									<? }  ?>
										<BR><BR>							
										<?=$video?>
									<? if ($nomeTag1 != "") {  ?>
										<BR>
										Tags: <a href="<?=$paginaTag1?>" target="_blank" class="link"><?=$nomeTag1?></a>
										<? if ($nomeTag2 != "") {  ?>
										, <a href="<?=$paginaTag2?>" target="_blank" class="link"><?=$nomeTag2?></a>
										<? }  ?>
									<? }
								}  							
							} 
						}
						?>
						
					</div>	
					<div class="bt-voltar"><a href="javascript:window.history.go(-1)"><img src="/imagens/estrutura/bt-voltar.png" /></a></div>	 
					<?php include("php/banner-blog-2.php"); ?>
                </div><!--COLUNA-FULL-->
                <div class="clear"></div>		
            </div><!--PRINCIPAL CONTENT-->
        </div><!--PRINCIPAL-->
	</div><!--BG-COURO-->
    <div id="rodape">
		<?php include("php/rodape-2.php"); ?>
    </div><!--RODAPE-->
    <div id="tags">
		<?php include("php/tags-mural.php"); ?>
    </div><!--TAGS-->
</div><!--wrap-->
<script type="text/javascript"> Cufon.now(); </script>
<?php include("php/google.php"); ?>

</body>
</html>
