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

$sql->setTable("swings");
$sql->setKey("idSwings", anti_injection(getParam("id")), "Number");

$sql->addField("de", anti_injection(getParam("de")), "String");	
$sql->addField("email", anti_injection(getParam("email")), "String");	
$sql->addField("cidade", anti_injection(getParam("cidade")), "String");	
$sql->addField("anuncio", anti_injection(getParam("anuncio")), "String");	
$sql->addField("flagAtivo", anti_injection(getParam("flagAtivo")), "String");	

if (strlen(getParam("id"))>0) { // alteração, retirar strlen se vier de edicao_aux
	$sql->setAction("UPDATE");
	
	$conn->execute($sql->getSQL());
	$destino = "swing_lista.php?pagina=".getParam("pagina"); 
}
//echo $sql->getSQL();
// volta para a lista ou reapresenta o formulário em modo de edição
echo "<script>location.href='$destino';</script>";

/* 	Encerra a conexão com o banco de dados */
$conn->close();
?>