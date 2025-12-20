<?php
// Configurações de conexão
$host = "mysql.vipluxuriagold.net";
$user = "vipluxur01_add1";
$pass = "vipluxur01_add1";
$db   = "vipluxuriagold01";

// Conexão com MySQL (PHP 8 - mysqli)
$conexao = mysqli_connect($host, $user, $pass, $db);

// Verifica erros
if (!$conexao) {
    die("Conexão com o banco falhou: " . mysqli_connect_error());
}

// Retorna a conexão para quem incluir este arquivo
return $conexao;
?>
