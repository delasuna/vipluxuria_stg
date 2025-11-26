<?php
$conexao = require_once 'php/conecta_mysql.php';

// SEO - Parceiros
$sql_seo = "SELECT * FROM seo 
            INNER JOIN tipoSeo ON seo.idTipoSeo = tipoSeo.idTipoSeo 
            WHERE descricao = 'Parceiros'";

$resultado_seo = mysqli_query($conexao, $sql_seo);
if (!$resultado_seo) {
    die("Impossível visualizar SEO: " . mysqli_error($conexao));
}

$seo = mysqli_fetch_assoc($resultado_seo);
$title = $seo['title'] ?? '';
$description = $seo['description'] ?? '';
$keywords = $seo['keywords'] ?? '';
mysqli_free_result($resultado_seo);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php include 'head.php'; ?>

<body>
    <div id="wrap">
        <div>
            <?php include("php/menu-2.php"); ?>
        </div>

        <!-- Opcional: estilos rápidos locais (remova se preferir no CSS global) -->
        <style>
            .degrade { /* mantém seu gradiente atual */ }
            .titulo-pagina { font-size: 2rem; font-weight: 700; }
            .card-site { background: rgba(0,0,0,0.18); border-radius: 10px; padding: 20px; }
            .codigo-embed { background: #0e0e0e; color: #ffdede; padding: 12px; border-radius: 6px; overflow-x:auto; }
            .card-banner { background: rgba(0,0,0,0.12); border-radius:8px; padding:10px; min-height:70px; display:flex; align-items:center; justify-content:center; }
            .banner-img { max-width:100%; height:auto; border-radius:6px; }
            .titulo-grupo { margin-top:30px; margin-bottom:12px; font-size:1.25rem; font-weight:700; border-bottom:1px solid rgba(255,255,255,0.06); padding-bottom:6px; }
            @media (max-width:768px){ .titulo-pagina{ font-size:1.6rem; } .titulo-grupo{ font-size:1.1rem; } }
        </style>

        <div class="degrade text-light py-4">
            <div class="container">

                <!-- Título -->
                <div class="text-center mb-5">
                    <h1 class="titulo-pagina">Parceiros</h1>
                </div>

                <!-- Seja nosso parceiro -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="card-site">
                            <h2 class="mb-3">Seja nosso Parceiro!</h2>
                            <p>
                                Para fazer uma parceria com o nosso site, copie o código-fonte abaixo e cole em seu site.
                                Envie-nos um e-mail
                                <a href="mailto:vipluxuria@hotmail.com" class="text-warning">vipluxuria@hotmail.com</a>
                                informando que você deseja ser nosso parceiro, e junto, anexe o seu banner (.gif, .jpg, .png e .swf - no formato 468 x 60 pixels) ou código-fonte para incorporação.
                            </p>

                            <div class="text-center my-4">
                                <a href="https://www.vipluxuria.com" target="_blank" rel="noopener">
                                    <img src="/imagens/parceiros/vip-luxuria.gif" alt="Vip Luxúria" class="img-fluid banner-img">
                                </a>
                            </div>

                            <pre class="codigo-embed">
                                &lt;a href="https://www.vipluxuria.com" target="_blank"&gt;
                                &lt;img src="https://vipluxuria.com/imagens/parceiros/vip-luxuria.gif"
                                alt="Vip Luxúria - O guia erótico mais completo do Brasil" border="0"&gt;
                                &lt;/a&gt;
                            </pre>

                            <p class="alert alert-info mt-3">
                                <em>Obs.: Somente aceitamos Parceiros fora da região de Porto Alegre e Grande Porto Alegre. Agradecemos a compreensão.</em>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Lista de Parceiros -->
                <?php
                $sql_parceiros = "SELECT parceiro.idParceiro, parceirotitulo.idParceiroTitulo, parceirotitulo.titulo, 
                                  parceiro.descricao, parceiro.imagem, parceiro.flagSWF
                                  FROM parceiro
                                  INNER JOIN parceirotitulo ON parceiro.idParceiroTitulo = parceirotitulo.idParceiroTitulo
                                  ORDER BY parceirotitulo.titulo";

                $resultado_parceiros = mysqli_query($conexao, $sql_parceiros);
                if (!$resultado_parceiros) {
                    die("Impossível visualizar os parceiros: " . mysqli_error($conexao));
                }

                $tituloAux = '';
                $primeiroTitulo = true;

                while ($row = mysqli_fetch_assoc($resultado_parceiros)) {
                    $idParceiro = $row['idParceiro'];
                    $titulo = $row['titulo'];
                    $descricao = $row['descricao'];
                    $imagem = $row['imagem'];
                    $flagSWF = $row['flagSWF'];

                    // quando o título do grupo muda, fecha a grid anterior e abre uma nova
                    if ($tituloAux != $titulo) {
                        if (!$primeiroTitulo) {
                            // fecha a div.row do grupo anterior
                            echo '</div>';
                        }
                        $primeiroTitulo = false;
                        // título do novo grupo
                        echo '<h3 class="titulo-grupo">' . htmlspecialchars($titulo) . '</h3>';
                        echo '<div class="row g-3">'; // abre nova row para os banners deste título
                    }
                    $tituloAux = $titulo;

                    // cada banner em uma coluna responsiva
                    echo '<div class="col-12 col-md-6 col-lg-4">';
                    echo '<div class="card-banner">';

                    // Se for SWF e existir imagem, renderiza objet/embed (mantive suporte)
                    if ($flagSWF === "S" && !empty($imagem)) {
                        // Fechamos o PHP para inserir tag HTML com echo seguro
                        ?>
                        <object width="468" height="60" data="<?php echo '/sistema/content/' . $imagem; ?>">
                            <param name="movie" value="<?php echo '/sistema/content/' . $imagem; ?>">
                            <param name="quality" value="high">
                            <embed src="<?php echo '/sistema/content/' . $imagem; ?>" quality="high" width="468" height="60"></embed>
                        </object>
                        <?php
                    } elseif (!empty($imagem)) {
                        // imagem normal
                        // segurança: htmlspecialchars no href (descricao) e no src deixo relativo para o /sistema/content
                        $link = htmlspecialchars($descricao);
                        $src = '/sistema/content/' . $imagem;
                        echo '<a href="' . $link . '" target="_blank" rel="noopener">
                                <img src="' . $src . '" class="img-fluid banner-img" alt="Parceiro">
                              </a>';
                    } else {
                        // se não tem imagem, exibe descrição (conteúdo HTML armazenado)
                        echo '<div class="texto-descricao">' . html_entity_decode($descricao) . '</div>';
                    }

                    echo '</div>'; // fecha card-banner
                    echo '</div>'; // fecha coluna
                }

                // fecha a última row caso tenha sido aberta
                if (!$primeiroTitulo) {
                    echo '</div>';
                }

                // libera resultado
                mysqli_free_result($resultado_parceiros);
                ?>

                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        // Seleciona qualquer imagem dentro de .texto-descricao, independente da profundidade
                        const imagens = document.querySelectorAll(".texto-descricao img");

                        imagens.forEach(img => {
                            img.style.width = "100%";
                            img.style.height = "auto"; // Mantém proporção
                            img.style.display = "block"; // Evita espaços de inline-block
                        });
                    });
                </script>

                <?php include './conteudo/dicas-e-duvidas.php' ?>

                <div class="mt-3 d-flex justify-content-center">
                    <a href="https://vipluxuria.com/Acompanhantes-SexoVirtual" target="_blank"><img src="/imagens/banner-quarentena.png" width="946px" height="237px"></a>
                </div>

            </div> <!-- /container -->
        </div> <!-- /degrade -->

        <?php include("rodape-novo.php"); ?>
    </div> <!-- /wrap -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <?php include("php/google.php"); ?>
</body>
</html>