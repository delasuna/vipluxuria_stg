<?php
// Conexão
$conexao = require_once 'php/conecta_mysql.php';

// SEO
$sql = "SELECT * 
        FROM seo 
        INNER JOIN tipoSeo ON seo.idTipoSeo = tipoSeo.idTipoSeo 
        WHERE descricao = 'Home'";

$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
	die("Impossível visualizar SEO: " . mysqli_error($conexao));
}

$seo = mysqli_fetch_assoc($resultado);

$title = $seo['title'] ?? '';
$description = $seo['description'] ?? '';
$keywords = $seo['keywords'] ?? '';

mysqli_free_result($resultado);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?= htmlspecialchars($description) ?>" />
	<meta name="keywords" content="<?= htmlspecialchars($keywords) ?>" />
	<title><?= htmlspecialchars($title) ?></title>
	<meta name="robots" content="index,follow" />
	<meta name="google-translate-customization" content="47516143a922ad1d-908eb38b3da0e2e8-gfbda7755c951dd96-12">
	<meta http-equiv="Cache-Control" content="no-store" />

	<!-- CSS Original -->
	<link href="/css-js/estilos-2.css" rel="stylesheet" />
	<link href="/css-js/menu-2.css" rel="stylesheet" />
	<link rel="stylesheet" href="/css-js/slider/lightbox/lightbox.css" media="screen" />
	<link rel="stylesheet" href="/css-js/slider/slider-rows.css">
	<link rel="stylesheet" href="/css-js/carousel/swiffy-slider.min.css" />
	<link rel="stylesheet" type="text/css" href="/css-js/style-dropmenu.css" />
	<link href="/css-js/jquery.bxslider.css" rel="stylesheet" />
	
	<!-- CSS Responsivo Moderno - Sobrescreve o necessário -->
	<style>
		/* ============================================
		   RESET E BASE RESPONSIVA
		   ============================================ */
		* {
			box-sizing: border-box;
		}
		
		/* Torna o site fluido em todas as resoluções */
		#wrap {
			width: 100% !important;
			max-width: 1200px;
			margin: 0 auto;
			overflow-x: hidden;
		}
		
		/* Container principal responsivo */
		#principal {
			width: 100% !important;
		}
		
		#principal-content-full,
		#coluna-full {
			width: 100% !important;
			padding: 0 20px !important;
		}
		
		/* ============================================
		   HEADER E MENU RESPONSIVO
		   ============================================ */
		#topo,
		#menu {
			width: 100% !important;
			padding: 0 20px;
		}
		
		#bg-rosa,
		#bg-couro {
			width: 100% !important;
		}
		
		/* ============================================
		   FILTRO RESPONSIVO
		   ============================================ */
		#filtro {
			width: 100% !important;
			max-width: 400px;
			margin: 20px auto;
		}
		
		.wrapper-dropdown-3 {
			width: 100% !important;
			max-width: 100%;
			position: relative;
		}
		
		.wrapper-dropdown-3 .dropdown {
			position: absolute;
			width: 100%;
			z-index: 1000;
		}
		
		/* ============================================
		   TÍTULO RESPONSIVO
		   ============================================ */
		#titulo {
			width: 100% !important;
			text-align: center;
			padding: 20px 0;
		}
		
		#titulo h1 {
			font-size: clamp(1.5rem, 4vw, 2.5rem);
			margin: 0;
			padding: 0 10px;
		}
		
		/* ============================================
		   GRID DE CARDS MODERNO E RESPONSIVO
		   ============================================ */
		#thumbs-full {
			display: grid !important;
			grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
			gap: 20px;
			padding: 20px 0;
			list-style: none;
			margin: 0;
		}
		
		#thumbs-full li {
			width: 100% !important;
			margin: 0 !important;
			background: #fff;
			border-radius: 8px;
			overflow: hidden;
			box-shadow: 0 2px 8px rgba(0,0,0,0.1);
			transition: transform 0.3s ease, box-shadow 0.3s ease;
		}
		
		#thumbs-full li:hover {
			transform: translateY(-5px);
			box-shadow: 0 5px 20px rgba(0,0,0,0.15);
		}
		
		#thumbs-full li.carousel-li {
			grid-column: 1 / -1; /* Carousel ocupa toda largura */
		}
		
		#thumbs-full li a {
			display: block;
			text-decoration: none;
			color: inherit;
		}
		
		#thumbs-full li img {
			width: 100% !important;
			height: auto !important;
			aspect-ratio: 3/4;
			object-fit: cover;
			display: block;
		}
		
		#thumbs-full li .nome {
			padding: 10px;
			text-align: center;
			font-weight: 500;
			color: #333;
			margin: 0;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
		}
		
		/* ============================================
		   SLIDER RESPONSIVO
		   ============================================ */
		#slider,
		#slider-2020 {
			width: 100% !important;
			overflow: hidden;
		}
		
		#slider img,
		#slider-2020 img {
			max-width: 100%;
			height: auto;
		}
		
		/* ============================================
		   TEXTO/CONTEÚDO RESPONSIVO
		   ============================================ */
		#box-texto {
			width: 100% !important;
			max-width: 900px;
			margin: 40px auto;
			padding: 20px !important;
			background: #fff;
			border-radius: 8px;
			box-shadow: 0 2px 10px rgba(0,0,0,0.05);
		}
		
		#box-texto h2 {
			font-size: clamp(1.2rem, 3vw, 1.8rem);
			color: #333;
			margin-top: 30px;
			margin-bottom: 15px;
			padding-bottom: 10px;
			border-bottom: 2px solid #f0f0f0;
		}
		
		#box-texto p {
			font-size: 16px;
			line-height: 1.8;
			color: #555;
			text-align: justify;
			margin-bottom: 15px;
		}
		
		/* ============================================
		   RODAPÉ RESPONSIVO
		   ============================================ */
		#rodape,
		#tags {
			width: 100% !important;
			padding: 20px;
		}
		
		/* ============================================
		   BREAKPOINTS ESPECÍFICOS
		   ============================================ */
		
		/* Tablets e telas médias */
		@media only screen and (max-width: 1024px) {
			#thumbs-full {
				grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
				gap: 15px;
			}
		}
		
		/* Tablets pequenos */
		@media only screen and (max-width: 768px) {
			#thumbs-full {
				grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
				gap: 15px;
			}
			
			#principal-content-full,
			#coluna-full {
				padding: 0 15px !important;
			}
			
			/* Esconde carousel em tablets para melhor performance */
			.carousel-li {
				display: none !important;
			}
			
			#box-texto {
				border-radius: 0;
				margin: 20px 0;
			}
			
			#box-texto h2 {
				font-size: 1.4rem;
			}
			
			#box-texto p {
				font-size: 15px;
				text-align: left;
			}
		}
		
		/* Mobile grande */
		@media only screen and (max-width: 480px) {
			#thumbs-full {
				grid-template-columns: repeat(2, 1fr);
				gap: 10px;
			}
			
			#principal-content-full,
			#coluna-full {
				padding: 0 10px !important;
			}
			
			#titulo h1 {
				font-size: 1.3rem;
			}
			
			#box-texto {
				padding: 15px !important;
			}
			
			#box-texto h2 {
				font-size: 1.2rem;
				margin-top: 20px;
			}
			
			#box-texto p {
				font-size: 14px;
				line-height: 1.6;
			}
			
			/* Menu mobile */
			#menu {
				padding: 10px;
			}
		}
		
		/* Mobile pequeno */
		@media only screen and (max-width: 360px) {
			#thumbs-full {
				grid-template-columns: repeat(2, 1fr);
				gap: 8px;
			}
			
			#thumbs-full li .nome {
				font-size: 0.9rem;
				padding: 8ปx;
			}
		}
		
		/* ============================================
		   MELHORIAS DE PERFORMANCE
		   ============================================ */
		img {
			max-width: 100%;
			height: auto;
		}
		
		/* Smooth scrolling */
		html {
			scroll-behavior: smooth;
		}
		
		/* Clear fix mantido para compatibilidade */
		.clear {
			clear: both;
		}
		
		/* ============================================
		   ANIMAÇÕES E TRANSIÇÕES
		   ============================================ */
		@media (prefers-reduced-motion: no-preference) {
			* {
				transition: width 0.3s ease, padding 0.3s ease, margin 0.3s ease;
			}
		}
		
		/* ============================================
		   ACESSIBILIDADE
		   ============================================ */
		:focus-visible {
			outline: 2px solid #d63384;
			outline-offset: 2px;
		}
		
		/* Touch targets mínimos para mobile */
		@media (hover: none) and (pointer: coarse) {
			a, button, select {
				min-height: 44px;
				min-width: 44px;
			}
		}
		
		/* ============================================
		   MODO ESCURO (OPCIONAL)
		   ============================================ */
		@media (prefers-color-scheme: dark) {
			#box-texto {
				background: #1a1a1a;
				color: #e0e0e0;
			}
			
			#box-texto h2 {
				color: #f0f0f0;
				border-bottom-color: #333;
			}
			
			#box-texto p {
				color: #ccc;
			}
			
			#thumbs-full li {
				background: #2a2a2a;
			}
			
			#thumbs-full li .nome {
				color: #e0e0e0;
			}
		}
	</style>

	<!-- JS Original -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="/css-js/jquery.bxslider.min.js"></script>
	<script src="/css-js/slider/lightbox/modernizr.custom.js"></script>
	<script src="/css-js/slider/slider-rows.js"></script>
	<script src="/css-js/carousel/swiffy-slider.min.js"></script>
	<script src="/css-js/cufon-yui.js"></script>
	<script src="/css-js/nome_400.font.js"></script>
	<script src="/css-js/titulo_400.font.js"></script>
