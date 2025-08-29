<?php
session_start();
session_unset(); // Eliminar todas as variáveis da sessão
session_destroy(); // Destruir a sessão
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<meta name="robots" content="index,follow">
<meta name="description" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS" />
<meta name="keywords" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS" />

<title>Vip Luxúria - Acompanhantes Porto Alegre</title>

<!-- CSS Principais -->
<link href="/sistema/content/css-js/estilos-sistema.css" rel="stylesheet" type="text/css" />
<link href="/sistema/content/css-js/menu-sistema.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="/sistema/content/css/config.css" type="text/css" />
<link rel="stylesheet" href="/sistema/content/css/text.css" type="text/css" />
<link rel="stylesheet" href="/sistema/content/css/lightbox.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="/sistema/content/css/content_sis.css">
<link rel="stylesheet" type="text/css" href="/sistema/content/css/header_sis.css">	

<!-- JS -->
<script type="text/javascript" src="/sistema/content/imagens/js/prototype.js"></script>
<script type="text/javascript" src="/sistema/content/imagens/js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="/sistema/content/imagens/js/lightbox.js"></script>
<script language="javascript" src="/sistema/content/js/checkall.js"></script>
<script src="/sistema/content/css-js/functions.js" type="text/javascript"></script>

<!-- Cufon -->
<script src="/sistema/content/css-js/cufon-yui.js"></script>
<script type="text/javascript" src="/sistema/content/css-js/Bauhaus_Md_BT_400.font.js"></script>
<script type="text/javascript">
	Cufon.replace('#navmenu-h');
	Cufon.replace('#slogan');
	Cufon.replace('h1, h2, h3, h4');
	Cufon.replace('.menu-rodape');
</script>

<script type="text/javascript">
function inicializa() {
    document.onkeyup = trataEvent;

    var frm = document.getElementById('frm');
    if (!frm) return;

    var usuario = frm.querySelector("[name='usuario']");
    var senha = frm.querySelector("[name='senha']");
    if (!usuario || !senha) return;

    if (usuario.value.length > 0) {
        senha.focus();
    } else {
        usuario.focus();
    }
}

function trataEvent(e) {
    if (!e && window.event) e = window.event;
    if (typeof e.keyCode === 'number') e = e.keyCode;

    var frm = document.getElementById('frm');
    if (!frm) return;

    if (e == 13) frm.submit();
}

function formSubmit(event) {
    var tecla = event.keyCode || event.which;
    if (tecla == 13) {
        var frm = document.getElementById('frm');
        if (frm) frm.submit();
    }
}


</script>

</head>

<body> 
<a name="inicio"></a> 
<div class="voltar-inicio">
	<a href="#inicio"><img src="/sistema/content/imagens/base/seta-topo.png" alt="Retornar Topo da Página" width="30" height="30" border="0" /></a>
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
        		<?php // include("php/menu-sistema.php"); ?>            
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
				<?php
				include("../inc/common.php");
				
				$usuarioSistema = "";
				$ret_page = getParam("ret_page");
				$querystring = getParam("querystring");
				$label_botao = !$ret_page ? "Entrar" : "Continuar";
				
				$form = new Form("frm", "login_validar.php", "POST", "", "300");
				$form->setLabelWidth("50%");
				$form->setDataWidth("50%");
				
				$form->addHidden("rodou","s");
				$form->addHidden("ret_page",$ret_page);
				$form->addHidden("querystring",$querystring);
				
				$form->addField("Nome do usuário:", textField("usuario",getSession("usuario"),20,50));
				$form->addField("Senha:", passwordField("senha","",20,50, "onkeyup='formSubmit(event)'"));
				$form->addBreak(
    "<div class='acoes'>&nbsp;
    <a class='botao' href='#' onclick=\"document.getElementById('frm').submit(); return false;\">&nbsp;Entrar&nbsp;</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>", 
    false
);

				
				pageTitle("", "Informe nome de usuário e senha");
				echo "<br><br><br><br>";
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

<script type="text/javascript">
 Cufon.now();
</script>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    inicializa();
});
</script>

</body>
</html>
