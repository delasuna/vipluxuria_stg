<!-- Componente: Big Banner Slider
Usar em um template PHP. Substitua a consulta e caminhos conforme seu projeto.
Inclui: HTML, CSS e JavaScript puro (sem jQuery), autoplay, responsivo (2 banners desktop, 1 mobile), botões e contagem.

Copie e cole onde quiser e ajuste as classes/ids se necessário.
-->

<div id="big-banner-slider" class="big-banner-slider d-none d-sm-block">
  <button class="bbs-btn bbs-prev" aria-label="Anterior">❮</button>
  <div class="bbs-viewport">
    <div class="bbs-track">
      <?php
      // Consulta de exemplo - ajuste conforme seu DB
      $sql = "SELECT * FROM bannercentral3 ORDER BY RAND()";
      $resultado = mysqli_query($conexao, $sql);

      if (!$resultado) {
        echo '<!-- Erro ao buscar banners: ' . mysqli_error($conexao) . '-->';
      } else {
        while ($row = mysqli_fetch_assoc($resultado)) {
          $descricao = htmlspecialchars($row['descricao']);
          $imagem = htmlspecialchars($row['imagem']);
          $site = htmlspecialchars($row['site']);
      ?>
          <div class="bbs-slide">
            <a href="<?= $site ?>" target="_blank" rel="noopener noreferrer">
              <img class="bbs-img" src="/sistema/content/<?= $imagem ?>" alt="<?= $descricao ?>">
            </a>
          </div>
      <?php
        }
      }
      ?>
    </div>
  </div>
  <button class="bbs-btn bbs-next" aria-label="Próximo">❯</button>

  <div class="bbs-controls d-none">
    <div class="bbs-counter" aria-live="polite">0 / 0</div>
    <button class="bbs-playpause" aria-label="Pausar autoplay">Pause</button>
  </div>
</div>

<div id="big-banner-slider-mobile" class="big-banner-slider-mobile d-sm-none">
  <button class="bbsm-btn bbsm-prev" aria-label="Anterior">❮</button>
  <div class="bbsm-viewport">
    <div class="bbsm-track">
      <?php
      $sqlMobile = "SELECT * FROM bannercentralmobile2 ORDER BY RAND()";
      $resultadoMobile = mysqli_query($conexao, $sqlMobile);

      if ($resultadoMobile) {
        while ($row = mysqli_fetch_assoc($resultadoMobile)) {
          $descricao = htmlspecialchars($row['descricao']);
          $imagem = htmlspecialchars($row['imagem']);
          $site = htmlspecialchars($row['site']);
      ?>
          <div class="bbsm-slide">
            <a href="<?= $site ?>" target="_blank" rel="noopener noreferrer">
              <img class="bbsm-img"
                   src="/sistema/content/<?= $imagem ?>"
                   alt="<?= $descricao ?>">
            </a>
          </div>
      <?php } } ?>
    </div>
  </div>
  <button class="bbsm-btn bbsm-next" aria-label="Próximo">❯</button>
</div>


