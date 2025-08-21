<?
/*
	Esta transação valida os dados informados no formulário de login.
	Não precisa ser alterada
*/
include("../inc/common.php");

	
/*
	tratamento de campos
*/
$usuario = anti_injection(getParam("usuario"));
$auth_cript = true;

if ($auth_cript) {
	//$senha = md5(anti_injection(getParam("senha")));
	$senha = md5(anti_injection(getParam("senha")));
} else {
	$senha = anti_injection(getParam("senha"));
}

/*
	validação
*/
$erro = new Erro();
if ($usuario == "") $erro->addErro('Nome de usuário deve ser informado.');
if ($senha == "") $erro->addErro('Senha deve ser informada.');

// se passou na validação...
if (!$erro->hasErro()) { 
	$conn = new db();
	$conn->open();

	$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND senha = '$senha'";
//	echo $sql; 
	$rs = new query($conn, $sql);
	// se entrou...
	if ($rs->getrow()) {
		$passou = true;
		
		if ($passou) {
			if (!isset($_SESSION)) 
				session_start();
			setSession("usuario2", $rs->field("usuario")); 

			$destino = "portal.php";
		} else {
			$destino = "index.php";
		}
	// se não entrou...
	} else {
		alert("Nome de usuário ou senha não conferem!");
		$destino = "index.php";
	}
// não passou na validação...
} else { 
	alert('Ocorreram os seguintes erros!\n' . $erro->toString());
	$destino = "index.php";
}
$conn->close();
echo "<script>location.href='$destino';</script>";
?>