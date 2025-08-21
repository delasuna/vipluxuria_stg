<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>DEBUG TOTAL</h1>";

// 1. Verifica o conecta_mysql.php
echo "<h2>1. Conteúdo do conecta_mysql.php:</h2>";
echo "<pre>";
echo htmlspecialchars(file_get_contents("php/conecta_mysql.php"));
echo "</pre>";
echo "<hr>";

// 2. Verifica se tem mais arquivos com conexão
echo "<h2>2. Procurando outros arquivos com 'vipluxuria':</h2>";
$files = array(
    "index.php",
    "php/conecta_mysql.php",
    "sistema/inc/config.inc.php",
    "includes/conexao.php",
    "config.php",
    "admin/conexao.php"
);

foreach($files as $file) {
    if(file_exists($file)) {
        $content = file_get_contents($file);
        if(strpos($content, 'vipluxuria') !== false) {
            echo "&#9888;&#65039; ENCONTRADO 'vipluxuria' em: $file<br>";
            // Mostra as linhas com vipluxuria
            $lines = explode("\n", $content);
            foreach($lines as $num => $line) {
                if(strpos($line, 'vipluxuria') !== false) {
                    echo "Linha " . ($num+1) . ": " . htmlspecialchars($line) . "<br>";
                }
            }
            echo "<br>";
        }
    }
}

echo "<hr>";

// 3. Testa conexão direta aqui
echo "<h2>3. Teste de conexão DIRETA:</h2>";
$con = @mysql_connect("mysql.vipluxuriagold.net", "vipluxuriagold", "PbqyM4tXFLXb");
if($con) {
    echo "&#9989; CONEXÃO DIRETA FUNCIONA!<br>";
    if(@mysql_select_db("vipluxuriagold")) {
        echo "&#9989; Banco OK!<br>";
    }
} else {
    echo "&#10060; Erro: " . mysql_error();
}
?>