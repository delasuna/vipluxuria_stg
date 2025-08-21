<? require_once("verifica.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="robots" content="index,follow">
	<meta name="description" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS" />
	<meta name="keywords" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS" />

	<title>Vip Lux&uacute;ria - Acompanhantes Porto Alegre</title>

	<!-- CSS Principais -->
	<link href="/sistema/content/css-js/estilos-sistema.css" rel="stylesheet" type="text/css" />
	<link href="/sistema/content/css-js/menu-sistema.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="../css/config.css" type="text/css" />
	<link rel="stylesheet" href="../css/text.css" type="text/css" />
	
	<script type="text/javascript" src="../imagens/js/prototype.js"></script>
	<script type="text/javascript" src="../imagens/js/scriptaculous.js?load=effects"></script>
	<script type="text/javascript" src="../imagens/js/lightbox.js"></script>
	<link rel="stylesheet" href="../css/lightbox.css" type="text/css" media="screen" />

	<link rel="stylesheet" type="text/css" href="../css/content_sis.css">
	<link rel="stylesheet" type="text/css" href="../css/header_sis.css">	
	<script language="javascript" src="../js/checkall.js"></script>

	<!-- Fim CSS Principais -->

	<!-- Cufon -->
	<script src="/css-js/cufon-yui.js"></script>
	<script type="text/javascript" src="/css-js/Bauhaus_Md_BT_400.font.js"></script>

	<script type="text/javascript">
		Cufon.replace('#navmenu-h');
		Cufon.replace('#slogan');
		Cufon.replace('h1, h2, h3, h4');
		Cufon.replace('.menu-rodape');
	</script>
	<!-- Fim Cufon -->

	<!-- Functions -->
	<script src="/css-js/functions.js" type="text/javascript"></script>
	<!-- Fim unctions -->



</head>

<body> 
<a name="inicio"></a> 
<div class="voltar-inicio"><a href="#inicio"><img src="/imagens/base/seta-topo.png" alt="Retornar Topo da P&aacute;gina" width="30" height="30" border="0" /></a>
</div>
<div id="tudo">
    <div id="conteudo">
        <div id="topo">
        	<div id="topo-content">
        		<?php include("php/topo-sistema.php"); ?>
            </div>
       </div>
       <div id="header">
       		<div id="header-content">
        		<?php include("php/header-sistema.php"); ?>            
            </div>
       </div>
       
       <div id="menu">
       		<div id="menu-content">
        		<?php include("php/menu-sistema.php"); ?>             
            </div>
       </div>
      <div id="titulo">
       		<div id="titulo-content">
				<h1>Classificados</h1>
            </div>
            <div class="traco"></div>
      </div>
    
        <div id="principal">
        	<div id="principal-topo"></div>

            <div id="principal-content">
			    <div id="coluna-esquerda-full">
            		<p> 

						<?
						/* 	Modelo de página que apresenta um formulário para inclusão/alteração de registros */
						
						include("../inc/common.php");
						
						/*	estabelece conexão com o banco de dados */
						$conn = new db();
						$conn->open();
						
						/* 	tratamento de campos, caso seja edição. configure conforme suas necessidades */
						$id = anti_injection(getParam("id")); // captura a variável id
						if (strlen($id)>0) { // edição
							$sql = "SELECT * FROM classificados2 " 
								 . "WHERE idClassificados=" . $id;
							$rs = new query($conn, $sql);
							if ($rs->getrow()) {
								$idClassificados = $rs->field("idClassificados");	
								$titulo = $rs->field("titulo");
								$mensagem = $rs->field("mensagem");
								$email = $rs->field("email");
								$twitter = $rs->field("twitter");
								$site = $rs->field("site");
								$imagem = $rs->field("imagem");	
								$ddd = $rs->field("ddd");			
								$telefone = $rs->field("telefone");							
								$ddd2 = $rs->field("ddd2");			
								$telefone2 = $rs->field("telefone2");							

								$flagWhats = $rs->field("flagWhats");
								$flagWhats2 = $rs->field("flagWhats2");
								$cidade = $rs->field("cidade");
								
								$flagTipo = $rs->field("flagTipo");								
								$flagAtende24Horas = $rs->field("flagAtende24Horas");
								$flagTemVideo	= $rs->field("flagTemVideo");
								$video = $rs->field("video");
								$flagAceitoCartao = $rs->field("flagAceitoCartao");
								//$flagDominacao = $rs->field("flagDominacao");
								//$flagMassagista = $rs->field("flagMassagista");
								//$flagMILF = $rs->field("flagMILF");
								
								$flagComLocal	= $rs->field("flagComLocal");
								
								$instagram	= $rs->field("instagram");
								$flagSexoVirtual = $rs->field("flagSexoVirtual");
																
							}
						}
						
						pageTitle("","Edição");
						
						/* 	botões de ações, configure conforme suas necessidades */
						$retorno = $_SERVER['QUERY_STRING'];
						
						?>
						<script language="JavaScript"> 
							function salvar() {
								document.frm.submit();
							}
						</script>
						
						<script type="text/javascript">
							EW_LookupFn = "ewlookup.php"; // ewlookup file name
							EW_AddOptFn = "ewaddopt.php"; // ewaddopt.php file name
						</script>
						
						<script language="javascript" src="../js/calendario/popcalendar.js"></script>
						
						<script type="text/javascript" src="ewp.js"></script>
						<script type="text/javascript" src="fckeditor/fckeditor.js"></script>
						<script type="text/javascript">
							_width_multiplier = 16;
							_height_multiplier = 60;
							var EW_DHTMLEditors = [];
							function EW_UpdateTextArea() {
								if (typeof EW_DHTMLEditors != 'undefined') {
									if (FCKeditorAPI) {
										var inst;			
										for (inst in FCKeditorAPI.__Instances)
											FCKeditorAPI.__Instances[inst].UpdateLinkedField();
									}
								}
							}
						</script>
						
						<div class='acoes2'>
							<table width="100%">
								<tr>
									<td>
										&nbsp; <a class='botao' href='#' onClick="salvar()" target=''>&nbsp;Salvar &nbsp;</a>
										<a class='botao' href='classificados_lista.php?<?=$retorno?>' target=''>&nbsp;Cancelar &nbsp;</a>				
									</td>
								</tr>
							</table>
						</div>
						
						
						<?
						echo "<br>";
						
						/* 	Formulário */
						$form = new Form("frm", "classificados_salvar.php", "POST", "", "100%");
						$form->setLabelWidth("18%");
						$form->setDataWidth("80%");
						
						$form->setUpload(true);
						
						$form->addHidden("rodou","s"); // variável de controle
						$form->addHidden("id",$idClassificados); // chave primária
						$form->addHidden("pagina",getParam("pagina")); // número da página que chamou
						
						$form->addHidden("imagem",$imagem); 
						
						$form->addBreak2("Dados Gerais");
						$lista_sim_nao = array("S,Sim","N,Não");
						$lista_flag_video = array("Sim,Sim","Nao,Não");
						$lista_tipo = array("Lo,Loira","Mo,Morena","Mu,Mulata");

						// definição da expressão SQL para a função listbox
						//$sqlEstado = "SELECT idEstado, estado FROM estado ORDER BY estado";
						//$form->addFieldColspan2("Estado: *", listboxField($sqlEstado, "idEstado",$idEstado,"Selecione o Estado", "", ""));						

						$form->addFieldColspan2("Título:", textField("titulo",$titulo,64,250));
						$form->addFieldColspan2("E-mail:", textField("email",$email,64,250));
						$form->addFieldColspan2("Instagram:", textField("instagram",$instagram,64,250));
						$form->addFieldColspan2("Cidade:", textField("cidade",$cidade,64,250));
						$form->addFieldColspan2("Mensagem:", textAreaField("mensagem",$mensagem,4,64,250));
						$form->addFieldColspan2("Telefone com Whats: ", radioField($lista_sim_nao, "flagWhats",$flagWhats));						
						$form->add2Field("DDD Telefone: ", textField("ddd",$ddd,15,10), "Telefone: ", textField("telefone",$telefone,33,30));
						$form->addFieldColspan2("Telefone 2 com Whats: ", radioField($lista_sim_nao, "flagWhats2",$flagWhats2));						
						$form->add2Field("DDD Telefone 2: ", textField("ddd2",$ddd2,15,10), "Telefone 2: ", textField("telefone2",$telefone2,33,30));
						$form->addFieldColspan2("Twitter:", textField("twitter",$twitter,64,250));
						$form->addFieldColspan2("Site:", textField("site",$site,64,250));		
						
						$form->addBreak2("Atendimento");						
						$form->add2Field("Tipo: ", radioField($lista_tipo, "flagTipo",$flagTipo), "Sexo Virtual: ", radioField($lista_sim_nao, "flagSexoVirtual",$flagSexoVirtual));
						//$form->add2Field("Massagista: ", radioField($lista_sim_nao, "flagMassagista",$flagMassagista), "MILF: ", radioField($lista_sim_nao, "flagMILF",$flagMILF));
						$form->add2Field("Atende 24 Horas: ", radioField($lista_sim_nao, "flagAtende24Horas",$flagAtende24Horas), "Aceito Cartão de Crédito: ", radioField($lista_sim_nao, "flagAceitoCartao",$flagAceitoCartao));						
						$form->add2Field("Tem Vídeo: ", radioField($lista_sim_nao, "flagTemVideo",$flagTemVideo), "Com Local: ", radioField($lista_flag_video, "flagComLocal",$flagComLocal)); 
										
										
						$form->addBreak2("Imagem");
						/*
						if($video != NULL) {
							$form->addFieldColspan2("Vídeo: ", "<input type='file' name='video' size='25'><BR>$video<BR>");
						} else {
							$form->addFieldColspan2("Vídeo: ", "<input type='file' name='video' size='25'>");
						}
						*/
						if($imagem != NULL) {
							$form->addFieldColspan2("imagem: ", "<input type='file' name='imagem' size='50'><BR>$imagem<BR><img src='$imagem' width='130' height='100' border='1'>");
						} else {
							$form->addFieldColspan2("imagem: ", "<input type='file' name='imagem' size='50'>");
						}
						
						echo $form->writeHTML();
						?>
						<div class='acoes2'>
							<table width="100%">
								<tr>
									<td>
										&nbsp; <a class='botao' href='#' onClick="salvar()" target=''>&nbsp;Salvar &nbsp;</a>
										<a class='botao' href='classificados_lista.php?<?=$retorno?>' target=''>&nbsp;Cancelar &nbsp;</a>				
									</td>
								</tr>
							</table>
						</div>
						
						</body>
						</html>
						<?
						/* 	encerra a conexão com o banco de dados */
						$conn->close();
						?>

					
					</p>
           	  	</div><!-- FIM COLUNA-ESQUERDA-FULL -->
            </div><!-- FIM PRINCIPAL-CONTENT -->

            <div id="principal-rodape"></div>

            <div class="clear"></div>             
      </div>
    </div> <!-- Fim da div#conteudo -->

	<div id="rodape">
	 	<div class="traco"></div>
		<div id="rodape-content">
        	<?php include("php/menu-rodape-sistema.php"); ?>
        </div>
	</div>
</div> 
<!-- Fim da div#tudo -->

<!-- Script GOOGLE ANALYTICS -->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3970078-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!-- Fim Script GOOGLE ANALYTICS -->

<script type="text/javascript">
 //<![CDATA[
 Cufon.now();  //]]></script>

</body>
</html>

