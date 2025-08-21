<? 	$conexao = require_once 'php/conecta_mysql.php';  ?>
<?
	$sql = " SELECT * FROM seo, tipoSeo Where seo.idTipoSeo = tipoSeo.idTipoSeo AND descricao = 'ConhecaVL'";

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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
					<div id="titulo-pagina"><img src="/imagens/estrutura/titulo-vipluxuria.png" width="760" height="41" /></div>
					<div id="icone"><img src="/imagens/estrutura/icone-vip.png" width="90" height="90" /></div>
					<div id="texto">O <strong>VIP LUX&Uacute;RIA</strong> &eacute; um site de an&uacute;ncio clasificados de acompanhantes, de produtos e servi&ccedil;os er&oacute;ticos, direcionado para um p&uacute;blico adulto, maior de 18 anos, que procura desfrutar momentos de prazer ao lado de acompanhantes de alto n&iacute;vel.</p>
<p> N&atilde;o temos nenhum v&iacute;nculo com nenhuma de nossas anunciantes no quis diz respeito  a presta&ccedil;&atilde;o de servi&ccedil;o muito menos fazemos sele&ccedil;&atilde;o para entrar no site. As  anunciantes t&ecirc;m que ser maior de idade e quanto as suas fotos n&atilde;o temos como  identificar se foi feito photoshop ou n&atilde;o.</p>
<p>A anunciante dever&aacute; se dirigir ao  est&uacute;dio para assinar um termo de autoriza&ccedil;&atilde;o de imagem munida de documentos, ou  seja, todas elas existem o que n&atilde;o impede elas de poder mandar outras no lugar.&nbsp;</p>
<p>N&oacute;s do Vip Luxuria aconselhamos  as anunciantes a prestar um bom servi&ccedil;o, mas preciso que voc&ecirc; entenda que somos  contratados e n&atilde;o contratantes.</p>
<p><strong>Por exemplo: </strong>Se voc&ecirc; olha um an&uacute;ncio de uma  promo&ccedil;&atilde;o ou presta&ccedil;&atilde;o de servi&ccedil;o em um jornal e esse anuncio n&atilde;o corresponde a  verdade o que voc&ecirc; faz? Reclama na loja ou den&uacute;ncia a loja no PROCON e n&atilde;o para  o Jornal. O Jornal vende espa&ccedil;os publicit&aacute;rios assim como o Vip Lux&uacute;ria.<br />
  &nbsp;</p>
<p>O Vip Luxuria &eacute; uma vitrine para  clientes que buscam servi&ccedil;os e produtos er&oacute;ticos. Ent&atilde;o navegue pelo site e  verifique que oferecemos bem mais que somente anuncio de acompanhantes e  estamos sempre buscando trazer ferramentas novas para facilitar sua escolha. A  baixo vamos citar dicas de como usar melhor os recursos do site. </p>
<p>&nbsp;</p>
<p>A navega&ccedil;&atilde;o do site &eacute; simples e intuitiva, todos os links para as p&aacute;ginas est&atilde;o dispon&iacute;veis no menu principal.</p>
<p><img src="/imagens/tutorial-vip-01.png" width="100%"  alt="Vip Lux&uacute;ria - Menu Principal" /></p>
<p>Os anunciantes estão divididos nas seguintes categorias e sub-categorias:</p>

	<ul>
    	<li><a href="http://vipluxuriagold.net/conteudo/mulheres.php" title="Vip Lux&uacute;ria - Acompanhantes Mulheres" target="_blank">Acompanhantes Mulheres</a>
