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
	
		$corpo .= "<BR> O seu amigo " . $nomeQuemIndicou . " está lhe indicando a " . $nomeAnunciante;
		$corpo .= "<BR> Veja o seu perfil acessando o link: <a href='" . $linkAnunciante . "'>". $linkAnunciante ."</a>";
		$corpo .= "<BR> Equipe Vip Luxúria. ";

		require('PHPMailer/class.phpmailer.php');
		
		$mail = new PHPMailer();
		$mail->CharSet = "ISO-8859-1";		
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Port = 587;
		$mail->Host = "smtp.vipluxuria.com"; 
		$mail->Username = "felipevip@vipluxuria.com"; 
		$mail->Password = "felipe2016"; 
		$mail->SetFrom("felipevip@vipluxuria.com", "$nomeQuemIndicou <$emailsender>");
		$mail->AddAddress("$emaildestinatario", "$nomeQuemIndicou");
		$mail->Subject = $nomeQuemIndicou. ' indicou uma Anunciante!';
		$mail->MsgHTML($corpo); 
		
		// Envia o e-mail
		if($mail->Send()) {
			/*echo "<script>alert('E-mail enviado com Sucesso!')</script>";*/
		} else {
			/*
			echo "<script>alert('Não foi possível enviar o e-mail.')</script>";
			echo "<script>alert('Informações do erro: " . $mail->ErrorInfo . "')</script>";
			*/
		}

			
	}
}
	
	
if ($_REQUEST["votacao"] == "S") {
	//session_start();
	$ip = getenv("REMOTE_ADDR");

	$sql = " SELECT * FROM votacaotransex "
	 . " WHERE idTransex = " . anti_injection($_REQUEST["id"]) . " AND ip='" .$ip . "';";
								 
	$resultado = mysql_query($sql, $conexao);
	if(!$resultado){
		die("Impossível visualizar votacao: " . mysql_error() . '<br>');
	}
							
	$sts = mysql_query($sql);
	$registros = mysql_num_rows($sts);
	if ($registros==0) {
		if ($_REQUEST["voto"] == "aprovado") {
			$sql = " UPDATE transex SET quantidadeVotos= if (quantidadeVotos is null, '0', quantidadeVotos)+1 WHERE idTransex = " . anti_injection($_REQUEST["id"]) . ";"; 
		} else if ($_REQUEST["voto"] == "reprovado") {
			$sql = " UPDATE transex SET quantidadeVotos= if (quantidadeVotos is null, '0', if (quantidadeVotos > 0, quantidadeVotos-1, '0')) WHERE idTransex = " . anti_injection($_REQUEST["id"]) . ";"; 
		}
		$resultado = mysql_query($sql, $conexao);
		
		$sql = " INSERT votacaotransex SET idTransex= " . anti_injection($_REQUEST["id"]) . ", ip='" .$ip . "'"; 
		$resultado = mysql_query($sql, $conexao);

	}
}

						if (anti_injection($_REQUEST["id"]) != "") {
							$sql = " SELECT * FROM transex "
								 . " WHERE flagAtivo = 'Sim' and idTransex = " . anti_injection($_REQUEST["id"]);
								 
							$resultado = mysql_query($sql, $conexao);
							if(!$resultado){
								die("Impossível visualizar as anunciantes: " . mysql_error() . '<br>');
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
									$dote = $row['dote'];									
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
									
									$flagTemVideo = $row['flagTemVideo'];
									
									$cache	= $row['cache'];
									$locais	= $row['locais'];
									$horario	= $row['horario'];
									$cidades = $row['cidades'];
									
									$sobrenome = $row['sobrenome'];
									$telefone2 = $row['telefone2'];
									
									$quantidadeVotos = $row['quantidadeVotos'];
									
									$ddd = $row['ddd'];
									$ddd2 = $row['ddd2']; 
									
									$idOperadora = $row['idOperadora'];
									$idOperadora2 = $row['idOperadora2'];
									$flagWhats = $row['flagWhats'];
									$flagWhats2 = $row['flagWhats2'];																											
																	
									$twitter = $row['twitter'];
									$aceitoCartao = $row['aceitoCartao']; 
									$outros = $row['outros'];
									$flagSexoVirtual = $row['flagSexoVirtual']; 
									
									$imagemExtra1 = $row['imagemExtra1'];
									$imagemExtra2 = $row['imagemExtra2'];
									$imagemExtra3 = $row['imagemExtra3'];
									$imagemExtra4 = $row['imagemExtra4'];
									$imagemExtra5 = $row['imagemExtra5'];		
									$imagemExtra6 = $row['imagemExtra6'];
									
									$flagMostraConteudoExtra = $row['flagMostraConteudoExtra'];																																				
								}
							}
						
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="robots" content="index,follow">
<meta name="description" content="Vip Lux&uacute;ria &eacute; um classificados de an&uacute;ncios de Transex Porto Alegre." />
<meta name="keywords" content="transex porto alegre, transex em Porto Alegre, t-gats Porto Alegre, t-gatas Rio Grande do Sul, transex RS" />

