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

<!-- Navbar Bootstrap 5 -->
<nav class="menu navbar navbar-expand-lg navbar-light">
  <div class="container">
    <a class="navbar-brand" href="/acompanhantes-porto-alegre/">
      <img src="/imagens/estrutura/ico-home.png" alt="Página Inicial" width="30" height="30">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav" aria-controls="menuNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menuNav">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <!-- Mulheres Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="mulheresDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mulheres</a>
          <ul class="dropdown-menu" aria-labelledby="mulheresDropdown">
            <li><a class="dropdown-item" href="/mulheres-acompanhantes-porto-alegre-poa/">Todas</a></li>
            <li><a class="dropdown-item" href="javascript:carregaAnunciantes('Loiras')">Loiras</a></li>
            <li><a class="dropdown-item" href="javascript:carregaAnunciantes('Morenas')">Morenas</a></li>
            <li><a class="dropdown-item" href="javascript:carregaAnunciantes('Mulatas')">Mulatas</a></li>
            <li><a class="dropdown-item" href="javascript:carregaAnuncianteVideo('S')">Com Vídeo</a></li>
            <li><a class="dropdown-item" href="javascript:carregaAnuncianteComLocal('S')">Com Local</a></li>
            <li><a class="dropdown-item" href="javascript:carregaAnunciante24Horas('S')">Atende 24 horas</a></li>
            <li class="dropdown-submenu">
              <a class="dropdown-item dropdown-toggle" href="#">Outras Cidades</a>
              <ul class="dropdown-menu">
                <?php geraOpcoesCidades($conexao); ?>
              </ul>
            </li>
            <li><a class="dropdown-item" href="javascript:carregaSexoVirtual('S')">Sexo Virtual</a></li>
          </ul>
        </li>

        <li class="nav-item"><a class="nav-link text-light" href="/casais-e-homens-porto-alegre-poa/">Casais & Homens</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="/transex-porto-alegre-poa/">Transex</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="/guia-moteis-porto-alegre-poa/">Guia de Motéis</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="cidadesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Outras Cidades</a>
          <ul class="dropdown-menu" aria-labelledby="cidadesDropdown">
            <?php geraOpcoesCidades($conexao); ?>
          </ul>
        </li>

        <li class="nav-item"><a class="nav-link" href="#rodape"><img src="/imagens/estrutura/ico-coroa.png" alt="Rodapé"></a></li>
      </ul>

      <!-- Busca -->
      <!-- Busca -->
      <form class="d-flex" action="/mulheres-acompanhantes-porto-alegre-poa/" method="post" style="max-width:250px;">
        <div class="input-group">
          <input
            type="search"
            class="form-control border-start-0"
            placeholder="Busca por nome"
            name="nome"
            onfocus="this.value=''">
          <button class="input-group-text bg-white border-end-0" type="submit">
            <i class="bi bi-search"></i>
          </button>
        </div>

      </form>

    </div>
  </div>
</nav>

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