</head>

<body>
	<div id="wrap">
		<div id="bg-rosa">
			<div id="topo"><?php include("php/topo-2.php"); ?></div>
			<div id="menu"><?php include("php/menu-2.php"); ?></div>
		</div>

		<div id="bg-couro">
			<div id="slider"><?php include("php/slider.php"); ?></div>
			<div id="principal">
				<div id="principal-content-full">
					<div id="coluna-full">

						<!-- Slider 2020 -->
						<div id="slider-2020"><?php include("php/slider-2020.php"); ?></div>

						<!-- Filtro por Cidades -->
						<div id="filtro">
							<div class="wrapper-demo">
								<div id="dd" class="wrapper-dropdown-3" tabindex="1">
									<span>Filtro por Cidades</span>
									<ul class="dropdown" style="color:#000;">
										<li><a href="/conteudo/mulheres.php">Todas as Cidades</a></li>
										<?php
										$sql = "SELECT idCidade, cidade FROM cidade ORDER BY ordem";
										$resultado = mysqli_query($conexao, $sql);
										if (!$resultado) {
											die("Impossível visualizar as cidades: " . mysqli_error($conexao));
										}
										while ($row = mysqli_fetch_assoc($resultado)) {
											$idCidade = $row['idCidade'];
											$cidade = $row['cidade'];
											echo '<li><a href="javascript:carregaCidade(\'' . $idCidade . '\')">' . htmlspecialchars($cidade) . '</a></li>';
										}
										?>
									</ul>
								</div>
							</div>
						</div><!-- filtro -->

						<div id="titulo" style="width:550px !important;">
							<h1>Acompanhantes Porto Alegre-RS</h1>
						</div>
						<div class="clear"></div>

						<!-- Lista de Mulheres -->
						<ul id="thumbs-full">
							<?php
							$sql = "SELECT * FROM mulher WHERE flagAtivo = 'Sim' ORDER BY flagPreferencial DESC, flagAgenciada ASC, RAND()";
							$resultado = mysqli_query($conexao, $sql);
							if (!$resultado) {
								die("Impossível visualizar as anunciantes: " . mysqli_error($conexao));
							}

							$contador = 0;
							$contadorCarrossel = 0;
							$comAcentos = ['à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú'];
							$semAcentos = ['a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U'];

							while ($row = mysqli_fetch_assoc($resultado)) {
								$idMulher = $row['idMulher'];
								$nome = $row['nome'];
								$sobrenome = $row['sobrenome'];
								$imagemCapa = $row['imagemCapa'];

								$contador++;
								$contadorCarrossel++;

								$linkPerfil = "/perfil/" . $idMulher . "/" . str_replace($comAcentos, $semAcentos, $nome);
								if (!empty($sobrenome)) {
									$linkPerfil .= "-" . str_replace(" ", "-", str_replace($comAcentos, $semAcentos, $sobrenome));
								}
								$linkPerfil = htmlspecialchars($linkPerfil);
								$nomeCompleto = htmlspecialchars($nome . ' ' . $sobrenome);

								$classLi = ($contador < 5) ? 'zoom_img' : 'last zoom_img';
							?>
								<li class="<?= $classLi ?>">
									<a href="<?= $linkPerfil ?>">
										<img src="<?= "/sistema/content/" . htmlspecialchars($imagemCapa) ?>" 
											 width="112" 
											 height="149"
											 alt="<?= $nomeCompleto ?> - Acompanhante em Porto Alegre"
											 loading="lazy" />
										<p class="nome"><?= $nomeCompleto ?></p>
									</a>
								</li>
								<?php
								if ($contador >= 5) $contador = 0;

								if ($contadorCarrossel == 15) {
								?>
									<!-- CAROUSEL -->
									<li class="carousel-li"><?php include("php/carousel.php"); ?></li>
									<!-- CAROUSEL -->
							<?php
								}
							}
							?>
						</ul>
						<div class="clear"></div>

						<?php include("php/destaques-2020.php"); ?>
					</div><!--COLUNA-FULL-->
					<div class="clear"></div>

					<!-- Texto -->
					<div id="box-texto">
						<p>Porto Alegre, uma cidade vibrante e cheia de opções culturais e sociais, é também um destino ideal para quem busca descrição e sofisticação na hora de contratar acompanhantes Porto Alegre-RS. Quando se trata de contratar acompanhantes de luxo, há uma série de benefícios que tornam essa escolha única e atraente.</p><br>
						<p>Veja os benefícios e como a contratação de acompanhantes Porto Alegre-RS pela plataforma Vip Luxúria pode ser uma experiência gratificante, seja para momentos de lazer, jantares sociais ou outros eventos especiais.</p><br>

						<h2>Companheirismo Sofisticado e Exclusivo</h2>
						<p>O companheirismo sofisticado e exclusivo oferecido por uma acompanhante Porto Alegre-RS é um serviço que vai muito além das expectativas convencionais. Combinando elegância, inteligência e um profundo senso de empatia, essas acompanhantes se destacam por proporcionar experiências únicas e personalizadas para cada cliente.</p><br>
						<p>Muitas garotas de programa em Porto Alegre-RS investem em seu desenvolvimento pessoal e cultural, frequentando cursos, aprimorando idiomas e mantendo-se atualizadas sobre tendências globais, o que lhes permite interagir com pessoas de diversos perfis e origens.</p><br>
						<p>Seja em eventos sociais, jantares de negócios ou momentos privados, a capacidade de adaptação e o refinamento dessas acompanhantes transformam cada encontro em uma experiência marcante e inesquecível.</p><br>
						<p>A exclusividade do serviço oferecido pelas garotas de programa em Porto Alegre-RS também reflete na atenção aos mínimos detalhes que garantem conforto e discrição. As acompanhantes entendem que cada cliente busca mais do que apenas companhia; procuram conexão genuína e momentos que sejam tanto agradáveis quanto memoráveis. </p><br>
						<p>Por isso, muitas garotas de programa em Porto Alegre-RS são conhecidas por seu estilo impecável, que alia moda, bom gosto e sofisticação. A habilidade de criar conversas estimulantes e engajantes faz com que os encontros transcorram com leveza e naturalidade, deixando o cliente à vontade e valorizado. Esse nível de atenção ao cliente é um diferencial que destaca o serviço como algo exclusivo e de alta qualidade.</p><br>
						<p>Porto Alegre, uma cidade vibrante e cheia de charme, proporciona o cenário ideal para que esse companheirismo sofisticado floresça. Seja em restaurantes renomados, eventos culturais ou passeios pelos pontos turísticos, onde uma garota de programa em Porto Alegre-RS se adapta perfeitamente ao ambiente, enriquecendo cada momento com sua presença elegante. Elas sabem como equilibrar charme e discrição, garantindo que cada cliente se sinta especial e plenamente atendido. </p><br>
						<p>A cidade oferece uma vasta gama de opções para experiências únicas, que, quando acompanhadas de uma profissional tão habilidosa, criam memórias que transcendem o ordinário. Essa combinação de exclusividade, sofisticação e conexão genuína faz do serviço de uma garota de programa em Porto Alegre-RS verdadeiramente diferenciado.</p><br>

						<h2>Atendimento Personalizado e Exclusivo</h2>
						<p>As acompanhantes Porto Alegre-RS costumam oferecer um serviço altamente personalizado. Isso significa que, ao contratar um acompanhante, você pode escolher os detalhes da experiência que deseja viver.</p><br>
						<p>Se está oferecendo um jantar formal, uma noite de lazer ou até mesmo uma viagem, as acompanhantes em Porto Alegre-RS são conhecedoras das nuances que tornam esses momentos inesquecíveis. O atendimento é sempre exclusivo e adaptado às suas preferências, garantindo que a experiência seja feita sob medida.</p><br>

						<h2>Discrição e Confidencialidade</h2>
						<p>Outro benefício essencial ao contratar uma acompanhante Porto Alegre-RS é a descrição. Profissionais de alto nível sabem como garantir que seus clientes se sintam à vontade e seguros em qualquer situação. </p><br>
						<p>Elas mantêm total confidencialidade sobre seus encontros, respeitando sua privacidade em todos os momentos. Se você procura um momento de intimidade e exclusividade sem preocupações com sua imagem pública, as acompanhantes Porto Alegre-RS são a escolha ideal.</p><br>

						<h2>Acompanhamento em Eventos e Jantares Sociais com suas acompanhantes Porto Alegre-RS</h2>
						<p>Em Porto Alegre, a vida social e empresarial gira em torno de eventos e jantares sofisticados. Ao contratar acompanhantes Porto Alegre-RS, você tem a oportunidade de contar com uma companhia elegante e carismática em eventos sociais importantes, como reuniões de negócios, galas, lançamentos e outros encontros de alto nível. </p><br>
						<p>Ter acompanhantes em Porto Alegre-RS ao seu lado pode ser uma excelente forma de impressionar seus colegas e fazer com que você se sinta ainda mais confiante e confortável em ambientes de alta exigência social.</p><br>

						<h2>Relaxamento e Escapismo</h2>
						<p>Além do companheirismo em eventos formais, as acompanhantes Porto Alegre-RS também podem proporcionar momentos de relaxamento e escapismo. Seja para um encontro mais íntimo e tranquilo, ou para simplesmente desfrutar de um tempo de qualidade fora das obrigações do dia a dia, esses profissionais são especialistas em criar um ambiente de descontração e prazer. </p><br>
						<p>O foco é proporcionar uma experiência agradável com nossas acompanhantes de luxo Porto Alegre-RS, onde o cliente possa relaxar, desfrutar de boa conversa e sentir-se bem consigo mesmo.</p><br>

						<h2>Qualidade e Profissionalismo</h2>
						<p>Quando você opta por contratar uma acompanhante em porto alegre-RS pela plataforma Vip Luxúria, pode ter certeza de que está lidando com uma habilidade profissional. A maioria dos acompanhantes de luxo tem uma formação sólida em diversas áreas, como etiqueta social, comunicação e até mesmo idiomas. </p><br>
						<p>Isso significa que você terá uma companhia que não é apenas atraente fisicamente, mas também inteligente, articulada e capaz de participar de conversas interessantes e complexas, tornando o encontro ainda mais agradável com suas acompanhantes Porto Alegre–RS.</p><br>

						<h2>Momentos de Alta Qualidade com nossas acompanhantes Porto Alegre-RS</h2>
						<p>Ao contratar acompanhantes Porto Alegre-RS, você tem a garantia de que o tempo que passar com esse profissional será de alta qualidade. Isso vai desde o cuidado com a aparência até a maneira como ela interage com você, garantindo que cada momento seja inesquecível. </p><br>
						<p>Se você procura uma experiência de qualidade, seja para relaxar ou para se divertir, contratar uma acompanhante de luxo pode ser a melhor maneira de garantir uma experiência realmente especial.</p><br>

						<h2>Flexibilidade para Diversas Ocasiões</h2>
						<p>As acompanhantes de porto alegre-RS oferecem flexibilidade para uma variedade de benefícios. Seja para um evento corporativo, uma noite de gala, uma comemoração especial ou até mesmo para uma companhia durante uma viagem, esses profissionais sabem como se adaptar a diferentes cenários e tipos de ambientes. </p><br>
						<p>Isso garante que você possa contar com uma companhia comprometida em qualquer situação, tornando sua experiência ainda mais segura.</p><br>

						<h2>Uma Experiência de Alto Nível com nossas acompanhantes de porto alegre-RS</h2>
						<p>Porto Alegre é uma cidade cheia de cultura, história e charme. Com muitas opções de restaurantes, bares, clubes e eventos, a cidade oferece um cenário perfeito para aproveitar momentos ao lado de nossas acompanhantes Porto Alegre-RS. </p><br>
						<p>Seja para passeios turísticos, jantares sofisticados ou até mesmo para relaxar em uma experiência mais privada, a presença de um acompanhante de luxo pode tornar sua visita à cidade ainda mais externa.</p><br>

						<h2>Alta Disponibilidade e Facilidade de Acesso</h2>
						<p>Outro benefício de contratar nossa acompanhante de porto alegre-RS é a facilidade de acesso ao serviço. Muitos profissionais oferecem canais diretos de contato, seja por telefone ou online, tornando o processo de contratação rápido e seguro. </p><br>
						<p>A flexibilidade de horários e a disponibilidade dos acompanhantes garantem que você possa escolher o momento que melhor se adequa às suas necessidades.</p><br>
						<p>Contratar acompanhante de luxo porto alegre-RS oferece uma experiência única e sofisticada, ideal para quem busca momentos exclusivos e de alta qualidade. A cidade oferece um cenário perfeito para divertir a companhia de profissionais curiosos e discretos, que sabem como transformar qualquer encontro em uma experiência específica. </p><br>
						<p>Se você está procurando uma companhia de classe, que combine elegância, sofisticação e profissionalismo, Porto Alegre é o lugar ideal para encontrar o serviço que você precisa.</p>

					</div>
				</div><!--PRINCIPAL CONTENT-->
			</div><!--PRINCIPAL-->
		</div><!--BG-COURO-->

		<div id="rodape"><?php include("php/rodape-2.php"); ?></div>
		<div id="tags"><?php include("php/tags.php"); ?></div>
	</div><!--wrap-->

	<script type="text/javascript">
		Cufon.now();
	</script>
	<?php include("php/google.php");
	mysqli_close($conexao); ?>

	<script type="text/javascript">
		function DropDown(el) {
			this.dd = el;
			this.initEvents();
		}
		DropDown.prototype = {
			initEvents: function() {
				var obj = this;
				obj.dd.on('click', function(event) {
					$(this).toggleClass('active');
					event.stopPropagation();
				});
			}
		};
		$(function() {
			var dd = new DropDown($('#dd'));
			$(document).click(function() {
				$('.wrapper-dropdown-3').removeClass('active');
			});
		});
		
		// ADIÇÃO: Melhoria para responsividade do dropdown
		// Fecha o dropdown ao clicar em um item no mobile
		$('.dropdown a').on('click touchstart', function() {
			if (window.innerWidth <= 768) {
				$('.wrapper-dropdown-3').removeClass('active');
			}
		});
		
		// Previne scroll horizontal em mobile
		document.addEventListener('DOMContentLoaded', function() {
			document.body.style.overflowX = 'hidden';
		});
	</script>
</body>

</html>