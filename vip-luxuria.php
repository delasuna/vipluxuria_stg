<?php
$conexao = require_once 'php/conecta_mysql.php';

$sql = "SELECT * FROM seo, tipoSeo WHERE seo.idTipoSeo = tipoSeo.idTipoSeo AND descricao = 'ConhecaVL'";
$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Impossível visualizar SEO: " . mysqli_error($conexao));
}

if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    $title = $row['title'];
    $description = $row['description'];
    $keywords = $row['keywords'];
}
mysqli_free_result($resultado);
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
                    <h1 class="display-6 fw-bold">Conheça o Vip Luxúria</h1>
                </div>

                <!-- Conteúdo -->
                <div class="row">
                    <div class="col-12">
                        <div class="p-4 bg-secondary rounded">
                            <p class="lead">O <strong>VIP LUXÚRIA</strong> é um site de anúncio classificados de acompanhantes, de produtos e serviços eróticos, direcionado para um público adulto, maior de 18 anos, que procura desfrutar momentos de prazer ao lado de acompanhantes de alto nível.</p>
                            
                            <p>Não temos nenhum vínculo com nenhuma de nossas anunciantes no que diz respeito à prestação de serviço, muito menos fazemos seleção para entrar no site. As anunciantes têm que ser maior de idade e quanto às suas fotos, não temos como identificar se foi feito photoshop ou não.</p>
                            
                            <p>A anunciante deverá se dirigir ao estúdio para assinar um termo de autorização de imagem munida de documentos, ou seja, todas elas existem, o que não impede elas de poder mandar outras no lugar.</p>
                            
                            <p>Nós do Vip Luxúria aconselhamos as anunciantes a prestar um bom serviço, mas preciso que você entenda que somos contratados e não contratantes.</p>
                            
                            <div class="alert alert-info mt-4">
                                <p><strong>Por exemplo:</strong> Se você olha um anúncio de uma promoção ou prestação de serviço em um jornal e esse anúncio não corresponde à verdade, o que você faz? Reclama na loja ou denuncia a loja no PROCON e não para o Jornal. O Jornal vende espaços publicitários assim como o Vip Luxúria.</p>
                            </div>
                            
                            <p>O Vip Luxúria é uma vitrine para clientes que buscam serviços e produtos eróticos. Então navegue pelo site e verifique que oferecemos bem mais que somente anúncio de acompanhantes e estamos sempre buscando trazer ferramentas novas para facilitar sua escolha.</p>
                            
                            <hr class="my-4">
                            
                            <h3>Como Navegar no Site</h3>
                            <p>A navegação do site é simples e intuitiva, todos os links para as páginas estão disponíveis no menu principal.</p>
                            
                            <h4 class="mt-4">Categorias de Anunciantes:</h4>
                            <ul class="list-unstyled">
                                <li class="mb-2">📍 <a href="/conteudo/mulheres.php" class="text-warning">Acompanhantes Mulheres</a>
                                    <ul class="ms-4 mt-2">
                                        <li><a href="/Acompanhantes-Loiras" class="text-light">Acompanhantes Loiras</a></li>
                                        <li><a href="/Acompanhantes-Morenas" class="text-light">Acompanhantes Morenas</a></li>
                                        <li><a href="/Acompanhantes-Mulatas" class="text-light">Acompanhantes Mulatas</a></li>
                                        <li><a href="/Acompanhantes-ComVideo" class="text-light">Acompanhantes com Vídeo</a></li>
                                        <li><a href="/Acompanhantes-Atende24Horas" class="text-light">Acompanhantes 24 horas</a></li>
                                    </ul>
                                </li>
                                <li class="mb-2">📍 <a href="/conteudo/homens.php" class="text-warning">Acompanhantes Homens</a></li>
                                <li class="mb-2">📍 <a href="/conteudo/transex.php" class="text-warning">Acompanhantes Transex</a></li>
                            </ul>
                            
                            <h4 class="mt-4">Busca por Região:</h4>
                            <ul class="list-unstyled">
                                <li>📌 <a href="/Acompanhantes/2/Novo-Hamburgo" class="text-light">Acompanhantes de Novo Hamburgo</a></li>
                                <li>📌 <a href="/Acompanhantes/1/Porto-Alegre" class="text-light">Acompanhantes de Porto Alegre</a></li>
                                <li>📌 <a href="/Acompanhantes/6/Grande-Porto-Alegre" class="text-light">Acompanhantes da Grande Porto Alegre</a></li>
                                <li>📌 <a href="/Acompanhantes/3/Vale-dos-Sinos" class="text-light">Acompanhante do Vale dos Sinos</a></li>
                                <li>📌 <a href="/Acompanhantes/5/Litoral-Gaucho" class="text-light">Acompanhantes do Litoral Gaúcho</a></li>
                            </ul>
                            
                            <div class="alert alert-warning mt-4">
                                <strong>Obs.:</strong> O <strong>VIP LUXÚRIA</strong> não intermedia os contatos das empresas e/ou clientes anunciantes. As informações contidas nos anúncios são de inteira responsabilidade dos anunciantes.
                            </div>
                        </div>
                    </div>
                </div>

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