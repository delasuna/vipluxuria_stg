<?php
// Configurações de conexão
$host = "mysql.vipluxuriagold.net";
$user = "vipluxuria_add1";
$pass = "BT2D82vWc5Fy";
$db   = "vipluxuriagold";

// Conexão com MySQL (PHP 8 - mysqli)
$conexao = mysqli_connect($host, $user, $pass, $db);

// Verifica erros
if (!$conexao) {
    die("Conexão com o banco falhou: " . mysqli_connect_error());
}

// Retorna a conexão para quem incluir este arquivo
return $conexao;
?>
