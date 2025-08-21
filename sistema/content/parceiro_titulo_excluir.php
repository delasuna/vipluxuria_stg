<?
/*  Transaчуo para exclusуo de um ou mais registros */
include("../inc/common.php");

/*  conexуo com o banco de dados */
$conn = new db();
$conn->open();

/*  captura e prepara a lista de registros */ 
$lista_exclusao = getParam("sel");
if (is_array($lista_exclusao)) {
 $lista_exclusao = implode(",",$lista_exclusao);
}

if (strlen($lista_exclusao)==0) { // se nуo existe registros selecionados
	alert("Nenhum registro selecionado!");
} else { // se existe registro selecionado configure a expressуo SQL abaixo conforme sua necessidade
	$sql = "DELETE FROM parceirotitulo WHERE idParceiroTitulo IN (" . $lista_exclusao . ")";
	$conn->execute($sql);
	redirect2("parceiro_titulo_lista.php");
}

/*  fecha a conexуo com o banco de dados */
$conn->close();
?>