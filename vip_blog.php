<?php
$conexao = require_once 'php/conecta_mysql.php';

// SEO
$sqlSeo = "SELECT * FROM seo INNER JOIN tipoSeo ON seo.idTipoSeo = tipoSeo.idTipoSeo WHERE descricao = 'Blog'";
$resultadoSeo = mysqli_query($conexao, $sqlSeo);
if (!$resultadoSeo) {
	die("Impossível visualizar SEO: " . mysqli_error($conexao));
}

$title = $description = $keywords = '';
if (mysqli_num_rows($resultadoSeo) > 0) {
	$rowSeo = mysqli_fetch_assoc($resultadoSeo);
	$title = $rowSeo['title'];
	$description = $rowSeo['description'];
	$keywords = $rowSeo['keywords'];
}

// Paginação
$pg = 1;
if (isset($_GET['pagina']) && intval($_GET['pagina']) > 0) {
	$pg = intval($_GET['pagina']);
}
$limite = 12;
$inicio = ($pg - 1) * $limite;

// Total de registros
$sqlTotal = "SELECT COUNT(*) as total FROM blog";
$resultTotal = mysqli_query($conexao, $sqlTotal);
$totalRegistros = mysqli_fetch_assoc($resultTotal)['total'];
$totalPages = ceil($totalRegistros / $limite);

// Buscar posts do blog
$sql = "SELECT * FROM blog ORDER BY idBlog DESC LIMIT $inicio, $limite";
$resultado = mysqli_query($conexao, $sql);
if (!$resultado) {
	die("Impossível visualizar o blog: " . mysqli_error($conexao));
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">

<?php include 'head.php'; ?>

<body>
	<div id="wrap">
		<div id="bg-rosa">
			<div id="topo"><?php include("php/topo-2.php"); ?></div>
			<div id="menu"><?php include("php/menu-2.php"); ?></div>
		</div>
		<div id="bg-couro">
			<div id="principal">
				<div id="principal-content-full">
					<div id="coluna-full">
						<div id="titulo-pagina">
							<img src="/imagens/estrutura/titulo-blog.png" width="760" height="41" />
						</div>
						<div id="icone">
							<img src="/imagens/estrutura/icone-blog.png" width="90" height="90" />
						</div>
						<div class="texto-sem-fundo">

							<?php
							$contador = 0;

							// Executa a query final com LIMIT
							$inicio = ($pg - 1) * 12;
							$sql = "SELECT * FROM blog ORDER BY idBlog DESC LIMIT $inicio, 12";
							$resultado = mysqli_query($conexao, $sql);

							if ($resultado && mysqli_num_rows($resultado) > 0) {
								while ($row = mysqli_fetch_assoc($resultado)) {
									$idBlog = $row['idBlog'];
									$assunto = $row['assunto'];
									$imagem2 = $row['imagem2'];

									$contador++;
							?>
									<div class="box-blog">
										<a href="/vip-blog-post/<?php echo $idBlog; ?>/<?php echo tirarAcentos(str_replace(" ", "-", $assunto)); ?>">
											<img src="<?php echo "/sistema/content/" . $imagem2; ?>" width="250" height="200">
											<div class="titulo-post-thumb"><?php echo htmlspecialchars($assunto); ?></div>
										</a>
									</div>

							<?php
									if ($contador % 3 == 0) {
										echo "<div class='clear'></div>";
									}
								}
							} else {
								echo "<p>Nenhum post encontrado.</p>";
							}
							?>
							<div class="clear"></div>
						</div>


						<!-- Paginação -->
						<div id="paginacao">
							<ul class="pagination">
								<?php
								if ($pg > 1) {
									echo '<li><a href="/vip-blog/' . ($pg - 1) . '">«</a></li>';
								}

								for ($i = 1; $i <= $totalPages; $i++) {
									if ($i == $pg) {
										echo '<li><a class="active" href="/vip-blog/' . $i . '">' . $i . '</a></li>';
									} else {
										echo '<li><a href="/vip-blog/' . $i . '">' . $i . '</a></li>';
									}
								}

								if ($pg < $totalPages) {
									echo '<li><a href="/vip-blog/' . ($pg + 1) . '">»</a></li>';
								}
								?>
							</ul>
						</div>

						<?php include("php/banner-blog.php"); ?>

					</div><!--COLUNA-FULL-->
					<div class="clear"></div>
				</div><!--PRINCIPAL CONTENT-->
			</div><!--PRINCIPAL-->
		</div><!--BG-COURO-->
		<div id="rodape"><?php include("php/rodape-2.php"); ?></div>
		<div id="tags"><?php include("php/tags-mural.php"); ?></div>
	</div><!--wrap-->

	<script type="text/javascript">
		Cufon.now();
	</script>
	<?php include("php/google.php"); ?>
</body>

</html>