<style>
  /* ---- Estilos Big Banner Slider ---- */
  #big-banner-slider.big-banner-slider {
    position: relative;
    width: 100%;
    max-width: 1400px;
    /* limitar em telas muito largas */
    margin: 0 auto;
    padding: 12px 8px;
    box-sizing: border-box;
  }

  /* viewport que 'mascara' o track */
  .big-banner-slider .bbs-viewport {
    overflow: hidden;
    width: 100%;
    border-radius: 12px;
  }

  /* track flex horizontal */
  .big-banner-slider .bbs-track {
    display: flex;
    gap: 14px;
    transition: transform 400ms ease;
    will-change: transform;
    align-items: center;
  }

  /* cada slide */
  .big-banner-slider .bbs-slide {
    flex: 0 0 auto;
    width: calc(50% - 7px);
    /* por padrão 2 por vez */
    box-sizing: border-box;
  }

  .big-banner-slider .bbs-slide a {
    display: block;
  }

  .big-banner-slider .bbs-img {
    display: block;
    width: 100% !important;
    height: 420px;
    /* altura base para desktop */
    max-height: 75vh;
    object-fit: cover;
    border-radius: 10px;
  }

  /* Botões de navegação */
  .big-banner-slider .bbs-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    border: 0;
    padding: 10px 14px;
    border-radius: 8px;
    cursor: pointer;
    backdrop-filter: blur(4px);
  }

  .big-banner-slider .bbs-prev {
    left: 12px;
  }

  .big-banner-slider .bbs-next {
    right: 12px;
  }

  /* controles inferiores */
  .big-banner-slider .bbs-controls {
    display: flex;
    gap: 10px;
    align-items: center;
    justify-content: flex-end;
    margin-top: 8px;
  }

  .big-banner-slider .bbs-counter {
    color: #333;
    font-weight: 600;
  }

  .big-banner-slider .bbs-playpause {
    background: transparent;
    border: 1px solid #ccc;
    padding: 6px 8px;
    border-radius: 6px;
    cursor: pointer;
  }

  /* ---- RESPONSIVO ---- */
  @media (max-width: 991px) {
    .big-banner-slider .bbs-img {
      height: 360px;
    }
  }

  @media (max-width: 767px) {

    /* mobile: 1 por vez, ocupar quase toda largura */
    .big-banner-slider .bbs-slide {
      width: 100%;
    }

    .big-banner-slider .bbs-img {
      height: 60vh;
      max-height: 70vh;
    }

    .big-banner-slider .bbs-btn {
      padding: 8px 10px;
    }

    .big-banner-slider {
      padding: 8px 4px;
    }
  }

  /* forçar imagens e wrappers dentro do componente */
  #big-banner-slider img {
    max-width: 100%;
    height: auto;
    display: block;
  }

  /* =========================
SLIDER MOBILE (ISOLADO)
========================= */

.big-banner-slider-mobile {
  position: relative;
  width: 100%;
  margin: 0 auto;
  padding: 8px 4px;
}

.big-banner-slider-mobile .bbsm-viewport {
  overflow: hidden;
  border-radius: 12px;
}

.big-banner-slider-mobile .bbsm-track {
  display: flex;
  transition: transform 400ms ease;
}

.big-banner-slider-mobile .bbsm-slide {
  min-width: 100%;
}

.big-banner-slider-mobile .bbsm-img {
  width: 100%;
  height: auto;
  aspect-ratio: 400 / 250; /* você pode mudar depois */
  object-fit: cover;
  border-radius: 10px;
}

.big-banner-slider-mobile .bbsm-btn {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  z-index: 10;
  background: rgba(0,0,0,0.5);
  color: #fff;
  border: 0;
  padding: 8px 10px;
  border-radius: 8px;
  cursor: pointer;
}

.big-banner-slider-mobile .bbsm-prev { left: 8px; }
.big-banner-slider-mobile .bbsm-next { right: 8px; }
</style>

