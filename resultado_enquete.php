
<?php 
	function anti_injection($sql) {
    if (empty($sql)) {
        return '';
    }
    
    // Lista de palavras perigosas para SQL
    $palavras_perigosas = array(
        'from', 'select', 'insert', 'delete', 'where', 'having', 
        'union', 'drop table', 'sleep', 'show tables', '#', '--'
    );
    
    // Remove palavras perigosas (case insensitive)
    foreach ($palavras_perigosas as $palavra) {
        $sql = preg_replace('/\b' . preg_quote($palavra, '/') . '\b/i', '', $sql);
    }
    
    // Remove caracteres especiais perigosos
    $sql = str_replace(array('\', '*', '|'), '', $sql);
    $sql = trim($sql);
    $sql = strip_tags($sql);
    $sql = addslashes($sql);
    
    return $sql;
}
	
//recebo o id da enquete 
$idEnquete = anti_injection(isset($_REQUEST["idEnquete"]) ? $_REQUEST["idEnquete"] : ""); 

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
	<?php if ($alternativa1 != "") { ?>
		<TD ALIGN="left" WIDTH="35%"><?php echo $alternativa1 ?> <div align="left"></div></TD> 
		<TD><IMG HEIGHT="7" WIDTH="<?php echo $valor1*100/$totalValor?>%" SRC="/imagens/barras_enquete/barra1.gif"></TD> 
		<TD ALIGN="center" WIDTH="14%"><?php echo $valor1 ?> votos</TD> 
	<?php } ?>
	</TR> 
	<TR> 
	<?php if ($alternativa2 != "") { ?>
		<TD ALIGN="left"><?php echo $alternativa2 ?> <div align="left"></div></TD> 
		<TD><IMG HEIGHT="7" WIDTH="<?php echo $valor2*100/$totalValor?>%" SRC="/imagens/barras_enquete/barra2.gif"></TD> 
		<TD ALIGN="center"><?php echo $valor2 ?> votos</TD> 
	<?php } ?>
	</TR> 
	<TR> 
	<?php if ($alternativa3 != "") { ?>
		<TD ALIGN="left"><?php echo $alternativa3 ?>  <div align="left"></div></TD> 
		<TD><IMG HEIGHT="7" WIDTH="<?php echo $valor3*100/$totalValor?>%" SRC="/imagens/barras_enquete/barra3.gif"></TD> 
		<TD ALIGN="center"><?php echo $valor3 ?> votos</TD> 
	<?php } ?>
	</TR> 
	<TR> 
	<?php if ($alternativa4 != "") { ?>
		<TD ALIGN="left"><?php echo $alternativa4 ?>  <div align="left"></div></TD> 
		<TD><IMG HEIGHT="7" WIDTH="<?php echo $valor4*100/$totalValor?>%" SRC="/imagens/barras_enquete/barra4.gif"></TD> 
		<TD ALIGN="center"><?php echo $valor4 ?> votos</TD> 
	<?php } ?>
	</TR> 
	</TABLE> 
	<P ALIGN="center">Total de votos emitidos: <?php echo $totalValor ?></P> 
</body>