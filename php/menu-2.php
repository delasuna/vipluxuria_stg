<?php
// menu.php
function anti_injection2($valor)
{
  return htmlspecialchars(trim($valor), ENT_QUOTES, 'UTF-8');
}

// Função auxiliar para gerar cidades
function geraOpcoesCidades($conexao)
{
  $sql = "SELECT idCidade, cidade FROM cidade ORDER BY ordem;";
  $resultado = mysqli_query($conexao, $sql);
  if (!$resultado) die("Erro: " . mysqli_error($conexao));

  while ($row = mysqli_fetch_assoc($resultado)) {
    $idCidade = $row['idCidade'];
    $cidade = $row['cidade'];
    echo "<li><a class='dropdown-item' href=\"javascript:carregaCidade('$idCidade','" . tirarAcentos(str_replace(' ', '-', $cidade)) . "')\">$cidade</a></li>";
  }
}
?>

<!-- JS de filtragem -->
<script>
  function carregaAnunciantes(flagTipo) {
    document.form_mulheres.flagTipo.value = flagTipo;
    document.form_mulheres.flagSexoVirtual.value = '';
    document.form_mulheres.flagTemVideo.value = '';
    document.form_mulheres.flagComLocal.value = '';
    document.form_mulheres.flagAtende24Horas.value = '';
    document.form_mulheres.idCidade.value = '';
    document.form_mulheres.bannerLateralCompleto.value = '';
    document.form_mulheres.action = "https://vipluxuria.com/Acompanhantes-" + flagTipo;
    document.form_mulheres.submit();
  }

  function carregaAnuncianteVideo(flagTemVideo) {
    document.form_mulheres.flagTemVideo.value = flagTemVideo;
    document.form_mulheres.flagTipo.value = 'ComVideo';
    document.form_mulheres.action = "https://vipluxuria.com/Acompanhantes-ComVideo";
    document.form_mulheres.submit();
  }

  function carregaAnuncianteComLocal(flagComLocal) {
    document.form_mulheres.flagComLocal.value = flagComLocal;
    document.form_mulheres.flagTipo.value = 'ComLocal';
    document.form_mulheres.action = "https://vipluxuria.com/Acompanhantes-ComLocal";
    document.form_mulheres.submit();
  }

  function carregaAnunciante24Horas(flagAtende24Horas) {
    document.form_mulheres.flagAtende24Horas.value = flagAtende24Horas;
    document.form_mulheres.flagTipo.value = 'Atende24Horas';
    document.form_mulheres.action = "https://vipluxuria.com/Acompanhantes-Atende24Horas";
    document.form_mulheres.submit();
  }

  function carregaCidade(idCidade, nomeCidade) {
    document.form_mulheres.idCidade.value = idCidade;
    document.form_mulheres.action = "https://vipluxuria.com/Acompanhantes/" + idCidade + "/" + nomeCidade;
    document.form_mulheres.submit();
  }

  function carregaSexoVirtual(flagSexoVirtual) {
    document.form_mulheres.flagSexoVirtual.value = flagSexoVirtual;
    document.form_mulheres.flagTipo.value = 'SexoVirtual';
    document.form_mulheres.action = "https://vipluxuria.com/Acompanhantes-SexoVirtual";
    document.form_mulheres.submit();
  }
</script>

<!-- Formulário oculto -->
<form name="form_mulheres" action="/conteudo/mulheres.php" method="post" id="formMulheres">
  <input type="hidden" name="flagTipo" value='<?= anti_injection2($_REQUEST["flagTipo"]) ?>'>
  <input type="hidden" name="flagTemVideo" value='<?= anti_injection2($_REQUEST["flagTemVideo"]) ?>'>
  <input type="hidden" name="flagComLocal" value='<?= anti_injection2($_REQUEST["flagComLocal"]) ?>'>
  <input type="hidden" name="flagAtende24Horas" value='<?= anti_injection2($_REQUEST["flagAtende24Horas"]) ?>'>
  <input type="hidden" name="idCidade" value='<?= anti_injection2($_REQUEST["idCidade"]) ?>'>
  <input type="hidden" name="bannerLateralCompleto">
  <input type="hidden" name="flagSexoVirtual" value='<?= anti_injection2($_REQUEST["flagSexoVirtual"]) ?>'>
</form>

<!-- Header Superior Fino -->
<div class="top-header-fino">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid px-0">

        <!-- Logo ou Ícone Home -->
        <a class="navbar-brand d-lg-none" href="/" title="Início">
          <i class="bi bi-house-door-fill"></i>
        </a>

        <!-- Botão Hamburguer -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuFino"
          aria-controls="menuFino" aria-expanded="false" aria-label="Alternar navegação">
          <span class="">MENU</span>
        </button>

        <!-- Itens do Menu -->
        <div class="collapse navbar-collapse" id="menuFino">
          <div class="navbar-nav me-auto menu-institucional">
            <a class="text-light nav-link bi bi-house-fill" href="/" title="Início"><i class="bi bi-house-door-fill d-none"></i></a>
            <a class="text-light nav-link" href="/vip-luxuria.php">Sobre</a>
            <a class="text-light nav-link" href="/vip-blog">Blog</a>
            <a class="text-light nav-link" href="/duvidas.php">Dúvidas</a>
            <a class="text-light nav-link" href="/dicas.php">Dicas</a>
          </div>

          <div>
            <!-- Botão Anuncie Aqui -->
            <a href="/como-anunciar/" class="btn-anuncie-badge me-3">
              <span>ANUNCIE AQUI</span>
            </a>
          </div>

          <!-- WhatsApp -->
          <div class="whatsapp-header text-white">
            <a href="https://api.whatsapp.com/send/?phone=51981440470&text&type=phone_number&app_absent=0" target="_blank">
              <i class="bi bi-whatsapp"></i> (51) 98144-0470
            </a>
          </div>
        </div>
      </div>
    </nav>
  </div>
</div>

<!-- JS para submenus multi-nível -->
<script>
  document.querySelectorAll('.dropdown-submenu .dropdown-toggle').forEach(function(element) {
    element.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      let submenu = this.nextElementSibling;
      if (submenu) submenu.classList.toggle('show');
    });
  });
</script>