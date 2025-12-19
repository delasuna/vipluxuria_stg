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
$uploaddir = "upload_bannerlateral/";

/* upload da imagem */
$caminho_imagem = null;

if (isset($_FILES['imagem']) && !empty($_FILES['imagem']['tmp_name'])) {

    $imagem = $_FILES['imagem'];

    // Cria o diretório caso não exista
    if (!is_dir($uploaddir)) {
        mkdir($uploaddir, 0777, true);
    }

    // Verifica tamanho do arquivo (1MB)
    if ($imagem['size'] > 1000000) {
        echo "<script>alert('Imagem - Seu arquivo não poderá ser maior que 1MB'); window.history.go(-1);</script>";
        exit;
    }

    // Gera nome único
    $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
    $novoNome = uniqid('bannerlateral_', true) . '.' . $extensao;
    $destinoArquivo = $uploaddir . $novoNome;

    // Move o arquivo
    if (move_uploaded_file($imagem['tmp_name'], $destinoArquivo)) {
        $caminho_imagem = $destinoArquivo;
    } else {
        echo "Imagem - Houve um erro na transferência do arquivo. Erro = " . $imagem['error'] . "<br>";

        switch ($imagem['error']) {
            case UPLOAD_ERR_INI_SIZE:
                echo "O arquivo é maior que o limite definido em upload_max_filesize no php.ini";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                echo "O arquivo ultrapassa o limite definido no formulário HTML.";
                break;
            case UPLOAD_ERR_PARTIAL:
                echo "O upload do arquivo foi feito parcialmente.";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "Nenhum arquivo foi enviado.";
                break;
            default:
                echo "Erro desconhecido no upload.";
                break;
        }
        exit;
    }
}

/* Atualização dos dados */
$sql = new UpdateSQL();

$sql->setTable("bannerlateral");
$sql->setKey("idBannerLateral", anti_injection(getParam("id")), "Number");

$sql->addField("descricao", anti_injection(getParam("descricao")), "String");
$sql->addField("site", anti_injection(getParam("site")), "String");
$sql->addField("nome", anti_injection(getParam("nome")), "String");
$sql->addField("sobrenome", anti_injection(getParam("sobrenome")), "String");

if ($caminho_imagem !== null) {
    $sql->addField("imagem", $caminho_imagem, "String");
}

if (strlen(getParam("id")) > 0) {
    // UPDATE
    $sql->setAction("UPDATE");
    $conn->execute($sql->getSQL());
    $destino = "bannerlateral_lista.php?pagina=" . getParam("pagina");
} else {
    // INSERT
    if (getParam("imagem") != null && $caminho_imagem === null) {
        $sql->addField("imagem", anti_injection(getParam("imagem")), "String");
    }

    $sql->setAction("INSERT");
    $conn->execute($sql->getSQL());
    $destino = "bannerlateral_lista.php";
}

/* redirecionamento */
echo "<script>location.href='$destino';</script>";

/* encerra conexão */
$conn->close();
?>
