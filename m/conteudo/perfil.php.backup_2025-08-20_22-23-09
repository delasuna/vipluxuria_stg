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


						if (anti_injection($_REQUEST["id"]) != "") {
							$sql = " SELECT * FROM mulher "
								 . " WHERE flagAtivo = 'Sim' and idMulher = " . anti_injection($_REQUEST["id"]);
								 
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
									
									$imagemExtra1 = $row['imagemExtra1'];
									$imagemExtra2 = $row['imagemExtra2'];
									$imagemExtra3 = $row['imagemExtra3'];
									$imagemExtra4 = $row['imagemExtra4'];
									$imagemExtra5 = $row['imagemExtra5'];		
									$imagemExtra6 = $row['imagemExtra6'];
									$flagMostraConteudoExtra = $row['flagMostraConteudoExtra'];																		

									$flagSexoVirtual = $row['flagSexoVirtual'];
								}
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

<title>
<?									
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
	Cufon.replace('h1#titulo,.titulo, #menu-content, #menu-rodape-content, #rodape-content h3',{ fontFamily: 'titulo' }); 
	Cufon.replace('p.nome',{ fontFamily: 'nome' }); 
</script>
<!--FONTES-->

<!--galeria-->
<link rel='stylesheet' href='../css-js/nchlightbox-1.1.css'>
<script src='../css-js/jquery-1.10.1.min.js'></script>
<script src='../css-js/jquery.hammer.min.js'></script>
<script src='../css-js/jquery.nchlightbox-1.1.min.js'></script>
<!--galeria-->

<script type="text/javascript" src="../../html5gallery/html5gallery.js"></script>
<script src="../../css-js/jquery.video-extend.js"></script>

<!-- FANCYBOX -->
<link rel="stylesheet" type="text/css" href="/css-js/jquery.fancybox.min.css">

</head>

<body>
	<div id="wrap">
		<?php include("../php/topo.php"); ?>
        <div id="content">
			<div id="perfil">
                <p class="nome"><?=$nome?> <?=$sobrenome?></p>
                <p class="telefone"><a href="tel:0<?=$ddd?><?=$telefone?>">(<?=$ddd?>)&nbsp;<?=$telefone?></a></p>
				
