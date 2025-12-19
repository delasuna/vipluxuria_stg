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

$sql->setTable("parceirotitulo");
$sql->setKey("idParceiroTitulo", anti_injection(getParam("id")), "Number");

$sql->addField("titulo", anti_injection(getParam("titulo")), "String");

if (strlen(getParam("id")) > 0) {
    // UPDATE
    $sql->setAction("UPDATE");
    $conn->execute($sql->getSQL());
    $destino = "parceiro_titulo_lista.php?pagina=" . getParam("pagina");
} else {
    // INSERT
    $sql->setAction("INSERT");
    $conn->execute($sql->getSQL());
    $destino = "parceiro_titulo_lista.php";
}

/* redirecionamento */
echo "<script>location.href='$destino';</script>";

/* encerra conexão */
$conn->close();
?>
