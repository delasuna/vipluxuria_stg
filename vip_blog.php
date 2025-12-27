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

?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php include 'head.php'; ?>

<body>
    <div id="wrap">
        <div>
            <?php include("php/menu-2.php"); ?>
        </div>

        <div class="degrade">

        <div class="blog-page-premium">
            <div class="container">

                <!-- Header do Blog -->
                <div class="blog-header-premium">
                    <h1 class="blog-title-main">Blog <span class="text-rosa">Vip Luxúria</span></h1>
                    <p class="blog-subtitle">Dicas, novidades e conteúdo exclusivo</p>
                </div>

                <!-- Grid de Posts -->
                <div class="blog-grid-premium">
                    <?php
                    $sql = "SELECT * FROM blog ORDER BY idBlog DESC LIMIT $inicio, $limite";
                    $resultado = mysqli_query($conexao, $sql);
                    if (!$resultado) {
                        die("Impossível visualizar o blog: " . mysqli_error($conexao));
                    }
                    if ($resultado && mysqli_num_rows($resultado) > 0) {
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            $idBlog = $row['idBlog'];
                            $assunto = $row['assunto'];
                            $imagem2 = $row['imagem2'];

                            $comAcentos = ['à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ'];
                            $semAcentos = ['a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y'];
                            $slug = strtolower(
                                str_replace(" ", "-",
                                    str_replace($comAcentos, $semAcentos, $assunto)
                                )
                            );

                            $linkPost = "/vip-blog-post/$idBlog/$slug";

                    ?>
                        <a href="<?= htmlspecialchars($linkPost) ?>" class="blog-card-link">
                            <article class="blog-card-premium">
                                <div class="blog-card-image">
                                    <img src="<?= "/sistema/content/" . htmlspecialchars($imagem2) ?>" 
                                         alt="<?= htmlspecialchars($assunto) ?>"
                                         loading="lazy">
                                    <div class="blog-card-overlay">
                                        <span class="read-more">Ler Mais</span>
                                    </div>
                                </div>
                                <div class="blog-card-content">
                                    <h2 class="blog-card-title"><?= htmlspecialchars($assunto) ?></h2>
                                </div>
                            </article>
                        </a>
                    <?php
                        }
                    } else {
                        echo '<div class="no-posts-message">
                                <i class="bi bi-newspaper"></i>
                                <p>Nenhum post encontrado no momento.</p>
                              </div>';
                    }
                    ?>
                </div>

                <!-- Paginação Estilizada -->
                <?php if ($totalPages > 1): ?>
                    <nav class="blog-pagination">
                        <ul class="pagination-list">
                            <?php if ($pg > 1): ?>
                                <li class="pagination-item">
                                    <a class="pagination-link pagination-prev" href="/vip-blog/<?= ($pg - 1) ?>">
                                        <i class="bi bi-chevron-left"></i> Anterior
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php 
                            $startPage = max(1, $pg - 2);
                            $endPage = min($totalPages, $pg + 2);
                            
                            for ($i = $startPage; $i <= $endPage; $i++): 
                            ?>
                                <li class="pagination-item">
                                    <a class="pagination-link <?= ($i == $pg) ? 'active' : '' ?>" 
                                       href="/vip-blog/<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($pg < $totalPages): ?>
                                <li class="pagination-item">
                                    <a class="pagination-link pagination-next" href="/vip-blog/<?= ($pg + 1) ?>">
                                        Próximo <i class="bi bi-chevron-right"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                <?php endif; ?>

                <!-- Newsletter Section Refinada -->
                <div class="newsletter-section-blog">
                    <div class="newsletter-content-blog">
                        <h3><i class="bi bi-envelope-heart"></i> Newsletter VIP</h3>
                        <p>Receba novidades e conteúdo exclusivo</p>
                        <form class="newsletter-form-blog" action="/newsletter" method="post">
                            <input type="email" 
                                   name="email" 
                                   placeholder="Digite seu e-mail" 
                                   required 
                                   class="newsletter-input">
                            <button type="submit" class="newsletter-button">
                                <i class="bi bi-send"></i>
                            </button>
                        </form>
                        <p class="newsletter-promise">Prometemos não enviar spam</p>
                    </div>
                </div>

            </div>
        </div>

        </div>

        <?php include("rodape-novo.php"); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <?php include("php/google.php"); ?>
</body>
</html>