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

if (anti_injection($_POST["amigoIndicado"]) == "S") {
	if (anti_injection($_POST["nomeQuemIndicou"]) != "" && 
		anti_injection($_POST["emailQuemIndicou"]) != "" && 
		anti_injection($_POST["nomeAmigo"]) != "" && 
		anti_injection($_POST["emailAmigo"]) != "") {

		$nomeQuemIndicou = anti_injection($_POST["nomeQuemIndicou"]); 
		$emailQuemIndicou = anti_injection($_POST["emailQuemIndicou"]); 
		$nomeAmigo = anti_injection($_POST["nomeAmigo"]); 
		$emailAmigo = anti_injection($_POST["emailAmigo"]); 

		$emailsender = $emailQuemIndicou;
		$emaildestinatario = $emailAmigo;
		$corpo = $nomeAmigo. "! <BR>"; 
	
		$corpo .= "<BR> O seu amigo " . $nomeQuemIndicou . " est� lhe indicando a " . $nomeAnunciante;
		$corpo .= "<BR> Veja o seu perfil acessando o link: <a href='" . $linkAnunciante . "'>". $linkAnunciante ."</a>";
		$corpo .= "<BR> Equipe Vip Lux�ria. ";

		require('PHPMailer/class.phpmailer.php');
		
		$mail = new PHPMailer();
		$mail->CharSet = "ISO-8859-1";		
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Port = 587;
		$mail->Host = "smtp.vipluxuriagold.net"; 
		$mail->Username = "felipevip@vipluxuriagold.net"; 
		$mail->Password = "felipe2016"; 
		$mail->SetFrom("felipevip@vipluxuriagold.net", "$nomeQuemIndicou <$emailsender>");
		$mail->AddAddress("$emaildestinatario", "$nomeQuemIndicou");
		$mail->Subject = $nomeQuemIndicou. ' indicou uma Anunciante!';
		$mail->MsgHTML($corpo); 
		
		// Envia o e-mail
		if($mail->Send()) {
			/*echo "<script>alert('E-mail enviado com Sucesso!')</script>";*/
		} else {
			/*
			echo "<script>alert('N�o foi poss�vel enviar o e-mail.')</script>";
			echo "<script>alert('Informa��es do erro: " . $mail->ErrorInfo . "')</script>";
			*/
		}

			
	}
}

