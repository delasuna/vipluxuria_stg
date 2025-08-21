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

$sql->setTable("mural");
$sql->setKey("idMural", anti_injection(getParam("id")), "Number");

$sql->addField("nome", anti_injection(getParam("nome")), "String");	
$sql->addField("nomeAcompanhante", anti_injection(getParam("nomeAcompanhante")), "String");

$sql->addField("comentario", anti_injection(getParam("comentario")), "String");	
$sql->addField("nota", anti_injection(getParam("nota")), "String");	
$sql->addField("ip", anti_injection(getParam("ip")), "String");	
$sql->addField("flagAprovado", anti_injection(getParam("flagAprovado")), "String");

$sql->addField("dataPublicacao", anti_injection(getParam("dataPublicacao")), "String");		

if (strlen(getParam("id"))>0) { // alteração, retirar strlen se vier de edicao_aux
	$sql->setAction("UPDATE");
	
	$conn->execute($sql->getSQL());
	$destino = "mural_lista.php?pagina=".getParam("pagina"); 
} else { // inclusão

	$sql->setAction("INSERT");

	$last_id = $conn->execute($sql->getSQL());
	$destino = "mural_lista.php";
}
//echo $sql->getSQL();
// volta para a lista ou reapresenta o formulário em modo de edição
echo "<script>location.href='$destino';</script>";

/* 	Encerra a conexão com o banco de dados */
$conn->close();
?>