<title>
<?										echo $nome . " " .  $sobrenome . " - Transex - Vip Lux&uacute;ria - Acompanhantes Porto Alegre"; ?>
</title>

<!--CSS-->
<link href="https://vipluxuria.com/css-js/estilos-2.css" rel="stylesheet" type="text/css" />
<link href="https://vipluxuria.com/css-js/menu-2.css" rel="stylesheet" type="text/css" />
<link href="https://vipluxuria.com/css-js/ampliacao-2.css" rel="stylesheet" type="text/css" />
<!--CSS-->
<!--FONTES-->
<script src="https://vipluxuria.com/css-js/cufon-yui.js" type="text/javascript"></script>
<script src="https://vipluxuria.com/css-js/nome_400.font.js" type="text/javascript"></script>
<script src="https://vipluxuria.com/css-js/titulo_400.font.js" type="text/javascript"></script>
<script src="https://vipluxuria.com/Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript">
	Cufon.replace('h1');
	Cufon.replace('h1#titulo,#menu-rodape-content',{ fontFamily: 'titulo' }); 
</script>
<!--FONTES-->

<!--AMPLIAÇÃO-->
<script type="text/javascript" src="https://vipluxuria.com/css-js/visualizador/jquery.js"></script>
<script type="text/javascript" src="https://vipluxuria.com/css-js/visualizador/jquery.lightbox-0.5.js"></script>
<script type="text/javascript" src="https://vipluxuria.com/css-js/visualizador/common.js"></script>
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
<script type="text/javascript" src="../html5gallery/jquery.js"></script>
<script type="text/javascript" src="../html5gallery/html5gallery.js"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5694f32a6ce4d64c" async="async"></script>
<script src="../css-js/jquery.video-extend.js"></script>

<?
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
<form name="form2" method="post" action='perfil-transex.php?id=<?=anti_injection($_REQUEST["id"])?>'>
	<input type="hidden" name="votacao" id="votacao" value="N"> 
	<input type="hidden" name="voto" id="voto" value="N"> 
	<input type="hidden" name="id" value='<?=anti_injection($_REQUEST["id"])?>'> 
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
								<?
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
										echo "<p class='n-whatsapp-op'><a href='tel:(" . $ddd . ") " . $telefone ."'>(" . $ddd . ") " . $telefone ." </a><span class='operadora'>(" . $operadora . ")</span></p>";
									} else {
										echo "<p class='n-telefone'><a href='tel:(" . $ddd . ") " . $telefone ."'>(" . $ddd . ") " . $telefone ."</a><span class='operadora'>(" . $operadora . ")</span></p>";
									}
								} else {
									if ($flagWhats == "S") {
										echo "<p class='n-whatsapp'><a href='tel:(" . $ddd . ") " . $telefone ."'>(" . $ddd . ") " . $telefone ."</a></p>";
									} else {
										echo "<p class='n-telefone'><a href='tel:(" . $ddd . ") " . $telefone ."'>(" . $ddd . ") " . $telefone ."</a></p>";
									}
								}
								
							?>						
						<? //} ?>
						<? if ($telefone2 != "")
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
									echo "<p class='n-whatsapp-op'><a href='tel:(" . $ddd2 . ") " . $telefone2 ."'>(" . $ddd2 . ") " . $telefone2 ."</a> <span class='operadora'>(" . $operadora2 . ")</span></p>";
								} else {
									echo "<p class='n-telefone'><a href='tel:(" . $ddd2 . ") " . $telefone2 ."'>(" . $ddd2 . ") " . $telefone2 ."</a><span class='operadora'>(" . $operadora2 . ")</span></p>";
								}
							} else {
								if ($flagWhats2 == "S") {
									echo "<p class='n-whatsapp'><a href='tel:(" . $ddd2 . ") " . $telefone2 ."'>(" . $ddd2 . ") " . $telefone2 ."</a></p>";
								} else {
									echo "<p class='n-telefone'><a href='tel:(" . $ddd2 . ") " . $telefone2 ."'>(" . $ddd2 . ") " . $telefone2 ."</a></p>";
								}
							}
							
						?>
						<p class="aviso">Ligue e diga que me viu no Vip Lux&uacute;ria!</p>                                                	
					</div><!--TELEFONE-->
					<div class="clear"></div>	

