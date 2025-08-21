<?
/*
	Transação de inclusão/alteração de registros
*/
include("../inc/common.php");

/*
	conexão com o banco de dados
*/
$conn = new db();
$conn->open();



/* Atualização dos dados, configure abaixo conforme suas necessidades */
// objeto para montagem de expressão sql
$sql = new UpdateSQL();

$sql->setTable("parceirotitulo");
$sql->setKey("idParceiroTitulo", anti_injection(getParam("id")), "Number");

$sql->addField("titulo", anti_injection(getParam("titulo")), "String");	


if (strlen(getParam("id"))>0) { // alteração, retirar strlen se vier de edicao_aux
	$sql->setAction("UPDATE");
	
	$conn->execute($sql->getSQL());
	$destino = "parceiro_titulo_lista.php?pagina=".getParam("pagina"); 
} else { // inclusão

	//Verifica se está incluindo novo registro a partir de outro já existente ´para adicionar as imagens
	$sql->setAction("INSERT");

	$last_id = $conn->execute($sql->getSQL());
	$destino = "parceiro_titulo_lista.php";
}
//echo $sql->getSQL();
// volta para a lista ou reapresenta o formulário em modo de edição
echo "<script>location.href='$destino';</script>";

/* 	Encerra a conexão com o banco de dados */
$conn->close();
?>