<? 	$conexao = require_once '../php/conecta_mysql.php';  ?>
<?
	$sql = " SELECT * FROM seo, tipoSeo Where seo.idTipoSeo = tipoSeo.idTipoSeo AND descricao = 'Homens'"; 

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
<link href="../css-js/estilos-2.css" rel="stylesheet" type="text/css" />
<link href="../css-js/menu-2.css" rel="stylesheet" type="text/css" />
<!--CSS-->
<!--FONTES-->
<script src="../css-js/cufon-yui.js" type="text/javascript"></script>
<script src="../css-js/nome_400.font.js" type="text/javascript"></script>
<script src="../css-js/titulo_400.font.js" type="text/javascript"></script>
<script type="text/javascript">
	Cufon.replace('h1');
	Cufon.replace('h1#titulo,#menu-rodape-content',{ fontFamily: 'titulo' }); 
</script>
<!--FONTES-->
<!--SLIDER-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="../css-js/jquery.bxslider.min.js"></script>
<link href="../css-js/jquery.bxslider.css" rel="stylesheet" />
<!--SLIDER--> 

<script>
	function carregaPerfil(id) {
		document.form_perfil.id.value = id;
		document.form_perfil.submit();
	}
</script>      

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
            	<div id="coluna-full" style="padding-top:20px; text-align:center;">
	                <?php include("../php/slider-homens.php"); ?>
                    <br/>
					<div id="titulo-pagina"><img src="/imagens/estrutura/titulo-homens.png" width="760" height="41" /></div>
                    <ul id="thumbs-homens">
						<?
						$sql = " SELECT * FROM homem WHERE flagAtivo = 'Sim' "
						 	 . " ORDER BY rand(); ";
		
										 
						$resultado = mysql_query($sql, $conexao);
						if(!$resultado){
							die("Impossível visualizar os anunciantes: " . mysql_error() . '<br>');
						}
						$contador = 0;
		
						$sts = mysql_query($sql);
						$registros = mysql_num_rows($sts);
						
						$comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');
						$semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U');
						
		
						if ($registros>0) {
							while($row = mysql_fetch_array($resultado)) {
								$idHomem = $row['idHomem'];
								$nome = $row['nome'];
								$sobrenome = $row['sobrenome'];	
								$imagemComNome = $row['imagemComNome']; 				
				
							$contador++;

								if ($contador < 7) { 
								?>
									<li class="zoom_img"><a href="/perfil-homens/<?=$idHomem?>/<?=str_replace($comAcentos, $semAcentos, $nome)?><? if($sobrenome != "") { echo "-".str_replace(" ", "-", str_replace($comAcentos, $semAcentos, $sobrenome));}?>"><img src="<?="/sistema/content/".$imagemComNome?>" width="112" height="149" /><p class="nome"><?=$nome?> <?=$sobrenome?></p></a></li>
								<? 	} else { ?>
										<li class="last zoom_img"><a href="/perfil-homens/<?=$idHomem?>/<?=str_replace($comAcentos, $semAcentos, $nome)?><? if($sobrenome != "") { echo "-".str_replace(" ", "-", str_replace($comAcentos, $semAcentos, $sobrenome));}?>"><img src="<?="/sistema/content/".$imagemComNome?>" width="112" height="149" /><p class="nome"><?=$nome?> <?=$sobrenome?></p></a></li>
								<?  	$contador = 0;
								} 
							}
						}
						?>	 		

                    </ul>                    
                <div class="clear"></div>                    
                <div class="bt-voltar"><a href="javascript:window.history.go(-1)"><img src="/imagens/estrutura/bt-voltar.png" /></a></div>                
                </div><!--COLUNA-1-->
                <div class="clear"></div>
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

</body>
</html>
