<div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php
    $sql = "SELECT * FROM bannercentral2 ORDER BY RAND()";
    $resultado = mysqli_query($conexao, $sql);

    if(!$resultado){
        die("Impossível visualizar os banners: " . mysqli_error($conexao));
    }

    if(mysqli_num_rows($resultado) > 0) {
        $active = true;
        while($row = mysqli_fetch_assoc($resultado)) {
            $descricao = $row['descricao'];
            $imagem = $row['imagem'];
            $site = $row['site'];
            ?>
            <div class="carousel-item <?= $active ? 'active' : '' ?>">
              <a href="<?= htmlspecialchars($site) ?>" target="_blank">
                <div class="ratio" style="--bs-aspect-ratio: 25%;">
                  <img src="<?= "/sistema/content/" . htmlspecialchars($imagem) ?>" 
                       class="w-100 h-100" 
                       alt="<?= htmlspecialchars($descricao) ?>">
                </div>
              </a>
            </div>
            <?php
            $active = false;
        }
    }
    ?>
  </div>

  <!-- Controles -->
  <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Próximo</span>
  </button>
</div>
