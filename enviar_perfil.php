<?php 	$conexao = require_once 'php/conecta_mysql.php';  ?>
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


	function marcaRadio($arr,$name,$sel = "", $js="") {
		$out = "";
		
		while (list($key, $val) = each($arr)) {
			$string = explode(",",$val);
			$label = $string[1];
			$valor = $string[0];
			$select_v = ($sel && $valor == $sel)?" checked":"";
			$out .= "<input type=radio name=\"$name\" value=\"$valor\" $select_v $js> $label";
		}
		echo $out;
	}


		if (anti_injection(isset($_REQUEST["emailBD"]) ? $_REQUEST["emailBD"] : "") != "") {
			$sql = " SELECT * FROM mulher "
				 . " WHERE flagAtivo = 'Sim' and email = '" . anti_injection(isset($_REQUEST["emailBD"]) ? $_REQUEST["emailBD"] : "") . "'  ";
				 
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
					
					$imagemCapa = $row['imagemCapa'];									
				}
			}
						
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="robots" content="index,follow">

<meta name="description" content="Vip Luxúria é um classificados de anúncio de Acompanhantes de Porto Alegre." />
<meta name="keywords" content="Acompanhantes Porto Alegre, Acompanhantes em Porto Alegre, Acompanhante em Porto Alegre, Garota de Programa Porto Alegre, Garotas de Programa Porto Alegre, Acompanhante Porto Alegre, Acompanhantes RS, Acompanhantes Rio Grande do Sul, Acompanhantes poa, Guia Erótico Porto Alegre, Guia de Acompanhantes Porto Alegre, Anúncios de Acompanhantes Porto Alegre, Acompanhantes POA, Acompanhante" />


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
<link href="css-js/estilos.css" rel="stylesheet" type="text/css" />
<link href="css-js/menu.css" rel="stylesheet" type="text/css" />
<link href="css-js/ampliacao.css" rel="stylesheet" type="text/css" />
<!--CSS-->
<!--FONTES-->
<script src="css-js/cufon-yui.js" type="text/javascript"></script>
<script src="css-js/nome_400.font.js" type="text/javascript"></script>
<script src="css-js/titulo_400.font.js" type="text/javascript"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript">
	Cufon.replace('h1');
	Cufon.replace('h1#titulo,.titulo-destaques, #menu-content, #menu-rodape-content, #rodape-content h3,#titulo-pag, #coluna-perfil-2 h3',{ fontFamily: 'titulo' }); 
	Cufon.replace('p.nome,.nome-acompanhante',{ fontFamily: 'nome' }); 
</script>
<!--FONTES-->

<!--AMPLIAÇÃO-->
<script type="text/javascript" src="css-js/visualizador/jquery.js"></script>
<script type="text/javascript" src="css-js/visualizador/jquery.lightbox-0.5.js"></script>
<script type="text/javascript" src="css-js/visualizador/common.js"></script>
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

//document.oncontextmenu = desabilitaMenu;
//document.onmousedown = desabilitaBotaoDireito;
//document.onmouseup = desabilitaBotaoDireito;
</script>

<script type="text/javascript" src="/html5gallery/jquery.js"></script>
<script type="text/javascript" src="/html5gallery/html5gallery.js"></script>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5694f32a6ce4d64c" async="async"></script>

<script language="javascript" type="text/javascript">
	function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#'+id)
			.attr('src', e.target.result)
			;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

<style>
input[type=file] {
    position: relative;
	top: -19px;
	padding-left: 5px;
}

.mini_foto {
    margin-top: 12px;
}

</style>

</head>

<body>

<form name="form2" method="post" action='perfil.php?id=<?=anti_injection(isset($_REQUEST["id"]) ? $_REQUEST["id"] : "")?>'>
	<input type="hidden" name="votacao" id="votacao" value="N"> 
	<input type="hidden" name="voto" id="voto" value="N"> 
	<input type="hidden" name="id" value='<?=anti_injection(isset($_REQUEST["id"]) ? $_REQUEST["id"] : "")?>'> 
</form>

