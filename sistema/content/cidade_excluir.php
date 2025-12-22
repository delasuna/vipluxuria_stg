<?php require_once("verifica.php"); ?>
<?php
/*  Transação para exclusão de um ou mais registros */
include("../inc/common.php");

/*  conexão com o banco de dados */
$conn = new db();
$conn->open();

/*  captura e prepara a lista de registros */ 
$lista_exclusao = getParam("sel");
if (is_array($lista_exclusao)) {
    $lista_exclusao = implode(",", $lista_exclusao);
}

if (strlen($lista_exclusao) == 0) { // se não existe registros selecionados
    alert("Nenhum registro selecionado!");
} else { // se existe registro selecionado
    $sql = "DELETE FROM cidade WHERE idCidade IN (" . $lista_exclusao . ")";
    $conn->execute($sql);

    echo "<script>location.href='/sistema/content/cidade_lista.php?clear=1';</script>";
}

/*  fecha a conexão com o banco de dados */
$conn->close();
?>
