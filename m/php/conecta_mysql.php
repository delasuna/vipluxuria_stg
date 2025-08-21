<?php
// DADOS CORRETOS DO KINGHOST!
$conexao = mysql_connect("mysql.vipluxuriagold.net", "vipluxuriagold", "vipluxuria_add1", "luxuria18");
if (!$conexao) {
    echo 'Conexão com o banco falhou: ' . mysql_error(); 
} elseif (!mysql_select_db("vipluxuriagold", $conexao)) {
    echo 'Não foi possível selecionar o banco de dados!';
} else {
    return $conexao;
}
?>