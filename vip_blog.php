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
<!DOCTYPE html>
<html lang="pt-BR">

<?php include 'head.php'; ?>

<body>
    <div id="wrap">
        <div>
            <?php include("php/menu-2.php"); ?>
            <div id="topo"><?php include("php/topo-2.php"); ?></div>
        </div>
        <?php include("php/slider.php"); ?>
        <?php include 'filters.php' ?>
        
        <div class="bg-dark text-light py-4">
            <div class="container">
                
                <!-- Título -->
                <div class="text-center mb-5">
                    <h1 class="display-6 fw-bold">Blog Vip Luxúria</h1>
                </div>

                <!-- Posts do Blog -->
                <div class="row g-4">
                    <?php
                    if ($resultado && mysqli_num_rows($resultado) > 0) {
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            $idBlog = $row['idBlog'];
                            $assunto = $row['assunto'];
                            $imagem2 = $row['imagem2'];
                            
                            $comAcentos = ['à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ'];
                            $semAcentos = ['a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y'];
                            $linkPost = "/vip-blog-post/" . $idBlog . "/" . str_replace(" ", "-", str_replace($comAcentos, $semAcentos, $assunto));
                    ?>
                        <div class="col-md-4">
                            <a href="<?= htmlspecialchars($linkPost) ?>" class="text-decoration-none">
                                <div class="card bg-secondary text-light h-100">
                                    <img src="<?= "/sistema/content/" . htmlspecialchars($imagem2) ?>" class="card-img-top" alt="<?= htmlspecialchars($assunto) ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($assunto) ?></h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                        }
                    } else {
                        echo '<div class="col-12"><p class="text-center">Nenhum post encontrado.</p></div>';
                    }
                    ?>
                </div>

                <!-- Paginação -->
                <?php if ($totalPages > 1): ?>
                <nav aria-label="Navegação de página" class="mt-5">
                    <ul class="pagination justify-content-center">
                        <?php if ($pg > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="/vip-blog/<?= ($pg - 1) ?>">Anterior</a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?= ($i == $pg) ? 'active' : '' ?>">
                                <a class="page-link" href="/vip-blog/<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($pg < $totalPages): ?>
                            <li class="page-item">
                                <a class="page-link" href="/vip-blog/<?= ($pg + 1) ?>">Próximo</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <?php endif; ?>

                <?php include("banner_informativo.php") ?>
                <?php include("banner_informativo2.php") ?>
                <?php include("banner_informativo3.php") ?>
            </div>
        </div>

        <?php include("rodape-novo.php"); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <?php include("php/google.php"); ?>
</body>
</html>