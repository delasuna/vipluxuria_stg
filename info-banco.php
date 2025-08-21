<?php
// PRIMEIRO - Mostra TUDO do config
echo "<h1>INFORMAÇÕES DO SISTEMA</h1>";

// Procura o config
$config_file = "/home/vipluxuriagold/www/sistema/inc/config.inc.php";
if(file_exists($config_file)) {
    echo "<h2>Arquivo config.inc.php:</h2>";
    echo "<pre>";
    $config = file_get_contents($config_file);
    // Remove a senha por segurança na visualização
    $config = preg_replace('/PASSWORD","[^"]*"/', 'PASSWORD","*****"', $config);
    echo htmlspecialchars($config);
    echo "</pre>";
}

// Mostra as definições
echo "<h2>Configurações Definidas:</h2>";
if(defined('DB_DATABASE')) echo "DB_DATABASE: " . DB_DATABASE . "<br>";
if(defined('DB_HOST')) echo "DB_HOST: " . DB_HOST . "<br>";
if(defined('DB_USER')) echo "DB_USER: " . DB_USER . "<br>";
echo "<hr>";

// Testa conexão com os dados do config
if(defined('DB_HOST') && defined('DB_USER') && defined('DB_PASSWORD')) {
    echo "<h2>Testando com dados do CONFIG:</h2>";
    if($con = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)) {
        echo "&#9989; CONECTOU!<br>";
        if(@mysql_select_db(DB_DATABASE)) {
            echo "&#9989; Banco " . DB_DATABASE . " OK!<br>";
            
            // Mostra as tabelas
            echo "<h3>Tabelas no banco:</h3>";
            $result = mysql_query("SHOW TABLES");
            while($row = mysql_fetch_row($result)) {
                echo "- " . $row[0] . "<br>";
            }
        }
    } else {
        echo "&#10060; Erro: " . mysql_error();
    }
}
?>