
<? 
	function anti_injection($sql) {
		// remove palavras que contenham sintaxe sql
		$sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|having|union|drop table|sleep|show tables|#|\*|--|\\\\)/"),"",$sql);
		$sql = trim($sql);//limpa espaços vazio
		$sql = strip_tags($sql);//tira tags html e php
		$sql = addslashes($sql);//Adiciona barras invertidas a uma string
		return $sql;
	}
	
//recebo o id da enquete 
$idEnquete = anti_injection($_REQUEST["idEnquete"]); 

$conexao = require_once 'php/conecta_mysql.php'; 

$sql = "SELECT * FROM enquete WHERE idEnquete = " . $idEnquete;  

$resultado = mysql_query($sql, $conexao);
if(!$resultado){
	die("Impossível visualizar a enquete: " . mysql_error() . '<br>');
}
$sts = mysql_query($sql);
$registros = mysql_num_rows($sts);

if ($registros>0) {
	while($row = mysql_fetch_array($resultado)) {
		$idEnquete = $row['idEnquete'];
		$pergunta = $row['pergunta'];	
		$alternativa1 = $row['alternativa1'];
		$alternativa2 = $row['alternativa2'];
		$alternativa3 = $row['alternativa3'];
		$alternativa4 = $row['alternativa4'];
		
		$valor1 = $row['valor1'];
		$valor2 = $row['valor2'];
		$valor3 = $row['valor3'];
		$valor4 = $row['valor4']; 
		$totalValor = $row['totalValor']; 
		
	}
}	

?> 
<body bgcolor="#F5EBF4">
	<P ALIGN="center"><font size="4"><strong><em>RESULTADOS PARCIAIS DA  ENQUETE</em></strong></font></P> 
	<P ALIGN="center"><strong><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
	
	<P ALIGN="center"><font size="4"><strong><em><?=$pergunta?></em></strong></font></P> 
	</font></strong></P> 
	<TABLE ALIGN="center" WIDTH="75%" BORDER="0" CELLSPACING="1" CELLPADDING="1"> 
	<!--DWLayoutTable--> 
	<TR> 
	<? if ($alternativa1 != "") { ?>
		<TD ALIGN="left" WIDTH="35%"><? echo $alternativa1 ?> <div align="left"></div></TD> 
		<TD><IMG HEIGHT="7" WIDTH="<? echo $valor1*100/$totalValor?>%" SRC="/imagens/barras_enquete/barra1.gif"></TD> 
		<TD ALIGN="center" WIDTH="14%"><? echo $valor1 ?> votos</TD> 
	<? } ?>
	</TR> 
	<TR> 
	<? if ($alternativa2 != "") { ?>
		<TD ALIGN="left"><? echo $alternativa2 ?> <div align="left"></div></TD> 
		<TD><IMG HEIGHT="7" WIDTH="<? echo $valor2*100/$totalValor?>%" SRC="/imagens/barras_enquete/barra2.gif"></TD> 
		<TD ALIGN="center"><? echo $valor2 ?> votos</TD> 
	<? } ?>
	</TR> 
	<TR> 
	<? if ($alternativa3 != "") { ?>
		<TD ALIGN="left"><? echo $alternativa3 ?>  <div align="left"></div></TD> 
		<TD><IMG HEIGHT="7" WIDTH="<? echo $valor3*100/$totalValor?>%" SRC="/imagens/barras_enquete/barra3.gif"></TD> 
		<TD ALIGN="center"><? echo $valor3 ?> votos</TD> 
	<? } ?>
	</TR> 
	<TR> 
	<? if ($alternativa4 != "") { ?>
		<TD ALIGN="left"><? echo $alternativa4 ?>  <div align="left"></div></TD> 
		<TD><IMG HEIGHT="7" WIDTH="<? echo $valor4*100/$totalValor?>%" SRC="/imagens/barras_enquete/barra4.gif"></TD> 
		<TD ALIGN="center"><? echo $valor4 ?> votos</TD> 
	<? } ?>
	</TR> 
	</TABLE> 
	<P ALIGN="center">Total de votos emitidos: <? echo $totalValor ?></P> 
</body>