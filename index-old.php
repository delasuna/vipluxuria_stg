<? 	$conexao = require_once 'php/conecta_mysql.php';  ?>
<?
	$sql = " SELECT * FROM seo, tipoSeo Where seo.idTipoSeo = tipoSeo.idTipoSeo AND descricao = 'Index'";  

	$resultado = mysql_query($sql, $conexao);
	if(!$resultado){
		die("Imposs�vel visualizar SEO: " . mysql_error() . '<br>');
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
<html>
<head>
<meta name="description" content="<?=$description?>" />
<meta name="keywords" content="<?=$keywords?>" />

<title><?=$title?></title>

<meta name="rating" content="Geral" />
<meta name="expires" content="never" />
<meta name="language" content="portuguese" />
<meta name="charset" content="UTF-8" />
<meta name="distribution" content="Global" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>Acompanhantes Porto Alegre - Vip Lux�ria - Acompanhante Porto Alegre</title>

<!--CSS-->
<link href="css-js/estilos-2.css" rel="stylesheet" type="text/css" />
<!--CSS-->


	<!-- Add jQuery library -->
	<script type="text/javascript" src="/css-js/popup/jquery-1.10.1.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="/css-js/popup/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="/css-js/popup/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="/css-js/popup/jquery.fancybox.css?v=2.1.5" media="screen" />

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>


</head>

<body id="abertura-2">
<div id="wrap-2">
  <div id="abertura-content-2">
                 	
   	  <h1 style="font-size:11px";><a href="/acompanhantes_porto_alegre.php">Acompanhantes Porto Alegre</a> - Vip Luxúria Guia de produtos e serviços eroticos- <a href="/acompanhantes_porto_alegre.php">Acompanhantes em Porto Alegre</a> - <a href="/acompanhantes_porto_alegre.php">Acompanhantes RS - Acompanhantes</a></h1>
      <a href="/acompanhantes_porto_alegre.php"><img width="650px" src="/imagens/estrutura/vip-luxuria-home-2018.png" alt="Vip Lux&uacute;ria" /></a>
    	<div id="texto-abertura">	
        <div id="bt-versao-2">
       	      <a href="/acompanhantes-porto-alegre/"><img src="/imagens/estrutura/bt-desktop-2018.png" /></a>
	          <a href="/m/index.php"><img src="/imagens/estrutura/bt-mobile-2018.png"/></a>
        </div>
		<p><a class="fancybox fancybox.iframe" href="/conteudo/termo-de-uso.php"><strong>Termos de Uso</strong></a></p><br/>
		<p><strong>Vip Lux&uacute;ria </strong>Porto Alegre &eacute; um site de anunciantes com conte&uacute;do er&oacute;tico para um p&uacute;blico ADULTO maior de 18 anos que procura por Acompanhantes de Alto N&iacute;vel em Porto Alegre e Regi&atilde;o.</p>
        <p>&nbsp;</p>
        <p><strong>Termos e condi&ccedil;&otilde;es de navega&ccedil;&atilde;o do site Vip Lux&uacute;ria</strong><br />
        </p>
        <p>Este site oferece conte&uacute;do er&oacute;tico e adulto n&atilde;o autorizado para menores de 18 anos, caso voc&ecirc; n&atilde;o tenha atingido essa maioridade ou em seu pa&iacute;s esse tipo de conte&uacute;do &eacute; proibido n&atilde;o entre. Caso voc&ecirc; n&atilde;o tenha essas restri&ccedil;&otilde;es a sua pessoa, favor ler e concordar com os termos e condi&ccedil;&otilde;es de uso do site antes de entrar.</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
		<p>&nbsp;</p>
        <div class="clear"></div>
        </div><!--BT-VERSAO-->
		</div><!--TEXTO ABERTURA-->
    </div><!--ABERTURA-->

	<!--<?php include("php/tags-index.php"); ?>-->
  	<!-- <div style="text-align:center; margin-top:100px; text-decoration:underline;">
          <p><font color="#FFFFFF" size="7"><a href="https://www.vipluxuria.com/acompanhantes_porto_alegre.php">ACOMPANHANTES PORTO ALEGRE</a></font></p><br/><br/>
          <p><font color="#FFFFFF" size="7"><a href="https://www.vipluxuria.com/acompanhantes_porto_alegre.php">ACOMPANHANTES em PORTO ALEGRE</a></font></p><br/><br/>
          <p><font color="#FFFFFF" size="7"><a href="https://www.vipluxuria.com/acompanhantes_porto_alegre.php">ACOMPANHANTES RS</a></font></p><br /><br/>
          <p><font color="#FFFFFF" size="7"><a href="https://www.vipluxuria.com/acompanhantes_porto_alegre.php">GAROTAS DE PROGRAMA PORTO ALEGRE</a></font></p><br /><br/>
          <p><font color="#FFFFFF" size="7"><a href="https://www.vipluxuria.com/acompanhantes_porto_alegre.php">GAROTAS DE PROGRAMA EM PORTO ALEGRE</a></font></p><br/><br/>
          <p><font color="#FFFFFF" size="7"><a href="https://www.vipluxuria.com/acompanhantes_porto_alegre.php">GAROTAS DE PROGRAMA RS</a></font></p><br><br>-->
  </div>    
  <div id="rodape">
	<?php include("php/rodape-2.php"); ?>
  </div><!--RODAPE-->
	
</div><!--wrap-->


<?php include("php/google.php"); ?>
</body>
</html>