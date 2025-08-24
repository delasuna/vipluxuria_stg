<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<meta name="robots" content="index,follow">
<meta name="description" content="Acompanhantes Porto Alegre, Acompanhantes em Porto Alegre, Acompanhante em Porto Alegre, Garota de Programa Porto Alegre, Garotas de Programa Porto Alegre, Acompanhante Porto Alegre, Acompanhantes RS, Acompanhantes Rio Grande do Sul, Acompanhantes poa, Guia Erótico Porto Alegre, Guia de Acompanhantes Porto Alegre, Anúncios de Acompanhantes Porto Alegre, Acompanhantes POA, Acompanhante" />
<meta name="keywords" content="Acompanhantes Porto Alegre, Acompanhantes em Porto Alegre, Acompanhante em Porto Alegre, Garota de Programa Porto Alegre, Garotas de Programa Porto Alegre, Acompanhante Porto Alegre, Acompanhantes RS, Acompanhantes Rio Grande do Sul, Acompanhantes poa, Guia Erótico Porto Alegre, Guia de Acompanhantes Porto Alegre, Anúncios de Acompanhantes Porto Alegre, Acompanhantes POA, Acompanhante" />

<title>Vip Lux&uacute;ria - Acompanhantes Porto Alegre</title>
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
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
<!--FONTES-->

</head>

<body>
<? 	$conexao = require_once '../php/conecta_mysql.php';  ?>
	<div id="wrap">
		<?php include("../php/topo.php"); ?>   

        <div id="menu-2"> 
        
        	<a href="https://www.vipluxuria.com/m/conteudo/acompanhantes-porto-alegre.php"><img src="/m/imagens/estrutura/bt-mulheres.png" border="0" /></a>
        
        	<a href="https://www.vipluxuria.com/m/conteudo/casais-e-homens.php"><img src="/m/imagens/estrutura/bt-casais.png" border="0" /></a>
        
        	<a href="https://www.vipluxuria.com/m/conteudo/transex.php"><img src="/m/imagens/estrutura/bt-transex.png" border="0" /></a>
        

        </div>

        <div id="titulo">
			<h1>Busca</h1>
        </div><!--titulo-->        
        <div id="content">
      
         <p class="sub-titulo">O que voc&ecirc; procura?</p>
		  <div class="form-content">
           		  <div class="campo-busca">
           		    <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('self',this,0)">
           		      <option value="#">Selecione uma Op&ccedil;&atilde;o</option>
           		      <option value="acompanhantes-porto-alegre.php?flagTipo=Lo">Mulheres - Loiras</option>
           		      <option value="acompanhantes-porto-alegre.php?flagTipo=Mo">Mulheres - Morenas</option>
           		      <option value="acompanhantes-porto-alegre.php?flagTipo=Mu">Mulheres - Mulatas</option>
           		      <option value="homens.php">Homens</option>
           		      <option value="transex.php">Transex</option>
                    </select>
                </div>         
			<br/>
        	<p class="sub-titulo">Procure pelo Nome</p>
			<div class="form-content">
                <form method="post" action="acompanhantes-porto-alegre.php">
                    <div class="campo-busca">
                        <input name="nome" id="nome" type="text" value="Digite o Nome" onFocus="javascript:this.value=''" />
                    </div>
                    <input type="submit" name="bt-buscar" class="submit" value="Buscar" />
                </form>	                                                  
			</div><!--form content-->
            <br/>
		  <div class="bt"><a href="/m/conteudo/busca-avancada.php"><img src="/m/imagens/estrutura/bt-busca-avancada.png" width="120" height="34" alt="Busca Avan&ccedil;ada" /></a></div>
          
          <div id="banners">
          	<h1>Destaques</h1>
			<ul class="full">
				<?
				  $sql = " SELECT * FROM bannercentral2 " 
					   . " ORDER BY rand(); ";
				  
												   
				  $resultado = mysql_query($sql, $conexao);
				  if(!$resultado){
					  die("Impossível visualizar os banners: " . mysql_error() . '<br>');
				  }
				  $contador = 0;
				  
				  $sts = mysql_query($sql);
				  $registros = mysql_num_rows($sts);
				
				  if ($registros>0) {
					  while($row = mysql_fetch_array($resultado)) {
						  $idBannerCentral2 = $row['idBannerCentral2'];
						  $descricao = $row['descricao'];	
						  $imagem = $row['imagem'];
						  $site = $row['site'];				
						  
					  ?>
						  <li><a href="<?=$site?>" target="_blank"><img src="<?="/sistema/content/".$imagem?>" /></a></li>							  
				  <? 
					  }
				  }
				?>
            </ul>    

			<ul class="half">
			<?
			  $sql = " SELECT * FROM bannercentral3 " 
				   . " ORDER BY rand(); ";
			  
											   
			  $resultado = mysql_query($sql, $conexao);
			  if(!$resultado){
				  die("Impossível visualizar os banners: " . mysql_error() . '<br>');
			  }
			  $contador = 0;
			  
			  $sts = mysql_query($sql);
			  $registros = mysql_num_rows($sts);
			
			  if ($registros>0) {
				  while($row = mysql_fetch_array($resultado)) {
					  $idBannerCentral3 = $row['idBannerCentral3'];
					  $descricao = $row['descricao'];	
					  $imagem = $row['imagem'];
					  $site = $row['site'];				
					  
				  ?>
					  <li><a href="<?=$site?>" target="_blank"><img src="<?="/sistema/content/".$imagem?>" /></a></li>							  
			  <? 
				  }
			  }
			?>
            </ul>                      
          </div>
          
          </div><!--content-->
     </div><!--wrap-->
     
<script type="text/javascript"> Cufon.now(); </script>  
<?php include("../../php/google.php"); ?>   
</body>
</html>
