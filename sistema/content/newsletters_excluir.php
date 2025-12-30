<?php
/*  Transação para exclusão de um ou mais registros */
include("../inc/common.php");

/* conexão com o banco de dados */
$conn = new db();
$conn->open();

/* captura e prepara a lista de registros */
$lista_exclusao = getParam("sel");

/* se veio como array (checkbox múltiplo) */
if (is_array($lista_exclusao)) {

    // garante que somente números passem para o IN()
    $lista_exclusao = array_filter(
        $lista_exclusao,
        fn($v) => ctype_digit((string)$v)
    );

    $lista_exclusao = implode(",", $lista_exclusao);
}

/* valida a seleção */
if (!strlen($lista_exclusao)) {

    alert("Nenhum registro selecionado!");
    redirect2("newsletters_lista.php");

    $conn->close();
    exit;
}

/* exclusão */
$sql = "DELETE FROM newsletter WHERE id IN ($lista_exclusao)";
$conn->execute($sql);

redirect2("newsletters_lista.php");

/* fecha conexão */
$conn->close();
?>
