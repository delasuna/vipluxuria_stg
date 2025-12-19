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

/* diretório de upload */
$uploaddir = "upload_blog/";

/* uploads */
$caminho_imagem  = null;
$caminho_imagem2 = null;

/* ===== IMAGEM 1 ===== */
if (isset($_FILES['imagem']) && !empty($_FILES['imagem']['tmp_name'])) {

    $imagem = $_FILES['imagem'];

    if (!is_dir($uploaddir)) {
        mkdir($uploaddir, 0777, true);
    }

    if ($imagem['size'] > 1000000) {
        echo "<script>alert('Imagem - Seu arquivo não poderá ser maior que 1MB'); window.history.go(-1);</script>";
        exit;
    }

    $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
    $novoNome = uniqid('blog_', true) . '.' . $extensao;
    $destinoArquivo = $uploaddir . $novoNome;

    if (move_uploaded_file($imagem['tmp_name'], $destinoArquivo)) {
        $caminho_imagem = $destinoArquivo;
    } else {
        echo "Imagem - Erro no upload. Código: " . $imagem['error'];
        exit;
    }
}

/* ===== IMAGEM 2 ===== */
if (isset($_FILES['imagem2']) && !empty($_FILES['imagem2']['tmp_name'])) {

    $imagem2 = $_FILES['imagem2'];

    if (!is_dir($uploaddir)) {
        mkdir($uploaddir, 0777, true);
    }

    if ($imagem2['size'] > 1000000) {
        echo "<script>alert('Imagem 2 - Seu arquivo não poderá ser maior que 1MB'); window.history.go(-1);</script>";
        exit;
    }

    $extensao2 = pathinfo($imagem2['name'], PATHINFO_EXTENSION);
    $novoNome2 = uniqid('blog2_', true) . '.' . $extensao2;
    $destinoArquivo2 = $uploaddir . $novoNome2;

    if (move_uploaded_file($imagem2['tmp_name'], $destinoArquivo2)) {
        $caminho_imagem2 = $destinoArquivo2;
    } else {
        echo "Imagem 2 - Erro no upload. Código: " . $imagem2['error'];
        exit;
    }
}

/* ===== SQL ===== */
$sql = new UpdateSQL();

$sql->setTable("blog");
$sql->setKey("idBlog", anti_injection(getParam("id")), "Number");

$sql->addField("assunto", anti_injection(getParam("assunto")), "String");
$sql->addField("mensagem", anti_injection(getParam("mensagem")), "String");

$sql->addField("nomeTag1", anti_injection(getParam("nomeTag1")), "String");
$sql->addField("paginaTag1", anti_injection(getParam("paginaTag1")), "String");
$sql->addField("nomeTag2", anti_injection(getParam("nomeTag2")), "String");
$sql->addField("paginaTag2", anti_injection(getParam("paginaTag2")), "String");

$sql->addField("dataPublicacao", anti_injection(getParam("dataPublicacao")), "String");
$sql->addField("video", getParam("video"), "String");

if ($caminho_imagem !== null) {
    $sql->addField("imagem", $caminho_imagem, "String");
}

if ($caminho_imagem2 !== null) {
    $sql->addField("imagem2", $caminho_imagem2, "String");
}

if (strlen(getParam("id")) > 0) {
    // UPDATE
    $sql->setAction("UPDATE");
    $conn->execute($sql->getSQL());
    $destino = "blog_lista.php?pagina=" . getParam("pagina");
} else {
    // INSERT
    if (getParam("imagem") != null && $caminho_imagem === null) {
        $sql->addField("imagem", anti_injection(getParam("imagem")), "String");
    }

    if (getParam("imagem2") != null && $caminho_imagem2 === null) {
        $sql->addField("imagem2", anti_injection(getParam("imagem2")), "String");
    }

    $sql->setAction("INSERT");
    $conn->execute($sql->getSQL());
    $destino = "blog_lista.php";
}

/* redirecionamento */
echo "<script>location.href='$destino';</script>";

/* encerra conexão */
$conn->close();
?>
