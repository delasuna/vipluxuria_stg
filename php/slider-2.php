<div id="slider-content-2">
<script type="text/javascript">
  $(document).ready(function(){
    function initBxSlider() {
      // Destroi o slider anterior se existir
      if ($('.bxslider-2').data('bxSlider')) {
        $('.bxslider-2').data('bxSlider').destroySlider();
      }

      var windowWidth = $(window).width();
      var sliderConfig = {
        auto: true,
        pager: false,
        controls: true,
        slideMargin: 10,
        responsive: true,
        moveSlides: 1
      };

      // 🔹 Ajustes por breakpoint
      if (windowWidth <= 767) {
        // MOBILE → 1 imagem
        sliderConfig.minSlides = 1;
        sliderConfig.maxSlides = 1;
        sliderConfig.slideWidth = windowWidth * 0.9;
      } else if (windowWidth <= 991) {
        // TABLET → 2 imagens
        sliderConfig.minSlides = 2;
        sliderConfig.maxSlides = 2;
        sliderConfig.slideWidth = 320;
      } else {
        // DESKTOP → 2 imagens fixas
        sliderConfig.minSlides = 2;
        sliderConfig.maxSlides = 2;
        sliderConfig.slideWidth = 380; // mantém proporção original
      }

      var slider = $('.bxslider-2').bxSlider(sliderConfig);
      $('.bxslider-2').data('bxSlider', slider);
    }

    // Inicializa e reinicia ao redimensionar
    initBxSlider();
    $(window).on('resize', function(){
      clearTimeout(window.resizedFinished);
      window.resizedFinished = setTimeout(initBxSlider, 300);
    });
  });
</script>


  <div class="bxslider-2">
    <?php
    $sql = "SELECT * FROM bannercentral3 ORDER BY RAND()";
    $resultado = mysqli_query($conexao, $sql);

    if (!$resultado) {
        die("Impossível visualizar os banners: " . mysqli_error($conexao));
    }

    if (mysqli_num_rows($resultado) > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $descricao = $row['descricao'];
            $imagem = $row['imagem'];
            $site = $row['site'];
            ?>
            <div class="slide">
              <a href="<?= htmlspecialchars($site) ?>" target="_blank">
                <img 
                  src="<?= "/sistema/content/" . htmlspecialchars($imagem) ?>" 
                  alt="<?= htmlspecialchars($descricao) ?>" 
                  class="banner-bx" />
              </a>
            </div>
            <?php
        }
    }
    ?>
  </div>
</div>
