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

$sql->setTable("seo");
$sql->setKey("idSeo", anti_injection(getParam("id")), "Number");

$sql->addField("idTipoSeo", anti_injection(getParam("idTipoSeo")), "Number"); 
$sql->addField("title", anti_injection(getParam("title")), "String");	
$sql->addField("description", anti_injection(getParam("description")), "String");	
$sql->addField("keywords", anti_injection(getParam("keywords")), "String");	

if (strlen(getParam("id"))>0) { // alteração, retirar strlen se vier de edicao_aux
	$sql->setAction("UPDATE");
	
	$conn->execute($sql->getSQL());
	$destino = "seo_lista.php?id=1&pagina=".getParam("pagina"); 
} else { // inclusão

	//Verifica se está incluindo novo registro a partir de outro já existente ´para adicionar as imagens
	
	$sql->setAction("INSERT");

	$last_id = $conn->execute($sql->getSQL());
	$destino = "seo_lista.php";
}
//echo $sql->getSQL();
// volta para a lista ou reapresenta o formulário em modo de edição
echo "<script>location.href='$destino';</script>";

/* 	Encerra a conexão com o banco de dados */
$conn->close();
?>