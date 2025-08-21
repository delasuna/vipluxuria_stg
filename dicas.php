<? 	$conexao = require_once 'php/conecta_mysql.php';  ?>
<?
	$sql = " SELECT * FROM seo, tipoSeo Where seo.idTipoSeo = tipoSeo.idTipoSeo AND descricao = 'Dicas'";

	$resultado = mysql_query($sql, $conexao);
	if(!$resultado){
		die("Impossível visualizar SEO: " . mysql_error() . '<br>');
	}

							
	$sts = mysql_query($sql); 
	$registros = mysql_num_rows($sts);
	if ($registros>0) {
		while($row = mysql_fetch_array($resultado)) {
			$title = $row['title']; 
			$description = $row['description'];
			$keywords = $row['keywords'];     
		} 
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="robots" content="index,follow">
<meta name="description" content="<?=$description?>" />
<meta name="keywords" content="<?=$keywords?>" />

<title><?=$title?></title>

<!--CSS-->
<link href="/css-js/estilos-2.css" rel="stylesheet" type="text/css" />
<link href="/css-js/menu-2.css" rel="stylesheet" type="text/css" />
<!--CSS-->
<!--FONTES-->
<script src="/css-js/cufon-yui.js" type="text/javascript"></script>
<script src="/css-js/nome_400.font.js" type="text/javascript"></script>
<script src="/css-js/titulo_400.font.js" type="text/javascript"></script>
<!--FONTES-->
</head>

<body>
<div id="wrap">
    <div id="bg-rosa">
        <div id="topo">
            <?php include("php/topo-2.php"); ?>
        </div><!--TOPO-->
        <div id="menu">
			<?php include("php/menu-2.php"); ?>
        </div><!--MENU-->
    </div><!--BG ROSA-->
    <div id="bg-couro">    
        <div id="principal">
            <div id="principal-content-full">
            	<div id="coluna-full">
					<div id="titulo-pagina"><img src="/imagens/estrutura/titulo-dicas.png" width="760" height="41" /></div>
					<p><strong>O que &eacute; preciso saber antes de  contratar os servi&ccedil;os de uma acompanhante? </strong></p>
					<p>Baseado nas nossas experi&ecirc;ncias e  vendo um n&uacute;mero crescente de insatisfa&ccedil;&atilde;o dos clientes em rela&ccedil;&atilde;o &agrave; presta&ccedil;&atilde;o  de servi&ccedil;o de sexo pago, vamos aqui citar 11 dicas de o que fazer e como  proceder para encontrar e melhorar a presta&ccedil;&atilde;o de servi&ccedil;o.<br />
                    <br />
                  </p>
<ol>
            <li>De prefer&ecirc;ncia as acompanhantes que tem v&iacute;deos em seus  perfis, isso diminui consideravelmente a probabilidade de insatisfa&ccedil;&atilde;o em rela&ccedil;&atilde;o  ao perfil f&iacute;sico da modelo, ou seja, a modelo ter muito photoshop. Tamb&eacute;m  diminui a possibilidade da mesma mandar outra em seu lugar. <strong>No menu do site ha um bot&atilde;o que filtra as  modelos que tem v&iacute;deo.</strong></li>
            <li>Antes de ligar para modelo leia o perfil dela, o perfil  no site &eacute; bem completo e vai dar uma boa no&ccedil;&atilde;o do tipo de servi&ccedil;o que a modelo  promete oferecer.</li>
            <li>Existe f&oacute;rum como o www.gpguia.net onde voc&ecirc; pode ver  relatos de outros clientes e voc&ecirc; mesmo relatar experi&ecirc;ncias positivas e ou  negativas sobre o site.</li>
            <li>Ao ligar para modelo seja educado e cordial, gentileza  atrair gentileza. Deixe bem claro o que deseja no encontro e se ela esta  disposta a atender suas expectativas.</li>
            <li>Sempre ao marcar enfatize que se a modelo n&atilde;o for a  mesma das fotos ou as fotos estiverem com muito photoshop voc&ecirc; n&atilde;o vai utilizar  dos servi&ccedil;os, dificilmente uma modelo vai aceitar tal exig&ecirc;ncia se ela n&atilde;o se  garante em ser o mesmo visto em fotos ou v&iacute;deos (claro que para voc&ecirc; poder  fazer isso voc&ecirc; tem que negar o servi&ccedil;o na chegada da modelo no quarto antes da  mesma tirar o roupa ou voc&ecirc; toca-la).</li>
            <li>&Eacute; fundamental n&atilde;o ser conivente com acompanhantes que  prestam servi&ccedil;os mentirosos ou que mandam outras modelos em seu lugar. A modelo  n&atilde;o &eacute; a mesma das fotos mande embora. (sabemos que &eacute; dif&iacute;cil, mais se voc&ecirc; j&aacute;  deixar claro que n&atilde;o ser&aacute; conivente com tal pr&aacute;tica dificilmente uma modelo que  tenha muito photoshop ou que pretende mandar outra em seu lugar o far&aacute;, se voc&ecirc;  j&aacute; est&aacute; enfatizando esse ponto ao marcar.&nbsp; </li>
            <li>Aprenda a usar ferramentas como o f&oacute;rum www.gpguia.net  e outros para fazer reclama&ccedil;&otilde;es de modelos que agem de ma f&eacute; bem como elogiar  as que atendem bem.</li>
            <li>&Eacute; fundamental que voc&ecirc; ao ter sido atendido bem fa&ccedil;a  uma propaganda positiva dessa acompanhante das formas poss&iacute;veis a voc&ecirc;. Somente  engrandecendo os atos corretos e n&atilde;o sendo conivente com m&aacute; presta&ccedil;&atilde;o de servi&ccedil;o.  A presta&ccedil;&atilde;o de servi&ccedil;o nesse meio ir&aacute; melhorar.</li>
            <li>N&oacute;s do Vip Luxuria estamos dispostos a fazer o poss&iacute;vel  para que voc&ecirc; encontre um atendimento de qualidade. Fique a vontade de nos  mandar um e-mail pedindo indica&ccedil;&atilde;o das modelos com melhor reputa&ccedil;&atilde;o do site que  lhe mandaremos o link das que tem melhor reputa&ccedil;&atilde;o. Lembramos que o Vip Luxuria  criou o site Vipluxuriagold.com que conta com algumas das modelos mais bonitas  do site, nele n&atilde;o ha modelos agenciadas ou com muito photoshop todas tem fotos  e v&iacute;deos. </li>
            <li>Evite  pedir desconto ou tentar pechinchar cach&ecirc;s, prestadores de servi&ccedil;os dessa &aacute;rea  odeia essa pratica. O Site oferece um n&uacute;mero elevado de op&ccedil;&otilde;es, ent&atilde;o pesquise  bem, que &eacute; prov&aacute;vel que encontre o que procura. Mas n&atilde;o esque&ccedil;a que ao  contratar um servi&ccedil;o 5 estrelas ou 3 estrelas haver&aacute; uma diferen&ccedil;a em valor  tanto quanto em qualidade.</li>
            <li>Nunca  esque&ccedil;a que a presta&ccedil;&atilde;o de servi&ccedil;os de acompanhantes &eacute; uma presta&ccedil;&atilde;o de servi&ccedil;o  semelhante a v&aacute;rias outras, ent&atilde;o os cuidados e exig&ecirc;ncias a serem tomadas  devem ser semelhantes tamb&eacute;m. </li>
</ol>
<p>&nbsp;</p>

           	  </div><!--coluna-full-->
				<div class="clear"></div>	
            </div><!--PRINCIPAL CONTENT FULL-->
        </div><!--PRINCIPAL-->
	</div><!--BG-COURO-->
    <div id="rodape">
		<?php include("php/rodape-2.php"); ?>
    </div><!--RODAPE-->
    <div id="tags">
		<?php include("php/tags-moteis.php"); ?>
    </div><!--TAGS-->
</div><!--wrap-->
<script type="text/javascript"> Cufon.now(); </script>
<?php include("php/google.php"); ?>

</body>
</html>
