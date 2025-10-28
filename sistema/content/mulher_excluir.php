<?php require_once("verifica.php"); ?>
<?php
/*  Transa��o para exclus�o de um ou mais registros */
include("../inc/common.php");

/*  conex�o com o banco de dados */
$conn = new db();
$conn->open();

/*  captura e prepara a lista de registros */ 
$lista_exclusao = getParam("sel");
if (is_array($lista_exclusao)) {
 $lista_exclusao = implode(",",$lista_exclusao);
}

if (strlen($lista_exclusao)==0) { // se n�o existe registros selecionados
	alert("Nenhum registro selecionado!");
} else { // se existe registro selecionado configure a express�o SQL abaixo conforme sua necessidade
	$sql = "DELETE FROM mulher WHERE idMulher IN (" . $lista_exclusao . ")";
	$conn->execute($sql);
	
	// redirect2(getSession("redirectAnunciante"));
	echo "<script>location.href='/sistema/content/mulher_lista.php?clear=1';</script>";
}

/*  fecha a conex�o com o banco de dados */
$conn->close();
?>