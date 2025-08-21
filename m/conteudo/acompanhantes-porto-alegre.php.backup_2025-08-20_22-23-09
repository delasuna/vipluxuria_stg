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
?>     
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<meta name="robots" content="index,follow">
<meta name="description" content="Acompanhantes Porto Alegre, Acompanhantes em Porto Alegre, Acompanhante em Porto Alegre, Garota de Programa Porto Alegre, Garotas de Programa Porto Alegre, Acompanhante Porto Alegre, Acompanhantes RS, Acompanhantes Rio Grande do Sul, Acompanhantes poa, Guia Erótico Porto Alegre, Guia de Acompanhantes Porto Alegre, Anúncios de Acompanhantes Porto Alegre, Acompanhantes POA, Acompanhante" />
<meta name="keywords" content="Acompanhantes Porto Alegre, Acompanhantes em Porto Alegre, Acompanhante em Porto Alegre, Garota de Programa Porto Alegre, Garotas de Programa Porto Alegre, Acompanhante Porto Alegre, Acompanhantes RS, Acompanhantes Rio Grande do Sul, Acompanhantes poa, Guia Erótico Porto Alegre, Guia de Acompanhantes Porto Alegre, Anúncios de Acompanhantes Porto Alegre, Acompanhantes POA, Acompanhante" />

<title>Vip Lux&uacute;ria - Acompanhantes Porto Alegre</title>
<link rel="stylesheet" href="../css-js/estilos.css" type="text/css"/>

<link type="text/css" rel="stylesheet" href="../css-js/demo.css" />
<link type="text/css" rel="stylesheet" href="../css-js/jquery.mmenu.css" />
		
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script type="text/javascript" src="../css-js/jquery.mmenu.js"></script>

<script type="text/javascript">
	$(function() {
		$('nav#menu').mmenu({
			slidingSubmenus: false
		});
	});
</script>


<!--FONTES-->
<script src="../../css-js/cufon-yui.js" type="text/javascript"></script>
<script src="../../css-js/titulo_400.font.js" type="text/javascript"></script>
<script type="text/javascript">
	Cufon.replace('h1');
	Cufon.replace('h1#titulo,.titulo-destaques, #menu-content, #menu-rodape-content, #rodape-content h3',{ fontFamily: 'titulo' }); 
	Cufon.replace('p.nome',{ fontFamily: 'nome' }); 
</script>
<!--FONTES-->

</head>

<body>

	<div id="wrap">
		<?php include("../php/topo.php"); ?>   
        <div id="titulo">
			<h1>Acompanhantes - Mulheres</h1>
        </div><!--titulo-->  
