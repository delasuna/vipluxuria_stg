<?php 
require_once("verifica.php"); 
include("../inc/common.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="index,follow">
	<meta name="description" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS" />
	<meta name="keywords" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS" />

	<title>Vip Luxúria - Acompanhantes Porto Alegre</title>

	<!-- CSS -->
	<link href="/sistema/content/css-js/estilos-sistema.css" rel="stylesheet" type="text/css">
	<link href="/sistema/content/css-js/menu-sistema.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="../css/config.css" type="text/css">
	<link rel="stylesheet" href="../css/text.css" type="text/css">
	<link rel="stylesheet" href="../css/lightbox.css" type="text/css" media="screen">
	<link rel="stylesheet" href="../css/content_sis.css" type="text/css">
	<link rel="stylesheet" href="../css/header_sis.css" type="text/css">

	<!-- JS -->
	<script src="../imagens/js/prototype.js"></script>
	<script src="../imagens/js/scriptaculous.js?load=effects"></script>
	<script src="../imagens/js/lightbox.js"></script>
	<script src="../js/checkall.js"></script>
	<script src="/css-js/cufon-yui.js"></script>
	<script src="/css-js/Bauhaus_Md_BT_400.font.js"></script>
	<script src="/css-js/functions.js"></script>

	<script>
		Cufon.replace('#navmenu-h, #slogan, h1, h2, h3, h4, .menu-rodape');

		function excluir() {
			if (confirm('Excluir registros selecionados?')) {
				document.frm.action = "homem_excluir.php";
				document.frm.submit();
			}
		}
	</script>
</head>

<body>
<a name="inicio"></a> 
<div class="voltar-inicio">
	<a href="#inicio"><img src="/imagens/base/seta-topo.png" alt="Retornar Topo da Página" width="30" height="30"></a>
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
				<h1>Anunciantes - Casais & Homens</h1>
			</div>
			<div class="traco"></div>
		</div>

		<div id="principal">
			<div id="principal-topo"></div>
			<div id="principal-content">
				<div id="coluna-esquerda-full">
					<p>
					<?php pageTitle("","Lista"); ?>

					<?php
					$conn = new db();
					$conn->open();

					// Página
					$pg = getParam("pagina");
					if ($pg == "") $pg = 1;

					// Reset
					if (getParam("clear") == 1) {
						setSession("sOrder","");
						setSession("where","");
						setSession("pagina_atual","");
						setSession("numeroRegistros","");
					}

					// Número de registros
					if (getParam("numeroRegistros") != "") {
						setSession("numeroRegistros", getParam("numeroRegistros"));	
					}
					setSession("redirectAnunciante","homem_lista.php");	

					// Ordenação
					$iSort   = getParam("Sorting");
					$iSorted = getParam("Sorted");
					if ($iSort) {
						$sDirection = ($iSort == $iSorted) ? " DESC" : " ASC";
						if ($iSort == 2) setSession("sOrder"," ORDER BY nome".$sDirection);
						if ($iSort == 3) setSession("sOrder"," ORDER BY sobrenome".$sDirection); 
						if ($iSort == 4) setSession("sOrder"," ORDER BY email".$sDirection); 
						if ($iSort == 5) setSession("sOrder"," ORDER BY telefone".$sDirection);
						if ($iSort == 6) setSession("sOrder"," ORDER BY flagAtivo".$sDirection);
					}

					// Query
					$sql = "SELECT * FROM homem WHERE flagAtivo = 'Sim' ".getSession("sOrder");

					if (getSession("numeroRegistros") == "Todos") {
						$rs = new query($conn, $sql); 
						$numeroRegistros = $rs->numrows();
					} elseif (getSession("numeroRegistros") != "") {
						$numeroRegistros = getSession("numeroRegistros");
					} else {
						$numeroRegistros = 15;
					}

					$rs = new query($conn, $sql, $pg, $numeroRegistros); 
					$pg_ant  = $pg-1;
					$pg_prox = $pg+1;
					?>

					<form name="form2" method="post" action="homem_lista.php">
						<div align="right">
							<label class="LabelFONT">Registros por página:
								<select name="numeroRegistros">
									<option value="Todos">Todos</option>
									<option value="15" <?= (getSession("numeroRegistros")==15 || getSession("numeroRegistros")=="") ? "selected" : "" ?>>15</option>
									<option value="30" <?= (getSession("numeroRegistros")==30) ? "selected" : "" ?>>30</option>
									<option value="60" <?= (getSession("numeroRegistros")==60) ? "selected" : "" ?>>60</option>
								</select>
							</label>
							<input type="submit" value="OK" style="cursor:pointer;">
						</div>
					</form>

					<div class="acoes2">
						<table width="100%">
							<tr>
								<td>
									<a class="botao" href="homem_edicao.php">Novo</a>
									<a class="botao" href="javascript:excluir()">Excluir</a>
								</td>
								<td align="right">
									<?php if ($pg>1) { ?>
										<a class="botao" href="<?=$_SERVER['PHP_SELF']."?pagina=$pg_ant"?>"><?=LISTA_ANTERIOR?></a>
									<?php } ?>
									<?php if ($pg < $rs->totalpages()) { ?>
										<a class="botao" href="<?=$_SERVER['PHP_SELF']."?pagina=$pg_prox"?>"><?=LISTA_PROXIMO?></a>
									<?php } ?>
								</td>
							</tr>
						</table>
					</div>

					<div align="center">
					<form name="frm" method="post">
					<?php
					if ($rs->numrows()>0) {
						$table = new Table("","100%",4);
						$table->addColumnHeader("<input type=\"checkbox\" onclick=\"CheckAll()\">");
						$table->addColumnHeader("Nome",true,"25%","L");
						$table->addColumnHeader("Sobrenome",true,"25%","L"); 
						$table->addColumnHeader("E-mail",true,"25%","L");
						$table->addColumnHeader("Telefone",true,"15%","L");
						$table->addColumnHeader("Ativo",true,"10%","L");
						$table->addRow();

						while ($rs->getrow()) {
							$id = $rs->field("idHomem");
							$table->addData("<input type=\"checkbox\" name=\"sel[]\" value=\"$id\">");
							$table->addData(addLink($rs->field("nome"),"homem_edicao.php?id=$id&pagina=$pg","Clique para editar"));
							$table->addData($rs->field("sobrenome"));
							$table->addData($rs->field("email"));
							$table->addData($rs->field("telefone"));
							$table->addData($rs->field("flagAtivo"));
							$table->addRow();
						}

						echo $table->writeHTML();
						echo "<div class='DataFONT'>Página $pg de ".$rs->totalpages()."</div>";
					} else {
						echo "<div class='DataFONT'>Nenhum registro encontrado!</div>";
					}
					$conn->close();
					?>
					</form>
					</div>
				</div>
			</div>
			<div id="principal-rodape"></div>
		</div>
	</div>

	<div id="rodape">
		<div class="traco"></div>
		<div id="rodape-content">
			<?php include("php/menu-rodape-sistema.php"); ?>
		</div>
	</div>
</div>

<script>Cufon.now();</script>
</body>
</html>
