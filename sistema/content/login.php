<?
/*
	Esta página exibe o formulário de login
*/
include("inc/common.php");

$ret_page = getParam("ret_page");
$querystring = getParam("querystring");
if (!$ret_page) {
	$label_botao = "Entrar";
} else {
	$label_botao = "Continuar";
}

setSession("usuario","");

$form = new Form("frm", "login_validar.php", "POST", "", "300");
$form->setLabelWidth("50%");
$form->setDataWidth("50%");

$form->addHidden("rodou","s");
$form->addHidden("ret_page",$ret_page);
$form->addHidden("querystring",$querystring);

$form->addField("Nome do usuário:", textField("usuario",getSession("usuario_antigo"),20,50));
$form->addField("Senha:",           passwordField("senha","",20,50));
$form->addBreak("<div class='acoes'>&nbsp;<a class='botao' href='JavaScript:document.frm.submit()' target=''>&nbsp;Entrar &nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>",false);


?>
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
	</script></head>
	
<? pageTitle("Login","Informe nome de usuário e senha"); ?>
<br><br><br><br>
<p align="center" class="titulo"><?=LOGIN_TITULO?></p>
<br><br>
<?
echo $form->writeHTML();
?>
					
<br><br><br><br>
<p align="center" class="subtitulo"><?=LOGIN_MENSAGEM?></p>
</body>
</html>