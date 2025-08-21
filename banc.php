<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>RASTREANDO BANCO DE DADOS</h1>";
echo "<hr>";

// 1. Mostra config.inc.php
echo "<h2>1. CONFIGURAÇÕES NO config.inc.php:</h2>";
include_once "sistema/inc/config.inc.php";
echo "DB_HOST: " . DB_HOST . "<br>";
echo "DB_USER: " . DB_USER . "<br>";
echo "DB_DATABASE: " . DB_DATABASE . "<br>";
echo "<hr>";

// 2. Mostra conecta_mysql.php SEM executar
echo "<h2>2. CÓDIGO NO conecta_mysql.php:</h2>";
echo "<pre style='background:#f0f0f0; padding:10px;'>";
$codigo = file_get_contents("php/conecta_mysql.php");
echo htmlspecialchars($codigo);
echo "</pre>";
echo "<hr>";

// 3. Procura TODOS os mysql_connect no projeto
echo "<h2>3. TODOS OS ARQUIVOS COM mysql_connect():</h2>";
$dir = new RecursiveDirectoryIterator('.');
$iterator = new RecursiveIteratorIterator($dir);

foreach ($iterator as $file) {
    if ($file->isFile() && substr($file->getFilename(), -4) === '.php') {
        $content = @file_get_contents($file->getPathname());
        if (strpos($content, 'mysql_connect') !== false) {
            echo "<b>Arquivo: " . $file->getPathname() . "</b><br>";
            
            // Mostra as linhas com mysql_connect
            $lines = explode("\n", $content);
            foreach ($lines as $num => $line) {
                if (strpos($line, 'mysql_connect') !== false) {
                    echo "Linha " . ($num+1) . ": <code>" . htmlspecialchars(trim($line)) . "</code><br>";
                }
            }
            echo "<br>";
        }
    }
}

echo "<hr>";
echo "<h2>4. TESTE DE CONEXÃO COM DADOS DO CONFIG:</h2>";
$teste = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
if ($teste) {
    echo "&#9989; Conexão OK com dados do config!<br>";
    if (@mysql_select_db(DB_DATABASE)) {
        echo "&#9989; Banco " . DB_DATABASE . " acessível!";
    }
} else {
    echo "&#10060; Erro: " . mysql_error();
}
?>