<!--                <div id="bt-whatsapp"> <a href="https://api.whatsapp.com/send?phone=SeuNumero&text=Olá NOME DO PERFIL, te vi no Vip Luxúria! Gostaria de mais informações." target="_blank"><img src="/m/imagens/estrutura/bt-whatsapp.png" /></a></div><!-- bt-whatsapp -->
					<div id="bt-whatsapp"> 
						<a href="https://api.whatsapp.com/send?phone=<? echo "55".$ddd. str_replace('-', '', $telefone) .""; ?>&text=Tudo bem? Te vi no site Vip Luxuria. Por gentileza, gostaria de saber mais sobre o seu atendimento!" target="_blank">
							<img src="/m/imagens/estrutura/bt-whatsapp.png" width="264" height="48" />
						</a>
					</div><!-- bt-whatsapp -->
					
					<? if ($flagSexoVirtual != "" && $flagSexoVirtual == "S") { ?> 
						<div id="bt-video"> 
							<a href="https://api.whatsapp.com/send?phone=<? echo "55".$ddd. str_replace('-', '', $telefone) .""; ?>&text=Tudo bem? Te vi no site Vip Luxuria. Por gentileza, gostaria de saber mais sobre o seu atendimento de Sexo Virtual!" target="_blank">
								<img src="/m/imagens/estrutura/bt-video.png" width="264" height="48" />
							</a>
						</div><!-- bt-video -->
					<? } ?>    											

                <div class="clear"></div>
                
              <ul style="width:100%;" class="dados-basicos">
                	<li><strong>Idade:</strong> <?=$idade?> anos</li>
                   	<li><strong>Altura:</strong> <?=$altura?> m</li>
                   	<li><strong>Peso:</strong> <?=$peso?> Kg</li>                
              </ul>
                <div class="clear"></div>
                <div class="hr"></div>               
                <a href="<?="/sistema/content/".$imagemCentral1?>" rel='mygallery' class='nch-lightbox'><img src="<?="/sistema/content/".$imagemCentral1?>" alt=''></a>
				<a href="<?="/sistema/content/".$imagemCentral2?>" rel='mygallery' class='nch-lightbox'><img src="<?="/sistema/content/".$imagemCentral2?>" alt=''></a>
                <a href="<?="/sistema/content/".$imagemCentral3?>" rel='mygallery' class='nch-lightbox'><img src="<?="/sistema/content/".$imagemCentral3?>" alt=''></a>
				<a href="<?="/sistema/content/".$imagemCentral4?>" rel='mygallery' class='nch-lightbox'><img src="<?="/sistema/content/".$imagemCentral4?>" alt=''></a>
                <a href="<?="/sistema/content/".$imagemCentral5?>" rel='mygallery' class='nch-lightbox'><img src="<?="/sistema/content/".$imagemCentral5?>" alt=''></a>
				<a href="<?="/sistema/content/".$imagemCentral6?>" rel='mygallery' class='nch-lightbox'><img src="<?="/sistema/content/".$imagemCentral6?>" alt=''></a>
                <a href="<?="/sistema/content/".$imagemCentral7?>" rel='mygallery' class='nch-lightbox'><img src="<?="/sistema/content/".$imagemCentral7?>" alt=''></a>
				<a href="<?="/sistema/content/".$imagemCentral8?>" rel='mygallery' class='nch-lightbox'><img src="<?="/sistema/content/".$imagemCentral8?>" alt=''></a>
                <div class="clear"></div>
                <div class="hr"></div>
                
				<? if ($video != "" && $flagTemVideo != "Nao") { ?>                       
                <p class="titulo">Vídeo - Mídia de Comparação</p>
					<video width="289" height="217" controls>
    					<source src="<?="/sistema/content/".$video?>" type="video/mp4">
					</video>	                
                <br/>
                <div class="hr"></div>
					    <? } ?>     
						
						<? 
						if ($flagMostraConteudoExtra != ""  && $flagMostraConteudoExtra != NULL && $flagMostraConteudoExtra == "S") {
							if ($imagemExtra1 != ""  && $imagemExtra1 != NULL){ 
						?>						                   
							<div id="fotos-caseiras">
								<p class="titulo">Fotos Caseiras</p>
								
								<? if ($imagemExtra1 != "") { ?>
									<a href="<?="/sistema/content/".$imagemExtra1?>" rel='mygallery' class='nch-lightbox'><img src="<?="/sistema/content/".$imagemExtra1?>" width="100" height="100" /></a>
								<? } ?>
								<? if ($imagemExtra2 != "") { ?>
									<a href="<?="/sistema/content/".$imagemExtra2?>" rel='mygallery' class='nch-lightbox'><img src="<?="/sistema/content/".$imagemExtra2?>" width="100" height="100" /></a>
								<? } ?>
								<? if ($imagemExtra3 != "") { ?>
									<a href="<?="/sistema/content/".$imagemExtra3?>" rel='mygallery' class='nch-lightbox'><img src="<?="/sistema/content/".$imagemExtra3?>" width="100" height="100" /></a>
								<? } ?>
								<? if ($imagemExtra4 != "") { ?>
									<a href="<?="/sistema/content/".$imagemExtra4?>" rel='mygallery' class='nch-lightbox'><img src="<?="/sistema/content/".$imagemExtra4?>" width="100" height="100" /></a>
								<? } ?>
								<? if ($imagemExtra5 != "") { ?>
									<a href="<?="/sistema/content/".$imagemExtra5?>" rel='mygallery' class='nch-lightbox'><img src="<?="/sistema/content/".$imagemExtra5?>" width="100" height="100" /></a>
								<? } ?>
								<? if ($imagemExtra6 != "") { ?>
									<a href="<?="/sistema/content/".$imagemExtra6?>" rel='mygallery' class='nch-lightbox'><img src="<?="/sistema/content/".$imagemExtra6?>" width="100" height="100" /></a>
								<? } ?>
	
								<div class="clear"></div> 
							</div> <!-- fotos-caseiras -->
							<div class="hr"></div>
                        <? 
							}
						} 
						?>

                
                <p class="titulo">Como Sou?</p>
				<div class="esq">
                    <ul>
                        <li><strong>Olhos:</strong> <?=$olhos?></li>
                        <li><strong>Cabelos:</strong> <?=$cabelos?></li>                                        
                        <li><strong>Bustos:</strong> <?=$busto?> cm</li>
                        <li><strong>Quadril:</strong>  <?=$quadril?> cm</li>                    
                    </ul>
                </div>
                <div class="dir">
                    <ul>
                        <li><strong>Cintura:</strong> <?=$cintura?>  cm</li>
                        <li><strong>Pés:</strong> <?=$pes?></li>
                        <li><strong>Manequim:</strong> <?=$manequim?></li>                                        
                    </ul> 
				</div>
                <div class="clear"></div>    
                <div class="hr"></div>                            
                <p class="titulo">O que faço?</p>
				<div class="esq">
                    <ul>
                        <li><strong>Beijo na Boca?</strong> <?=$flagBeijoBoca?></li>
                        <li><strong>Oral?</strong>  <?=$flagOral?></li>
                        <li><strong> Anal?</strong> <?=$flagAnal?></li>                                        
                        <li><strong> Inversão?</strong> <?=$flagInversao?></li>
                        <li></li>   
                        <li><strong>Domin&ccedil;&atilde;o?</strong> <?=$flagDominacao?></li>
                        <li><strong>Acess&oacute;rios?</strong> <?=$flagAcessorios?></li>                                        
                    </ul>
				</div>
                <div class="dir">
                    <ul>
                        <li><strong>Atendo Elas?</strong> <?=$flagAtendoElas?></li>
                        <li><strong>Atendo Eles?</strong> <?=$flagAtendoEles?></li>      
                        <li><strong>Atendo Casais:</strong> <?=$flagAtendoCasais?></li>
                        <li><strong>Tenho Amigas?</strong> <?=$flagTenhoAmigas?></li>
                        <li><strong>Eventos?</strong> <?=$flagEventos?></li>   
                        <li><strong>Viagens?</strong>  <?=$flagViagens?></li>                                                         
                    </ul> 
				</div>
                <div class="clear"></div>    
                <div class="hr"></div>                
                <p class="titulo">Atendimento</p>
				<ul style="width:100%;" class="atendimento">
                	<li><strong>Horário:</strong> <?=$horario?></li>
                   	<li><strong>Cachê:</strong> <?=$cache?></li>
                   	<li><strong>Local:</strong>  <?=$locais?></li> 
                   	<li><strong>Cidade(s):</strong>  <?=$cidades?></li>                                    
                </ul>
				<div class="hr"></div>
				<div class="apresentacao"><?=$mensagem1?></div>
            
          </div>        
          <div class="voltar"><a href="acompanhantes-porto-alegre.php"><img src="/m/imagens/bt-voltar.png" width="75" height="34" /></a></div>                                             
        </div><!--content-->
</div><!--wrap-->
     
<script type="text/javascript"> Cufon.now(); </script>  
<?php include("../../php/google.php"); ?>   
</body>
</html>
<? } ?>