<? 	$conexao = require_once '../php/conecta_mysql.php';  ?>
<? 
function anti_injection($sql) {
	// remove palavras que contenham sintaxe sql
	$sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|having|union|drop table|sleep|show tables|#|\*|--|\\\\)/"),"",$sql);
	$sql = trim($sql);//limpa espaços vazio
	$sql = strip_tags($sql);//tira tags html e php
	$sql = addslashes($sql);//Adiciona barras invertidas a uma string
	return $sql;
}

if (anti_injection($_REQUEST["cidade"]) != "") {
	$cidade = anti_injection($_REQUEST["cidade"]);
	$sql = "SELECT idCidade, cidade FROM cidade WHERE idCidade = ".$cidade;

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
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="robots" content="index,follow">
<meta name="description" content="Vip Luxúria é um classificados de anúncios de Acompanhantes de <?=$cidade?>." />
<meta name="keywords" content="Acompanhantes <?=$cidade?>, Acompanhantes em <?=$cidade?>, Acompanhante em <?=$cidade?>, Garota de Programa <?=$cidade?>, Garotas de Programa <?=$cidade?>, Acompanhante <?=$cidade?>, Acompanhantes RS, Acompanhantes Rio Grande do Sul, Acompanhantes poa, Guia Erótico <?=$cidade?>, Guia de Acompanhantes <?=$cidade?>, Anúncios de Acompanhantes <?=$cidade?>, Acompanhantes POA, Acompanhante" />

<title>Mulheres - Vip Lux&uacute;ria - Acompanhantes Porto Alegre</title>

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
<link rel="stylesheet" href="/css-js/slider/lightbox/lightbox.css" media="screen"/>
<!--<link rel="stylesheet" href="css-js/slider/reset.css">-->
<link rel="stylesheet" href="/css-js/slider/slider-rows.css">
<script src="/css-js/slider/lightbox/modernizr.custom.js"></script>
<script src="/css-js/slider/slider-rows.js"></script>
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
            <div id="principal-content">
            	<div id="coluna-1">
					<div id="titulo-pagina"><img src="/imagens/estrutura/titulo-mulheres-2.png" width="760" height="41" /></div>
						
						<? if (anti_injection($_REQUEST["flagTipo"]) == "SexoVirtual") { ?>
						<div id="nota">
							<p>Este espaço é destinado a destacar as acompanhantes que fazem shows privados pelo WhatsApp e venda de pacote de fotos, venda de vídeos!
E é tudo muito simples. Chame a garota de sua preferência, combine as condições e usufrua de sua companhia virtual!</p><br>
							<p><i><strong>Consulte diretamente com a anunciante os serviços oferecidos por ela!</strong></i></p>
						</div> <!-- nota -->
						<? } ?>	 						
						
					<ul id="thumbs">
						<?
						$where = " WHERE  flagAtivo = 'Sim' ";

					
						if (anti_injection($_REQUEST["nome"]) != "") {
							$where = $where . " and nomeURL like '%" . anti_injection($_REQUEST["nome"]) . "%' ";
						}						
						
						if (anti_injection($_REQUEST["flagTipo"]) == "Loiras") {
							$where = $where . " and flagTipo = 'Lo' ";
						}
						if (anti_injection($_REQUEST["flagTipo"]) == "Morenas") {
							$where = $where . " and flagTipo = 'Mo' ";
						} 
						if (anti_injection($_REQUEST["flagTipo"]) == "Mulatas") {
							$where = $where . " and flagTipo = 'Mu' ";
						}
						
						if (anti_injection($_REQUEST["flagTipo"]) == "Atende24Horas") {
							$where = $where . " and flagAtende24Horas = 'Sim' ";
						}

						if (anti_injection($_REQUEST["flagTipo"]) == "ComVideo") {
							$where = $where . " and flagTemVideo = 'Sim' ";
						}

						if (anti_injection($_REQUEST["flagTipo"]) == "ComLocal") {
							$where = $where . " and atendoLocalProprio = 'Sim' "; 
						}

						if (anti_injection($_REQUEST["flagTipo"]) == "SexoVirtual") {
							$where = $where . " and flagSexoVirtual = 'S' ";
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
		
						if ($registros>0) {
							while($row = mysql_fetch_array($resultado)) {
								$idMulher = $row['idMulher'];
								$nome = $row['nome'];	
								$sobrenome = $row['sobrenome'];
								$imagemCapa = $row['imagemCapa'];				
				
								$contador++;

								if ($contador < 5) { 
								?>
									<li><a href="/perfil/<?=$idMulher?>/<?=tirarAcentos($nome)?><? if($sobrenome != "") { echo "-".tirarAcentos(str_replace(" ", "-", $sobrenome));}?>"><img src="<?="/sistema/content/".$imagemCapa?>" width="112" height="149" /><p class="nome"><?=$nome?> <?=$sobrenome?></p></a></li>
								<? 	} else { ?>
										<li class="last"><a href="/perfil/<?=$idMulher?>/<?=tirarAcentos($nome)?><? if($sobrenome != "") { echo "-".tirarAcentos(str_replace(" ", "-", $sobrenome));}?>"><img src="<?="/sistema/content/".$imagemCapa?>" width="112" height="149" /><p class="nome"><?=$nome?> <?=$sobrenome?></p></a></li>
								<?  	$contador = 0;
								} 
							}
						}
						?>	 						
					
                    </ul>                    
                <div class="clear"></div>                    
                <div class="bt-voltar"><a href="javascript:window.history.go(-1)"><img src="/imagens/estrutura/bt-voltar.png" /></a></div>                
                </div><!--COLUNA-1-->
                <div id="coluna-2">
                	<?php include("../php/destaques-2.php"); ?>
                </div><!--COLUNA-2-->
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
