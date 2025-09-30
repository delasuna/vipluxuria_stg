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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index,follow">
    <meta name="description" content="<?php echo htmlspecialchars($description); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($keywords); ?>">
    <title><?php echo htmlspecialchars($post ? $post['assunto'] : 'Blog') . ' - Vip Luxúria'; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS custom -->
    <link href="/css-js/estilos-2.css" rel="stylesheet">
</head>

<body>
    <div id="wrap">
        <div>
            <?php include("php/menu-2.php"); ?>
        </div>

        <?php if ($post): ?>
            <!-- Hero Header Simplificado -->
            <div class="blog-post-hero-simple">
                <div class="container">
                    <div class="hero-content-simple">
                        <h1 class="hero-title-simple"><?php echo htmlspecialchars($post['assunto']); ?></h1>
                    </div>
                </div>
            </div>

            <!-- Barra de Progresso Fixa -->
            <div class="progress-bar-fixed">
                <div class="progress-fill-horizontal"></div>
            </div>

            <!-- Conteúdo Principal -->
            <div class="blog-post-container">
                <div class="container">
                    <div class="row justify-content-center">
                        <!-- Conteúdo do Artigo Centralizado -->
                        <div class="col-lg-8 col-md-10">
                            <article class="post-article-content">
                                <div class="post-body-formatted">
                                    <?php 
                                    // Adiciona classes especiais para melhor formatação
                                    $mensagem = str_replace('<p>', '<p class="paragraph-styled">', $post['mensagem']);
                                    $mensagem = str_replace('<h2>', '<h2 class="heading-styled"><span class="heading-decorator"></span>', $mensagem);
                                    $mensagem = str_replace('<h3>', '<h3 class="subheading-styled">', $mensagem);
                                    
                                    echo $mensagem;
                                    ?>
                                </div>
                                
                                <!-- Vídeo se houver -->
                                <?php if (!empty($post['video'])): ?>
                                    <div class="post-video-section">
                                        <div class="video-wrapper">
                                            <?php echo $post['video']; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Footer do Post -->
                                <footer class="post-footer">
                                    <?php if (!empty($post['nomeTag1'])): ?>
                                        <div class="post-tags-section">
                                            <i class="bi bi-tags-fill"></i>
                                            <div class="tags-list">
                                                <a href="<?php echo htmlspecialchars($post['paginaTag1']); ?>" class="tag-pill">
                                                    # <?php echo htmlspecialchars($post['nomeTag1']); ?>
                                                </a>
                                                <?php if (!empty($post['nomeTag2'])): ?>
                                                    <a href="<?php echo htmlspecialchars($post['paginaTag2']); ?>" class="tag-pill">
                                                        # <?php echo htmlspecialchars($post['nomeTag2']); ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="post-cta-box">
                                        <div class="cta-content">
                                            <h4>Gostou do conteúdo?</h4>
                                            <p>Explore nossos perfis verificados e encontre a acompanhante ideal para você.</p>
                                            <a href="/" class="btn-explore">
                                                <i class="bi bi-search"></i> Explorar Perfis
                                            </a>
                                        </div>
                                    </div>
                                </footer>
                            </article>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Posts Relacionados -->
            <section class="related-posts-section">
                <div class="container">
                    <div class="section-header">
                        <h3>Continue Lendo</h3>
                        <p>Artigos que você pode gostar</p>
                    </div>
                    
                    <div class="related-posts-grid">
                        <?php
                        $sqlRelated = "SELECT idBlog, assunto, imagem2 FROM blog 
                                      WHERE idBlog != ? 
                                      ORDER BY RAND() 
                                      LIMIT 3";
                        $stmtRelated = mysqli_prepare($conexao, $sqlRelated);
                        mysqli_stmt_bind_param($stmtRelated, 'i', $idBlog);
                        mysqli_stmt_execute($stmtRelated);
                        $resultRelated = mysqli_stmt_get_result($stmtRelated);
                        
                        while ($related = mysqli_fetch_assoc($resultRelated)):
                            $comAcentos = ['à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ'];
                            $semAcentos = ['a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y'];
                            $linkRelated = "/vip-blog-post/" . $related['idBlog'] . "/" . 
                                          str_replace(" ", "-", str_replace($comAcentos, $semAcentos, $related['assunto']));
                        ?>
                            <article class="related-post-card">
                                <a href="<?php echo htmlspecialchars($linkRelated); ?>">
                                    <div class="related-post-image">
                                        <img src="<?php echo "/sistema/content/" . htmlspecialchars($related['imagem2']); ?>" 
                                             alt="<?php echo htmlspecialchars($related['assunto']); ?>">
                                        <div class="overlay">
                                            <span class="read-more">Ler Mais</span>
                                        </div>
                                    </div>
                                    <div class="related-post-content">
                                        <h4><?php echo htmlspecialchars($related['assunto']); ?></h4>
                                        <span class="related-link">
                                            Continuar lendo <i class="bi bi-arrow-right"></i>
                                        </span>
                                    </div>
                                </a>
                            </article>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>

        <?php else: ?>
            <!-- Post não encontrado -->
            <div class="error-404-container">
                <div class="container">
                    <div class="error-content">
                        <div class="error-icon">
                            <i class="bi bi-emoji-frown"></i>
                        </div>
                        <h2>Oops! Conteúdo não encontrado</h2>
                        <p>O artigo que você procura não está disponível ou foi removido.</p>
                        <div class="error-actions">
                            <a href="/vip-blog" class="btn-primary-custom">
                                <i class="bi bi-grid-3x3-gap"></i> Ver Todos os Posts
                            </a>
                            <a href="/" class="btn-secondary-custom">
                                <i class="bi bi-house"></i> Página Inicial
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php include("rodape-novo.php"); ?>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Barra de progresso de leitura fixa
        window.addEventListener('scroll', () => {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            
            const progressBar = document.querySelector('.progress-fill-horizontal');
            
            if(progressBar) {
                progressBar.style.width = scrolled + '%';
            }
        });
    </script>
    
    <?php include("php/google.php"); ?>
</body>
</html>