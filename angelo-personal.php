<?php
$conexao = require_once 'php/conecta_mysql.php';

$sql = "SELECT * FROM seo, tipoSeo 
        WHERE seo.idTipoSeo = tipoSeo.idTipoSeo 
        AND descricao = 'Equipe Angelo Marques'";
$resultado = mysqli_query($conexao, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
  $row = mysqli_fetch_assoc($resultado);
  $title = $row['title'];
  $description = $row['description'];
  $keywords = $row['keywords'];
  mysqli_free_result($resultado);
}
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

      <div class="dicas-page-premium">
        <div class="container">

          <!-- Header -->
          <div class="dicas-header-premium text-center">
            <h1 class="dicas-title-main">
              <i class="bi bi-heart-pulse"></i>
              Equipe <span class="text-rosa">Angelo Marques</span>
            </h1>
            <p class="dicas-subtitle">
              Personal Trainers &amp; Bem-Estar
            </p>
          </div>

          <!-- Card principal -->
          <div class="dicas-intro-card text-center">
            <h2>Treinamento personalizado para sa&uacute;de e performance</h2>
            <p>
              Parceria Vip Lux&uacute;ria desde 2008, oferecendo acompanhamento f&iacute;sico
              focado em est&eacute;tica, defini&ccedil;&atilde;o muscular e qualidade de vida.
            </p>
          </div>

          <!-- Imagem / Banner -->
          <div class="banner-angelo-wrapper d-flex justify-content-center">
            <img
              src="/imagens/angelo-personal.png"
              alt="Equipe Angelo Marques - Personal Trainers"
              class="banner-angelo-img">
          </div>

          <div class="banners-antigos-section">
            <?php include("php/tags-parceiros.php"); ?>
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