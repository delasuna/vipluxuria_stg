<?php
function anti_injection2($valor)
{
	return htmlspecialchars(trim($valor), ENT_QUOTES, 'UTF-8');
}
?>
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
		document.form_mulheres.flagSexoVirtual.value = '';
		document.form_mulheres.flagTipo.value = 'ComVideo';
		document.form_mulheres.flagComLocal.value = '';
		document.form_mulheres.flagAtende24Horas.value = '';
		document.form_mulheres.idCidade.value = '';
		document.form_mulheres.bannerLateralCompleto.value = '';
		document.form_mulheres.action = "https://vipluxuria.com/Acompanhantes-ComVideo";
		document.form_mulheres.submit();
	}

	function carregaAnuncianteComLocal(flagComLocal) {
		document.form_mulheres.flagComLocal.value = flagComLocal;
		document.form_mulheres.flagSexoVirtual.value = '';
		document.form_mulheres.flagTemVideo.value = '';
		document.form_mulheres.flagTipo.value = 'ComLocal';
		document.form_mulheres.flagAtende24Horas.value = '';
		document.form_mulheres.idCidade.value = '';
		document.form_mulheres.bannerLateralCompleto.value = '';
		document.form_mulheres.action = "https://vipluxuria.com/Acompanhantes-ComLocal";
		document.form_mulheres.submit();
	}


	function carregaAnunciante24Horas(flagAtende24Horas) {
		document.form_mulheres.flagAtende24Horas.value = flagAtende24Horas;
		document.form_mulheres.flagSexoVirtual.value = '';
		document.form_mulheres.flagTemVideo.value = '';
		document.form_mulheres.flagComLocal.value = '';
		document.form_mulheres.flagTipo.value = 'Atende24Horas';
		document.form_mulheres.idCidade.value = '';
		document.form_mulheres.bannerLateralCompleto.value = '';
		document.form_mulheres.action = "https://vipluxuria.com/Acompanhantes-Atende24Horas";
		document.form_mulheres.submit();
	}

	function carregaCidade(idCidade, nomeCidade) {
		document.form_mulheres.idCidade.value = idCidade;
		document.form_mulheres.flagSexoVirtual.value = '';
		document.form_mulheres.flagTemVideo.value = '';
		document.form_mulheres.flagComLocal.value = '';
		document.form_mulheres.flagTipo.value = '';
		document.form_mulheres.flagAtende24Horas.value = '';
		document.form_mulheres.bannerLateralCompleto.value = '';
		document.form_mulheres.action = "https://vipluxuria.com/Acompanhantes/" + idCidade + "/" + nomeCidade;
		document.form_mulheres.submit();
	}

	function mostraBannerLateral() {
		document.form_mulheres.bannerLateralCompleto.value = 'S';
		document.form_mulheres.submit();
	}

	function carregaSexoVirtual(flagSexoVirtual) {
		document.form_mulheres.flagSexoVirtual.value = flagSexoVirtual;
		document.form_mulheres.flagAtende24Horas.value = '';
		document.form_mulheres.flagTemVideo.value = '';
		document.form_mulheres.flagComLocal.value = '';
		document.form_mulheres.flagTipo.value = 'SexoVirtual';
		document.form_mulheres.idCidade.value = '';
		document.form_mulheres.bannerLateralCompleto.value = '';
		document.form_mulheres.action = "https://vipluxuria.com/Acompanhantes-SexoVirtual";
		document.form_mulheres.submit();
	}
