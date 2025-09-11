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

<!-- Header Superior Fino - ADICIONAR ANTES DO NAV EXISTENTE -->
<div class="top-header-fino">
    <div class="container d-flex justify-content-between align-items-center">
        <nav class="menu-institucional">
            <a href="/" title="Início"><i class="bi bi-house-door-fill"></i></a>
            <a href="/vip-luxuria.php">Sobre</a>
            <a href="/vip-blog">Blog</a>
            <a href="/duvidas.php">Dúvidas</a>
            <a href="/dicas.php">Dicas</a>
        </nav>
        <a href="/como-anunciar/" class="btn-anuncie-badge">
            <span>ANUNCIE AQUI</span>
        </a>
        <div class="whatsapp-header">
            <i class="bi bi-whatsapp"></i> (51) 98144-0470
        </div>
    </div>
</div>

<!-- MANTER O NAV EXISTENTE ABAIXO, SEM ALTERAÇÕES -->

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