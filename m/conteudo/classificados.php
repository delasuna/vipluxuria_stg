<?php 	$conexao = require_once '../php/conecta_mysql.php';  ?>
<?php 
function anti_injection($sql) {
    if (empty($sql)) {
        return '';
    }
    
    // Lista de palavras perigosas para SQL
    $palavras_perigosas = array(
        'from', 'select', 'insert', 'delete', 'where', 'having', 
        'union', 'drop table', 'sleep', 'show tables', '#', '--'
    );
    
    // Remove palavras perigosas (case insensitive)
    foreach ($palavras_perigosas as $palavra) {
        $sql = preg_replace('/\b' . preg_quote($palavra, '/') . '\b/i', '', $sql);
    }
    
    // Remove caracteres especiais perigosos
    $sql = str_replace(array('\', '*', '|'), '', $sql);
    $sql = trim($sql);
    $sql = strip_tags($sql);
    $sql = addslashes($sql);
    
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
			<h1>Classificados</h1>
        </div><!--titulo-->  
</div>        
        <div id="content">

					<?php
					$separaigual  = explode("=", $_SERVER["REQUEST_URI"]);
					
					if ($separaigual['2'] != "" && $separaigual['2'] > 0)
						$seed = $separaigual['2'];			
					
					$separainterrogacao = explode("?", $separaigual['1']);
					$separaEcomercial = explode("&", $separainterrogacao['0']);
					
					/* determina a página a ser exibida, não precisa alterar */
					if ($separaEcomercial['0'] != "" && $separaEcomercial['0'] > 0)
						$pg = $separaEcomercial['0'];
						
					if ($pg == "") 
						$pg = 1;
					
					//Monta os botões
					$pg_ant = $pg-1;
					$pg_prox = $pg+1;
		
					$sql = " SELECT * FROM classificados2 " . $where . " ORDER BY idClassificados desc "; 
							$resultado = mysql_query($sql, $conexao);
							$sts = mysql_query($sql);
							$registros = mysql_num_rows($sts);
							$totalpages = ceil($registros / 10);		
								
					if($seed == "")
						$seed = rand();   // Caso ainda não exista uma semente, cria a semente via PHP.
					//} else {
					//	$seed = addslashes($_GET["seed"]);  // Caso já exista uma semente, utiliza a que foi passada na url. (o addslashes é por questão de segurança)
					//}
					
					$sql = " SELECT * FROM classificados2 " . $where . " ORDER BY rand(".$seed.") LIMIT " . ($pg-1)*10 . ", 10"; 
					 // echo $sql;
					 // echo "pagina=".$pg-1;
													   
					  $resultado = mysql_query($sql, $conexao);
					  if(!$resultado){
						  die("Impossível visualizar os classificados: " . mysql_error() . '<br>');
					  }
					  $contador = 0;
					  
					  $sts = mysql_query($sql);
					  $registros = mysql_num_rows($sts);
					
					  if ($registros>0) {
						  while($row = mysql_fetch_array($resultado)) {
							  $idClassificados = $row['idClassificados'];
							  $titulo = $row['titulo'];	
							  $email = $row['email'];
							  $mensagem = $row['mensagem'];
							  $twitter = $row['twitter'];
							  $flagWhats = $row['flagWhats'];
							  $ddd = $row['ddd'];
							  $telefone = $row['telefone'];
							  $flagWhats2 = $row['flagWhats2'];
							  $ddd2 = $row['ddd2'];
							  $telefone2 = $row['telefone2'];
							  $site = $row['site'];
							  $imagem = $row['imagem'];	
							  
							  $idEstado = $row['idEstado'];	
							  $cidade = $row['cidade'];						  
							  
							  $contador++;		
		
							$flagTipo = $row['flagTipo'];								
							$flagAtende24Horas = $row['flagAtende24Horas'];
							$flagTemVideo	= $row['flagTemVideo'];
							$video = $row['video'];
							$flagAceitoCartao = $row['flagAceitoCartao'];
								
							$instagram	= $row['instagram'];
							$flagSexoVirtual = $row['flagSexoVirtual']; 
						  ?>
							<div class="anuncio">
								<div class="anuncio-imagem">
									
									<?php
									if ($imagem != "")
										echo "<img src='/sistema/content/".$imagem."'>";
									else 
										echo "<img src='/imagens/sem-imagem.png' alt='Anúncio sem imagem'>";
									?>
						
								</div>
								
								<div class="anuncio-corpo">
									<?php if ($cidade != "") { ?> 
										<h3 class="título-anuncio"><?=$titulo?></h3>
									<?php } ?>	
									<div class="mensagem-anuncio"><strong>Anunciante de: </strong><?=$cidade?></div>							
									<div class="mensagem-anuncio"><?=$mensagem?></div> 


									<?php if (($flagWhats != "" && $flagWhats != "N") && ($ddd != "") && ($telefone != "")) { ?>
										<div class="contatos-anuncio"><p class="whatsapp"><a href="https://api.whatsapp.com/send?phone=<?php echo "55".$ddd. str_replace('-', '', $telefone) .""; ?>&text=Tudo bem? Te vi no site Vip Luxuria. Por gentileza, gostaria de saber mais sobre o seu anúncio!" target="_blank">(<?=$ddd?>) <?=$telefone?></a><button type="button" onclick="location.href='https://api.whatsapp.com/send?phone=<?php echo '55'.$ddd. str_replace('-', '', $telefone) .''; ?>&text=Tudo bem? Te vi no site Vip Luxuria. Por gentileza, gostaria de saber mais sobre o seu anúncio!'">Converse via Whatsapp</button></p></div>
									<?php } else if (($ddd != "") && ($telefone != "")) { ?>
										<div class="contatos-anuncio"><p class="telefone"><a href="tel:<?php echo $ddd . $telefone . ""; ?>">(<?=$ddd?>) <?=$telefone?></a></p></div>
									<?php } ?>

									<?php if (($flagWhats2 != "" && $flagWhats2 != "N") && ($ddd2 != "") && ($telefone2 != "")) { ?>
										<div class="contatos-anuncio"><p class="whatsapp"><a href="https://api.whatsapp.com/send?phone=<?php echo "55".$ddd2. str_replace('-', '', $telefone2) .""; ?>&text=Tudo bem? Te vi no site Vip Luxuria. Por gentileza, gostaria de saber mais sobre o seu anúncio!" target="_blank">(<?=$ddd2?>) <?=$telefone2?></a><button type="button" onclick="location.href='https://api.whatsapp.com/send?phone=<?php echo '55'.$ddd2. str_replace('-', '', $telefone2) .''; ?>&text=Tudo bem? Te vi no site Vip Luxuria. Por gentileza, gostaria de saber mais sobre o seu anúncio!'">Converse via Whatsapp</button></p></div>
									<?php } else if (($ddd2 != "") && ($telefone2 != "")) { ?>
										<div class="contatos-anuncio"><p class="telefone"><a href="tel:<?php echo $ddd2 . $telefone2 . ""; ?>">(<?=$ddd2?>) <?=$telefone2?></a></p></div>
									<?php } else { ?>
										<!--div class="contatos-anuncio"><p> &nbsp;</p></div-->
									<?php } ?>


									<?php if ($email != "") { ?>
										<div class="contatos-anuncio"><p class="e-mail"><a href="mailto:<?=$email?>"><?=$email?></a></p></div>
									<?php }
									   if ($site != "") { ?>
										<div class="contatos-anuncio"><p class="site"><a href="<?=$site?>" target="_blank"><?=$site?></a></p></div>
									<?php }
									   if ($twitter != "") { ?>
										<div class="contatos-anuncio"><p class="twitter"><a href="https://<?=$twitter?>" target="_blank"><?=$twitter?></a></p></div>
									<?php }
									   if ($instagram != "") { ?>
										<div class="contatos-anuncio"><p class="outros"><a href="http://instagram.com/<?=$instagram?>" target="_blank"><?=$instagram?></a></p></div>
									<?php } ?>									
								
									<div class="clear"></div>		
								
									<?php if ($flagAceitoCartao != "" && $flagAceitoCartao == "S") { ?>
											<div class="aceito-cartoes"><img src="/imagens/estrutura/aceito-cartoes.png" /></div>
									<?php } ?>																	
								</div>
								<div class="clear"></div>
							</div> <!-- fim anuncio -->
						
							<div class="linha-horizontal"></div>
						  
							<?php 
							}
							?>	
							<div class="clear"></div>
							<div id="paginacao">
								<ul>
									<?php	
										for($i_pg=1;$i_pg<=$totalpages;$i_pg++) { 
											if ($pg == ($i_pg)) { 
												echo "<li> $i_pg </li>";
											} else {
												echo " <li><a href=".$PHP_SELF."?pagina=$i_pg&seed=".$seed." class=link><b style='color:blue'>$i_pg</b></a></li> ";
											}
										}	
									?>
								</ul>
							</div><!--paginacao-->
							
					  <?php 
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