<div id="wrap">
	<div id="faixa"></div><!--FAIXA-->
    <div id="bg-rosa">
        <div id="topo">
            <?php include("php/topo.php"); ?>
        </div><!--TOPO-->
        <div id="menu">
            <?php include("php/menu.php"); ?>
        </div><!--MENU-->
        <div id="titulo-pag">
        	<!-- <h1>Acompanhantes Mulheres</h1>-->
        </div><!--TITULO-PAG-->
    </div><!--BG ROSA-->
    <div id="bg-couro">    
        <div id="principal">
            <div id="principal-perfil">
				<div id="header-perfil">
					<div id="nome">
						<span class="esq"></span>
						<span class="nome-acompanhante"><input type="text" id="nomeA" name="nomeA" size="15" style="padding:3px;" value="<?=$nome?> <?=$sobrenome?>"></span>
						<span class="dir"></span>
                        <div class="clear"></div>
					</div><!--NOME-->
					<div id="telefone">
						<p class="n-telefone">
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
									echo "<p class='n-whatsapp-op'><input type='text' id='telefoneA' name='telefoneA' size='15' style='padding:3px;' value='" . $operadora . " (" . $ddd . ") " . $telefone ."'></p>";
								} else {
									echo "<p class='n-telefone'><input type='text' id='telefoneA' name='telefoneA' size='15' style='padding:3px;' value='" . $operadora . " (" . $ddd . ") " . $telefone ."'></p>";
								}
							} else {
								if ($flagWhats == "S") {
									echo "<p class='n-whatsapp'><input type='text' id='telefoneA' name='telefoneA' size='15' style='padding:3px;' value='(" . $ddd . ") " . $telefone ."'></p>";
								} else {
									echo "<p class='n-telefone'><input type='text' id='telefoneA' name='telefoneA' size='15' style='padding:3px;' value='(" . $ddd . ") " . $telefone ."'></p>";
								}
							}
							
						?>						
						</p>
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
									echo "<p class='n-whatsapp-op'><input type='text' id='telefoneB' name='telefoneB' size='15' style='padding:3px;' value='" . $operadora2 . " (" . $ddd2 . ") " . $telefone2 ."'></p>";
								} else {
									echo "<p class='n-telefone'><input type='text' id='telefoneB' name='telefoneB' size='15' style='padding:3px;' value='" . $operadora2 . " (" . $ddd2 . ") " . $telefone2 ."'></p>";
								}
							} else {
								if ($flagWhats2 == "S") {
									echo "<p class='n-whatsapp'><input type='text' id='telefoneB' name='telefoneB' size='15' style='padding:3px;' value='(" . $ddd2 . ") " . $telefone2 ."'></p>";
								} else {
									echo "<p class='n-telefone'><input type='text' id='telefoneB' name='telefoneB' size='15' style='padding:3px;' value='(" . $ddd2 . ") " . $telefone2 ."'></p>";
								}
							}

						?>
						<p class="aviso">Ligue e diga que me viu no Vip Luxúria!</p>                                                	
					</div><!--TELEFONE-->
					<div id="endereco">
						<p class="e-mail"><input type="text" id="emailA" name="emailA" size="24" style="padding:3px;" value="<?=$email?>"></p>
                        <p class="site"><input type="text" id="siteA" name="siteA" size="24" style="padding:3px;" value="<?=$site?>"></p>
					</div><!--ENDERECO-->
                    <div class="clear"></div>
				</div><!--HEADER PERFIL-->
              	<div id="perfil-content">
	                <div class="divisor" style="margin-bottom:20px;"></div>   			
    	        	<div id="coluna-perfil-1" style="width: 519px;">
	        		   	<span class="apresentacao"><textarea id="mensagem1" name="mensagem1" cols="64" rows="9"><?=strip_tags($mensagem1)?></textarea></span>
						<div class="divisor" style="margin-bottom:20px; margin-top:20px;"></div>
						<div id="fotos">
    	                	<div id="thumbs-fotos">

								<img src="<?="/sistema/content/".$imagemCapa?>"  width="55" height="55"   id="mini_foto_newCapa" class="mini_foto" />
								<input type="file" id="imagemCapa" name="imagemCapa" onchange="readURL(this,'mini_foto_newCapa');" /><BR>							  

								<img src="<?="/sistema/content/".$imagemCentral1?>"  width="55" height="55"   id="mini_foto_new" class="mini_foto" />
								<input type="file" id="imagem1" name="imagem1" onchange="readURL(this,'mini_foto_new');" /><BR>							  
								
								<img src="<?="/sistema/content/".$imagemCentral2?>" name="thumb0" width="55" height="55"   id="mini_foto_new2" class="mini_foto" />
								<input type="file" id="imagem2" name="imagem2" onchange="readURL(this,'mini_foto_new2');" /><BR>							  
								
								<img src="<?="/sistema/content/".$imagemCentral3?>" name="thumb0" width="55" height="55"   id="mini_foto_new3" class="mini_foto" />
								<input type="file" id="imagem3" name="imagem3" onchange="readURL(this,'mini_foto_new3');" /><BR>							  
								
								<img src="<?="/sistema/content/".$imagemCentral4?>" name="thumb0" width="55" height="55"   id="mini_foto_new4" class="mini_foto" />
								<input type="file" id="imagem4" name="imagem4" onchange="readURL(this,'mini_foto_new4');" /><BR>							  
								
								<img src="<?="/sistema/content/".$imagemCentral5?>" name="thumb0" width="55" height="55"   id="mini_foto_new5" class="mini_foto" />
								<input type="file" id="imagem5" name="imagem5" onchange="readURL(this,'mini_foto_new5');" /><BR>							  
								
								<img src="<?="/sistema/content/".$imagemCentral6?>" name="thumb0" width="55" height="55"   id="mini_foto_new6" class="mini_foto" />
								<input type="file" id="imagem6" name="imagem6" onchange="readURL(this,'mini_foto_new6');" /><BR>							  
								
								<img src="<?="/sistema/content/".$imagemCentral7?>" name="thumb0" width="55" height="55"   id="mini_foto_new7" class="mini_foto" />
								<input type="file" id="imagem7" name="imagem7" onchange="readURL(this,'mini_foto_new7');" /><BR>							  
								
								<img src="<?="/sistema/content/".$imagemCentral8?>" name="thumb0" width="55" height="55"   id="mini_foto_new8" class="mini_foto" />
								<input type="file" id="imagem8" name="imagem8" onchange="readURL(this,'mini_foto_new8');" /><BR>							  

							  <!--
	                          <ul>
																  
									<li class="thumbPerfil"><a href="javascript:loadFoto(0);"><img src="<?="/sistema/content/".$imagemCentral1?>" name="thumb0" width="50" height="50" id="thumb0"  /></a></li>
									<input type='file' name='imagem1' size='25'><BR>
									<li class="thumbPerfil"><a href="javascript:loadFoto(1);"><img src="<?="/sistema/content/".$imagemCentral2?>" width="50" height="50" id="thumb1" /></a></li>  
									<input type='file' name='imagem2' size='25'><BR>
								  	<li class="thumbPerfil"><a href="javascript:loadFoto(2);"><img src="<?="/sistema/content/".$imagemCentral3?>" width="50" height="50" id="thumb2" /></a></li>  
									<input type='file' name='imagem3' size='25'><BR>
								  	<li class="thumbPerfil"><a href="javascript:loadFoto(3);"><img src="<?="/sistema/content/".$imagemCentral4?>" width="50" height="50" id="thumb3" /></a></li>
									<input type='file' name='imagem4' size='25'><BR>
								  	<li class="thumbPerfil"><a href="javascript:loadFoto(4);"><img src="<?="/sistema/content/".$imagemCentral5?>" width="50" height="50" id="thumb4" /></a></li>
									<input type='file' name='imagem5' size='25'><BR>
								  	<li class="thumbPerfil"><a href="javascript:loadFoto(5);"><img src="<?="/sistema/content/".$imagemCentral6?>" width="50" height="50" id="thumb5" /></a></li>                          
									<input type='file' name='imagem6' size='25'><BR>
								  	<li class="thumbPerfil"><a href="javascript:loadFoto(6);"><img src="<?="/sistema/content/".$imagemCentral7?>" width="50" height="50" id="thumb6" /></a></li>                                                      
									<input type='file' name='imagem7' size='25'><BR>
								  	<li class="thumbPerfil"><a href="javascript:loadFoto(7);"><img src="<?="/sistema/content/".$imagemCentral8?>" width="50" height="50" id="thumb7" /></a></li>
									<input type='file' name='imagem8' size='25'><BR>
								</ul> <!-- Fim Thumbs -->                        
							
							
							<div class="clear"></div>
						</div> <!--THUMBS FOTOS-->
						<!--
                        <div class="clear"></div>
                        <div id="ampliacao">
                            <div class="colunaFotoH" id="colunaFoto" style="display:none;"> </div>
                            <div id="imgLoader"> <img src="../imagens/ajax-loader.gif" alt="Carregando..."  /> </div>
                            <div align="center">
								<img src="<?="/sistema/content/".$imagemCentral1?>"  id="fotoPerfil" />
                            </div>                        
                
                        </div> <!-- Fim Ampliacao -->
                        <div class="clear"></div>

                    </div><!--FOTOS-->
                	</div><!--COLUNA-PERFIL-1-->
                	<div id="coluna-perfil-2" style="width: 420px;">
                    	<div id="sou">
                        	<h3>Como Sou</h3>
                            <ul>
                            	<li style="margin-bottom: 6px;"><strong>Idade: </strong> <input type="text" id="idadeA" name="idadeA" size="1" style="padding:2px;" value="<?=$idade?>"> anos</li>
                                <li style="margin-bottom: 6px;"><strong>Altura:</strong> <input type="text" id="alturaA" name="alturaA" size="1" style="padding:2px;" value="<?=$altura?>"> m</li>
                                <li style="margin-bottom: 6px;"><strong>Peso:&nbsp;&nbsp;</strong> <input type="text" id="pesoA" name="pesoA" size="1" style="padding:2px;" value="<?=$peso?>"> Kg</li>
                                <li style="margin-bottom: 6px;"><strong>Olhos:&nbsp;</strong> <input type="text" id="olhosA" name="olhosA" size="2" style="padding:2px;" value="<?=$olhos?>"></li>
                                <li style="margin-bottom: 6px;"><strong>Cabelos:</strong> <input type="text" id="cabelosA" name="cabelosA" size="2" style="padding:2px;" value="<?=$cabelos?>"></li>
                                <li style="margin-bottom: 6px;"><strong>Busto: &nbsp;&nbsp;</strong> <input type="text" id="bustoA" name="bustoA" size="1" style="padding:2px;" value="<?=$busto?>"> cm</li>
                                <li style="margin-bottom: 6px;"><strong>Quadril:</strong> <input type="text" id="quadrilA" name="quadrilA" size="1" style="padding:2px;" value="<?=$quadril?>"> cm</li>
                                <li style="margin-bottom: 6px;"><strong>Cintura:</strong> <input type="text" id="cinturaA" name="cinturaA" size="1" style="padding:2px;" value="<?=$cintura?>"> cm</li>
                                <li style="margin-bottom: 6px;"><strong>Pés: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong> <input type="text" id="pesA" name="pesA" size="1" style="padding:2px;" value="<?=$pes?>"></li>
                                <li style="margin-bottom: 6px;"><strong>Manequim:</strong> <input type="text" id="manequimA" name="manequimA" size="1" style="padding:2px;" value="<?=$manequim?>"></li>
                            </ul> 
                        </div><!--40-->
                        <div id="faco" style="width: 270px;">
                        	<h3>O que Faço</h3>
							<?php $lista_flag = array("Sim,Sim","Não,Não","Talvez,Talvez"); ?>
                            <ul>
                            	<li style="margin-bottom: 6px;"><strong>Beijo na Boca?</strong> <?php marcaRadio($lista_flag, "beijoBoca",$flagBeijoBoca); ?> </li>
                                <li style="margin-bottom: 6px;"><strong>Faço Oral?</strong> <?php marcaRadio($lista_flag, "oral",$flagOral); ?> </li>
                                <li style="margin-bottom: 6px;"><strong>Faço Anal?</strong>  <?php marcaRadio($lista_flag, "anal",$flagAnal); ?></li>
                                <li style="margin-bottom: 6px;"><strong>Faço Dominação?</strong>  <?php marcaRadio($lista_flag, "dominacao",$flagDominacao); ?></li>
                                <li style="margin-bottom: 6px;"><strong>Faço Inversão?</strong>  <?php marcaRadio($lista_flag, "inversao",$flagInversao); ?></li>
                                <li style="margin-bottom: 6px;"><strong>Atendo Eles?</strong>  <?php marcaRadio($lista_flag, "atendoEles",$flagAtendoEles); ?></li>
                                <li style="margin-bottom: 6px;"><strong>Atendo Elas?</strong>  <?php marcaRadio($lista_flag, "atendoElas",$flagAtendoElas); ?></li>
                                <li style="margin-bottom: 6px;"><strong>Atendo Casais?</strong>  <?php marcaRadio($lista_flag, "atendoCasais",$flagAtendoCasais); ?></li>
                                <li style="margin-bottom: 6px;"><strong>Acessórios?</strong>  <?php marcaRadio($lista_flag, "acessorios",$flagAcessorios); ?></li>
                                <li style="margin-bottom: 6px;"><strong>Eventos?</strong>  <?php marcaRadio($lista_flag, "eventos",$flagEventos); ?></li>
                                <li style="margin-bottom: 6px;"><strong>Viagens?</strong>  <?php marcaRadio($lista_flag, "viagens",$flagViagens); ?></li>
                                <li style="margin-bottom: 6px;"><strong>Tenho Amigas?</strong>  <?php marcaRadio($lista_flag, "tenhoAmigas",$flagTenhoAmigas); ?></li>
                            </ul>
                        </div><!--60-->
                        <div class="clear"></div>
                        <div class="divisor" style="margin-top:20px; margin-bottom:20px;"></div>
                        <div id="compartilhar">
                        	<h3>Compartilhar</h3>
                            <div class="addthis_native_toolbox"></div>
						</div> <!-- Fim Compartilhar --> 						
						<div class="divisor" style="margin-top:20px; margin-bottom:20px;"></div>                        
						<div id="atendimento">
                        	<h3>Atendimento</h3>
                            <ul>
                            	<li><strong>Horários:</strong> <input type="text" id="horarioA" name="horarioA" size="24" style="padding:3px;" value="<?=$horario?>"></li>
                                <li><strong>Cachê:&nbsp;&nbsp;&nbsp;&nbsp;</strong> <input type="text" id="cacheA" name="cacheA" size="24" style="padding:3px;" value="<?=$cache?>"></li>
                                <li><strong>Locais:&nbsp;&nbsp;&nbsp;&nbsp;</strong> <textarea id="locaisA" name="locaisA" cols="26" rows="4"><?=strip_tags($locais)?></textarea> </li>
                                <li><strong>Cidades:&nbsp;</strong> <input type="text" id="cidadesA" name="cidadesA" size="24" style="padding:3px;" value="<?=$cidades?>"></li>
                            </ul>                            
                        </div>						
                        <div class="divisor" style="margin-top:40px; margin-bottom:70px;"></div> 
						<?php if ($video != "" && $flagTemVideo != "Nao") { ?>                       
						<!--
                        <div id="video">
                        	<h3>Vídeo</h3>
                            <div class="html5gallery" data-width="320" data-height="240" data-src="<?="/sistema/content/".$video?>" data-autoplayvideo="false" data-padding="0" style="display:none;"></div>
                        </div>
						<div class="divisor" style="margin-top:20px; margin-bottom:20px;"></div>                        
						-->
					    <?php } ?>
                        
							<div class="bt-voltar" style="margin-top:40px;"><a href="javascript:window.history.go(-1)"><img src="/imagens/estrutura/bt-enviar.png" /></a></div>
                        </div>
	                </div><!--COLUNA-PERFIL-2-->
   	              <div class="clear"></div>                  
				</div><!--PERFIL CONTENT-->
            </div><!--PRINCIPAL CONTENT-->
        </div><!--PRINCIPAL-->
	</div><!--BG-COURO-->
    <div id="rodape">
		<?php include("php/rodape.php"); ?>
    </div><!--RODAPE-->
    <div id="menu-rodape">
		<?php include("php/menu-rodape.php"); ?>
    </div><!--MENU RODAPE-->
    <div id="tags">
		<?php include("php/tags-mulheres.php"); ?>
    </div><!--TAGS-->
</div><!--wrap-->
<script type="text/javascript"> Cufon.now(); </script>
<?php include("php/google.php"); ?>
<script type="text/javascript" src="../css-js/visualizador/perfil.js"></script>
</body>
</html>
<?php } ?>
