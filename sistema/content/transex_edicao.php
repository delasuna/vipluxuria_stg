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
				<h1>Anunciantes - Transex</h1>
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
							$sql = "SELECT * FROM transex " 
								 . "WHERE idTransex=" . $id;
							$rs = new query($conn, $sql);
							if ($rs->getrow()) {
								$idTransex = $rs->field("idTransex");	
								$nome = $rs->field("nome");
								$sobrenome = $rs->field("sobrenome");
								$telefone = $rs->field("telefone");
								$email = $rs->field("email");
								$site = $rs->field("site");
								$orkut = $rs->field("orkut");
								$msn = $rs->field("msn");
								$idade = $rs->field("idade");
								$manequim = $rs->field("manequim");
								$olhos = $rs->field("olhos");
								$signo = $rs->field("signo");
								$busto = $rs->field("busto");
								$cabelos = $rs->field("cabelos");
								$dote = $rs->field("dote");								

								$altura = $rs->field("altura");
								$cintura = $rs->field("cintura");
								$pes = $rs->field("pes");
								$peso = $rs->field("peso");
								$quadril = $rs->field("quadril");
								$horarioAtendimento = $rs->field("horarioAtendimento");
								$mensagem1 = $rs->field("mensagem1");
								$mensagem2 = $rs->field("mensagem2");
						
								$imagemCentral1 = $rs->field("imagemCentral1");
								$imagemCentral2 = $rs->field("imagemCentral2");
								$imagemCentral3 = $rs->field("imagemCentral3");								
								$imagemCentral4 = $rs->field("imagemCentral4");
								$imagemCentral5 = $rs->field("imagemCentral5");
								$imagemCentral6 = $rs->field("imagemCentral6");
								$imagemCentral7 = $rs->field("imagemCentral7");
								$imagemCentral8 = $rs->field("imagemCentral8");
//								$imagemCentral9 = $rs->field("imagemCentral9");
//								$imagemCentral10 = $rs->field("imagemCentral10");																																																								
								$video = $rs->field("video");
								$flagTemVideo	= $rs->field("flagTemVideo");
								$imagemComNome = $rs->field("imagemComNome");				
								$flagPreferencial = $rs->field("flagPreferencial");
								
								$imagemExtra1 = $rs->field("imagemExtra1");
								$imagemExtra2 = $rs->field("imagemExtra2");
								$imagemExtra3 = $rs->field("imagemExtra3");
								$imagemExtra4 = $rs->field("imagemExtra4");
								$imagemExtra5 = $rs->field("imagemExtra5");		
								$imagemExtra6 = $rs->field("imagemExtra6");				
								
								
								$telefone2 		= $rs->field("telefone2");
								$cache	= $rs->field("cache");
								$locais	= $rs->field("locais");
								$horario	= $rs->field("horario");
								$cidades = $rs->field("cidades");
								$flagAtivo = $rs->field("flagAtivo");
								
								$ddd = $rs->field("ddd");																								
								$ddd2 = $rs->field("ddd2");
								
								$idOperadora = $rs->field("idOperadora");																								
								$idOperadora2 = $rs->field("idOperadora2");
								$flagWhats = $rs->field("flagWhats");
								$flagWhats2 = $rs->field("flagWhats2");
								
								$twitter = $rs->field("twitter");
								$aceitoCartao	= $rs->field("aceitoCartao");
								
								$outros = $rs->field("outros");
								$flagSexoVirtual = $rs->field("flagSexoVirtual");
								
								$flagMostraConteudoExtra = $rs->field("flagMostraConteudoExtra");
								
								
								$altImagemNome = $rs->field("altImagemNome");
								$altImagem1 = $rs->field("altImagem1");
								$altImagem2 = $rs->field("altImagem2");
								$altImagem3 = $rs->field("altImagem3");
								$altImagem4 = $rs->field("altImagem4");
								$altImagem5 = $rs->field("altImagem5");
								$altImagem6 = $rs->field("altImagem6");
								$altImagem7 = $rs->field("altImagem7");
								$altImagem8 = $rs->field("altImagem8");
								
								$altImagemExtra1 = $rs->field("altImagemExtra1");
								$altImagemExtra2 = $rs->field("altImagemExtra2");
								$altImagemExtra3 = $rs->field("altImagemExtra3");
								$altImagemExtra4 = $rs->field("altImagemExtra4");
								$altImagemExtra5 = $rs->field("altImagemExtra5");
								$altImagemExtra6 = $rs->field("altImagemExtra6");									
								//$title = $rs->field("title");
								//$description = $rs->field("description");
								//$keywords = $rs->field("keywords");
							}
						}
						
						pageTitle("","Edição");
						
						/* 	botões de ações, configure conforme suas necessidades */
						$retorno = $_SERVER['QUERY_STRING'];
						
						?>
						<script language="JavaScript"> 
							function salvar() {
								if (document.frm.nome.value == "") {
									window.alert("O nome deve ser informado.");
									document.frm.nome.focus();
								} else if (document.frm.flagAtivo.value == "") {
									window.alert("Informar o campo Ativo!");
									document.frm.flagAtivo.focus();
								} else {
									document.frm.submit();
								}
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
										<a class='botao' href='transex_lista.php?<?=$retorno?>' target=''>&nbsp;Cancelar &nbsp;</a>				
									</td>
								</tr>
							</table>
						</div>
						
						<?
						echo "<br>";
						
						/* 	Formulário */
						$form = new Form("frm", "transex_salvar.php", "POST", "", "100%");
						$form->setLabelWidth1("15%");
						$form->setDataWidth1("40%");
						$form->setLabelWidth2("15%");
						$form->setDataWidth2("30%");
						
						$form->setUpload(true);
						
						$form->addHidden("rodou","s"); // variável de controle
						$form->addHidden("id",$idTransex); // chave primária
						$form->addHidden("pagina",getParam("pagina")); // número da página que chamou
						
						$form->addHidden("imagemCentral1",$imagemCentral1); 
						$form->addHidden("imagemCentral2",$imagemCentral2); 
						$form->addHidden("imagemCentral3",$imagemCentral3); 
						$form->addHidden("imagemCentral4",$imagemCentral4); 
						$form->addHidden("imagemCentral5",$imagemCentral5); 
						$form->addHidden("imagemCentral6",$imagemCentral6); 
						$form->addHidden("imagemCentral7",$imagemCentral7); 
						$form->addHidden("imagemCentral8",$imagemCentral8); 
//						$form->addHidden("imagemCentral9",$imagemCentral9); 
//						$form->addHidden("imagemCentral10",$imagemCentral10); 

						$form->addHidden("imagemExtra1",$imagemExtra1); 
						$form->addHidden("imagemExtra2",$imagemExtra2); 
						$form->addHidden("imagemExtra3",$imagemExtra3); 
						$form->addHidden("imagemExtra4",$imagemExtra4); 
						$form->addHidden("imagemExtra5",$imagemExtra5); 
						$form->addHidden("imagemExtra6",$imagemExtra6); 
						
						$form->addHidden("video",$video);
						
						$form->addBreak2("Dados Gerais");
						$lista_flag_video = array("Sim,Sim","Nao,Não");
						$lista_preferencial = array("S,Sim","N,Não");
						
						$sqlOperadora = "SELECT idOperadora, nome FROM operadora ORDER BY nome;";
						// definição da expressão SQL para a função listbox
						$form->add2Field("Nome: *", textField("nome",$nome,70,250), "Sobrenome: ", textField("sobrenome",$sobrenome,33,30));
						$form->add2Field("Op. Telefone: ", listboxField($sqlOperadora, "idOperadora",$idOperadora,"Selecione uma Operadora", "", ""), "Whats: ", radioField($lista_preferencial, "flagWhats",$flagWhats));						
						$form->add2Field("DDD Telefone: ", textField("ddd",$ddd,25,20), "Telefone: ", textField("telefone",$telefone,33,30));
						$form->add2Field("Op. Telefone 2: ", listboxField($sqlOperadora, "idOperadora2",$idOperadora2,"Selecione uma Operadora", "", ""), "Whats 2: ", radioField($lista_preferencial, "flagWhats2",$flagWhats2));
						$form->add2Field("DDD Telefone 2: ", textField("ddd2",$ddd2,25,20), "Telefone 2: ", textField("telefone2",$telefone2,33,30));

						$form->add2Field("E-mail: ", textField("email",$email,70,250), "Site: ", textField("site",$site,43,48));
						$form->addFieldColspan2("Twitter: ", textField("twitter",$twitter,114,100));			
						$form->addFieldColspan2("Outros: ", textField("outros",$outros,114,45));
						//$form->addFieldColspan2("Orkut: ", textField("orkut",$orkut,114,250));			
						//$form->addFieldColspan2("Msn: ", textField("msn",$msn,114,250));
						$form->addFieldColspan2("Ativo: ", radioField($lista_flag_video, "flagAtivo",$flagAtivo));																																																						
						
						$form->addBreak2("Dados Adicionais");
						
						
						$form->addFieldColspan2("Idade: ", textField("idade",$idade,25,20)); 
						$form->addFieldColspan2("Peso: ", textField("peso",$peso,25,20));
						$form->addFieldColspan2("Cabelos: ", textField("cabelos",$cabelos,25,20)); 
						$form->addFieldColspan2("Quadril: ", textField("quadril",$quadril,25,20));
						$form->addFieldColspan2("Pés: ", textField("pes",$pes,25,20)); 
						$form->addFieldColspan2("Altura: ", textField("altura",$altura,25,20));
						$form->addFieldColspan2("Olhos: ", textField("olhos",$olhos,25,20)); 
						$form->addFieldColspan2("Busto: ", textField("busto",$busto,25,20));
						$form->addFieldColspan2("Cintura: ", textField("cintura",$cintura,25,20)); 
						$form->addFieldColspan2("Dote: ", textField("dote",$dote,25,20));
												
						$lista_preferencial = array("S,Sim","N,Não");
						$lista_aceito_cartao = array("Sim,Sim","Não,Não");						
						$form->add2Field("Preferencial: ", radioField($lista_preferencial, "flagPreferencial",$flagPreferencial), "Aceito Cartão: ", radioField($lista_aceito_cartao, "aceitoCartao",$aceitoCartao));
						$form->add2Field("Tem Vídeo: ", radioField($lista_flag_video, "flagTemVideo",$flagTemVideo), "Nome do vídeo: ", textField("video",$video,33,33));																		
						$form->addFieldColspan2("Sexo Virtual: ", radioField($lista_preferencial, "flagSexoVirtual",$flagSexoVirtual));

					
						$form->addBreak2("Informações Técnicas / Adicionais");
						
//						$form->addFieldColspan2("Atendimento: ", textField("horarioAtendimento",$horarioAtendimento,114,250));																					
						$form->addFieldColspan2("Mensagem 1: ", textAreaField("mensagem1",$mensagem1,4,150,250));
						$form->addFieldColspan2("Horários: ", textField("horario",$horario,114,250));			
						$form->addFieldColspan2("Cachê: ", textField("cache",$cache,114,250));			
						$form->addFieldColspan2("Locais: ", textField("locais",$locais,114,250));
						$form->addFieldColspan2("Cidades: ", textField("cidades",$cidades,114,250));
																											
//						$form->addFieldColspan2("Mensagem 2: ", textAreaField("mensagem2",$mensagem2,4,150,250));																																	
						
						//$form->addBreak("Dados SEO");
						//$form->addField("title:", textField("title",$title,64,250));						
						//$form->addField("description:", textAreaField("description",$description,3,150,250));						
						//$form->addField("keywords:", textAreaField("keywords",$keywords,3,150,250));
						
						$form->addBreak2("Imagens / Vídeo");
						
						
						if ($imagemComNome != NULL) {
							$form->addFieldColspan2("Imagem com Nome: ", "<input type='file' name='imagemComNome' size='25' ><BR>$imagemComNome<BR><img src='$imagemComNome' width='130' height='100' border='1'>");
						} else {
							$form->addFieldColspan2("Imagem com Nome: ", "<input type='file' name='imagemComNome' size='25'>");
						}
						
						if ($imagemCentral1 != NULL) {
							$form->addFieldColspan2("Imagem 1: ", "<input type='file' name='imagemCentral1' size='25'><BR>$imagemCentral1<BR><img src='$imagemCentral1' width='130' height='100' border='1'>");
						} else {
							$form->addFieldColspan2("Imagem 1: ", "<input type='file' name='imagemCentral1' size='25'>");
						}
						
						if ($imagemCentral2 != NULL) {
							$form->addFieldColspan2("Imagem 2: ", "<input type='file' name='imagemCentral2' size='25' ><BR>$imagemCentral2<BR><img src='$imagemCentral2' width='130' height='100' border='1'>");
						} else {
							$form->addFieldColspan2("Imagem 2: ", "<input type='file' name='imagemCentral2' size='25'>");
						}

						if ($imagemCentral3 != NULL) {
							$form->addFieldColspan2("Imagem 3: ", "<input type='file' name='imagemCentral3' size='25' ><BR>$imagemCentral3<BR><img src='$imagemCentral3' width='130' height='100' border='1'>");
						} else {
							$form->addFieldColspan2("Imagem 3: ", "<input type='file' name='imagemCentral3' size='25'>");
						}


						if ($imagemCentral4 != NULL) {
							$form->addFieldColspan2("Imagem 4: ", "<input type='file' name='imagemCentral4' size='25' ><BR>$imagemCentral4<BR><img src='$imagemCentral4' width='130' height='100' border='1'>");
						} else {
							$form->addFieldColspan2("Imagem 4: ", "<input type='file' name='imagemCentral4' size='25'>");
						}


						if ($imagemCentral5 != NULL) {
							$form->addFieldColspan2("Imagem 5: ", "<input type='file' name='imagemCentral5' size='25' ><BR>$imagemCentral5<BR><img src='$imagemCentral5' width='130' height='100' border='1'>");
						} else {
							$form->addFieldColspan2("Imagem 5: ", "<input type='file' name='imagemCentral5' size='25'>");
						}

						if ($imagemCentral6 != NULL) {
							$form->addFieldColspan2("Imagem 6: ", "<input type='file' name='imagemCentral6' size='25' ><BR>$imagemCentral6<BR><img src='$imagemCentral6' width='130' height='100' border='1'>");
						} else {
							$form->addFieldColspan2("Imagem 6: ", "<input type='file' name='imagemCentral6' size='25'>");
						}


						if ($imagemCentral7 != NULL) {
							$form->addFieldColspan2("Imagem 7: ", "<input type='file' name='imagemCentral7' size='25' ><BR>$imagemCentral7<BR><img src='$imagemCentral7' width='130' height='100' border='1'>");
						} else {
							$form->addFieldColspan2("Imagem 7: ", "<input type='file' name='imagemCentral7' size='25'>");
						}


						if ($imagemCentral8 != NULL) {
							$form->addFieldColspan2("Imagem 8: ", "<input type='file' name='imagemCentral8' size='25' ><BR>$imagemCentral8<BR><img src='$imagemCentral8' width='130' height='100' border='1'>");
						} else {
							$form->addFieldColspan2("Imagem 8: ", "<input type='file' name='imagemCentral8' size='25'>");
						}
						
						$form->addBreak2("Conteúdo Extra");
						
						$form->addFieldColspan2("Mostra conteúdo Extra? ", radioField($lista_preferencial, "flagMostraConteudoExtra",$flagMostraConteudoExtra)); 
						
						if($imagemExtra1 != NULL) {
							$form->addFieldColspan2("Imagem 1: ", "<input type='file' name='imagemExtra1' size='25'><BR>$imagemExtra1<BR><img src='$imagemExtra1' width='130' height='100' border='1'>");
						} else {
							$form->addFieldColspan2("Imagem 1: ", "<input type='file' name='imagemExtra1' size='25'>");
						}
						
						if($imagemExtra2 != NULL) {
							$form->addFieldColspan2("Imagem 2: ", "<input type='file' name='imagemExtra2' size='25'><BR>$imagemExtra2<BR><img src='$imagemExtra2' width='130' height='100' border='1'>");
						} else {
							$form->addFieldColspan2("Imagem 2: ", "<input type='file' name='imagemExtra2' size='25'>");
						}


						if($imagemExtra3 != NULL) {
							$form->addFieldColspan2("Imagem 3: ", "<input type='file' name='imagemExtra3' size='25'><BR>$imagemExtra3<BR><img src='$imagemExtra3' width='130' height='100' border='1'>");
						} else {
							$form->addFieldColspan2("Imagem 3: ", "<input type='file' name='imagemExtra3' size='25'>");
						}


						if($imagemExtra4 != NULL) {
							$form->addFieldColspan2("Imagem 4: ", "<input type='file' name='imagemExtra4' size='25'><BR>$imagemExtra4<BR><img src='$imagemExtra4' width='130' height='100' border='1'>");
						} else {
							$form->addFieldColspan2("Imagem 4: ", "<input type='file' name='imagemExtra4' size='25'>");
						}


						if($imagemExtra5 != NULL) {
							$form->addFieldColspan2("Imagem 5: ", "<input type='file' name='imagemExtra5' size='25'><BR>$imagemExtra5<BR><img src='$imagemExtra5' width='130' height='100' border='1'>");
						} else {
							$form->addFieldColspan2("Imagem 5: ", "<input type='file' name='imagemExtra5' size='25'>");
						}

						if($imagemExtra6 != NULL) {
							$form->addFieldColspan2("Imagem 6: ", "<input type='file' name='imagemExtra6' size='25'><BR>$imagemExtra6<BR><img src='$imagemExtra6' width='130' height='100' border='1'>");
						} else {
							$form->addFieldColspan2("Imagem 6: ", "<input type='file' name='imagemExtra6' size='25'>");
						}


						$form->addBreak2("SEO / Descrever conteúdo de cada Imagem");
						
						$form->addFieldColspan2("Imagem Nome: ", textField("altImagemNome",$altImagemNome,60,250));			
						$form->addFieldColspan2("Imagem 1: ", textField("altImagem1",$altImagem1,60,250));			
						$form->addFieldColspan2("Imagem 2: ", textField("altImagem2",$altImagem2,60,250));			
						$form->addFieldColspan2("Imagem 3: ", textField("altImagem3",$altImagem3,60,250));			
						$form->addFieldColspan2("Imagem 4: ", textField("altImagem4",$altImagem4,60,250));			
						$form->addFieldColspan2("Imagem 5: ", textField("altImagem5",$altImagem5,60,250));			
						$form->addFieldColspan2("Imagem 6: ", textField("altImagem6",$altImagem6,60,250));			
						$form->addFieldColspan2("Imagem 7: ", textField("altImagem7",$altImagem7,60,250));			
						$form->addFieldColspan2("Imagem 8: ", textField("altImagem8",$altImagem8,60,250));
									
						$form->addFieldColspan2("Imagem Extra 1: ", textField("altImagemExtra1",$altImagemExtra1,60,250));			
						$form->addFieldColspan2("Imagem Extra 2: ", textField("altImagemExtra2",$altImagemExtra2,60,250));			
						$form->addFieldColspan2("Imagem Extra 3: ", textField("altImagemExtra3",$altImagemExtra3,60,250));			
						$form->addFieldColspan2("Imagem Extra 4: ", textField("altImagemExtra4",$altImagemExtra4,60,250));			
						$form->addFieldColspan2("Imagem Extra 5: ", textField("altImagemExtra5",$altImagemExtra5,60,250));			
						$form->addFieldColspan2("Imagem Extra 6: ", textField("altImagemExtra6",$altImagemExtra6,60,250));																																	


						echo $form->writeHTML();
						?>
						<div class='acoes2'>
							<table width="100%">
								<tr>
									<td>
										&nbsp; <a class='botao' href='#' onClick="salvar()" target=''>&nbsp;Salvar &nbsp;</a>
										<a class='botao' href='transex_lista.php?<?=$retorno?>' target=''>&nbsp;Cancelar &nbsp;</a>				
									</td>
								</tr>
							</table>
						</div>
						
						
						<script type="text/javascript">
							var editor = new EW_DHTMLEditor("mensagem1");
							editor.create = function() {
								var sBasePath = 'fckeditor/';
								var oFCKeditor = new FCKeditor('mensagem1', 37*_width_multiplier, 4*_height_multiplier);
								oFCKeditor.BasePath = sBasePath;
								oFCKeditor.ReplaceTextarea();
								this.active = true;
							}
							EW_DHTMLEditors[EW_DHTMLEditors.length] = editor;
							
/*							
							var editor = new EW_DHTMLEditor("mensagem2");
							editor.create = function() {
								var sBasePath = 'fckeditor/';
								var oFCKeditor = new FCKeditor('mensagem2', 37*_width_multiplier, 4*_height_multiplier);
								oFCKeditor.BasePath = sBasePath;
								oFCKeditor.ReplaceTextarea();
								this.active = true;
							}
							EW_DHTMLEditors[EW_DHTMLEditors.length] = editor;
*/							
						</script>
						
						<script type="text/javascript">
							EW_createEditor();  // Create DHTML editor(s)
						</script>
						
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
