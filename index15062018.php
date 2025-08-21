<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="robots" content="index,follow">
<meta name="description" content="Vip Luxúria é um classificados de anúncios de Acompanhantes de Porto Alegre." />
<meta name="keywords" content="Acompanhantes Porto Alegre, Acompanhantes em Porto Alegre, Acompanhante em Porto Alegre, Garota de Programa Porto Alegre, Garotas de Programa Porto Alegre, Acompanhante Porto Alegre, Acompanhantes RS, Acompanhantes Rio Grande do Sul, Acompanhantes poa, Guia Erótico Porto Alegre, Guia de Acompanhantes Porto Alegre, Anúncios de Acompanhantes Porto Alegre, Acompanhantes POA, Acompanhante" />

<title>Vip Lux&uacute;ria - Acompanhantes Porto Alegre</title>

<!--CSS-->
<link href="/css-js/estilos-2.css" rel="stylesheet" type="text/css" />
<link href="/css-js/menu-2.css" rel="stylesheet" type="text/css" />
<!--CSS-->
<!--FONTES-->
<script src="/css-js/cufon-yui.js" type="text/javascript"></script>
<script src="/css-js/nome_400.font.js" type="text/javascript"></script>
<script src="/css-js/titulo_400.font.js" type="text/javascript"></script>    

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

<body>
<? 	$conexao = require_once '../php/conecta_mysql.php';  ?>
<div id="wrap">
    <div id="bg-rosa">
        <div id="topo">
            <?php include("../php/topo-2.php"); ?>
        </div><!--TOPO-->
        <div id="menu">
			<?php include("../php/menu-2.php"); ?>
        </div><!--MENU-->
    </div><!--BG ROSA-->
    <div id="bg-couro">    
        <div id="principal">
            <div id="principal-content-full">
            	<div id="coluna-full">
					<div id="titulo-pagina"><img src="/imagens/estrutura/titulo-vantagens.png" width="760" height="41" /></div>
					<div class="banner-vantagens">
                    	<div class="logo">
                        	<img src="/imagens/vantagens/logo-sherwood.jpg" width="120" height="120" />
                        </div>
                        <div class="chamada">
                        	<p class="titulo">MOTEL SHERWOOD</p>
                            <p><a href="http://www.motelsherwood.com.br" target="_blank">www.motelsherwood.com.br</a></p>
                            <div class="botao"><a class="fancybox fancybox.iframe" href="/vantagens/motel-sherwood.php"><img src="/imagens/vantagens/bt-vantagens.png" /></a></div>
                        </div>
                        <div class="clear"></div>                                            
					</div>

					<div class="banner-vantagens">
                    	<div class="logo">
                        	<img src="/imagens/vantagens/logo-medieval.jpg" width="120" height="120" />
                        </div>
                        <div class="chamada">
                        	<p class="titulo">MOTEL MEDIEVAL</p>
                            <p><a href="http://www.motel-medieval.com.br/" target="_blank">www.motel-medieval.com.br/</a></p>
                            <div class="botao"><a class="fancybox fancybox.iframe" href="/vantagens/motel-medieval.php"><img src="/imagens/vantagens/bt-vantagens.png" /></a></div>
                        </div>
                        <div class="clear"></div>                                         
                    </div>
					
                    <div class="clear"></div>                                       
					
					<div class="banner-vantagens">
                    	<div class="logo">
                        	<img src="/imagens/vantagens/logo-atenas.jpg" width="120" height="120" />
                        </div>
                        <div class="chamada">
                        	<p class="titulo">MOTEL ATENAS</p>
                            <p><a href="http://www.motelatenas.com.br" target="_blank">www.motelatenas.com.br</a></p>
                            <div class="botao"><a class="fancybox fancybox.iframe" href="/vantagens/motel-atenas.php"><img src="/imagens/vantagens/bt-vantagens.png" /></a></div>
                        </div>
                        <div class="clear"></div>                                         
                    </div>

					<div class="banner-vantagens">
                    	<div class="logo">
                        	<img src="/imagens/vantagens/logo-cozumel.jpg" width="120" height="120" />
                        </div>
                        <div class="chamada">
                        	<p class="titulo">MOTEL COZUMEL</p>
                            <p><a href="http://www.motelcozumel.com.br" target="_blank">www.motelcozumel.com.br</a></p>
                            <div class="botao"><a class="fancybox fancybox.iframe" href="/vantagens/motel-cozumel.php"><img src="/imagens/vantagens/bt-vantagens.png" /></a></div>
                        </div>
                        <div class="clear"></div>                                            
					</div>
                    
					<div class="clear"></div>				  
					
					<div class="banner-vantagens">
                    	<div class="logo">
                        	<img src="/imagens/vantagens/logo-manhattan.jpg" width="120" height="120" />
                        </div>
                        <div class="chamada">
                        	<p class="titulo">MANHATTAN MOTEL</p>
                            <p><a href="http://www.manhattanmotel.com.br" target="_blank">www.manhattanmotel.com.br</a></p>
                            <div class="botao"><a class="fancybox fancybox.iframe" href="/vantagens/motel-manhattan.php"><img src="/imagens/vantagens/bt-vantagens.png" /></a></div>
                        </div>
                        <div class="clear"></div>                                         
                    </div>
                    
					<div class="banner-vantagens">
                    	<div class="logo">
                        	<img src="/imagens/vantagens/logo-sevilha.jpg" width="120" height="120" />
                        </div>
                        <div class="chamada">
                        	<p class="titulo">MOTEL SEVILHA</p>
                            <p><a href="http://www.motelsevilha.com.br" target="_blank">www.motelsevilha.com.br</a></p>
                            <div class="botao"><a class="fancybox fancybox.iframe" href="/vantagens/motel-sevilha.php"><img src="/imagens/vantagens/bt-vantagens.png" /></a></div>
                        </div>
                        <div class="clear"></div>                                            
