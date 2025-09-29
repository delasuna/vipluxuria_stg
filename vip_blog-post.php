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

// Função para estimar tempo de leitura
function tempoLeitura($texto) {
    $palavras = str_word_count(strip_tags($texto));
    $minutos = ceil($palavras / 200);
    return $minutos;
}
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
            <!-- Hero Header Premium -->
            <div class="blog-post-hero">
                <div class="hero-overlay"></div>
                <div class="hero-pattern"></div>
                
                <!-- Imagem de fundo se houver -->
                <?php if (!empty($post['imagem'])): ?>
                    <div class="hero-background" 
                         style="background-image: url('<?php echo "/sistema/content/" . htmlspecialchars($post['imagem']); ?>')">
                    </div>
                <?php endif; ?>
                
                <div class="container">
                    <div class="hero-content">
                        <!-- Breadcrumb -->
                        <nav class="hero-breadcrumb">
                            <a href="/">Início</a>
                            <span class="divider">/</span>
                            <a href="/vip-blog">Blog</a>
                            <span class="divider">/</span>
                            <span class="current">Artigo</span>
                        </nav>
                        
                        <!-- Categoria Badge -->
                        <div class="post-category-badge">
                            <i class="bi bi-bookmark-fill"></i>
                            Blog Vip Luxúria
                        </div>
                        
                        <!-- Título -->
                        <h1 class="hero-title"><?php echo htmlspecialchars($post['assunto']); ?></h1>
                        
                        <!-- Meta Info -->
                        <div class="hero-meta">
                            <?php if (!empty($post['dataPublicacao'])): ?>
                                <div class="meta-item">
                                    <i class="bi bi-calendar3"></i>
                                    <?php 
                                    $data = new DateTime($post['dataPublicacao']);
                                    echo $data->format('d/m/Y');
                                    ?>
                                </div>
                            <?php endif; ?>
                            <div class="meta-item">
                                <i class="bi bi-clock"></i>
                                <?php echo tempoLeitura($post['mensagem']); ?> min de leitura
                            </div>
                            <div class="meta-item">
                                <i class="bi bi-eye"></i>
                                Leitura rápida
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Conteúdo Principal -->
            <div class="blog-post-container">
                <div class="container">
                    <div class="row">
                        <!-- Sidebar Flutuante -->
                        <div class="col-lg-2">
                            <div class="post-sidebar-float">
                                <div class="share-buttons">
                                    <button class="share-btn" title="Compartilhar">
                                        <i class="bi bi-share"></i>
                                    </button>
                                    <button class="share-btn" title="Favoritar">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <button class="share-btn" title="Salvar">
                                        <i class="bi bi-bookmark"></i>
                                    </button>
                                </div>
                                
                                <div class="reading-progress">
                                    <div class="progress-bar-vertical">
                                        <div class="progress-fill"></div>
                                    </div>
                                    <span class="progress-text">0%</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Conteúdo do Artigo -->
                        <div class="col-lg-8">
                            <article class="post-article-content">
                                
                                <!-- Resumo/Introdução destacada -->
                                <?php 
                                $mensagem = $post['mensagem'];
                                $primeiroParagrafo = substr($mensagem, 0, strpos($mensagem, '</p>') + 4);
                                if($primeiroParagrafo): 
                                ?>
                                    <div class="post-introduction">
                                        <?php echo $primeiroParagrafo; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Conteúdo principal -->
                                <div class="post-body-formatted">
                                    <?php 
                                    // Remove o primeiro parágrafo já exibido
                                    $restoMensagem = substr($mensagem, strpos($mensagem, '</p>') + 4);
                                    
                                    // Adiciona classes especiais para melhor formatação
                                    $restoMensagem = str_replace('<p>', '<p class="paragraph-styled">', $restoMensagem);
                                    $restoMensagem = str_replace('<h2>', '<h2 class="heading-styled"><span class="heading-decorator"></span>', $restoMensagem);
                                    $restoMensagem = str_replace('<h3>', '<h3 class="subheading-styled">', $restoMensagem);
                                    
                                    echo $restoMensagem;
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
                                    <!-- Tags -->
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
                                    
                                    <!-- Autor/Call to Action -->
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
                        
                        <!-- Sidebar Direita -->
                        <div class="col-lg-2">
                            <aside class="post-sidebar-right">
                                <div class="toc-container">
                                    <h5>Navegação Rápida</h5>
                                    <nav class="table-of-contents">
                                        <!-- TOC gerado via JS -->
                                    </nav>
                                </div>
                            </aside>
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
    
    <!-- Progress Bar Script -->
    <script>
        // Barra de progresso de leitura
        window.addEventListener('scroll', () => {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            
            const progressBar = document.querySelector('.progress-fill');
            const progressText = document.querySelector('.progress-text');
            
            if(progressBar) {
                progressBar.style.height = scrolled + '%';
                progressText.textContent = Math.round(scrolled) + '%';
            }
        });
        
        // Gerar TOC automaticamente
        document.addEventListener('DOMContentLoaded', function() {
            const toc = document.querySelector('.table-of-contents');
            const headings = document.querySelectorAll('.post-body-formatted h2, .post-body-formatted h3');
            
            if(toc && headings.length > 0) {
                headings.forEach((heading, index) => {
                    heading.id = 'heading-' + index;
                    const link = document.createElement('a');
                    link.href = '#heading-' + index;
                    link.textContent = heading.textContent;
                    link.className = heading.tagName === 'H2' ? 'toc-h2' : 'toc-h3';
                    toc.appendChild(link);
                });
            }
        });
    </script>
    
    <?php include("php/google.php"); ?>
</body>
</html>