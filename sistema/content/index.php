<?
session_start();

session_unset(); // Eliminar todas as variáveis da sessão
session_destroy(); // Destruir a sessão

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">


<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

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

<script language="JavaScript">
		function inicializa() {
			if (document.captureEvents && Event.KEYUP) {
				document.captureEvents( Event.KEYUP);
			}
			document.onkeyup = trataEvent;
			
			// inicia o foco no primeiro campo
			usuario = document.frm.usuario.value;
			if (usuario.length > 0) {
				document.frm.senha.focus();
			} else {
				document.frm.usuario.focus();
			}
		}
		
		// tratamento para capturar tecla enter
		function trataEvent(e) {
			//verifica se é IE
			if( !e ) {
				if( window.event ) {
					e = window.event;
				} else {
					//falha, não tem como capturar o evento
					return;
				}
			}
			if( typeof( e.keyCode ) == 'number'  ) {
				//IE, NS 6+, Mozilla 0.9+
				e = e.keyCode;
			} else {
				//falha, não tem como obter o código da tecla
				return;
			}
			if (e==13) {
				document.frm.submit();
			}
		}
		
		function formSubmit(event) {    
            var tecla = event.keyCode;
            if (tecla == 13) {
                document.frm.submit();
            }
        }    

	</script>

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
        		<? //php include("php/menu-sistema.php"); ?>            
            </div>
       </div>
      <div id="titulo">
       		<div id="titulo-content">
				<h1>Login</h1>
            </div>
            <div class="traco"></div>
      </div>
    
        <div id="principal">
        	<div id="principal-topo"></div>

            <div id="principal-content">
			    <div id="coluna-esquerda-full">
            		<p>
					<?
					/*
						Esta página exibe o formulário de login
					*/
					include("../inc/common.php");
					
					$usuarioSistema = "";
					$ret_page = getParam("ret_page");
					$querystring = getParam("querystring");
					if (!$ret_page) {
						$label_botao = "Entrar";
					} else {
						$label_botao = "Continuar";
					}
					
					$form = new Form("frm", "login_validar.php", "POST", "", "300");
					$form->setLabelWidth("50%");
					$form->setDataWidth("50%");
					
					$form->addHidden("rodou","s");
					$form->addHidden("ret_page",$ret_page);
					$form->addHidden("querystring",$querystring);
					
					$form->addField("Nome do usuário:", textField("usuario",getSession("usuario"),20,50));
					$form->addField("Senha:",           passwordField("senha","",20,50, "onkeyup='formSubmit(event)'"));
					$form->addBreak("<div class='acoes'>&nbsp;<a class='botao' href='JavaScript:document.frm.submit()' target=''>&nbsp;Entrar &nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>",false);
					?>
						
					<? pageTitle("","Informe nome de usuário e senha"); ?>
					<br><br><br><br>
					<p align="center" class="titulo"></p>
					<br><br>
					<?
					echo $form->writeHTML();
					?>					
					</p>
           	  	</div><!-- FIM COLUNA-ESQUERDA-FULL -->
            </div><!-- FIM PRINCIPAL-CONTENT -->

             <div class="clear"></div>             
      </div>
    </div> <!-- Fim da div#conteudo -->

</div> 
<!-- Fim da div#tudo -->


<!-- Fim Script GOOGLE ANALYTICS -->

<script type="text/javascript">
 //<![CDATA[
 Cufon.now();  //]]></script>

</body>
</html>