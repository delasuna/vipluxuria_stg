<?php
/*
    Transação de inclusão/alteração de registros
*/
include("../inc/common.php");

/*
    conexão com o banco de dados
*/
$conn = new db();
$conn->open();

/* Atualização dos dados */
$sql = new UpdateSQL();

$sql->setTable("cidade");
$sql->setKey("idCidade", anti_injection(getParam("id")), "Number");

$sql->addField("cidade", anti_injection(getParam("cidade")), "String");
$sql->addField("ordem", anti_injection(getParam("ordem")), "String");

$sql->addField("title", anti_injection(getParam("title")), "String");
$sql->addField("description", anti_injection(getParam("description")), "String");
$sql->addField("keywords", anti_injection(getParam("keywords")), "String");

if (strlen(getParam("id")) > 0) {
    // UPDATE
    $sql->setAction("UPDATE");
    $conn->execute($sql->getSQL());
    $destino = "cidade_lista.php?pagina=" . getParam("pagina");
} else {
    // INSERT
    $sql->setAction("INSERT");
    $conn->execute($sql->getSQL());
    $destino = "cidade_lista.php";
}

/* redirecionamento */
echo "<script>location.href='$destino';</script>";

/* encerra conexão */
$conn->close();
?>
