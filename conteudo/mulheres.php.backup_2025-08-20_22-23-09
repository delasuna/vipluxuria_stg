<? 	$conexao = require_once '../php/conecta_mysql.php';  ?>
<?

	$whereSEO = " descricao = 'Home' ";

	if (anti_injection($_REQUEST["flagTipo"]) == "Loiras") {
		$whereSEO = " descricao = 'Loiras' ";
	}
	if (anti_injection($_REQUEST["flagTipo"]) == "Morenas") {
		$whereSEO = " descricao = 'Morenas' ";
	} 
	if (anti_injection($_REQUEST["flagTipo"]) == "Mulatas") {
		$whereSEO = " descricao = 'Mulatas' ";
	}
	
	if (anti_injection($_REQUEST["flagTipo"]) == "Atende24Horas") {
		$whereSEO = " descricao = 'Atende24Horas' ";
	}

	if (anti_injection($_REQUEST["flagTipo"]) == "ComVideo") {
		$whereSEO = " descricao = 'ComVideo' ";
	}

	if (anti_injection($_REQUEST["flagTipo"]) == "ComLocal") { 
		$whereSEO = " descricao = 'ComLocal' ";
	}

	if (anti_injection($_REQUEST["flagTipo"]) == "SexoVirtual") {
		$whereSEO = " descricao = 'SexoVirtual' ";
	}		

	$sql = " SELECT * FROM seo, tipoSeo Where seo.idTipoSeo = tipoSeo.idTipoSeo AND " .  $whereSEO; 

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

<? 
function anti_injection($sql) {
	// remove palavras que contenham sintaxe sql
	$sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|having|union|drop table|sleep|show tables|#|\*|--|\\\\)/"),"",$sql);
	$sql = trim($sql);//limpa espaços vazio
	$sql = strip_tags($sql);//tira tags html e php
	$sql = addslashes($sql);//Adiciona barras invertidas a uma string
	return $sql;
}

$cidade = "";
if (anti_injection($_REQUEST["idCidade"]) != "") {
	$idCidade = anti_injection($_REQUEST["idCidade"]);
	$sql = "SELECT idCidade, cidade FROM cidade WHERE idCidade = ".$idCidade;

	$resultado = mysql_query($sql, $conexao);
	if(!$resultado){
		die("Impossível visualizar as cidades: " . mysql_error() . '<br>');
	}

	while($row = mysql_fetch_array($resultado)) {
		$cidade = $row['cidade'];
	}
	
} else {
	$cidade = "Porto Alegre";
}
?>                

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="index,follow">
 
<? if (anti_injection($_REQUEST["idCidade"]) != "") { 	?>
	<meta name="description" content="Vip Luxúria é um classificados de anúncios de Acompanhantes de <?=$cidade?>." />
	<meta name="keywords" content="Acompanhantes <?=$cidade?>, Acompanhantes em <?=$cidade?>, Acompanhante em <?=$cidade?>, Garota de Programa <?=$cidade?>, Garotas de Programa <?=$cidade?>, Acompanhante <?=$cidade?>, Acompanhantes RS, Acompanhantes Rio Grande do Sul, Acompanhantes poa, Guia Erótico <?=$cidade?>, Guia de Acompanhantes <?=$cidade?>, Anúncios de Acompanhantes <?=$cidade?>, Acompanhantes POA, Acompanhante" />
	<!-- <title>Mulheres - Vip Lux&uacute;ria - Acompanhantes Porto Alegre - Acompanhantes <?=$cidade?></title> -->
	<title>Vip Lux&uacute;ria - Acompanhantes <?=$cidade?></title>
<? } else {  ?>
	<meta name="description" content="<?=$description?>" />
	<meta name="keywords" content="<?=$keywords?>" />
	<title><?=$title?></title>
<? } ?>

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
	Cufon.replace('h1#titulo,#menu-rodape-content',{ fontFamily: 'titulo' }); 
</script> 
<!--FONTES-->

