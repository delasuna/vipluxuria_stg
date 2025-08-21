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

<title><?=$title?></title>

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
					/* determina a página a ser exibida, não precisa alterar */
					$pg = $_GET["pagina"];
					
					if ($pg == "") 
						$pg = 1;
					
					//Monta os botões
					$pg_ant = $pg-1;
					$pg_prox = $pg+1;
					
					
					$sql = " SELECT * FROM blog ORDER BY idBlog desc ";
					$resultado = mysql_query($sql, $conexao);
					$sts = mysql_query($sql);
					$registros = mysql_num_rows($sts);
					$totalpages = ceil($registros / 12);
					
					$sql = " SELECT * FROM blog ORDER BY idBlog desc LIMIT " . ($pg-1)*12 . ", 12";
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
							$imagem2 = $row['imagem2'];
							
							$nomeTag1 = $row['nomeTag1'];
							$paginaTag1 = $row['paginaTag1'];
							$nomeTag2 = $row['nomeTag2'];
							$paginaTag2 = $row['paginaTag2'];
		
							$contador++;
							
							if ($contador < 4) { 
							?>
									<div class="box-blog"> 
										<!--<a href="/vip_blog-post.php?idBlog=<?=$idBlog?>"><img src="<?="/sistema/content/".$imagem2?>" width="250px" height="200px">-->
										<a href="/vip-blog-post/<?=$idBlog?>/<?=tirarAcentos(str_replace(" ", "-", $assunto))?>"><img src="<?="/sistema/content/".$imagem2?>" width="250px" height="200px">
										<div class="titulo-post-thumb"><?=$assunto?></div></a>
									</div>
							<? 	} else { ?> 

									<div class="box-blog">
										<!--<a href="/vip_blog-post.php?idBlog=<?=$idBlog?>"><img src="<?="/sistema/content/".$imagem2?>" width="250px" height="200px">-->
										<a href="/vip-blog-post/<?=$idBlog?>/<?=tirarAcentos(str_replace(" ", "-", $assunto))?>"><img src="<?="/sistema/content/".$imagem2?>" width="250px" height="200px">
										<div class="titulo-post-thumb"><?=$assunto?></div></a>
									</div>
									
						    <?  	$contador = 0; 
								} 
							}
						}
						?>	 						
						<div class="clear"></div>						
					</div>	

					<div id="paginacao">
						<ul class="pagination">
							<?	
							if ($pg < 6) {
								if ($totalpages < 6) {
									
									for($i_pg=1;$i_pg<=$totalpages;$i_pg++) { 
										if ($pg == ($i_pg)) { 
											echo " <li><a class='active' href='".$PHP_SELF."?pagina=$pg'>$pg</a></li> ";
										} else {
											echo " <li><a href='".$PHP_SELF."?pagina=$i_pg'>$i_pg</a></li> ";
										}
									}	
									
								}
							} else {

								if ($pg > 1) {
									echo "&nbsp; <li><a href='/vip-blog/'" . $pg_ant . ">«</a></li>";
								}
						
								if ($pg < 9) {			
									for($i_pg=1;$i_pg<=$pg;$i_pg++) { 
										if ($pg == ($i_pg)) { 
											echo " <li><a class='active' href='".$PHP_SELF."?pagina=$i_pg'>$i_pg</a></li> ";
										} else {
											echo " <li><a href='".$PHP_SELF."?pagina=$i_pg'>$i_pg</a></li> "; 
										}
									}	
								} else {
									$qtdePagina = $pg+5; 
									if ($totalpages < $qtdePagina)
									{
										$qtdePagina = $totalpages;
									}
									for($i_pg=$pg-5;$i_pg<$qtdePagina;$i_pg++) { 
										if ($pg == ($i_pg)) { 
											echo " <li><a class='active' href='".$PHP_SELF."?pagina=$i_pg'>$i_pg</a></li>";
										} else { 
											echo " <li><a href='".$PHP_SELF."?pagina=$i_pg'>$i_pg</a></li>";
										}
									}	
								}
							}
							?>
						  
							<? if ($pg < $totalpages) { ?>
								<li><a href="/vip-blog/<?=$pg_prox?>">»</a></li>  
							<? } ?>						
						  
						  
						</ul>						
					</div>
					<?php include("php/banner-blog.php"); ?>
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