if (isset($_REQUEST["votacao"]) ? $_REQUEST["votacao"] : "" == "S") {
	//session_start();
	$ip = getenv("REMOTE_ADDR");

	$sql = " SELECT * FROM votacaomulher "
	 . " WHERE idMulher = " . anti_injection(isset($_REQUEST["id"]) ? $_REQUEST["id"] : "") . " AND ip='" .$ip . "';";
								 
	$resultado = mysql_query($sql, $conexao);
	if(!$resultado){
		die("Imposs�vel visualizar votacao: " . mysql_error() . '<br>');
	}
							
	$sts = mysql_query($sql);
	$registros = mysql_num_rows($sts);
	if ($registros==0) {
		if (isset($_REQUEST["voto"]) ? $_REQUEST["voto"] : "" == "aprovado") {
			$sql = " UPDATE mulher SET quantidadeVotos= if (quantidadeVotos is null, '0', quantidadeVotos)+1 WHERE idMulher = " . anti_injection(anti_injection(isset($_REQUEST["id"]) ? $_REQUEST["id"] : "")) . ";"; 
		} else if (isset($_REQUEST["voto"]) ? $_REQUEST["voto"] : "" == "reprovado") {
			$sql = " UPDATE mulher SET quantidadeVotos= if (quantidadeVotos is null, '0', if (quantidadeVotos > 0, quantidadeVotos-1, '0')) WHERE idMulher = " . anti_injection(isset($_REQUEST["id"]) ? $_REQUEST["id"] : "") . ";"; 
		}
		$resultado = mysql_query($sql, $conexao);
		
		$sql = " INSERT votacaomulher SET idMulher= " . anti_injection(isset($_REQUEST["id"]) ? $_REQUEST["id"] : "") . ", ip='" .$ip . "'"; 
		$resultado = mysql_query($sql, $conexao);

	}
}

						if (anti_injection(isset($_REQUEST["id"]) ? $_REQUEST["id"] : "") != "") {
							$sql = " SELECT * FROM mulher "
								 . " WHERE flagAtivo = 'Sim' and idMulher = " . anti_injection(isset($_REQUEST["id"]) ? $_REQUEST["id"] : "");
								 
							$resultado = mysql_query($sql, $conexao);
							if(!$resultado){
								die("Imposs�vel visualizar as anunciantes: " . mysql_error() . '<br>');
							}
							
							$sts = mysql_query($sql);
							$registros = mysql_num_rows($sts);

							if ($registros>0) {
								while($row = mysql_fetch_array($resultado)) {
									$nome = $row['nome'];	
									$imagemComNome = $row['imagemComNome'];
									$telefone = $row['telefone'];
									$email = $row['email'];
									$site = $row['site'];
									$orkut = $row['orkut'];
									$msn = $row['msn'];
									$idade = $row['idade'];
									$manequim = $row['manequim'];
									$olhos = $row['olhos'];
//									$signo = $row['signo'];
									$busto = $row['busto'];
									$cabelos = $row['cabelos'];
									$altura = $row['altura'];
									$cintura = $row['cintura'];
									$pes = $row['pes'];
									$peso = $row['peso'];
									$quadril = $row['quadril'];
									$horarioAtendimento = $row['horarioAtendimento'];
									$mensagem1 = $row['mensagem1'];
//									$mensagem2 = $row['mensagem2'];
							
									$imagemCentral1 = $row['imagemCentral1'];
									$imagemCentral2 = $row['imagemCentral2'];
									$imagemCentral3 = $row['imagemCentral3'];								
									$imagemCentral4 = $row['imagemCentral4'];
									$imagemCentral5 = $row['imagemCentral5'];
									$imagemCentral6 = $row['imagemCentral6'];
									$imagemCentral7 = $row['imagemCentral7'];
									$imagemCentral8 = $row['imagemCentral8'];
									$imagem1 = $row['imagem1'];
									$imagem2 = $row['imagem2'];
									$imagem3 = $row['imagem3'];
									$imagem4 = $row['imagem4'];
									$imagem5 = $row['imagem5'];		
									$imagem6 = $row['imagem6'];				
									$imagem7 = $row['imagem7'];
									$imagem8 = $row['imagem8'];		
									$video = $row['video'];
									$flagPreferencial = $row['flagPreferencial'];
									$flagTipo = $row['flagTipo'];								
									
									$flagBeijoBoca = $row['flagBeijoBoca'];
									$flagOral = $row['flagOral'];
									$flagAnal = $row['flagAnal'];
									$flagDominacao = $row['flagDominacao'];
									$flagInversao = $row['flagInversao'];
									$flagAtendoEles = $row['flagAtendoEles'];
									$flagAtendoElas = $row['flagAtendoElas'];
									$flagAtendoCasais = $row['flagAtendoCasais'];
									$flagTenhoAmigas = $row['flagTenhoAmigas'];
								
									$flagTemVideo = $row['flagTemVideo'];
									
									$nomeAmigas	= $row['nomeAmigas'];
									$flagEventos	= $row['flagEventos'];
									$flagViagens	= $row['flagViagens'];
									$flagAcessorios	= $row['flagAcessorios'];
									$flagAtende24Horas = $row['flagAtende24Horas'];
								
									$cache	= $row['cache'];
									$locais	= $row['locais'];
									$horario	= $row['horario'];
									$cidades = $row['cidades'];
									
									$sobrenome = $row['sobrenome'];
									$telefone2 = $row['telefone2'];
									
									$quantidadeVotos = $row['quantidadeVotos'];
									
									$idOperadora = $row['idOperadora'];
									$idOperadora2 = $row['idOperadora2'];
									
									$ddd = $row['ddd'];
									$ddd2 = $row['ddd2'];
									
									$flagWhats = $row['flagWhats'];
									$flagWhats2 = $row['flagWhats2'];
									
									$twitter = $row['twitter'];
									$aceitoCartao = $row['aceitoCartao']; 
									
									$outros = $row['outros']; 
									
									$imagemExtra1 = $row['imagemExtra1'];
									$imagemExtra2 = $row['imagemExtra2'];
									$imagemExtra3 = $row['imagemExtra3'];
									$imagemExtra4 = $row['imagemExtra4'];
									$imagemExtra5 = $row['imagemExtra5'];		
									$imagemExtra6 = $row['imagemExtra6'];									
								}
							}
						
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="robots" content="index,follow">
<meta name="description" content="Vip Lux�ria � um classificados de an�ncio de Acompanhantes de Porto Alegre." />
<meta name="keywords" content="Acompanhantes Porto Alegre, Acompanhantes em Porto Alegre, Acompanhante em Porto Alegre, Garota de Programa Porto Alegre, Garotas de Programa Porto Alegre, Acompanhante Porto Alegre, Acompanhantes RS, Acompanhantes Rio Grande do Sul, Acompanhantes poa, Guia Er�tico Porto Alegre, Guia de Acompanhantes Porto Alegre, An�ncios de Acompanhantes Porto Alegre, Acompanhantes POA, Acompanhante" />

<title>
<?php									
	if ($flagTipo == "Lo") { 
		$tipo = "Loira";
	} else if ($flagTipo = "Mo"){
		$tipo = "Morena";
	} else if ($flagTipo = "Mu"){
		$tipo = "Mulata";
	}
	echo $nome . " " .  $sobrenome . " - " . $tipo . " - Mulheres - Vip Lux&uacute;ria - Acompanhantes Porto Alegre"; 
?>

</title>

<!--CSS-->
<link href="http://vipluxuriagold.net/css-js/estilos-2.css" rel="stylesheet" type="text/css" />
<link href="http://vipluxuriagold.net/css-js/menu-2.css" rel="stylesheet" type="text/css" />
<link href="http://vipluxuriagold.net/css-js/ampliacao-2.css" rel="stylesheet" type="text/css" />
<!--CSS-->
<!--FONTES-->
<script src="http://vipluxuriagold.net/css-js/cufon-yui.js" type="text/javascript"></script>
<script src="http://vipluxuriagold.net/css-js/nome_400.font.js" type="text/javascript"></script>
<script src="http://vipluxuriagold.net/css-js/titulo_400.font.js" type="text/javascript"></script>
<script src="http://vipluxuriagold.net/Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript">
	Cufon.replace('h1');
	Cufon.replace('h1#titulo,#menu-rodape-content',{ fontFamily: 'titulo' }); 
</script>
<!--FONTES-->

<!--AMPLIA��O-->
<script type="text/javascript" src="http://vipluxuriagold.net/css-js/visualizador/jquery.js"></script>
<script type="text/javascript" src="http://vipluxuriagold.net/css-js/visualizador/jquery.lightbox-0.5.js"></script>
<script type="text/javascript" src="http://vipluxuriagold.net/css-js/visualizador/common.js"></script>
<script>
		var arrImg = new Array(
			"<?="/sistema/content/".$imagemCentral1?>",
			"<?="/sistema/content/".$imagemCentral2?>",
			"<?="/sistema/content/".$imagemCentral3?>",
			"<?="/sistema/content/".$imagemCentral4?>",
			"<?="/sistema/content/".$imagemCentral5?>",
			"<?="/sistema/content/".$imagemCentral6?>",
			"<?="/sistema/content/".$imagemCentral7?>",
			"<?="/sistema/content/".$imagemCentral8?>",		
		"");
		
	function gravaVotacao(voto) {
		document.form2.votacao.value = 'S';
		document.form2.voto.value = voto;
		document.form2.submit();
	}	
	
	function indicaAmigo() {
		if (document.form3.nomeQuemIndicou.value == "") {
			alert("Informe seu nome!");
		} else if (document.form3.emailQuemIndicou.value == "") {
			alert("Informe seu e-mail!");
		} else if (document.form3.nomeAmigo.value == "")  {
			alert("Informe o nome de seu amigo!");
		} else if (document.form3.emailAmigo.value == "")  {
			alert("Informe o e-mail de seu amigo!");
		} else {
			window.alert('Obrigada por me indicar!');
			document.form3.amigoIndicado.value = 'S';
			document.form3.submit();
		}
	
	}			
</script> 

<script type="text/javascript">
//desabilita menu de opcoes ao clicar no botao direito
function desabilitaMenu(e)
{
if (window.Event)
{
if (e.which == 2 || e.which == 3)
return false;
}
else
{
event.cancelBubble = true
event.returnValue = false;
return false;
}
}

//desabilita botao direito
function desabilitaBotaoDireito(e)
{
if (window.Event)
{
if (e.which == 2 || e.which == 3)
return false;
}
else
if (event.button == 2 || event.button == 3)
{
event.cancelBubble = true
event.returnValue = false;
return false;
}
}

//desabilita botao direito do mouse
if ( window.Event )
document.captureEvents(Event.MOUSEUP);
if ( document.layers )
document.captureEvents(Event.MOUSEDOWN);

document.oncontextmenu = desabilitaMenu;
document.onmousedown = desabilitaBotaoDireito;
document.onmouseup = desabilitaBotaoDireito;
</script>

<script type="text/javascript" src="/html5gallery/jquery.js"></script>
<script type="text/javascript" src="/html5gallery/html5gallery.js"></script>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5694f32a6ce4d64c" async="async"></script>
<script src="../css-js/jquery.video-extend.js"></script>


<?php
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>

<!-- FANCYBOX -->
<link rel="stylesheet" type="text/css" href="/css-js/jquery.fancybox.min.css">

</head>

<body>

<form name="form2" method="post" action='perfil.php?id=<?=anti_injection(isset($_REQUEST["id"]) ? $_REQUEST["id"] : "")?>'>
	<input type="hidden" name="votacao" id="votacao" value="N"> 
	<input type="hidden" name="voto" id="voto" value="N"> 
	<input type="hidden" name="id" value='<?=anti_injection(isset($_REQUEST["id"]) ? $_REQUEST["id"] : "")?>'> 
</form>


<div id="wrap">
    <div id="bg-rosa" style="position:absolute !important;">
        <div id="topo">
            <?php include("../php/topo-2.php"); ?>
        </div><!--TOPO-->
        <div id="menu">
            <?php include("../php/menu-2.php"); ?>
        </div><!--MENU-->
    </div><!--BG ROSA-->
    <div id="bg-couro">    
        <div id="principal">
            <div id="principal-perfil">
              	<div id="perfil-content">
                	<div id="coluna-perfil-esq">
							<div class="nome-acompanhante"><?=$nome?> <?=$sobrenome?></div>
							<div id="telefone">
									<?php
									if ($idOperadora != "") {
										if ($idOperadora == 1)
											$operadora = "Oi";
										else if ($idOperadora == 2)
											$operadora = "Tim";
										else if ($idOperadora == 3)
											$operadora = "Claro";
										else if ($idOperadora == 4)
											$operadora = "Vivo";

										if ($flagWhats == "S") {
											echo "<p class='n-whatsapp-op'>(" . $ddd . ") " . $telefone ." <span class='operadora'>(" . $operadora . ")</span></p>";
										} else {
											echo "<p class='n-telefone'>(" . $ddd . ") " . $telefone ." <span class='operadora'>(" . $operadora . ")</span></p>";
										}
									} else {
										if ($flagWhats == "S") {
											echo "<p class='n-whatsapp'>(" . $ddd . ") " . $telefone ."</p>";
										} else {
											echo "<p class='n-telefone'>(" . $ddd . ") " . $telefone ."</p>";
										}
									}
									
								?>						
								<?php if ($telefone2 != "")
									if ($idOperadora2 != "") {
										if ($idOperadora2 == 1)
											$operadora2 = "Oi";
										else if ($idOperadora2 == 2)
											$operadora2 = "Tim";
										else if ($idOperadora2 == 3)
											$operadora2 = "Claro";
										else if ($idOperadora2 == 4)
											$operadora2 = "Vivo";

										if ($flagWhats2 == "S") {
											echo "<p class='n-whatsapp-op'>(" . $ddd2 . ") " . $telefone2 ." <span class='operadora'>(" . $operadora2 . ")</span></p>";
										} else {
											echo "<p class='n-telefone'>(" . $ddd2 . ") " . $telefone2 ." <span class='operadora'>(" . $operadora2 . ")</span></p>";
										}
									} else {
										if ($flagWhats2 == "S") {
											echo "<p class='n-whatsapp'>(" . $ddd2 . ") " . $telefone2 ."</p>";
										} else {
											echo "<p class='n-telefone'>(" . $ddd2 . ") " . $telefone2 ."</p>";
										}
									}
									
								?>
								<p class="aviso">Ligue e diga que me viu no Vip Lux�ria!</p>                                                	
							</div><!--TELEFONE-->				
							<div class="clear"></div>				
<!--
							<div id="bt-whatsapp"> <a href="https://api.whatsapp.com/send?phone=SeuNumero&text=Ol� NOME DO PERFIL, te vi no Vip Lux�ria! Gostaria de mais informa��es." target="_blank"><img src="/imagens/estrutura/bt-whatsapp.png" width="264" height="48" /></a></div><!-- bt-whatsapp -->
							
					
						<?php if ($email != "" || $site != "" || $outros != "" || $twitter != "") { ?>
							<div class="linha-horizontal"></div> 
							<div id="contatos">
								<?php if ($email != "") {?>
									<p class="e-mail"><?=$email?></p>
								<?php } ?>
								<?php if ($site != "") {?>
									<p class="site"><?=$site?></p>
								<?php } ?>
								<?php if ($twitter != "") {?>
									<p class="twitter"><?=$twitter?></p>
								<?php } ?>
								<?php if ($outros != "") {?>
									<p class="outros"><?=$outros?></p>
								<?php } ?>								
							</div>						
						<?php } ?>                       
                        <div class="linha-horizontal"></div>			
						<div id="atendimento">
                        	<h3>Atendimento</h3>
                            <ul>
                            	<li><span class="rotulo">Hor�rios:</span> <?=$horario?></li>
                                <li><span class="rotulo">Cach�:</span> <?=$cache?></li>
                                <li><span class="rotulo">Locais:</span> <?=$locais?></li>
                                <li><span class="rotulo">Cidades:</span> <?=$cidades?></li>
                            </ul>    
							
							<?php if ($aceitoCartao != "" && $aceitoCartao == "Sim") { ?> 
								<div id="cartoes"><img src="/imagens/estrutura/aceito-cartoes.png" /></div>      
							<?php } ?>    
							                        
                        </div>							
						<div class="linha-horizontal"></div>
						
						<?php if ($video != "" && $flagTemVideo != "Nao") { ?>                       
                        <div id="video">
							<video width="320" height="240" controls>
    							<source src="<?="/sistema/content/".$video?>" type="video/mp4">
							</video>	
                        </div>
						<div class="linha-horizontal"></div>                        
					    <?php } ?>
                        						                   
                        <div id="fotos-caseiras">
	                       	<h3>Fotos Caseiras</h3>
							<?php if ($imagemExtra1 != "") { ?>
	                            <div class="fc-thumb"><a href="<?="/sistema/content/".$imagemExtra1?>" data-fancybox="images"><img src="<?="/sistema/content/".$imagemExtra1?>" width="100" height="100" /></a></div>
							<?php } ?>
							<?php if ($imagemExtra2 != "") { ?>
	                            <div class="fc-thumb"><a href="<?="/sistema/content/".$imagemExtra2?>" data-fancybox="images"><img src="<?="/sistema/content/".$imagemExtra2?>" width="100" height="100" /></a></div>
							<?php } ?>
							<?php if ($imagemExtra3 != "") { ?>
    	                        <div class="fc-thumb"><a href="<?="/sistema/content/".$imagemExtra3?>" data-fancybox="images"><img src="<?="/sistema/content/".$imagemExtra3?>" width="100" height="100" /></a></div>
							<?php } ?>
							<?php if ($imagemExtra4 != "") { ?>
        	                    <div class="fc-thumb"><a href="<?="/sistema/content/".$imagemExtra4?>" data-fancybox="images"><img src="<?="/sistema/content/".$imagemExtra4?>" width="100" height="100" /></a></div>
							<?php } ?>
							<?php if ($imagemExtra5 != "") { ?>
            	                <div class="fc-thumb"><a href="<?="/sistema/content/".$imagemExtra5?>" data-fancybox="images"><img src="<?="/sistema/content/".$imagemExtra5?>" width="100" height="100" /></a></div>
							<?php } ?>
							<?php if ($imagemExtra6 != "") { ?>
                            	<div class="fc-thumb"><a href="<?="/sistema/content/".$imagemExtra6?>" data-fancybox="images"><img src="<?="/sistema/content/".$imagemExtra6?>" width="100" height="100" /></a></div>
							<?php } ?>

							<div class="clear"></div>
                        </div> <!-- fotos-caseiras -->
                        
						<div class="linha-horizontal"></div>                                                
						
                    	<div id="sou">
                        	<h3>Como Sou</h3>
                            <ul>
                            	<li><span class="rotulo">Idade:</span> <?=$idade?> anos</li>
                                <li><span class="rotulo">Altura:</span> <?=$altura?>m</li>
                                <li><span class="rotulo">Peso:</span> <?=$peso?> Kg</li>
                                <li><span class="rotulo">Olhos:</span> <?=$olhos?></li>
                                <li><span class="rotulo">Cabelos:</span> <?=$cabelos?></li>
                                <li><span class="rotulo">Busto:</span> <?=$busto?> cm</li>
                                <li><span class="rotulo">Quadril:</span> <?=$quadril?> cm</li>
                                <li><span class="rotulo">Cintura:</span> <?=$cintura?> cm</li>
                                <li><span class="rotulo">P�s:</span> <?=$pes?></li>
                                <li><span class="rotulo">Manequim:</span> <?=$manequim?></li>
                            </ul>
                        </div><!--40-->
                        <div id="faco">
                        	<h3>O que Fa�o</h3>
                            <ul>
                            	<li><span class="rotulo">Beijo na Boca?</span> <?=$flagBeijoBoca?></li>
                                <li><span class="rotulo">Fa�o Oral?</span> <?=$flagOral?></li>
                                <li><span class="rotulo">Fa�o Anal?</span> <?=$flagAnal?></li>
                                <li><span class="rotulo">Fa�o Domina��o?</span> <?=$flagDominacao?></li>
                                <li><span class="rotulo">Fa�o Invers�o?</span> <?=$flagInversao?></li>
                                <li><span class="rotulo">Atendo Eles?</span> <?=$flagAtendoEles?></li>
                                <li><span class="rotulo">Atendo Elas?</span> <?=$flagAtendoElas?></li>
                                <li><span class="rotulo">Atendo Casais?</span> <?=$flagAtendoCasais?></li>
                                <li><span class="rotulo">Acess�rios?</span> <?=$flagAcessorios?></li>
                                <li><span class="rotulo">Eventos?</span> <?=$flagEventos?></li>
                                <li><span class="rotulo">Viagens?</span> <?=$flagViagens?></li>
                                <li><span class="rotulo">Tenho Amigas?</span> <?=$flagTenhoAmigas?></li>
                            </ul>
                        </div><!--60-->
                        <div class="clear"></div>
			
	                </div><!--COLUNA-PERFIL-ESQ-->
					
    	        	<div id="coluna-perfil-dir">							
						<div class="apresentacao"><?=$mensagem1?></div>
						<div id="fotos">
    	                	<div id="thumbs-fotos">
							
	                          <ul>
									<li class="thumbPerfilOver"><a href="javascript:loadFoto(0);"><img src="<?="/sistema/content/".$imagemCentral1?>" name="thumb0" width="50" height="50" id="thumb0"  /></a></li>
									<li class="thumbPerfil"><a href="javascript:loadFoto(1);"><img src="<?="/sistema/content/".$imagemCentral2?>" width="50" height="50" id="thumb1" /></a></li>  
								  	<li class="thumbPerfil"><a href="javascript:loadFoto(2);"><img src="<?="/sistema/content/".$imagemCentral3?>" width="50" height="50" id="thumb2" /></a></li>  
								  	<li class="thumbPerfil"><a href="javascript:loadFoto(3);"><img src="<?="/sistema/content/".$imagemCentral4?>" width="50" height="50" id="thumb3" /></a></li>
								  	<li class="thumbPerfil"><a href="javascript:loadFoto(4);"><img src="<?="/sistema/content/".$imagemCentral5?>" width="50" height="50" id="thumb4" /></a></li>
								  	<li class="thumbPerfil"><a href="javascript:loadFoto(5);"><img src="<?="/sistema/content/".$imagemCentral6?>" width="50" height="50" id="thumb5" /></a></li>                          
								  	<li class="thumbPerfil"><a href="javascript:loadFoto(6);"><img src="<?="/sistema/content/".$imagemCentral7?>" width="50" height="50" id="thumb6" /></a></li>                                                      
								  	<li class="thumbPerfil"><a href="javascript:loadFoto(7);"><img src="<?="/sistema/content/".$imagemCentral8?>" width="50" height="50" id="thumb7" /></a></li>
								</ul> <!-- Fim Thumbs -->                        
							
						</div> <!--THUMBS FOTOS-->
                        <div class="clear"></div>
                        <div id="ampliacao">
                            <div class="colunaFotoH" id="colunaFoto" style="display:none;"> </div>
                            <div id="imgLoader"> <img src="../imagens/ajax-loader.gif" alt="Carregando..."  /> </div>
                            <div align="center">
								<img src="<?="/sistema/content/".$imagemCentral1?>"  id="fotoPerfil" />
                            </div>                        
                        </div> <!-- Fim Ampliacao -->
                    </div><!--FOTOS-->

					<div id="compartilhe-twitter"><a href="https://twitter.com/intent/tweet?text=<?php									
	if ($flagTipo == "Lo") { 
		$tipo = "Loira";
	} else if ($flagTipo = "Mo"){
		$tipo = "Morena";
	} else if ($flagTipo = "Mu"){
		$tipo = "Mulata";
	}
	echo $nome . " " .  $sobrenome . " - " . $tipo . " - Mulheres - Vip Lux&uacute;ria - Acompanhantes Porto Alegre"; 
?>&url=<?php echo curPageURL(); ?>"><img src="/imagens/estrutura/compartilhe-twitter.png"></a>
						</div>						
						
                        <div class="clear"></div>
						<div id="me-indique">
                        	<h3>Me indique para um Amigo</h3>
							<form name="form3" method="post" action='/perfil/<?=anti_injection(isset($_REQUEST["id"]) ? $_REQUEST["id"] : "")?>/<?=tirarAcentos($nome)?><?php if($sobrenome != "") { echo "-".tirarAcentos(str_replace(" ", "-", $sobrenome));}?>'>
								<input type="hidden" name="amigoIndicado" id="amigoIndicado" value="N"> 
								<input type="hidden" name="nomeAnunciante" id="nomeAnunciante" value="<?php echo $nome . " " .  $sobrenome ?>"> 
								<input type="hidden" name="linkAnunciante" id="linkAnunciante" value="http://vipluxuriagold.net/conteudo/perfil.php?id=<?=anti_injection($_REQUEST['id'])?>"> 
							
								<input type="hidden" name="id" value='<?=anti_injection(isset($_REQUEST["id"]) ? $_REQUEST["id"] : "")?>'> 
								
								<input name="nomeQuemIndicou" id="nomeQuemIndicou" type="text" placeholder="Seu Nome" />
								<input name="emailQuemIndicou" id="emailQuemIndicou" type="text" placeholder="Seu E-mail" />
								<input name="nomeAmigo" id="nomeAmigo" type="text" placeholder="Nome do Amigo" />
								<input name="emailAmigo" id="emailAmigo" type="text" placeholder="E-mail do Amigo" />
								<div class="bt-enviar"><img src="http://vipluxuriagold.net/imagens/estrutura/bt-enviar-indique.png" onclick="indicaAmigo()" /></div>
							</form>
							<div class="clear"></div>
						</div> 
                	</div><!--COLUNA-PERFIL-DIR-->					
					
   	              <div class="clear"></div>                  
				</div><!--PERFIL CONTENT-->
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
<script type="text/javascript" src="http://vipluxuriagold.net/css-js/visualizador/perfil.js"></script>

<!-- JS - FANCYBOX -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="/css-js/jquery.fancybox.min.js"></script>

</body>
</html>
<?php } ?>
