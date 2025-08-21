<?php

	function anti_injection2($sql) {
    if (empty($sql)) {
        return '';
    }
    
    // Lista de palavras perigosas para SQL
    $palavras_perigosas = array(
        'from', 'select', 'insert', 'delete', 'where', 'having', 
        'union', 'drop table', 'sleep', 'show tables', '#', '--'
    );
    
    // Remove palavras perigosas (case insensitive)
    foreach ($palavras_perigosas as $palavra) {
        $sql = preg_replace('/\b' . preg_quote($palavra, '/') . '\b/i', '', $sql);
    }
    
    // Remove caracteres especiais perigosos
    $sql = str_replace(array('\', '*', '|'), '', $sql);
    $sql = trim($sql);
    $sql = strip_tags($sql);
    $sql = addslashes($sql);
    
    return $sql;
}
?>
<script>
	function carregaAnunciantes(flagTipo) {
		document.form_mulheres.flagTipo.value = flagTipo;
		document.form_mulheres.flagTemVideo.value = '';
		document.form_mulheres.flagComLocal.value = '';		
		document.form_mulheres.flagAtende24Horas.value = '';
		document.form_mulheres.idCidade.value = '';
		document.form_mulheres.bannerLateralCompleto.value = '';
		document.form_mulheres.action = "http://vipluxuriagold.net/Acompanhantes-"+ flagTipo;
		document.form_mulheres.submit(); 
	}
	
	function carregaAnuncianteVideo(flagTemVideo) {
		document.form_mulheres.flagTemVideo.value = flagTemVideo;
		document.form_mulheres.flagTipo.value = 'ComVideo';
		document.form_mulheres.flagComLocal.value = '';				
		document.form_mulheres.flagAtende24Horas.value = '';
		document.form_mulheres.idCidade.value = '';
		document.form_mulheres.bannerLateralCompleto.value = '';
		document.form_mulheres.action = "http://vipluxuriagold.net/Acompanhantes-ComVideo";
		document.form_mulheres.submit();
	}

	function carregaAnuncianteComLocal(flagComLocal) {
		document.form_mulheres.flagComLocal.value = flagComLocal;
		document.form_mulheres.flagTemVideo.value = '';
		document.form_mulheres.flagTipo.value = 'ComLocal';
		document.form_mulheres.flagAtende24Horas.value = '';
		document.form_mulheres.idCidade.value = '';
		document.form_mulheres.bannerLateralCompleto.value = '';
		document.form_mulheres.action = "http://vipluxuriagold.net/Acompanhantes-ComVideo";
		document.form_mulheres.submit();
	}
	
	function carregaAnunciante24Horas(flagAtende24Horas) {
		document.form_mulheres.flagAtende24Horas.value = flagAtende24Horas;
		document.form_mulheres.flagTemVideo.value = '';
		document.form_mulheres.flagComLocal.value = '';				
		document.form_mulheres.flagTipo.value = 'Atende24Horas';
		document.form_mulheres.idCidade.value = '';
		document.form_mulheres.bannerLateralCompleto.value = '';
		document.form_mulheres.action = "http://vipluxuriagold.net/Acompanhantes-Atende24Horas";
		document.form_mulheres.submit();
	}	
	
	function carregaCidade(idCidade, nomeCidade) {
		document.form_mulheres.idCidade.value = idCidade;
		document.form_mulheres.nomeCidade.value = nomeCidade;		
		document.form_mulheres.flagTemVideo.value = '';
		document.form_mulheres.flagComLocal.value = '';				
		document.form_mulheres.flagTipo.value = '';
		document.form_mulheres.flagAtende24Horas.value = '';
		document.form_mulheres.bannerLateralCompleto.value = '';
		document.form_mulheres.action = "http://vipluxuriagold.net/Acompanhantes/"+idCidade + "/" +nomeCidade;		
		document.form_mulheres.submit();
	}
	
	function mostraBannerLateral() {
		document.form_mulheres.bannerLateralCompleto.value = 'S';
		document.form_mulheres.submit();
	}	
</script>

<form name="form_mulheres" action="/conteudo/mulheres.php" method="post">
	<input type="hidden" name="flagTipo" value='<?=anti_injection2(isset($_REQUEST["flagTipo"]) ? $_REQUEST["flagTipo"] : "")?>'>
	<input type="hidden" name="flagTemVideo" value='<?=anti_injection2(isset($_REQUEST["flagTemVideo"]) ? $_REQUEST["flagTemVideo"] : "")?>'>
	<input type="hidden" name="flagComLocal" value='<?=anti_injection2(isset($_REQUEST["flagComLocal"]) ? $_REQUEST["flagComLocal"] : "")?>'>	
	<input type="hidden" name="flagAtende24Horas" value='<?=anti_injection2(isset($_REQUEST["flagAtende24Horas"]) ? $_REQUEST["flagAtende24Horas"] : "")?>'>
	<input type="hidden" name="idCidade" value='<?=anti_injection2(isset($_REQUEST["idCidade"]) ? $_REQUEST["idCidade"] : "")?>'>
	<input type="hidden" name="nomeCidade" value='<?=anti_injection2(isset($_REQUEST["nomeCidade"]) ? $_REQUEST["nomeCidade"] : "")?>'>	
	<input type="hidden" name="flagSexoVirtual" value='<?=anti_injection2(isset($_REQUEST["flagSexoVirtual"]) ? $_REQUEST["flagSexoVirtual"] : "")?>'>	
	<input type="hidden" name="bannerLateralCompleto"> 		
</form>

<div id="menu-content">
<ul id="navmenu-h">
    <li><a href="/acompanhantes-porto-alegre/">Home</a></a></li>
    <li><a href="/mulheres/">Mulheres</a>
        <ul>
            <li><a href="javascript:carregaAnunciantes('Loiras')">Loiras</a></li>
            <li><a href="javascript:carregaAnunciantes('Morenas')">Morenas</a></li>
            <li><a href="javascript:carregaAnunciantes('Mulatas')">Mulatas</a></li>
            <li><a href="javascript:carregaAnuncianteVideo('S')">Com V&iacute;deo</a></li>
			<li><a href="javascript:carregaAnuncianteComLocal('S')">Com Local</a></li>
            <li><a href="javascript:carregaAnunciante24Horas('S')">Atende 24 horas</a></li>
            <li><a href="/mulheres/">Outras Cidades</a> 
            	<ul>
					<?php 
					$sql = "SELECT idCidade, cidade FROM cidade ORDER BY ordem;";
			
					$resultado = mysql_query($sql, $conexao);
					if(!$resultado){
						die("Imposs�vel visualizar as cidades: " . mysql_error() . '<br>');
					}
			
					while($row = mysql_fetch_array($resultado)) {
						$idCidade = $row['idCidade'];
						$cidade = $row['cidade'];
				        	echo "<li><a href=javascript:carregaCidade('".$row['idCidade']."','".tirarAcentos(str_replace(" ", "-", $cidade))."')>".$cidade."</a></li>";
					}
					?>                
				</ul>
            </li>
			<li><a href="javascript:carregaSexoVirtual('S')">Sexo Virtual</a></li>
        </ul>
    </li>
    <li><a href="/homens/">Casais & Homens</a></li>
    <li><a href="/transex/">Transex</a></li>
    <li><a href="/guia-moteis-a/">Guia de Mot&eacute;is</a></li>
    <li><a href="/mural-recados/">Mural de Recados</a></li>
    <li><a href="/swing-porto-alegre-poa/">Swing</a></li>
    <li><a href="/vip-blog/">Vip Blog Not�cias</a></li>
	
    <li><a href="/mulheres/">Outras Cidades</a>
    	<ul>
			<?php 
			$sql = "SELECT idCidade, cidade FROM cidade ORDER BY ordem;";
			
			$resultado = mysql_query($sql, $conexao);
			if(!$resultado){
				die("Imposs�vel visualizar as cidades: " . mysql_error() . '<br>');
			}
			
			while($row = mysql_fetch_array($resultado)) {
				$idCidade = $row['idCidade'];
				$cidade = $row['cidade'];
		        	echo "<li><a href=javascript:carregaCidade('".$row['idCidade']."','". tirarAcentos(str_replace(" ", "-", $cidade))."')>".$cidade."</a></li>";
			}
			?>		
        </ul>
    </li>
	<li><a href="#">Vip+</a>
		<ul>
			<li><a href="/vip-luxuria-acompanhantes-porto-alegre-poa/">Conhe&ccedil;a o Vip Lux&uacute;ria</a></li>
			<li><a href="/lojas-sexshops-porto-alegre-poa/">Lojas e Sex Shops</a></li>
			<li><a href="/vip-enquetes/">Vip Enquetes</a></li>
			<li><a href="/vip-blog/">Vip Blog Not�cias</a></li>
            <li><a href="/vip-recomenda/">Vip Recomenda</a></li>
            <li><a href="/m/index.php">Vip Mobile</a></li>
            <li><a href="/tutorial/">Vip Mobile - Tutorial</a></li>
		</ul>
	</li>
</ul>

</div><!--MENU CONTENT-->    