<script>
  (function() {
    const root = document.getElementById('big-banner-slider');
    if (!root) return;

    const track = root.querySelector('.bbs-track');
    const slides = () => Array.from(track.querySelectorAll('.bbs-slide'));
    const prevBtn = root.querySelector('.bbs-prev');
    const nextBtn = root.querySelector('.bbs-next');
    const counterEl = root.querySelector('.bbs-counter');
    const playPauseBtn = root.querySelector('.bbs-playpause');

    let index = 0;
    let slidesToShow = window.innerWidth <= 767 ? 1 : 2;
    let autoplay = true;
    let autoplayInterval = 4500;
    let autoplayTimer = null;

    function updateSizes() {
      slidesToShow = window.innerWidth <= 767 ? 1 : 2;
      const slideElems = slides();
      if (slideElems.length === 0) return;

      // width do slide baseado no viewport do container
      const viewportWidth = root.querySelector('.bbs-viewport').clientWidth;
      const gap = 14; // mesmo gap do CSS
      const slideWidth = (viewportWidth - gap * (slidesToShow - 1)) / slidesToShow;

      slideElems.forEach(s => {
        s.style.width = slideWidth + 'px';
      });

      // ajustar altura das imagens para evitar pulos (opcional)
      const imgs = root.querySelectorAll('.bbs-img');
      imgs.forEach(img => img.style.maxHeight = Math.min(window.innerHeight * 0.8, 800) + 'px');

      goTo(index, false);
    }

    function goTo(i, animate = true) {
      const slideElems = slides();
      if (slideElems.length === 0) return;
      const maxIndex = Math.max(0, slideElems.length - slidesToShow);
      if (i < 0) i = 0;
      if (i > maxIndex) i = maxIndex;
      index = i;

      const slideWidth = slideElems[0].getBoundingClientRect().width;
      const gap = 14;
      const offset = (slideWidth + gap) * index;

      if (!animate) track.style.transition = 'none';
      else track.style.transition = '';

      track.style.transform = `translateX(-${offset}px)`;

      // atualizar contador
      counterEl.textContent = (index + 1) + ' / ' + slideElems.length;

      // restaurar transition se necessário
      if (!animate) requestAnimationFrame(() => {
        track.style.transition = '';
      });
    }

    function next() {
      const slideElems = slides();
      const maxIndex = Math.max(0, slideElems.length - slidesToShow);
      if (index >= maxIndex) index = 0;
      else index++;
      goTo(index);
    }

    function prev() {
      const slideElems = slides();
      const maxIndex = Math.max(0, slideElems.length - slidesToShow);
      if (index <= 0) index = maxIndex;
      else index--;
      goTo(index);
    }

    function startAutoplay() {
      stopAutoplay();
      if (!autoplay) return;
      autoplayTimer = setInterval(next, autoplayInterval);
      playPauseBtn.textContent = 'Pause';
      playPauseBtn.setAttribute('aria-label', 'Pausar autoplay');
    }

    function stopAutoplay() {
      if (autoplayTimer) clearInterval(autoplayTimer);
      autoplayTimer = null;
      playPauseBtn.textContent = 'Play';
      playPauseBtn.setAttribute('aria-label', 'Ativar autoplay');
    }

    // eventos
    nextBtn.addEventListener('click', () => {
      next();
      startAutoplay();
    });
    prevBtn.addEventListener('click', () => {
      prev();
      startAutoplay();
    });
    playPauseBtn.addEventListener('click', () => {
      autoplay = !autoplay;
      if (autoplay) startAutoplay();
      else stopAutoplay();
    });

    window.addEventListener('resize', () => {
      clearTimeout(window._bbsResize);
      window._bbsResize = setTimeout(updateSizes, 120);
    });

    // inicia
    updateSizes();
    startAutoplay();

    // pausar autoplay ao focar / hover no componente
    root.addEventListener('mouseenter', () => {
      if (autoplay) stopAutoplay();
    });
    root.addEventListener('mouseleave', () => {
      if (autoplay) startAutoplay();
    });

  })();
</script>

<script>
(function() {
  const root = document.getElementById('big-banner-slider-mobile');
  if (!root) return;

  const track = root.querySelector('.bbsm-track');
  const slides = root.querySelectorAll('.bbsm-slide');
  const prevBtn = root.querySelector('.bbsm-prev');
  const nextBtn = root.querySelector('.bbsm-next');

  let index = 0;
  const total = slides.length;
  const autoplayInterval = 4500;
  let autoplayTimer;

  function goTo(i) {
    if (i < 0) i = total - 1;
    if (i >= total) i = 0;
    index = i;
    track.style.transform = `translateX(-${index * 100}%)`;
  }

  function next() { goTo(index + 1); }
  function prev() { goTo(index - 1); }

  function startAutoplay() {
    autoplayTimer = setInterval(next, autoplayInterval);
  }

  function stopAutoplay() {
    clearInterval(autoplayTimer);
  }

  nextBtn.addEventListener('click', () => { next(); stopAutoplay(); startAutoplay(); });
  prevBtn.addEventListener('click', () => { prev(); stopAutoplay(); startAutoplay(); });

  root.addEventListener('mouseenter', stopAutoplay);
  root.addEventListener('mouseleave', startAutoplay);

  startAutoplay();
})();
</script>