</div>        
        <div id="content">
						<?
						$where = " WHERE  flagAtivo = 'Sim' ";
						
						if (anti_injection($_REQUEST["nome"]) != "") {
							$where = $where . " and nomeURL like '%" . anti_injection($_REQUEST["nome"]) . "%' ";
						}						

						if (anti_injection($_REQUEST["telefone"]) != "") {
							$where = $where . " and  replace(replace(telefone,'-',''),'.','') like '%" . str_replace("-" , "" , str_replace("." , "" , anti_injection($_REQUEST["telefone"]))) . "%' ";
						}						
						
						
						if (anti_injection($_REQUEST["idade"]) != "") {
							$where = $where . " and idade between " . anti_injection($_REQUEST["idade"]) . " ";
						}						
						


						if (anti_injection($_REQUEST["flagMostraRosto"]) != "") {
							$where = $where . " and flagMostraRosto = '" . anti_injection($_REQUEST["flagMostraRosto"]) . "' ";
						}
						
						if (anti_injection($_REQUEST["flagBeijoBoca"]) != "") {
							$where = $where . " and flagBeijoBoca = '" . anti_injection($_REQUEST["flagBeijoBoca"]) . "' ";
						}

						if (anti_injection($_REQUEST["flagAnal"]) != "") {
							$where = $where . " and flagAnal = '" . anti_injection($_REQUEST["flagAnal"]) . "' ";
						}

						if (anti_injection($_REQUEST["flagDominacao"]) != "") {
							$where = $where . " and flagDominacao = '" . anti_injection($_REQUEST["flagDominacao"]) . "' ";
						}

						if (anti_injection($_REQUEST["flagInversao"]) != "") {
							$where = $where . " and flagInversao = '" . anti_injection($_REQUEST["flagInversao"]) . "' ";
						}
						
						if (anti_injection($_REQUEST["flagAtendoEles"]) != "") {
							$where = $where . " and flagAtendoEles = '" . anti_injection($_REQUEST["flagAtendoEles"]) . "' ";
						}

						if (anti_injection($_REQUEST["flagAtendoElas"]) != "") {
							$where = $where . " and flagAtendoElas = '" . anti_injection($_REQUEST["flagAtendoElas"]) . "' ";
						}

						if (anti_injection($_REQUEST["flagAtendoCasais"]) != "") {
							$where = $where . " and flagAtendoCasais = '" . anti_injection($_REQUEST["flagAtendoCasais"]) . "' ";
						}

						if (anti_injection($_REQUEST["flagViagens"]) != "") {
							$where = $where . " and flagViagens= '" . anti_injection($_REQUEST["flagViagens"]) . "' ";
						}

						if (anti_injection($_REQUEST["flagEventos"]) != "") {
							$where = $where . " and flagEventos = '" . anti_injection($_REQUEST["flagEventos"]) . "' ";
						}

						if (anti_injection($_REQUEST["flagAcessorios"]) != "") {
							$where = $where . " and flagAcessorios = '" . anti_injection($_REQUEST["flagAcessorios"]) . "' ";
						}

						if (anti_injection($_REQUEST["flagTenhoAmigas"]) != "") {
							$where = $where . " and flagTenhoAmigas = '" . anti_injection($_REQUEST["flagTenhoAmigas"]) . "' ";
						}

						if (anti_injection($_REQUEST["flagAtende24Horas"]) != "") {
							$where = $where . " and flagAtende24Horas = '" . anti_injection($_REQUEST["flagAtende24Horas"]) . "' ";
						}
						
						if (anti_injection($_REQUEST["flagTemVideo"]) != "") {
							$where = $where . " and flagTemVideo = '" . anti_injection($_REQUEST["flagTemVideo"]) . "' ";
						}						

						if (anti_injection($_REQUEST["atendoHoteis"]) != "") {
							$where = $where . " and atendoHoteis = '" . anti_injection($_REQUEST["atendoHoteis"]) . "' ";
						}

						if (anti_injection($_REQUEST["atendoMoteis"]) != "") {
							$where = $where . " and atendoMoteis = '" . anti_injection($_REQUEST["atendoMoteis"]) . "' ";
						}

						if (anti_injection($_REQUEST["atendoDominicio"]) != "") {
							$where = $where . " and atendoDominicio = '" . anti_injection($_REQUEST["atendoDominicio"]) . "' ";
						}

						if (anti_injection($_REQUEST["atendoLocalProprio"]) != "") {
							$where = $where . " and atendoLocalProprio = '" . anti_injection($_REQUEST["atendoLocalProprio"]) . "' ";
						}

						if (anti_injection($_REQUEST["aceitoCartao"]) != "") {
							$where = $where . " and aceitoCartao = '" . anti_injection($_REQUEST["aceitoCartao"]) . "' ";
						}
						
						if (anti_injection($_REQUEST["flagTipo"]) != "") {
							$where = $where . " and flagTipo = '" . anti_injection($_REQUEST["flagTipo"]) . "' ";
						}
						
						if (anti_injection($_REQUEST["cidade"]) != "" && anti_injection($_REQUEST["cidade"]) != "0") {
							//$where = $where . " and cidade = " . anti_injection($_REQUEST["cidade"]) . " ";
								 
							$sql = " SELECT * FROM mulher " 
								 . " JOIN mulherCidade ON (mulher.idMulher = mulherCidade.idMulher AND mulherCidade.idCidade = " . anti_injection($_REQUEST["cidade"]) . ")"  
								 . $where
								 . " ORDER BY flagPreferencial desc, flagAgenciada asc, rand(); ";
								 
						} else {
							$sql = " SELECT * FROM mulher " 
								 .	$where
								 . " ORDER BY flagPreferencial desc, flagAgenciada asc, rand(); ";
						}
						
		
						//echo $where;
										 
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
								$ddd = $row['ddd'];
								$telefone = $row['telefone'];
								$imagemCapa = $row['imagemCapa'];				
				
								$contador++;
							
							?>
								<div class="thumb"> <a href="/m/conteudo/perfil.php?id=<?=$idMulher?>"><img src="<?="/sistema/content/".$imagemCapa?>" /></a>
									<p class="nome"><?=$nome?></p>
									<p class="telefone"> <a href="tel:0<?=$ddd?><?=$telefone?>">(<?=$ddd?>)&nbsp;<?=$telefone?></a></p>
									<div class="clear"></div>
							    </div>
									
						    <?  
							}
						} else {
							echo "<p class='aviso'>Nenhum perfil encontrado!</p>";
						}
						?>	 						
		

          <div class="clear"></div>                                        
     		<div class="voltar"><a href="javascript:window.history.go(-1)"><img src="/m/imagens/bt-voltar.png" width="75" height="34" /></a></div>      	
     
	    </div><!--content-->
     </div><!--wrap-->
	 
     <?php include("../../php/google.php"); ?>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
