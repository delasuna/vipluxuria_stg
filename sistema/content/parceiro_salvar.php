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

/* upload da imagem */
$uploaddir = "upload_parceiro/";
$caminho_imagem = null;

if (!empty($_FILES['imagem']['tmp_name'])) {

    if ($_FILES['imagem']['size'] > 1000000) {
        echo "<script>
            alert('Imagem - Seu arquivo não poderá ser maior que 1MB');
            window.history.go(-1);
        </script>";
        exit;
    }

    if (move_uploaded_file(
        $_FILES['imagem']['tmp_name'],
        $uploaddir . $_FILES['imagem']['name']
    )) {
        $caminho_imagem = $uploaddir . $_FILES['imagem']['name'];
    } else {
        echo "Imagem - Erro no upload (código {$_FILES['imagem']['error']})";
        exit;
    }
}

/* Atualização dos dados */
$sql = new UpdateSQL();

$sql->setTable("parceiro");
$sql->setKey("idParceiro", anti_injection(getParam("id")), "Number");

$sql->addField("idParceiroTitulo", anti_injection(getParam("idParceiroTitulo")), "Number");
$sql->addField("descricao", getParam("descricao"), "String");
$sql->addField("flagSWF", anti_injection(getParam("flagSWF")), "String");

if (!empty($caminho_imagem)) {
    $sql->addField("imagem", $caminho_imagem, "String");
}

if (strlen(getParam("id")) > 0) {
    // UPDATE
    $sql->setAction("UPDATE");
    $conn->execute($sql->getSQL());
    $destino = "parceiro_lista.php?pagina=" . getParam("pagina");
} else {
    // INSERT
    if (getParam("imagem") != null) {
        $sql->addField("imagem", anti_injection(getParam("imagem")), "String");
    }

    $sql->setAction("INSERT");
    $conn->execute($sql->getSQL());
    $destino = "parceiro_lista.php";
}

/* redirecionamento */
echo "<script>location.href='$destino';</script>";

/* encerra conexão */
$conn->close();
?>