'                  </div>
 
					<div class="clear"></div>
					
					<div class="banner-vantagens">
                    	<div class="logo">
                        	<img src="/imagens/vantagens/logo-calidon.jpg" width="120" height="120" />
                        </div>
                        <div class="chamada">
                        	<p class="titulo">MOTEL CÁLIDON</p>
                            <p><a href="http://verdespassaros.com.br/Calidon/" target="_blank">verdespassaros.com.br/Calidon</a></p>
                            <div class="botao"><a class="fancybox fancybox.iframe" href="/vantagens/motel-calidon.php"><img src="/imagens/vantagens/bt-vantagens.png" /></a></div>
                        </div>
                        <div class="clear"></div>                                         
                    </div>
                                        
					<div class="banner-vantagens">
                    	<div class="logo">
                        	<img src="/imagens/vantagens/logo-sahara.jpg" width="120" height="120" />
                        </div>
                        <div class="chamada">
                        	<p class="titulo">MOTEL SAHARA</p>
                            <p><a href="http://verdespassaros.com.br/sahara/" target="_blank">verdespassaros.com.br/sahara/</a></p>
                            <div class="botao"><a class="fancybox fancybox.iframe" href="/vantagens/motel-sahara.php"><img src="/imagens/vantagens/bt-vantagens.png" /></a></div>
                        </div>
                        <div class="clear"></div>                                            
					</div>
				  
                    <div class="clear"></div>				  
				  
					<div class="banner-vantagens">
                    	<div class="logo">
                        	<img src="/imagens/vantagens/logo-alpes.jpg" width="120" height="120" />
                        </div>
                        <div class="chamada">
                        	<p class="titulo">MOTEL DOS ALPES</p>
                            <p><a href="http://verdespassaros.com.br/alpes/" target="_blank">verdespassaros.com.br/alpes</a></p>
                            <div class="botao"><a class="fancybox fancybox.iframe" href="/vantagens/motel-alpes.php"><img src="/imagens/vantagens/bt-vantagens.png" /></a></div>
                        </div>
                        <div class="clear"></div>                                         
                    </div>
                                       
					<div class="banner-vantagens">
                    	<div class="logo">
                        	<img src="/imagens/vantagens/logo-cartao.jpg" width="120" height="120" />
                        </div>
                        <div class="chamada">
                        	<p class="titulo">MÁQUINA DE CARTÃO</p>
                            <p>(51) 99207-3331 - Com Francisco</p>
                            <div class="botao"><a class="fancybox fancybox.iframe" href="/vantagens/maquina-cartao.php"><img src="/imagens/vantagens/bt-vantagens.png" /></a></div>
                        </div>
                        <div class="clear"></div>                                            
					</div>

                    <div class="clear"></div>
					
					<div class="banner-vantagens">
                    	<div class="logo">
                        	<img src="/imagens/vantagens/logo-espaco.jpg" width="120" height="120" />
                        </div>
                        <div class="chamada">
                        	<p class="titulo">ESPAÇO LASER DEPILAÇÃO</p>
                            <p>(51) 3208-2728</p>
                            <div class="botao"><a class="fancybox fancybox.iframe" href="/vantagens/espaco-laser.php"><img src="/imagens/vantagens/bt-vantagens.png" /></a></div>
                        </div>
                        <div class="clear"></div>                                         
                    </div>
                    
                    <div class="clear"></div>                             
           	  </div><!--coluna-full-->
				<div class="clear"></div>			
            </div><!--PRINCIPAL CONTENT FULL-->
        </div><!--PRINCIPAL-->
	</div><!--BG-COURO-->
    <div id="rodape">
		<?php include("../php/rodape-2.php"); ?>
    </div><!--RODAPE-->
    <div id="tags">
		<?php include("../php/tags-vip.php"); ?>
    </div><!--TAGS-->
</div><!--wrap-->
<script type="text/javascript"> Cufon.now(); </script>
<?php include("../php/google.php"); ?>

</body>
</html>