<ul>
            	<li><a href="http://www.vipluxuriagold.net/Acompanhantes-Loiras" title="Vip Lux&uacute;ria - Acompanhantes Loiras" target="_blank">Acompanhantes Loiras</a></li>
                <li><a href="http://www.vipluxuriagold.net/Acompanhantes-Morenas" title="Vip Lux&uacute;ria - Acompanhantes Morenas" target="_blank">Acompanhantes Morenas</a></li>
                <li><a href="http://www.vipluxuriagold.net/Acompanhantes-Mulatas" title="Vip Lux&uacute;ria - Acompanhantes Mulatas">Acompanhantes Mulatas</a></li>
                <li><a href="http://www.vipluxuriagold.net/Acompanhantes-ComVideo" title="Vip Lux&uacute;ria - Acompanhantes com V&iacute;deo" target="_blank">Acompanhantes com V&iacute;deo</a></li>
                <li><a href="http://www.vipluxuriagold.net/Acompanhantes-Atende24Horas" title="Vip Lux&uacute;ria - Acompanhantes que Atende 24 horas" target="_blank">Acompanhantes que Atende 24 horas</a></li>
            </ul>
    	</li>
        <li><a href="http://vipluxuriagold.net/conteudo/homens.php" title="Vip Lux&uacute;ria - Acompanhantes Homens" target="_blank">Acompanhantes Homens</a></li>
        <li><a href="http://vipluxuriagold.net/conteudo/transex.php" title="Vip Lux&uacute;ria - Acompanhantes Transex" target="_blank">Acompanhantes Transex</a></li>
	</ul>     
<p>Na categoria Acompanhantes Mulheres é possível procurar anúncios por cidades e regiões:</p>
	<ul>
    	<li><a href="http://www.vipluxuriagold.net/Acompanhantes/2/Novo-Hamburgo" title="Vip Lux&uacute;ria - Acompanhantes de Novo Hamburgo" target="_blank">Acompanhantes de Novo Hamburgo</a></li>
        <li><a href="http://www.vipluxuriagold.net/Acompanhantes/1/Porto-Alegre" title="Vip Lux&uacute;ria - Acompanhantes de Porto Alegre" target="_blank">Acompanhantes de Porto Alegre</a></li>
		<li><a href="http://www.vipluxuriagold.net/Acompanhantes/6/Grande-Porto-Alegre" title="Vip Lux&uacute;ria - Acompanhantes da Grande Porto Alegre" target="_blank">Acompanhantes da Grande Porte Alegre</a></li>
        <li><a href="http://www.vipluxuriagold.net/Acompanhantes/3/Vale-dos-Sinos" title="Vip Lux&uacute;ria - Acompanhantes do Vale dos Sinos" target="_blank">Acompanhante do Vale dos Sinos</a></li>
		<li><a href="http://www.vipluxuriagold.net/Acompanhantes/5/Litoral-Gaucho" title="Vip Lux&uacute;ria - Acompanhantes do Litoral Ga&uacute;cho" target="_blank">Acompanhantes do Litoral Gaúcho</a></li>
	</ul>        

<img src="/imagens/tutorial-vip-02.png" alt="Vip Lux&uacute;ria - Vers&atilde;o Mobile" width="180" height="250" align="left" class="celular" /><p style="padding-top:40px; padding-left:30px; padding-right:30px; padding-bottom:20px;">A novidade do início do ano de 2014 foi a remodelação do nosso site e o lançamento versão para Smartphone. Para saber mais a respeito desta versão, acesse o <a href="http://vipluxuriagold.net/tutorial.php" title="Vip Lux&uacute;ria - Tutorial Vip Mobile" target="_blank">tutorial do Vip Mobile</a>.</p><br/>
<p class="atencao">Obs.: O <strong>VIP LUXÚRIA</strong> não intermedia os contatos das empresas e/ou clientes anunciantes. As informações contidas nos anúncios são de inteira responsabilidade dos anunciantes.
</p>               
              </div><!-- TEXTO -->      
           	  </div><!--coluna-full-->
				<div class="clear"></div>			
            </div><!--PRINCIPAL CONTENT FULL-->
        </div><!--PRINCIPAL-->
	</div><!--BG-COURO-->
    <div id="rodape">
		<?php include("php/rodape-2.php"); ?>
    </div><!--RODAPE-->
    <div id="tags">
		<?php include("php/tags-vip.php"); ?>
    </div><!--TAGS-->
</div><!--wrap-->
<script type="text/javascript"> Cufon.now(); </script>
<?php include("php/google.php"); ?>

</body>
</html>