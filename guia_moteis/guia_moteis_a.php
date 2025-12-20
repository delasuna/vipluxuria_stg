<?php 
$conexao = require_once '../php/conecta_mysql.php';  

$sql = "SELECT * FROM seo, tipoSeo 
        WHERE seo.idTipoSeo = tipoSeo.idTipoSeo 
        AND descricao = 'GuiasDeMotel'";
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
?>

<!DOCTYPE html>
<html lang="pt-BR">

<?php include '../head.php'; ?>

<body>
<div id="wrap">

    <div>
        <?php include("../php/menu-2.php"); ?>
    </div>

    <div class="degrade">
        <div class="moteis-page-premium">
            <div class="container">

                <!-- Header -->
                <div class="dicas-header-premium pt-5">
                    <h1 class="dicas-title-main">
                        <i class="bi bi-house-heart"></i>
                        Guia de <span class="text-rosa">Motéis</span>
                    </h1>
                </div>

                <!-- Lista de Motéis (coluna única) -->
                <div class="dicas-grid-premium" style="margin-bottom: 0 !important;">

                    <?php
                    $banners = [
                        ["link" => "https://www.foumotel.com.br/", "img" => "fou.png", "nome" => "Fou Motel"],
                        ["link" => "https://www.motelmedieval.com.br/", "img" => "medieval.png", "nome" => "Motel Medieval"],
                        ["link" => "https://www.motelsherwood.com.br/", "img" => "sherwood.png", "nome" => "Motel Sherwood"],
                        ["link" => "https://moteisvisavis.com.br/porto-alegre", "img" => "vis-a-vis.png", "nome" => "Motel Vis a Vis"],
                        ["link" => "https://www.motelcalidon.com.br/", "img" => "calidon.png", "nome" => "Motel Calidon"],
                        ["link" => "https://motelcozumel.com.br/", "img" => "cozumel.png", "nome" => "Motel Cozumel"],
                        ["link" => "https://www.moteldosalpes.com.br/", "img" => "alpes.png", "nome" => "Motel dos Alpes"],
                        ["link" => "https://www.motelsahara.com.br/", "img" => "sahara.png", "nome" => "Motel Sahara"]
                    ];

                    $i = 1;
                    foreach ($banners as $banner): ?>
                        <div class="dica-card">
                            <div class="dica-number">
                                <?php echo str_pad($i++, 2, '0', STR_PAD_LEFT); ?>
                            </div>
                            <div class="dica-content text-center">
                                <a href="<?php echo htmlspecialchars($banner['link']); ?>" 
                                   target="_blank" rel="noopener">
                                    <img 
                                        src="../imagens/banner-moteis/<?php echo htmlspecialchars($banner['img']); ?>" 
                                        alt="<?php echo htmlspecialchars($banner['nome']); ?>" 
                                        class="img-fluid rounded mb-3"
                                    >
                                </a>
                                <h3><?php echo htmlspecialchars($banner['nome']); ?></h3>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Texto explicativo -->
                    <div class="dicas-intro-card">
                        <h2>O que é um motel?</h2>
                        <p>
                            Os motéis são estabelecimentos que oferecem quartos privativos e confortáveis para momentos de intimidade. Ao contrário dos hotéis convencionais, os motéis geralmente são voltados para estadias curtas, onde casais e indivíduos podem aproveitar a privacidade e a discrição em um ambiente projetado especificamente para encontros românticos.
                        </p>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <?php include("../rodape-novo.php"); ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<?php include("../php/google.php"); ?>

</body>
</html>
