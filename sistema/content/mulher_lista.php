<? require_once("verifica.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="robots" content="index,follow">
	<meta name="description" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS" />
	<meta name="keywords" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS" />

	<title>Vip Lux&uacute;ria - Acompanhantes Porto Alegre</title>

	<!-- CSS Principais -->
	<link href="/sistema/content/css-js/estilos-sistema.css" rel="stylesheet" type="text/css" />
	<link href="/sistema/content/css-js/menu-sistema.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="../css/config.css" type="text/css" /> 
	<link rel="stylesheet" href="../css/text.css" type="text/css" />
	
	<script type="text/javascript" src="../imagens/js/prototype.js"></script>
	<script type="text/javascript" src="../imagens/js/scriptaculous.js?load=effects"></script>
	<script type="text/javascript" src="../imagens/js/lightbox.js"></script>
	<link rel="stylesheet" href="../css/lightbox.css" type="text/css" media="screen" />

	<link rel="stylesheet" type="text/css" href="../css/content_sis.css">
	<link rel="stylesheet" type="text/css" href="../css/header_sis.css">	
	<script language="javascript" src="../js/checkall.js"></script>

	<!-- Fim CSS Principais -->

	<!-- Cufon -->
	<script src="/css-js/cufon-yui.js"></script>
	<script type="text/javascript" src="/css-js/Bauhaus_Md_BT_400.font.js"></script>

	<script type="text/javascript">
		Cufon.replace('#navmenu-h');
		Cufon.replace('#slogan');
		Cufon.replace('h1, h2, h3, h4');
		Cufon.replace('.menu-rodape');
	</script>
	<!-- Fim Cufon -->

	<!-- Functions -->
	<script src="/css-js/functions.js" type="text/javascript"></script>
	<!-- Fim unctions -->



</head>

<body> 
<a name="inicio"></a> 
<div class="voltar-inicio"><a href="#inicio"><img src="/imagens/base/seta-topo.png" alt="Retornar Topo da P&aacute;gina" width="30" height="30" border="0" /></a>
</div>
<div id="tudo">
    <div id="conteudo">
        <div id="topo">
        	<div id="topo-content">
        		<?php include("php/topo-sistema.php"); ?>
            </div>
       </div>
       <div id="header">
       		<div id="header-content">
        		<?php include("php/header-sistema.php"); ?>            
            </div>
       </div>
       
       <div id="menu">
       		<div id="menu-content">
        		<?php include("php/menu-sistema.php"); ?>            
            </div>
       </div>
      <div id="titulo">
       		<div id="titulo-content">
				<h1>Anunciantes - Mulheres</h1>
            </div>
            <div class="traco"></div>
      </div>
    
        <div id="principal">
        	<div id="principal-topo"></div>

            <div id="principal-content">
			    <div id="coluna-esquerda-full">
            		<p> 

					<?
						include("../inc/common.php");
						pageTitle("","Lista");
					?>
					
					<script language="JavaScript">
						function excluir() {
							if (confirm('Excluir registros selecionados?')) {
								//parent.content.document.frm.target = "controle";
								//parent.content.document.frm.action = "mulher_excluir.php";
								//parent.content.document.frm.submit();
								document.frm.action = "mulher_excluir.php";
								document.frm.submit();
							}
						}
					</script>	
					<?
						$conn = new db();
						$conn->open();
						
						/* determina a página a ser exibida, não precisa alterar */
						$pg = getParam("pagina");
						if ($pg == "") $pg = 1;
						
					
						
						/* Limpa ordenação e filtro, não deve ser alterado	*/
						if (getParam("clear")==1) {
							setSession("sOrder","");
							setSession("where","");
							setSession("pagina_atual","");
							setSession("numeroRegistros",""); 
						}
						
						if (getParam("numeroRegistros") != "") {
							setSession("numeroRegistros",getParam("numeroRegistros"));	
						}
						setSession("redirectAnunciante","mulher_lista.php");	
						
						
						/* Salva o status da página atual, não deve ser alterado	*/
						if ($_SERVER['PHP_SELF'] != $pagina_atual) {
							$mesma_pagina = false;
							setSession("pagina_atual",$_SERVER['PHP_SELF']);
						} else {
							$mesma_pagina = true;
						}
						
						/* construção da ordenação	*/
						$iSort = getParam("Sorting");
						$iSorted = getParam("Sorted");
						if ((!$iSort)&&(!$mesma_pagina)) {
							$form_sorting = "";
							if (getSession("sOrder") == "") {
								$iSort = 2; // configure a ordenação inicial da lista de acordo com as colunas da tabela 
								$iSorted = ""; // se a ordenação estiver DESCENDENTE, repita o mesmo valor abaixo
							}
						}
						if ($iSort) {
							if ($iSort == $iSorted) {
								$form_sorting = "";
								$sDirection = " DESC";
								$sSortParams = "Sorting=" . $iSort . "&Sorted=" . $iSort . "&";
							} else {
								$form_sorting = $iSort;
								$sDirection = " ASC";
								$sSortParams = "Sorting=" . $iSort . "&Sorted=" . "&";
							}
							/*
								coloque aqui a definição das ordenações das colunas de acordo com as colunas da tabela
							*/
							if ($iSort == 2) setSession("sOrder"," order by nomeUrl" . $sDirection); 
							if ($iSort == 3) setSession("sOrder"," order by email" . $sDirection); 
							if ($iSort == 4) setSession("sOrder"," order by telefone" . $sDirection);
							if ($iSort == 5) setSession("sOrder"," order by flagAtivo" . $sDirection);
						}
						
						// Executa a query
						$sql = "SELECT * "
							 . "FROM mulher " 
							 . "WHERE flagAtivo = 'Sim' "
							 . getSession("sOrder");
						
						
						if (getSession("numeroRegistros") == "Todos") {
							$rs = new query($conn, $sql); 
							$numeroRegistros = $rs->numrows();
						} else if (getSession("numeroRegistros") != "") {
							$numeroRegistros = getSession("numeroRegistros");
						} else 
							$numeroRegistros = 15;
						
						$rs = new query($conn, $sql, $pg, $numeroRegistros); 
						
						
						//Monta os botões
						$pg_ant = $pg-1;
						$pg_prox = $pg+1;
						
					?>
					<form name="form2" method="post" action="mulher_lista.php">
						<div align="right">
						<table height="5px">
							<tr>
								<td class="LabelFONT">
									<input type="hidden" name="rodou" value="s">			
									Registros por página:
								</td>
								<td class="campoSelect">
									<select name="numeroRegistros" size="1">
										<option value="Todos">Todos</option>
										<? if (getParam("numeroRegistros") == 15 || getSession("numeroRegistros") == 15 || getSession("numeroRegistros") == "")  {?>
											<option value="15" selected>15</option>
										<? } else {?>	
											<option value="15">15</option>										
										<? } ?>											
										<? if (getParam("numeroRegistros") == 30  || getSession("numeroRegistros") == 30) {?>
											<option value="30" selected>30</option>
										<? } else {?>	
											<option value="30">30</option>
										<? } ?>											
										<? if (getParam("numeroRegistros") == 60  || getSession("numeroRegistros") == 60) {?>
											<option value="60" selected>60</option>						
										<? } else {?>	
											<option value="60">60</option>						
										<? } ?>
									</select>
								</td>
								<td>			
									<input type="button" name="botaoOk" value=" OK " onClick="document.form2.submit()" style="cursor:hand;">
								</td>			
							</tr>
						</table>
						</div>
					</form>
					
					<div class='acoes2'>
						<table width="100%">
							<tr>
								<td>
									&nbsp; <a class='botao' href='mulher_edicao.php' target=''>&nbsp;Novo&nbsp;</a>
									<a class='botao' href='javascript:excluir()' target=''>&nbsp;Excluir &nbsp;</a>				
								</td>
								<td align="right">
									<? if ($pg>1) { ?>
										&nbsp; <a class='botao' href='<?=$_SERVER['PHP_SELF']."?pagina=$pg_ant"?>' target=''>&nbsp;<?=LISTA_ANTERIOR?> &nbsp;</a>
									<? } ?>				
									<? if ($pg<$rs->totalpages()) { ?>
										<a class='botao' href='<?=$_SERVER['PHP_SELF']."?pagina=$pg_prox"?>' target=''>&nbsp;<?=LISTA_PROXIMO?> &nbsp;</a>	
									<? } ?>						
								</td>											
							</tr>
						</table>
					</div>
					
					<!-- Lista -->
						<div align="center">
						<form name="frm" method="post">
					<?
					
							if ($rs->numrows()>0) {
								echo "<table width='100%' border='0'> ";
								echo "	  <tr>";
								echo "		<td class='DataFONT' align='right' width='53%'>&nbsp;Página ".$pg." de ".$rs->totalpages()."</td>";
								if ($rs->numrows() == 1)
									echo "		<td class='DataFONT' align='right' width='47%'>&nbsp;Foi encontrado " . $rs->numrows() . " registro.</td>";
								else 
									echo "		<td class='DataFONT' align='right' width='47%'>&nbsp;Foram encontrados " . $rs->numrows() . " registros.</td>";
								echo "	  </tr>";
								echo "	</table>";
							} else {
								echo "<div class='DataFONT'>Nenhum registro encontrado!</div>";
							}
					
							$table = new Table("","100%",4); // Título, Largura, Quantidade de colunas
							
							$table->addColumnHeader("<input type=\"checkbox\" name=\"checkall\"onclick=\"CheckAll()\">"); // Coluna com checkbox
							$table->addColumnHeader("Nome",true,"35%", "L"); // Título, Ordenar?, Largura, Alinhamento
							$table->addColumnHeader("E-mail",true,"30%","L");
							$table->addColumnHeader("Telefone",true,"20%","L");
							$table->addColumnHeader("Ativo",true,"15%","L");
							$table->addRow(); // adiciona linha (TR)
						
							while ($rs->getrow()) {
								$id = $rs->field("idMulher"); // captura a chave primária do recordset
								$table->addData("<input type=\"checkbox\" name=\"sel[]\" value=\"$id\">");
								//$table->addData(addLink($rs->field("id_produto"),"produtosedit.php?id=$id&pagina=$pg","Clique para consultar ou editar registro"));
								$table->addData(addLink($rs->field("nomeUrl"),"mulher_edicao.php?id=$id&pagina=$pg","Clique para consultar ou editar registro"));
								$table->addData($rs->field("email")); 
								$table->addData($rs->field("telefone"));
								$table->addData($rs->field("flagAtivo"));
								/*
								switch ($rs->field("revisado")) {
									case "1":
										$revisado = "SIM";
										break;
									case "0":
										$revisado = "NAO";
										break;
									default:
										$revisado = "";
								}
								*/
								//$table->addData($revisado);
								//$table->addData(stod($rs->field("data"),7));
								$table->addRow();	
							}
						
						
							if ($rs->numrows()>0) {
								echo $table->writeHTML();
								//echo "<div class='DataFONT'>Página ".$pg." de ".$rs->totalpages()."</div>";
								echo "<table width='100%' border='0'> ";
								echo "	  <tr>";
								echo "		<td class='DataFONT' align='right' width='53%'>&nbsp;Página ".$pg." de ".$rs->totalpages()."</td>";
								echo "		<td class='DataFONT' align='right' width='47%'>&nbsp;</td>";
								echo "	  </tr>";
								echo "	</table>";
							}
							?>
						</form>
						</div>
					
						<table width="100%">
							<tr>
								<td>
									<? if ($rs->numrows()>0) { ?>
										&nbsp; <a class='botao' href='mulher_edicao.php' target=''>&nbsp;Novo&nbsp;</a>
										<!--a class='botao' href='produtossrch.php' target=''>&nbsp;Pesquisa Avançada &nbsp;</a-->
										<a class='botao' href='javascript:excluir()' target=''>&nbsp;Excluir &nbsp;</a>				
									<? } ?>
								</td>
								<td align="right">
									<? if ($pg>1) { ?>
										&nbsp; <a class='botao' href='<?=$_SERVER['PHP_SELF']."?pagina=$pg_ant"?>' target=''>&nbsp;<?=LISTA_ANTERIOR?> &nbsp;</a>
									<? } ?>				
									<? if ($pg<$rs->totalpages()) { ?>
										<a class='botao' href='<?=$_SERVER['PHP_SELF']."?pagina=$pg_prox"?>' target=''>&nbsp;<?=LISTA_PROXIMO?> &nbsp;</a>	
									<? } ?>						
								</td>											
							</tr>
						</table>
					
					<?
						// Close recordset and connection
						$conn->close();
					?>
					
					</p>
           	  	</div><!-- FIM COLUNA-ESQUERDA-FULL -->
            </div><!-- FIM PRINCIPAL-CONTENT -->

            <div id="principal-rodape"></div>

            <div class="clear"></div>             
      </div>
    </div> <!-- Fim da div#conteudo -->

	<div id="rodape">
	 	<div class="traco"></div>
		<div id="rodape-content">
        	<?php include("php/menu-rodape-sistema.php"); ?>
        </div>
	</div>
</div> 
<!-- Fim da div#tudo -->

<!-- Script GOOGLE ANALYTICS -->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-3970078-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!-- Fim Script GOOGLE ANALYTICS -->

<script type="text/javascript">
 //<![CDATA[
 Cufon.now();  //]]></script>

</body>
</html>