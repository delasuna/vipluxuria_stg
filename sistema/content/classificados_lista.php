<?php require_once("verifica.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="robots" content="index,follow">
	<meta name="description" content="Classificados Vip Luxúria" />
	<meta name="keywords" content="Classificados, Porto Alegre, Anúncios" />

	<title>Vip Lux&uacute;ria - Classificados</title>

	<!-- CSS -->
	<link href="/sistema/content/css-js/estilos-sistema.css" rel="stylesheet" type="text/css" />
	<link href="/sistema/content/css-js/menu-sistema.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/config.css" type="text/css" />
	<link rel="stylesheet" href="../css/text.css" type="text/css" />
	<link rel="stylesheet" href="../css/lightbox.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="../css/content_sis.css">
	<link rel="stylesheet" type="text/css" href="../css/header_sis.css">

	<!-- JS -->
	<script type="text/javascript" src="../imagens/js/prototype.js"></script>
	<script type="text/javascript" src="../imagens/js/scriptaculous.js?load=effects"></script>
	<script type="text/javascript" src="../imagens/js/lightbox.js"></script>
	<script language="javascript" src="../js/checkall.js"></script>
	<script src="/css-js/cufon-yui.js"></script>
	<script type="text/javascript" src="/css-js/Bauhaus_Md_BT_400.font.js"></script>
	<script src="/css-js/functions.js" type="text/javascript"></script>

	<script type="text/javascript">
		Cufon.replace('#navmenu-h');
		Cufon.replace('#slogan');
		Cufon.replace('h1, h2, h3, h4');
		Cufon.replace('.menu-rodape');

		function excluir() {
			if (confirm('Excluir registros selecionados?')) {
				document.frm.action = "classificados_excluir.php";
				document.frm.submit();
			}
		}
	</script>
</head>

<body>
<a name="inicio"></a> 
<div class="voltar-inicio">
	<a href="#inicio"><img src="/imagens/base/seta-topo.png" alt="Retornar Topo da P&aacute;gina" width="30" height="30" border="0" /></a>
</div>

<div id="tudo">
    <div id="conteudo">
        <div id="topo">
        	<div id="topo-content"><?php include("php/topo-sistema.php"); ?></div>
        </div>
        <div id="header">
       		<div id="header-content"><?php include("php/header-sistema.php"); ?></div>
        </div>
        <div id="menu">
       		<div id="menu-content"><?php include("php/menu-sistema.php"); ?></div>
        </div>

        <div id="titulo">
       		<div id="titulo-content"><h1>Classificados</h1></div>
            <div class="traco"></div>
        </div>

        <div id="principal">
        	<div id="principal-topo"></div>
            <div id="principal-content">
			    <div id="coluna-esquerda-full">
            		<p> 
					<?php
						include("../inc/common.php");
						pageTitle("", "Lista");

						$conn = new db();
						$conn->open();

						$pg = getParam("pagina") ?: 1;

						// Limpa ordenação/filtro
						if (getParam("clear") == 1) {
							setSession("sOrder", "");
							setSession("where", "");
							setSession("pagina_atual", "");
							setSession("numeroRegistros", "");
						}
						if (getParam("numeroRegistros") != "") {
							setSession("numeroRegistros", getParam("numeroRegistros"));	
						}

						$pagina_atual = getSession("pagina_atual");
						$mesma_pagina = ($_SERVER['PHP_SELF'] == $pagina_atual);
						if (!$mesma_pagina) setSession("pagina_atual", $_SERVER['PHP_SELF']);

						// Ordenação
						$iSort = getParam("Sorting");
						$iSorted = getParam("Sorted");
						if ($iSort) {
							if ($iSort == $iSorted) {
								$sDirection = " DESC";
							} else {
								$sDirection = " ASC";
							}
							if ($iSort == 2) setSession("sOrder", " ORDER BY titulo $sDirection");
							if ($iSort == 3) setSession("sOrder", " ORDER BY email $sDirection");
						}

						$sql = "SELECT * FROM classificados2 " . getSession("sOrder");

						$numeroRegistros = getSession("numeroRegistros") ?: 15;
						if ($numeroRegistros == "Todos") {
							$rs = new query($conn, $sql);
							$numeroRegistros = $rs->numrows();
						} else {
							$rs = new query($conn, $sql, $pg, $numeroRegistros);
						}

						$pg_ant = $pg-1;
						$pg_prox = $pg+1;
					?>

					<!-- Filtro de número de registros -->
					<form name="form2" method="post" action="classificados_lista.php">
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
											<option value="15" <?= ($numeroRegistros==15)?"selected":"" ?>>15</option>
											<option value="30" <?= ($numeroRegistros==30)?"selected":"" ?>>30</option>
											<option value="60" <?= ($numeroRegistros==60)?"selected":"" ?>>60</option>
										</select>
									</td>
									<td><input type="button" name="botaoOk" value=" OK " onClick="document.form2.submit()" style="cursor:pointer;"></td>
								</tr>
							</table>
						</div>
					</form>

					<!-- Ações -->
					<div class='acoes2'>
						<table width="100%">
							<tr>
								<td>
									<a class='botao' href='classificados_edicao.php'>&nbsp;Novo&nbsp;</a>
									<a class='botao' href='javascript:excluir()'>&nbsp;Excluir&nbsp;</a>				
								</td>
								<td align="right">
									<?php if ($pg>1) { ?>
										<a class='botao' href='<?=$_SERVER['PHP_SELF']."?pagina=$pg_ant"?>'><?=LISTA_ANTERIOR?></a>
									<?php } ?>				
									<?php if ($pg<$rs->totalpages()) { ?>
										<a class='botao' href='<?=$_SERVER['PHP_SELF']."?pagina=$pg_prox"?>'><?=LISTA_PROXIMO?></a>	
									<?php } ?>						
								</td>											
							</tr>
						</table>
					</div>

					<!-- Lista de Classificados -->
					<div align="center">
						<form name="frm" method="post">
						<?php
							if ($rs->numrows() > 0) {
								echo "<table width='100%' border='0'>";
								echo "<tr>";
								echo "<td class='DataFONT' align='right' width='53%'>&nbsp;Página ".$pg." de ".$rs->totalpages()."</td>";
								echo "<td class='DataFONT' align='right' width='47%'>&nbsp;Foram encontrados " . $rs->numrows() . " registros.</td>";
								echo "</tr></table>";

								$table = new Table("", "100%", 4);
								$table->addColumnHeader("<input type=\"checkbox\" name=\"checkall\" onclick=\"CheckAll()\">");
								$table->addColumnHeader("Título", true, "40%", "L");
								$table->addColumnHeader("E-mail", true, "60%", "L");
								$table->addRow();

								while ($rs->getrow()) {
									$id = $rs->field("idClassificados");
									$table->addData("<input type=\"checkbox\" name=\"sel[]\" value=\"$id\">");
									$table->addData(addLink($rs->field("titulo"),"classificados_edicao.php?id=$id&pagina=$pg","Clique para editar"));
									$table->addData(addLink($rs->field("email"),"classificados_edicao.php?id=$id&pagina=$pg","Clique para editar"));
									$table->addRow();	
								}

								echo $table->writeHTML();
							} else {
								echo "<div class='DataFONT'>Nenhum registro encontrado!</div>";
							}
						?>
						</form>
					</div>

					<?php $conn->close(); ?>
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

<script type="text/javascript">
 Cufon.now();
</script>

</body>
</html>
