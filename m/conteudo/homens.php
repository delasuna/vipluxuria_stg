<?php 	$conexao = require_once '../php/conecta_mysql.php';  ?>
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
?>     
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="index,follow">

<meta name="description" content="Vip Luxúria é um classificados de anúncios de Garotos de programa de Porto Alegre." />
<meta name="keywords" content="Garotos de programa porto alegre, Acompanhantes masculinos porto alegre, acompanhantes masculinos garotos de programa, Ativos porto alegre. Passivo porto alegre, GLS Porto Alegre, GLS RS, garotos de programa RS, Acompanhantes masculinos RS" />

<title>Casais & Homens - Vip Lux&uacute;ria - Acompanhantes Porto Alegre</title>
<link rel="stylesheet" href="../css-js/estilos.css" type="text/css"/>

<link type="text/css" rel="stylesheet" href="../css-js/demo.css" />
<link type="text/css" rel="stylesheet" href="../css-js/jquery.mmenu.css" />
		
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script type="text/javascript" src="../css-js/jquery.mmenu.js"></script>

<script type="text/javascript">
	$(function() {
		$('nav#menu').mmenu({
			slidingSubmenus: false
		});
	});
</script>


<!--FONTES-->
<script src="../../css-js/cufon-yui.js" type="text/javascript"></script>
<script src="../../css-js/titulo_400.font.js" type="text/javascript"></script>
<script type="text/javascript">
	Cufon.replace('h1');
	Cufon.replace('h1#titulo,.titulo-destaques, #menu-content, #menu-rodape-content, #rodape-content h3',{ fontFamily: 'titulo' }); 
	Cufon.replace('p.nome',{ fontFamily: 'nome' }); 
</script>
<!--FONTES-->

</head>

<body>

	<div id="wrap">
		<?php include("../php/topo.php"); ?>   
        <div id="titulo">
			<h1>Acompanhantes - Homens</h1>
        </div><!--titulo-->  
</div>        
        <div id="content">
						<?php
						$sql = " SELECT * FROM homem WHERE flagAtivo = 'Sim' "
						 	 . " ORDER BY rand(); ";
		
										 
						$resultado = mysql_query($sql, $conexao);
						if(!$resultado){
							die("Impossível visualizar as anunciantes: " . mysql_error() . '<br>');
						}
						$contador = 0;
		
						$sts = mysql_query($sql);
						$registros = mysql_num_rows($sts);
		
						if ($registros>0) {
							while($row = mysql_fetch_array($resultado)) {
								$idHomem = $row['idHomem'];
								$nome = $row['nome'];
								$sobrenome = $row['sobrenome'];	
								$imagemComNome = $row['imagemComNome'];
								$ddd = $row['ddd'];
								$telefone = $row['telefone'];				
				
								$contador++;
							
							?>
								<div class="thumb"> <a href="/m/conteudo/perfil-homens.php?id=<?=$idHomem?>"><img src="<?="/sistema/content/".$imagemComNome?>" /></a>
									<p class="nome"><?=$nome?></p>
									<p class="telefone"><a href="tel:0<?=$ddd?><?=$telefone?>">(<?=$ddd?>)&nbsp;<?=$telefone?></a></p>
									<div class="clear"></div>
							    </div>
									
						    <?php  
							}
						}
						?>	 						
		

          <div class="clear"></div>                                        
     		<div class="voltar"><a href="javascript:window.history.go(-1)"><img src="/m/imagens/bt-voltar.png" width="75" height="34" /></a></div>      	
	    </div><!--content-->
     </div><!--wrap-->
	 
     <?php include("../../php/google.php"); ?>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