<!--
					<div id="bt-whatsapp"> <a href="https://api.whatsapp.com/send?phone=SeuNumero&text=Olá NOME DO PERFIL, te vi no Vip Luxúria! Gostaria de mais informações." target="_blank"><img src="/imagens/estrutura/bt-whatsapp.png" width="264" height="48" /></a></div><!-- bt-whatsapp -->                      
							<? if ($flagWhats != "" && $flagWhats == "S") { ?>  													
								<div id="bt-whatsapp"> 
									<a href="https://api.whatsapp.com/send?phone=<? echo "55".$ddd. str_replace('-', '', $telefone) .""; ?>&text=Tudo bem? Te vi no site Vip Luxuria. Por gentileza, gostaria de saber mais sobre o seu atendimento!" target="_blank">
										<img src="/imagens/estrutura/bt-whatsapp.png" width="264" height="48" />
									</a>
								</div><!-- bt-whatsapp -->
							<? } ?>   

							<? if ($flagSexoVirtual != "" && $flagSexoVirtual == "S") { ?> 
								<div id="bt-video"> 
										<a href="https://api.whatsapp.com/send?phone=<? echo "55".$ddd. str_replace('-', '', $telefone) .""; ?>&text=Tudo bem? Te vi no site Vip Luxuria. Por gentileza, gostaria de saber mais sobre o seu atendimento de Sexo Virtual!" target="_blank">
										<img src="/imagens/estrutura/bt-video.png" width="264" height="48" />
										</a>
									</a>
								</div><!-- bt-video -->	    
							<? } ?>    								                    
					
                    							
						<? if ($email != "" || $site != "" || $outros != "" ||  $twitter != "") { ?>
							<div class="linha-horizontal"></div> 
							<div id="contatos">
								<? if ($email != "") {?>
									<p class="e-mail"><?=$email?></p>
								<? } ?>
								<? if ($site != "") {?>
									<p class="site"><?=$site?></p>
								<? } ?>
								<? if ($twitter != "") {?>
									<p class="twitter"><?=$twitter?></p>
								<? } ?>
								<? if ($outros != "") {?>
									<p class="outros"><?=$outros?></p>
								<? } ?>
								
							</div>						
						<? } ?>                       

                        <div class="linha-horizontal"></div>			

                        <div id="atendimento">
                        	<h3>Atendimento</h3>
                            <ul>
                            	<li><span class="rotulo">Hor&aacute;rios:</span> <?=$horario?></li>
                                <li><span class="rotulo">Locais:</span> <?=$locais?></li>
                                <li><span class="rotulo">Cidades:</span> <?=$cidades?></li>
                                <li><span class="rotulo">Cach&ecirc;:</span> <?=$cache?></li>
                            </ul>       
                            
							<? if ($aceitoCartao != "" && $aceitoCartao == "Sim") { ?>
								<div id="cartoes"><img src="/imagens/estrutura/aceito-cartoes.png" /></div>      
							<? } ?>    

                        </div>			
                        
						<div class="linha-horizontal"></div>			

						<? if ($video != "" && $flagTemVideo != "Nao") { ?>                       
                        <div id="video">
							<video width="320" height="240" controls>
    							<source src="<?="/sistema/content/".$video?>" type="video/mp4">
							</video>						
                        </div>
                        <div class="linha-horizontal"></div>			
						<? } ?>  
						
						<? 
						if ($flagMostraConteudoExtra != ""  && $flagMostraConteudoExtra != NULL && $flagMostraConteudoExtra == "S") {
							if ($imagemExtra1 != ""  && $imagemExtra1 != NULL){ 
						?>						                   
							<div id="fotos-caseiras">
								<h3>Fotos Caseiras</h3>
								<? if ($imagemExtra1 != "") { ?>
									<div class="fc-thumb"><a href="<?="/sistema/content/".$imagemExtra1?>" data-fancybox="images"><img src="<?="/sistema/content/".$imagemExtra1?>" width="100" height="100" alt="Imagem de <?=$nome?> <?=$sobrenome?> 01" /></a></div>
								<? } ?>
								<? if ($imagemExtra2 != "") { ?>
									<div class="fc-thumb"><a href="<?="/sistema/content/".$imagemExtra2?>" data-fancybox="images"><img src="<?="/sistema/content/".$imagemExtra2?>" width="100" height="100" alt="Imagem de <?=$nome?> <?=$sobrenome?> 02" /></a></div>
								<? } ?>
								<? if ($imagemExtra3 != "") { ?>
									<div class="fc-thumb"><a href="<?="/sistema/content/".$imagemExtra3?>" data-fancybox="images"><img src="<?="/sistema/content/".$imagemExtra3?>" width="100" height="100" alt="Imagem de <?=$nome?> <?=$sobrenome?> 03" /></a></div>
								<? } ?>
								<? if ($imagemExtra4 != "") { ?>
									<div class="fc-thumb"><a href="<?="/sistema/content/".$imagemExtra4?>" data-fancybox="images"><img src="<?="/sistema/content/".$imagemExtra4?>" width="100" height="100" alt="Imagem de <?=$nome?> <?=$sobrenome?> 04" /></a></div>
								<? } ?>
								<? if ($imagemExtra5 != "") { ?>
									<div class="fc-thumb"><a href="<?="/sistema/content/".$imagemExtra5?>" data-fancybox="images"><img src="<?="/sistema/content/".$imagemExtra5?>" width="100" height="100" alt="Imagem de <?=$nome?> <?=$sobrenome?> 05" /></a></div>
								<? } ?>
								<? if ($imagemExtra6 != "") { ?>
									<div class="fc-thumb"><a href="<?="/sistema/content/".$imagemExtra6?>" data-fancybox="images"><img src="<?="/sistema/content/".$imagemExtra6?>" width="100" height="100" alt="Imagem de <?=$nome?> <?=$sobrenome?> 06" /></a></div>
								<? } ?>
	
								<div class="clear"></div> 
							</div> <!-- fotos-caseiras -->
							<div class="linha-horizontal"></div> 
                        <? 
							}
						} 
						?>
						
						
                    	<div id="sou-full">
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
                                <li><span class="rotulo">P&eacute;s:</span> <?=$pes?></li>
                                <li><span class="rotulo">Dote:</span> <?=$dote?></li>
															
                            </ul>
                    	</div><!--40-->
                        <div class="clear"></div>
                    </div><!--COLUNA-PERFIL-ESQ-->	                
    	        	<div id="coluna-perfil-dir">
	        		   	<div class="apresentacao"><?=$mensagem1?></div>
						<div id="fotos">
    	                	<div id="thumbs-fotos">
	                          <ul>
									<li class="thumbPerfilOver"><a href="javascript:loadFoto(0);"><img src="<?="/sistema/content/".$imagemCentral1?>" name="thumb0" width="50" height="50" id="thumb0" alt="Imagem de <?=$nome?> <?=$sobrenome?> 01"  /></a></li>
									<li class="thumbPerfil"><a href="javascript:loadFoto(1);"><img src="<?="/sistema/content/".$imagemCentral2?>" width="50" height="50" id="thumb1" alt="Imagem de <?=$nome?> <?=$sobrenome?> 02" /></a></li>  
								  	<li class="thumbPerfil"><a href="javascript:loadFoto(2);"><img src="<?="/sistema/content/".$imagemCentral3?>" width="50" height="50" id="thumb2" alt="Imagem de <?=$nome?> <?=$sobrenome?> 03" /></a></li>  
								  	<li class="thumbPerfil"><a href="javascript:loadFoto(3);"><img src="<?="/sistema/content/".$imagemCentral4?>" width="50" height="50" id="thumb3" alt="Imagem de <?=$nome?> <?=$sobrenome?> 04" /></a></li>
								  	<li class="thumbPerfil"><a href="javascript:loadFoto(4);"><img src="<?="/sistema/content/".$imagemCentral5?>" width="50" height="50" id="thumb4" alt="Imagem de <?=$nome?> <?=$sobrenome?> 05"  /></a></li>
								  	<li class="thumbPerfil"><a href="javascript:loadFoto(5);"><img src="<?="/sistema/content/".$imagemCentral6?>" width="50" height="50" id="thumb5" alt="Imagem de <?=$nome?> <?=$sobrenome?> 06"  /></a></li>                          
								  	<li class="thumbPerfil"><a href="javascript:loadFoto(6);"><img src="<?="/sistema/content/".$imagemCentral7?>" width="50" height="50" id="thumb6" alt="Imagem de <?=$nome?> <?=$sobrenome?> 07"  /></a></li>                                                      
								  	<li class="thumbPerfil"><a href="javascript:loadFoto(7);"><img src="<?="/sistema/content/".$imagemCentral8?>" width="50" height="50" id="thumb7" alt="Imagem de <?=$nome?> <?=$sobrenome?> 08"  /></a></li>
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


					<div id="compartilhe-twitter"><a href="https://twitter.com/intent/tweet?text=<?php echo $nome . " " .  $sobrenome . " - Transex - Vip Lux&uacute;ria - Acompanhantes Porto Alegre"; ?>&url=<? echo curPageURL(); ?>"><img src="/imagens/estrutura/compartilhe-twitter.png"></a>
						</div>						
						
                        <div class="clear"></div>
						<div id="me-indique">
                        	<h3>Me indique para um Amigo</h3>
							<form name="form3" method="post" action='/perfil-transex/<?=$id?>/<?=tirarAcentos($nome)?><? if($sobrenome != "") { echo "-".tirarAcentos(str_replace(" ", "-", $sobrenome));}?>'>
								<input type="hidden" name="amigoIndicado" id="amigoIndicado" value="N"> 
								<input type="hidden" name="nomeAnunciante" id="nomeAnunciante" value="<? echo $nome . " " .  $sobrenome ?>"> 
								<input type="hidden" name="linkAnunciante" id="linkAnunciante" value="https://vipluxuria.com/conteudo/perfil-transex.php?id=<?=anti_injection($_REQUEST['id'])?>"> 
							
								<input type="hidden" name="id" value='<?=anti_injection($_REQUEST["id"])?>'> 
								
								<input name="nomeQuemIndicou" id="nomeQuemIndicou" type="text" placeholder="Seu Nome" />
								<input name="emailQuemIndicou" id="emailQuemIndicou" type="text" placeholder="Seu E-mail" />
								<input name="nomeAmigo" id="nomeAmigo" type="text" placeholder="Nome do Amigo" />
								<input name="emailAmigo" id="emailAmigo" type="text" placeholder="E-mail do Amigo" />
								<div class="bt-enviar"><img src="https://vipluxuria.com/imagens/estrutura/bt-enviar-indique.png" onclick="indicaAmigo()" /></div>
							</form>
						</div> 
						<div class="clear"></div> 
					
                	</div><!--COLUNA-PERFIL-1--> 
	                
   	              <div class="clear"></div>
                
				</div><!--PERFIL CONTENT-->
				
            </div><!--PRINCIPAL CONTENT-->
        </div><!--PRINCIPAL-->
	</div><!--BG-COURO-->
    <div id="rodape">
		<?php include("../php/rodape-2.php"); ?>
    </div><!--RODAPE-->
    <div id="tags">
		<?php include("../php/tags-transex.php"); ?>
    </div><!--TAGS-->
</div><!--wrap-->
<script type="text/javascript"> Cufon.now(); </script>
<?php include("../php/google.php"); ?>
<script type="text/javascript" src="https://vipluxuria.com/css-js/visualizador/perfil.js"></script>

<!-- JS - FANCYBOX -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="/css-js/jquery.fancybox.min.js"></script>

</body>
</html>
<? } ?>