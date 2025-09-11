<?php
$conexao = require_once 'php/conecta_mysql.php';

// Função simples para anti-injection
function anti_injection($data)
{
	global $conexao;
	return mysqli_real_escape_string($conexao, strip_tags($data));
}

// SEO
$sqlSeo = "SELECT * FROM seo 
           INNER JOIN tipoSeo ON seo.idTipoSeo = tipoSeo.idTipoSeo 
           WHERE descricao = 'Blog' LIMIT 1";
$resultadoSeo = mysqli_query($conexao, $sqlSeo);

$title = $description = $keywords = $assunto = '';
if ($resultadoSeo && mysqli_num_rows($resultadoSeo) > 0) {
	$rowSeo = mysqli_fetch_assoc($resultadoSeo);
	$title = $rowSeo['title'];
	$description = $rowSeo['description'];
	$keywords = $rowSeo['keywords'];
	$assunto = $rowSeo['assunto'] ?? '';
}

// Obter post pelo ID
$idBlog = isset($_GET['idBlog']) ? anti_injection($_GET['idBlog']) : 0;

$sqlPost = "SELECT * FROM blog WHERE idBlog = ?";
$stmt = mysqli_prepare($conexao, $sqlPost);
mysqli_stmt_bind_param($stmt, 'i', $idBlog);
mysqli_stmt_execute($stmt);
$resultPost = mysqli_stmt_get_result($stmt);

$post = mysqli_fetch_assoc($resultPost);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8">
	<meta name="robots" content="index,follow">
	<meta name="description" content="<?php echo htmlspecialchars($description); ?>">
	<meta name="keywords" content="<?php echo htmlspecialchars($keywords); ?>">
	<title><?php echo htmlspecialchars($title . ' - ' . $assunto); ?></title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- CSS custom -->
	<link href="/css-js/estilos-2.css" rel="stylesheet">
	<link href="/css-js/menu-2.css" rel="stylesheet">
</head>

<body>
	<div class="wrap">

		<div>
			<?php include("php/menu-2.php"); ?>
			<div id="topo"><?php include("php/topo-2.php"); ?></div>
		</div>

		<!-- Título da página -->
		<div class="text-center my-4">
			<img src="/imagens/estrutura/titulo-blog.png" class="img-fluid" alt="Título Blog">
		</div>

		<?php if ($post): ?>
			<!-- Título do blog -->
			<div class="text-center mb-4">
				<div class="d-flex align-items-center justify-content-center">
					<div class="bg-warning rounded-circle d-flex align-items-center justify-content-center me-3" style="width:60px; height:60px;">
						<img src="/imagens/estrutura/icone-blog.png" class="icone-blog">
					</div>
					<h1 class="fw-bold text-white display-6"><?php echo htmlspecialchars($post['assunto']); ?></h1>
				</div>
				<?php if (!empty($post['dataPublicacao'])): ?>
					<small class="text-white-50">Publicado em <?php echo htmlspecialchars($post['dataPublicacao']); ?></small>
				<?php endif; ?>
			</div>

			<!-- Conteúdo -->
			<div class="card bg-dark text-light p-4 mb-3 container">
				<?php echo $post['mensagem']; ?>

				<?php if (!empty($post['imagem'])): ?>
					<div class="my-3 text-center">
						<img src="<?php echo "/sistema/content/" . htmlspecialchars($post['imagem']); ?>" class="img-fluid rounded" alt="<?php echo htmlspecialchars($post['assunto']); ?>">
					</div>
				<?php endif; ?>

				<?php if (!empty($post['video'])): ?>
					<div class="my-3">
						<?php echo $post['video']; ?>
					</div>
				<?php endif; ?>

				<!-- Tags -->
				<?php if (!empty($post['nomeTag1'])): ?>
					<p class="mt-4 text-white-50">
						Tags:
						<a href="<?php echo htmlspecialchars($post['paginaTag1']); ?>" class="text-warning"><?php echo htmlspecialchars($post['nomeTag1']); ?></a>
						<?php if (!empty($post['nomeTag2'])): ?>
							, <a href="<?php echo htmlspecialchars($post['paginaTag2']); ?>" class="text-warning"><?php echo htmlspecialchars($post['nomeTag2']); ?></a>
						<?php endif; ?>
					</p>
				<?php endif; ?>

				<a href="javascript:history.back()" class="btn btn-outline-warning mt-3">
					<i class="bi bi-arrow-left-circle"></i> Voltar
				</a>
			</div>
		<?php else: ?>
			<div class="alert alert-warning">Post não encontrado.</div>
		<?php endif; ?>

		<?php include("rodape-novo.php"); ?>

	</div>

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
	<?php include("php/google.php"); ?>
</body>

</html>