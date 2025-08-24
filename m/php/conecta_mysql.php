<?
// Fazendo a conexão com o servidor MySQL
//if (!$conexao = mysql_connect("mysql-srv04.plugin.com.br","exs2","naca432")) 
//elseif (!mysql_select_db("exs2",$conexao)) 
if (!$conexao = mysql_connect("mysql.vipluxuria.com","vipluxuria","PbqyM4tXFLXb")) 
     echo 'Conexão com o banco falhou!'; 
elseif (!mysql_select_db("vipluxuria",$conexao)) 
     echo 'Não foi possível selecionar o banco de dados!';
else 
     return $conexao;

?>

