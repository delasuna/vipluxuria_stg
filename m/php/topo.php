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
		document.form_mulheres.flagAtende24Horas.value = '';
		document.form_mulheres.submit();
	}
	
	function carregaAnuncianteVideo(flagTemVideo) {
		document.form_mulheres.flagTemVideo.value = flagTemVideo;
		document.form_mulheres.flagTipo.value = '';
		document.form_mulheres.flagAtende24Horas.value = '';
		document.form_mulheres.submit();
	}
	
	function carregaAnunciante24Horas(flagAtende24Horas) {
		document.form_mulheres.flagAtende24Horas.value = flagAtende24Horas;
		document.form_mulheres.flagTemVideo.value = '';
		document.form_mulheres.flagTipo.value = '';
		document.form_mulheres.submit();
	}	
	
	
</script>

<script language="JavaScript">
 

window.onload = prepareForms;
function prepareForms() { 
  for (var i=0; i<document.forms.length; i++) { 
    var thisform = document.forms[i]; 
    resetFields(thisform); 
  }  
}
</script>

<form name="form_mulheres" action="/m/conteudo/acompanhantes-porto-alegre.php" method="post">
	<input type="hidden" name="flagTipo" value='<?=anti_injection2(isset($_REQUEST["flagTipo"]) ? $_REQUEST["flagTipo"] : "")?>'>
	<input type="hidden" name="flagTemVideo" value='<?=anti_injection2(isset($_REQUEST["flagTemVideo"]) ? $_REQUEST["flagTemVideo"] : "")?>'>
	<input type="hidden" name="flagAtende24Horas" value='<?=anti_injection2(isset($_REQUEST["flagAtende24Horas"]) ? $_REQUEST["flagAtende24Horas"] : "")?>'>
</form>


<div id="header">
	<a href="#menu"></a><img src="/m/imagens/estrutura/vip-luxuria-logo-selo.png" width="216" height="98" />
</div>
<nav id="menu">
	<ul>
		<li><a href="/m/conteudo/busca.php">Home</a></li>
		<li><a href="javascript:carregaAnunciantes('Lo')">Loiras</a></li>
		<li><a href="javascript:carregaAnunciantes('Mo')">Morenas</a></li>
   		<li><a href="javascript:carregaAnunciantes('Mu')">Mulatas</a></li>
		<li><a href="javascript:carregaAnunciante24Horas('Sim')">Atende 24h</a></li>     
		<li><a href="javascript:carregaAnuncianteVideo('Sim')">Com V&iacute;deo</a></li>                    
		<li><a href="/m/conteudo/casais-e-homens.php">Casais & Homens</a></li>
		<li><a href="/m/conteudo/transex.php">Transex</a></li>
        <li><a href="/m/conteudo/guia-moteis/guia-moteis-a.php">Guia de Mot&eacute;is</a></li>
        <li><a href="/m/conteudo/busca-avancada.php">Busca Avan&ccedil;ada</a></li>
	</ul>
</nav>