<!--SLIDER-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="/css-js/jquery.bxslider.min.js"></script>
<link href="/css-js/jquery.bxslider.css" rel="stylesheet" />
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
            	<div id="coluna-full">
					<div id="titulo-pagina"><img src="/imagens/estrutura/titulo-mulheres-2.png" width="760" height="41" /></div>
						
						<? if (anti_injection($_REQUEST["flagTipo"]) == "SexoVirtual") { ?>
						<div id="nota">
							<p>Este espaço é destinado a destacar as acompanhantes que fazem shows privados pelo WhatsApp e venda de pacote de fotos, venda de vídeos!
E é tudo muito simples. Chame a garota de sua preferência, combine as condições e usufrua de sua companhia virtual!</p><br>
							<p><i><strong>Consulte diretamente com a anunciante os serviços oferecidos por ela!</strong></i></p>
						</div> <!-- nota -->
						<? } ?>	 						
						
					<ul id="thumbs-full">
						<?
						$where = " WHERE  flagAtivo = 'Sim' ";
						$whereClassificados = " WHERE '1'='1'   ";
					
						if (anti_injection($_REQUEST["nome"]) != "") {
							$where = $where . " and nomeURL like '%" . anti_injection($_REQUEST["nome"]) . "%' ";
						}						
						
						if (anti_injection($_REQUEST["flagTipo"]) == "Loiras") {
							$where = $where . " and flagTipo = 'Lo' ";
							$whereClassificados = $whereClassificados . " and flagTipo = 'Lo' ";
						}
						if (anti_injection($_REQUEST["flagTipo"]) == "Morenas") {
							$where = $where . " and flagTipo = 'Mo' ";
							$whereClassificados = $whereClassificados . " and flagTipo = 'Mo' ";
						} 
						if (anti_injection($_REQUEST["flagTipo"]) == "Mulatas") {
							$where = $where . " and flagTipo = 'Mu' ";
							$whereClassificados = $whereClassificados . " and flagTipo = 'Mu' ";
						}
						
						if (anti_injection($_REQUEST["flagTipo"]) == "Atende24Horas") {
							$where = $where . " and flagAtende24Horas = 'Sim' ";
							$whereClassificados = $whereClassificados . " and flagAtende24Horas = 'Sim' ";
						}

						if (anti_injection($_REQUEST["flagTipo"]) == "ComVideo") {
							$where = $where . " and flagTemVideo = 'Sim' ";
							$whereClassificados = $whereClassificados . " and flagTemVideo = 'Sim' ";							
						}

						if (anti_injection($_REQUEST["flagTipo"]) == "ComLocal") {
							$where = $where . " and atendoLocalProprio = 'Sim' "; 
							$whereClassificados = $whereClassificados . " and flagComLocal = 'Sim' ";
						}

						if (anti_injection($_REQUEST["flagTipo"]) == "SexoVirtual") {
							$where = $where . " and flagSexoVirtual = 'S' ";
							$whereClassificados = $whereClassificados . " and flagSexoVirtual = 'Sim' ";
						}
						
						if (anti_injection($_REQUEST["idCidade"]) != "") {
							//$where = $where . " and cidade = " . anti_injection($_REQUEST["cidade"]) . " ";
								 
							$sql = " SELECT * FROM mulher " 
								 . " JOIN mulherCidade ON (mulher.idMulher = mulherCidade.idMulher AND mulherCidade.idCidade = " . anti_injection($_REQUEST["idCidade"]) . ")"  
								 . $where
								 . " ORDER BY flagPreferencial desc, rand(); ";
								 
						} else {
							$sql = " SELECT * FROM mulher " 
								 .	$where
								 . " ORDER BY flagPreferencial desc, rand(); ";
						}
										 
						$resultado = mysql_query($sql, $conexao);
						if(!$resultado){
							die("Impossível visualizar as anunciantes: " . mysql_error() . '<br>');
						}
						$contador = 0;
		
						$sts = mysql_query($sql);
						$registros = mysql_num_rows($sts);
						
						$comAcentos = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú');
						$semAcentos = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U');
		
						if ($registros>0) {
							while($row = mysql_fetch_array($resultado)) {
								$idMulher = $row['idMulher'];
								$nome = $row['nome'];	
								$sobrenome = $row['sobrenome'];
								$imagemCapa = $row['imagemCapa'];				
				
								$contador++;

								if ($contador < 5) { 
								?>
									<li><a href="/perfil/<?=$idMulher?>/<?=str_replace($comAcentos, $semAcentos, $nome)?><? if($sobrenome != "") { echo "-".str_replace(" ", "-", str_replace($comAcentos, $semAcentos, $sobrenome));}?>"><img src="<?="/sistema/content/".$imagemCapa?>" width="112" height="149" /><p class="nome"><?=$nome?> <?=$sobrenome?></p></a></li>
								<? 	} else { ?>
										<li class="last"><a href="/perfil/<?=$idMulher?>/<?=str_replace($comAcentos, $semAcentos, $nome)?><? if($sobrenome != "") { echo "-".str_replace(" ", "-", str_replace($comAcentos, $semAcentos, $sobrenome));}?>"><img src="<?="/sistema/content/".$imagemCapa?>" width="112" height="149" /><p class="nome"><?=$nome?> <?=$sobrenome?></p></a></li>
								<?  	$contador = 0;
								} 
							}
						}
						?>	 						
					
                    </ul>                    
                <div class="clear"></div>
				
					<?php include("../php/destaques-2020.php"); ?>	                
               <br><br>                     
                <div class="bt-voltar"><a href="javascript:window.history.go(-1)"><img src="/imagens/estrutura/bt-voltar.png" /></a></div>                
                </div><!--COLUNA-FULL-->

                <div class="clear"></div>
            </div><!--PRINCIPAL CONTENT-->
        </div><!--PRINCIPAL-->
	</div><!--BG-COURO-->
    <div id="rodape">
		<?php include("../php/rodape-2.php"); ?>
    </div><!--RODAPE-->
    <div id="tags">
		<?php include("../php/tags-mulheres.php"); ?>
    </div><!--TAGS-->
</div><!--wrap-->
<script type="text/javascript"> Cufon.now(); </script>
<?php include("../php/google.php"); ?>

</body>
</html>
