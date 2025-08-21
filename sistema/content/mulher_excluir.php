<? require_once("verifica.php"); ?>
<?
/*  Transação para exclusão de um ou mais registros */
include("../inc/common.php");

/*  conexão com o banco de dados */
$conn = new db();
$conn->open();

/*  captura e prepara a lista de registros */ 
$lista_exclusao = getParam("sel");
if (is_array($lista_exclusao)) {
 $lista_exclusao = implode(",",$lista_exclusao);
}

if (strlen($lista_exclusao)==0) { // se não existe registros selecionados
	alert("Nenhum registro selecionado!");
} else { // se existe registro selecionado configure a expressão SQL abaixo conforme sua necessidade
	$sql = "DELETE FROM mulher WHERE idMulher IN (" . $lista_exclusao . ")";
	$conn->execute($sql);
	
	redirect2(getSession("redirectAnunciante"));
}

/*  fecha a conexão com o banco de dados */
$conn->close();
?>