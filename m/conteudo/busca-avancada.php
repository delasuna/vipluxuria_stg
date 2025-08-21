<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

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
        <div id="titulo">
			<h1>Busca Avançada</h1>
        </div><!--titulo-->        
        <div id="content">
        	<p class="sub-titulo">Procure pelo  Nome</p>
			<div class="form-content">
                <form name="form3" method="post"  action="acompanhantes-porto-alegre.php">
                    <div class="campo-busca">
                        <input name="nome" id="nome" type="text" value="Digite o Nome" onFocus="javascript:this.value=''" />
                    </div>
                    <input type="submit" name="bt-buscar" value="Buscar" class="submit" />
                </form>	                                                  
			</div><!--form content-->
            <br/>
        	<p class="sub-titulo">Procure pelo Nº de Telefone</p>
			<div class="form-content">
                <form  method="post" name="form4" action="acompanhantes-porto-alegre.php">
                    <div class="campo-busca">
                        <input name="telefone" id="telefone" type="text" value="Digite o Telefone" onFocus="javascript:this.value=''" />
                    </div>
                    <input type="submit" name="bt-buscar" value="Buscar" class="submit" />
                </form>	                                                  
			</div><!--form content-->
            <br/>
        	<p class="sub-titulo">Utilize os Filtros</p>
			<div class="form-content">
           	  <p>Combine uma ou mais características.</p>
                <form name="form5" action="acompanhantes-porto-alegre.php" method="get">
					<select name="idade">
					  <option value=" 1 and 100">Qualquer Idade</option>
					  <option value=" 18 and 23 ">18 - 23</option>
					  <option value=" 24 and 29 ">24 - 29</option>
					  <option value=" 30 and 35 ">30 - 35</option>
					  <option value=" 36 and 41 ">36 - 41</option>
					  <option value=" 42 and 47 ">42 - 47</option>
					  <option value=" 48 and 100 ">48 ou Mais </option>
					</select>
                    <br/><br/>
					<select name="cidade">
					  <option value="0">Qualquer Região</option>
					
					<? 
					$sql = "SELECT idCidade, cidade FROM cidade ORDER BY ordem;";
			
					$resultado = mysql_query($sql, $conexao);
					if(!$resultado){
						die("Impossível visualizar as cidades: " . mysql_error() . '<br>');
					}
			
					while($row = mysql_fetch_array($resultado)) {
						$idCidade = $row['idCidade'];
						$cidade = $row['cidade'];
				        	echo "<option value='".$row['idCidade']."'>".$cidade."</option>";
					}
					?>                

					</select> 
                    <br/><br/>                   
                    <ul>
                    	<li>
                       <label><input type="checkbox" name="flagMostraRosto" id="flagMostraRosto" value="S" /> Fotos com Rosto</label>
						</li>
                    	<li>
                       <label><input type="checkbox" name="flagBeijoBoca" id="flagBeijoBoca" value="Sim" /> Beija na Boca?</label>
						</li>
                        <li>
					   <label><input type="checkbox" name="flagAnal" id="flagAnal" value="Sim"  /> Faz Anal?</label>
						</li>
                        <li>
                       <label><input type="checkbox" name="flagDominacao" id="flagDominacao" value="Sim" /> Faz Dominação?</label>
                        </li>
						<li>
                       <label><input type="checkbox" name="flagInversao" id="flagInversao" value="Sim" /> Faz Inversão?</label>
                        </li>
                        <li>                        
                       <label><input type="checkbox" name="flagAtendoEles" id="flagAtendoEles" value="Sim" /> Atende Eles?</label>
                        </li>
                        <li>                                                                                               
                       <label><input type="checkbox" name="flagAtendoElas" id="flagAtendoElas" value="Sim" /> Atende Elas?</label>
						</li>
                        <li>
                       <label><input type="checkbox" name="flagAtendoCasais" id="flagAtendoCasais" value="Sim" /> Atende Casais?</label>
                        </li>
                        <li>
                       <label><input type="checkbox" name="flagViagens" id="flagViagens" value="Sim" /> Viagens?</label>
						</li>
                        <li>
                       <label><input type="checkbox" name="flagEventos" id="flagEventos" value="Sim" /> Eventos?</label>
						</li>
                        <li>
                       <label><input type="checkbox" name="flagAcessorios" id="flagAcessorios" value="Sim" /> Tem Acessórios?</label>
						</li>
                        <li>
                       <label><input type="checkbox" name="flagTenhoAmigas" id="flagTenhoAmigas" value="Sim" /> Tem Amigas?</label>
						</li>
                        <li>
                       <label><input type="checkbox" name="flagAtende24Horas" id="flagAtende24Horas" value="Sim" /> Atendo 24h?</label>
						</li>
                        <li class="no-border">
                    	<p>Local de Atendimento<br/></p>
                       <label><input type="checkbox" name="atendoHoteis" id="atendoHoteis" value="Sim" /> Hotéis</label>
                       <label><input type="checkbox" name="atendoMoteis" id="atendoMoteis" value="Sim" /> Motéis</label>
                       <label><input type="checkbox" name="atendoDominicio" id="atendoDominicio" value="Sim" /> A Domicílio</label><br/>
                       <label><input type="checkbox" name="atendoLocalProprio" id="atendoLocalProprio" value="Sim" /> Local Próprio</label>                                              	
                        </li>
                        <li class="no-border">
                    	<p>Formas de Pagamento<br/></p>
                       <label><input type="checkbox" name="dinheiro" value="dinheiro" /> Dinheiro</label>
                       <label><input type="checkbox" name="aceitoCartao" id="aceitoCartao" value="Sim" /> Cartão de Crédito</label>
                        </li>                        
                   </ul>                                                                                                                           
                   <br/> 
                  <div class="clear"></div>                                                                                              
                  <input type="submit" name="bt-buscar" class="submit-2" value="Buscar" />
              </form>
              <div class="clear"></div>              
			</div><!--form content-->        
          </div><!--content-->
     </div><!--wrap-->
     
<script type="text/javascript"> Cufon.now(); </script>  
<?php include("../../php/google.php"); ?>   
</body>
</html>
