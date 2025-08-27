<?php 
$conexao = require_once 'php/conecta_mysql.php';  

$sql = "SELECT * 
        FROM seo 
        INNER JOIN tipoSeo ON seo.idTipoSeo = tipoSeo.idTipoSeo 
        WHERE descricao = 'Index'";  

$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Impossível visualizar SEO: " . mysqli_error($conexao) . '<br>');
}

$registros = mysqli_num_rows($resultado);

if ($registros > 0) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $title = $row['title']; 
        $description = $row['description'];
        $keywords = $row['keywords'];     
    } 
}

mysqli_free_result($resultado);
mysqli_close($conexao);
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


</head>

<body id="abertura-2">
<div id="wrap-2">
  <div id="abertura-content-2">
		<div style="text-align: center;"><a href="/acompanhantes_porto_alegre.php"><img width="650px" src="/imagens/estrutura/vip-luxuria-home-2018.png" alt="Vip Lux&uacute;ria" /></a></div>
		<h1>Seja bem-vindo ao Vip Luxúria, seu classificado online de Acompanhantes de Porto Alegre e Região Metropolitana.</h1>
		<div id="texto-abertura">	
        <div id="bt-versao-2">
       	      <a href="/acompanhantes-porto-alegre/"><img src="/imagens/estrutura/bt-desktop-2018.png" /></a>
	          <a href="/m/index.php"><img src="/imagens/estrutura/bt-mobile-2018.png"/></a>
        </div>
		<h2>Conheça o Vip Luxúria</h2>		
		<p>O <strong>VIP LUXÚRIA</strong> é um site de anúncio clasificados de acompanhantes, de produtos e serviços eróticos, direcionado para um público adulto, maior de 18 anos, que procura desfrutar momentos de prazer ao lado de acompanhantes de alto nível. <strong><a href="/vip-luxuria-acompanhantes-porto-alegre-poa/" />Saiba mais[+]</a></strong>
		</p>
        <p>&nbsp;</p>
		<!-- 
		<h2>Acompanhantes Mulheres</h2>		
		<p></p>
        <p>&nbsp;</p>
		
		<h2>Acompanhantes Homens</h2>		
		<p></p>
        <p>&nbsp;</p>		
		
		<h2>Acompanhantes Transex</h2>		
		<p></p>
        <p>&nbsp;</p>		-->
		
		<ul>
			<li><a href="/Acompanhantes-Loiras">Garotas de Programa Loiras</a></li>
			<li><a href="/Acompanhantes-Morenas">Garotas de Programa Morenas</a></li>
			<li><a href="/Acompanhantes-Mulatas">Garotas de Programa Mulatas</a></li>
			<li><a href="/casais-e-homens-porto-alegre-poa/">Casais & Homens</a></li>
			<li><a href="/transex-porto-alegre-poa/">Transex</a></li>
			<li><a href="/acompanhantes-porto-alegre/">Garotas de Programa Porto Alegre</a></li>
			<li><a href="/Acompanhantes/5/Litoral-Gaucho">Garotas de Programa Litoral Gaúcho</a></li>
			<li><a href="/Acompanhantes/6/Grande-Porto-Alegre">Garotas de Programa Grande Porto Alegre</a></li>
			<li><a href="/Acompanhantes/3/Vale-dos-Sinos">Garotas de Programa Vale dos Sinos</a></li>
			<li><a href="/Acompanhantes/22/Campo-Bom">Garotas de Programa Campo Bom</a></li>
			<li><a href="/Acompanhantes/23/Interior-do-Estado">Garotas de Programa Interior do Estado</a></li>
			<li><a href="/acompanhantes-porto-alegre/">Garotas de Programa Serra Gaúcha</a></li>
			<li><a href="/Acompanhantes/28/undefined">Garotas de Programa Gramado</a></li>
			<li><a href="/Acompanhantes/9/Gravatai">Garotas de Programa Gravataí</a></li>
			<li><a href="/acompanhantes-porto-alegre/">Massagens</a></li>
			<li><a href="/acompanhantes-porto-alegre/">Massagem Tântrica</a></li>
			<li><a href="/Acompanhantes/11/Cachoeirinha">Garotas de Programa Cachoeirinha</a></li>
			<li><a href="/Acompanhantes/13/Canoas">Garotas de Programa Canoas</a></li>
			<li><a href="/Acompanhantes/12/Sao-Leopoldo">Garotas de Programa São Leopoldo</a></li>
			<li><a href="/Acompanhantes/2/Novo-Hamburgo">Garotas de Programa Novo Hamburgo</a></li>
			<li><a href="/Acompanhantes/17/Sapiranga">Garotas de Programa Sapiranga</a></li>
			<li><a href="/acompanhantes-porto-alegre/">Garotas de Programa Rio Grande do Sul</a></li>
			<li><a href="/guia-moteis-porto-alegre-poa/">Guia de Motéis</a></li>
			<li><a href="/guia-moteis-porto-alegre-poa/">Guia de Motéis Porto Alegre</a></li>
		</ul>
		<br><br>
        <div id="termo-box">
			<p><strong>Termos e condi&ccedil;&otilde;es de navega&ccedil;&atilde;o do site Vip Lux&uacute;ria</strong><br /></p>
			<p>Este site oferece conte&uacute;do er&oacute;tico e adulto n&atilde;o autorizado para menores de 18 anos, caso voc&ecirc; n&atilde;o tenha atingido essa maioridade ou em seu pa&iacute;s esse tipo de conte&uacute;do &eacute; proibido n&atilde;o entre. Caso voc&ecirc; n&atilde;o tenha essas restri&ccedil;&otilde;es a sua pessoa, favor ler e concordar com os termos e condi&ccedil;&otilde;es de uso do site antes de entrar.</p><br>
			<strong><p>Termos de Uso</p></strong>
			<p><strong>Do Usuário Visitante</strong><br>
