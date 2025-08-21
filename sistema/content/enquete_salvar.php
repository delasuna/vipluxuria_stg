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

$sql->setTable("enquete");
$sql->setKey("idEnquete", anti_injection(getParam("id")), "Number");

$sql->addField("pergunta", anti_injection(getParam("pergunta")), "String");	
$sql->addField("alternativa1", anti_injection(getParam("alternativa1")), "String");	
$sql->addField("alternativa2", anti_injection(getParam("alternativa2")), "String");	
$sql->addField("alternativa3", anti_injection(getParam("alternativa3")), "String");	
$sql->addField("alternativa4", anti_injection(getParam("alternativa4")), "String");	

$sql->addField("flagAtivo", anti_injection(getParam("flagAtivo")), "String");	

if (strlen(getParam("id"))>0) { // alteração, retirar strlen se vier de edicao_aux
	$sql->setAction("UPDATE");
	
	$conn->execute($sql->getSQL());
	$destino = "enquete_lista.php?pagina=".getParam("pagina"); 
} else { // inclusão

	//Verifica se está incluindo novo registro a partir de outro já existente ´para adicionar as imagens
	$sql->setAction("INSERT");

	$last_id = $conn->execute($sql->getSQL());
	$destino = "enquete_lista.php";
}
//echo $sql->getSQL();
// volta para a lista ou reapresenta o formulário em modo de edição
echo "<script>location.href='$destino';</script>";

/* 	Encerra a conexão com o banco de dados */
$conn->close();
?>