<?php
$conexao = require_once 'php/conecta_mysql.php';

echo "<h2>Verificando tabelas no banco de dados...</h2>";

// Listar todas as tabelas
$result = mysql_query("SHOW TABLES");
if (!$result) {
    die("Erro ao listar tabelas: " . mysql_error());
}

echo "<h3>Tabelas existentes:</h3>";
echo "<ul>";
while ($row = mysql_fetch_row($result)) {
    echo "<li>" . $row[0] . "</li>";
}
echo "</ul>";

// Verificar especificamente as tabelas necessárias
$tabela_seo = mysql_query("SHOW TABLES LIKE 'seo'");
$tabela_tipoSeo = mysql_query("SHOW TABLES LIKE 'tipoSeo'");

echo "<h3>Status das tabelas necessárias:</h3>";
echo "Tabela 'seo': " . (mysql_num_rows($tabela_seo) > 0 ? "&#9989; EXISTE" : "&#10060; NÃO EXISTE") . "<br>";
echo "Tabela 'tipoSeo': " . (mysql_num_rows($tabela_tipoSeo) > 0 ? "&#9989; EXISTE" : "&#10060; NÃO EXISTE") . "<br>";
?>