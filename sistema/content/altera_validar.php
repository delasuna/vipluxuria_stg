<?
/*
	Esta transação valida os dados informados no formulário de login.
	Não precisa ser alterada
*/
include("../inc/common.php");



/*
	tratamento de campos
*/
$auth_cript = false;

$usuario = getParam("usuario");
$senha = md5(getParam("senha"));
$novaSenha = md5(getParam("novaSenha"));
$confirmaSenha = md5(getParam("confirmaSenha"));

/*
	validação
*/
$erro = new Erro();
if ($usuario == "") $erro->addErro('O usuário deve ser informado.');
if ($senha == "") $erro->addErro('Senha atual deve ser informada.');
if ($novaSenha == "") $erro->addErro('A nova Senha deve ser informada.');
if ($confirmaSenha == "") $erro->addErro('o campo confirma nova Senha deve ser informada.');

if ($novaSenha != $confirmaSenha) $erro->addErro('A nova Senha deve ser igual ao campo confirma nova Senha.');

// se passou na validação...
if (!$erro->hasErro()) { 
	$conn = new db();
	$conn->open();

	$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha = '$senha'";
	$rs = new query($conn, $sql); 
	// se entrou...
	if ($rs->getrow()) {
		$passou = true;
		
		if ($passou) {
			$sql = "UPDATE usuarios SET senha = '$novaSenha' WHERE usuario='$usuario' AND senha = '$senha'";
			$rs = new query($conn, $sql);

			alert('Senha alterada com sucesso.');
			$destino = "portal.php";
		} else {
			$destino = "altera.php";
		}
	// se não entrou...
	} else {
		alert("Nome de usuário ou senha não conferem!");
		$destino = "altera.php";
	}
// não passou na validação...
} else { 
	alert('Ocorreram os seguintes erros!\n' . $erro->toString());
	$destino = "altera.php";
}
$conn->close();
echo "<script>location.href='$destino';</script>";
?>