</script>
<form name="form_mulheres" action="/conteudo/mulheres.php" method="post">
	<input type="hidden" name="flagTipo" value='<?= anti_injection2($_REQUEST["flagTipo"]) ?>'>
	<input type="hidden" name="flagTemVideo" value='<?= anti_injection2($_REQUEST["flagTemVideo"]) ?>'>
	<input type="hidden" name="flagComLocal" value='<?= anti_injection2($_REQUEST["flagComLocal"]) ?>'>
	<input type="hidden" name="flagAtende24Horas" value='<?= anti_injection2($_REQUEST["flagAtende24Horas"]) ?>'>
	<input type="hidden" name="idCidade" value='<?= anti_injection2($_REQUEST["idCidade"]) ?>'>
	<input type="hidden" name="bannerLateralCompleto">
	<input type="hidden" name="flagSexoVirtual" value='<?= anti_injection2($_REQUEST["flagSexoVirtual"]) ?>'>
</form>
<div id="menu-content">
	<ul id="navmenu-h">
		<li><a href="/acompanhantes-porto-alegre/"><img src="/imagens/estrutura/ico-home.png" alt="Página Inicial"></a></li>
		<li><a href="#">Mulheres</a>
			<ul>
				<li><a href="/mulheres-acompanhantes-porto-alegre-poa/">Todas</a></li>
				<li><a href="javascript:carregaAnunciantes('Loiras')">Loiras</a></li>
				<li><a href="javascript:carregaAnunciantes('Morenas')">Morenas</a></li>
				<li><a href="javascript:carregaAnunciantes('Mulatas')">Mulatas</a></li>
				<li><a href="javascript:carregaAnuncianteVideo('S')">Com V&iacute;deo</a></li>
				<li><a href="javascript:carregaAnuncianteComLocal('S')">Com Local</a></li>
				<li><a href="javascript:carregaAnunciante24Horas('S')">Atende 24 horas</a></li>
				<li><a href="#">Outras Cidades</a>
					<ul>
						<?php
						$sql = "SELECT idCidade, cidade FROM cidade ORDER BY ordem;";

						$resultado = mysqli_query($conexao, $sql);
						if (!$resultado) {
							die("Erro: " . mysqli_error($conexao));
						}

						while ($row = mysqli_fetch_assoc($resultado)) {
							$idCidade = $row['idCidade'];
							$cidade = $row['cidade'];
							echo "<li><a href=javascript:carregaCidade('" . $row['idCidade'] . "','" . tirarAcentos(str_replace(" ", "-", $cidade)) . "')>" . $cidade . "</a></li>";
						}
						?>
					</ul>
				</li>
				<li><a href="javascript:carregaSexoVirtual('S')">Sexo Virtual</a></li>
			</ul>
		</li>
		<li><a href="/casais-e-homens-porto-alegre-poa/">Casais & Homens</a></li>
		<li><a href="/transex-porto-alegre-poa/">Transex</a></li>
		<li><a href="/guia-moteis-porto-alegre-poa/">Guia de Mot&eacute;is</a></li>
		<li><a href="#">Outras Cidades</a>
			<ul>
				<?php
				$sql = "SELECT idCidade, cidade FROM cidade ORDER BY ordem;";

				$resultado = mysqli_query($conexao, $sql);
				if (!$resultado) {
					die("Erro: " . mysqli_error($conexao));
				}

				while ($row = mysqli_fetch_assoc($resultado)) {
					$idCidade = $row['idCidade'];
					$cidade = $row['cidade'];
					echo "<li><a href=javascript:carregaCidade('" . $row['idCidade'] . "','" . tirarAcentos(str_replace(" ", "-", $cidade)) . "')>" . $cidade . "</a></li>";
				}
				?>
			</ul>
		</li>
		<li><a href="#rodape"><img src="/imagens/estrutura/ico-coroa.png" alt="Rodapé"></a></li>
	</ul>
	<div class="clear"></div>
	<div id="busca">
		<form id="form1" name="form1" method="post" action="/mulheres-acompanhantes-porto-alegre-poa/">
			<input name="nome" type="text" class="campo-busca" value="Busca por nome" onClick="javascript:this.value=''" />
			<input name="Buscar" type="submit" class="bt-busca" id="Buscar" value="Buscar" />
		</form>
	</div>
</div><!--MENU CONTENT-->