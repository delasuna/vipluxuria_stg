<?php require_once("verifica.php"); ?>
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
				<h1>Blog</h1>
            </div>
            <div class="traco"></div>
      </div>
    
        <div id="principal">
        	<div id="principal-topo"></div>

            <div id="principal-content">
			    <div id="coluna-esquerda-full">
            		<p> 

						<?php
						/* 	Modelo de página que apresenta um formulário para inclusão/alteração de registros */
						
						include("../inc/common.php");
						
						/*	estabelece conexão com o banco de dados */
						$conn = new db();
						$conn->open();
						
						/* 	tratamento de campos, caso seja edição. configure conforme suas necessidades */
						$id = anti_injection(getParam("id")); // captura a variável id
						if (strlen($id)>0) { // edição
							$sql = "SELECT * FROM blog " 
								 . "WHERE idBlog=" . $id;
							$rs = new query($conn, $sql);
							if ($rs->getrow()) {
								$idBlog = $rs->field("idBlog");	
								$assunto = $rs->field("assunto");
								$mensagem = $rs->field("mensagem");
								$imagem = $rs->field("imagem");
								$imagem2 = $rs->field("imagem2");
								
								$larguraVideo = $rs->field("larguraVideo");
								$alturaVideo = $rs->field("alturaVideo");
								$video = $rs->field("video");
								
								$nomeTag1 = $rs->field("nomeTag1");
								$paginaTag1 = $rs->field("paginaTag1");
								$nomeTag2 = $rs->field("nomeTag2");
								$paginaTag2 = $rs->field("paginaTag2");
								
								$dataPublicacao = $rs->field("dataPublicacao");
								
							}
						}
						
						pageTitle("","Edição");
						
						/* 	botões de ações, configure conforme suas necessidades */
						$retorno = $_SERVER['QUERY_STRING'];
						
						?>
						<script language="JavaScript"> 
							function salvar() {
								if (document.frm.assunto.value == "") {
									window.alert("O assunto deve ser informado.");
									document.frm.assunto.focus();
								} else {
									document.frm.submit();
								}
							}
						</script>
						
						
						<script language="javascript" src="../js/calendario/popcalendar.js"></script>
						
						
						<div class='acoes2'>
							<table width="100%">
								<tr>
									<td>
										&nbsp; <a class='botao' href='#' onClick="salvar()" target=''>&nbsp;Salvar &nbsp;</a>
										<a class='botao' href='blog_lista.php?<?=$retorno?>' target=''>&nbsp;Cancelar &nbsp;</a>				
									</td>
								</tr>
							</table>
						</div>
						
						<?php
						echo "<br>";
						
						/* 	Formulário */
						$form = new Form("frm", "blog_salvar.php", "POST", "", "100%");
						$form->setLabelWidth1("15%");
						$form->setDataWidth1("40%");
						$form->setLabelWidth2("15%");
						$form->setDataWidth2("30%");
						
						$form->setUpload(true);
						
						$form->addHidden("rodou","s"); // variável de controle
						$form->addHidden("id",$idBlog); // chave primária
						$form->addHidden("pagina",getParam("pagina")); // número da página que chamou
						
						$form->addHidden("imagem",$imagem); 
						$form->addHidden("imagem2",$imagem2); 
						
						$form->addBreak2("Dados Gerais");
						// definição da expressão SQL para a função listbox
						$form->addFieldColspan2("Assunto: *", textField("assunto",$assunto,114,250));
						$form->addFieldColspan2("Data Publicação: ", textField("dataPublicacao",$dataPublicacao,15,15));
						$form->addFieldColspan2("Mensagem: ", textAreaField("mensagem",$mensagem,7,114,250));
						
						if($imagem != NULL) {
							$form->addFieldColspan2("Imagem: ", "<input type='file' name='imagem' size='100'><BR>$imagem<BR><img src='$imagem' width='130' height='100' border='1'>");
						} else {
							$form->addFieldColspan2("Imagem: ", "<input type='file' name='imagem' size='100'>");
						}

						if($imagem2 != NULL) {
							$form->addFieldColspan2("Imagem Capa: ", "<input type='file' name='imagem2' size='100'><BR>$imagem2<BR><img src='$imagem2' width='130' height='100' border='1'>");
						} else {
							$form->addFieldColspan2("Imagem Capa: ", "<input type='file' name='imagem2' size='100'>");
						}
						
						$form->addBreak2("Vídeo"); 
						$form->addFieldColspan2("Vídeo: ", textAreaField("video", $video, "9", "115", "2000"));
						//$form->add2Field("Altura: ", textField("alturaVideo",$alturaVideo,25,20), "Largura: ", textField("larguraVideo",$larguraVideo,33,20));						

						$form->addBreak2("Tags");
						// definição da expressão SQL para a função listbox
						$form->addFieldColspan2("Tag 1:", textField("nomeTag1",$nomeTag1,57,45));
						$form->addFieldColspan2("Página Tag 1:", textField("paginaTag1",$paginaTag1,114,110));
						$form->addFieldColspan2("Tag 2:", textField("nomeTag2",$nomeTag2,57,45));
						$form->addFieldColspan2("Página Tag 2:", textField("paginaTag2",$paginaTag2,114,110));

						
						echo $form->writeHTML();
						?>
						<div class='acoes2'>
							<table width="100%">
								<tr>
									<td>
										&nbsp; <a class='botao' href='#' onClick="salvar()" target=''>&nbsp;Salvar &nbsp;</a>
										<a class='botao' href='blog_lista.php?<?=$retorno?>' target=''>&nbsp;Cancelar &nbsp;</a>				
									</td>
								</tr>
							</table>
						</div>
						
						
						
						</body>
						</html>
						<?php
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