1º Tenho mais de 18 anos de idade e em meu país essa maioridade me permite ao acesso deste conteúdo.<br>
2º Declaro estar ciente que o material exposto neste site é de conteúdo erótico e adulto, e que estou acessando para o meu uso pessoal e não irei expor este conteúdo a menores de 18 anos ou a outros que exista alguma restrição legal ou moral.<br>
3º Assumo inteira responsabilidade cível e criminal pelo uso indevido dos materiais fotográficos, vídeos e outros existentes no site, uma vez que as veiculações dos anúncios não representam cessão de direitos de imagem aos visitantes e usuários.<br>
4º Declaro também estar ciente que o Site Vip Luxúria é um site de classificados de produtos e serviços eróticos relacionados ao mercado adulto, e que o mesmo não tem nenhum vinculo com os produtos ou serviços divulgados.<br>
<br>
<strong>Do Vip Luxúria aos Visitantes e Usuários</strong><br>
Nosso Site tem como objetivo a divulgação de produtos e serviços do mercado adulto ou correlacionados e torná-los público a quem busca esse tipo de conteúdo e informação, desde que se tenha autoridade legal para acessar tal conteúdo, ou seja, que o visitante ou usuário tenha maioridade exigida pela constituição brasileira.<br><br>
O Vip Luxúria se posiciona como um catálogo de produtos e serviços eróticos ou classificados dos mesmos, mas tendo como sua única responsabilidade, a prestação de serviço em publicidade dos produtos e serviços que nossos anunciantes solicitam a publicação através de uma taxa de manutenção.<br><br>
Em nosso Site, todo anúncio de um produto ou serviço erótico publicado, é de inteira responsabilidade da empresa ou profissional autônomo Anunciante. Sendo assim, não nos comprometemos com a qualidade, atendimento, entrega ou qualquer outro valor agregado dos produtos e serviços prestados por nossos Anunciantes.<br><br>
Nós do Vip Luxúria, não nos comprometemos com a total veracidade das informações passadas por nossos anunciantes. Salvo os números de telefone para contato. Isso porque, alguns de nossos anunciantes usam pseudônimos para atender seus clientes, como no caso das Acompanhantes e Massagistas que se divulgam em nosso site.</p>
        </div>
        <div class="clear"></div>
        </div><!--BT-VERSAO-->
		</div><!--TEXTO ABERTURA-->
    </div><!--ABERTURA-->
  </div>    
  <div id="rodape">
	<?php include("php/rodape-2.php"); ?>
  </div><!--RODAPE-->
	
</div><!--wrap-->


<?php include("php/google.php"); ?>
</body>
</html>