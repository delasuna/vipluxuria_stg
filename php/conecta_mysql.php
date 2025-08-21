<?php
// INCLUIR COMPATIBILIDADE - VITAL PARA PHP 7.4+
require_once dirname(__FILE__) . '/database_compat.php';

// Desabilitar avisos deprecated
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);

// Conexão funciona em qualquer versão do PHP
$conexao = @mysql_connect("mysql.vipluxuriagold.net", "vipluxuria_add1", "luxuria18");

if (!$conexao) {
    die('Conexão com o banco falhou: ' . mysql_error());
}

if (!mysql_select_db("vipluxuriagold", $conexao)) {
    die('Não foi possível selecionar o banco de dados: ' . mysql_error());
}

// Configurar charset UTF-8
mysql_query("SET NAMES 'utf8'", $conexao);
mysql_query("SET CHARACTER SET utf8", $conexao);
mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $conexao);

return $conexao;
?>