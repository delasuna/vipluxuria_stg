<? 	$conexao = require_once 'php/conecta_mysql.php';  ?>
<?
	$sql = " SELECT * FROM seo, tipoSeo Where seo.idTipoSeo = tipoSeo.idTipoSeo AND descricao = 'DuvidasFrequentes'";

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
				<script>
                    function aparece(ahhhh){
                    if(document.getElementById(ahhhh).style.display== "none"){
                    document.getElementById(ahhhh).style.display = "block";
                    }
                    else {
                    document.getElementById(ahhhh).style.display = "none"
                    }
                    }
                    
                </script>                
				<div id="titulo-pagina"><img src="/imagens/estrutura/titulo-duvidas.png" width="760" height="41" /></div>
	  			<a href="javascript:;" onclick="aparece('1');"><h4>1- O site vipluxuriagold.net agencia suas acompanhantes?</h4></a><a name="link1"></a><br/>
				<span id="1" style="display: none; ">O site Vip Luxuria n&atilde;o agencia nenhuma das acompanhantes do site. 
N&atilde;o faz parte do nosso neg&oacute;cio cobrar taxa ou comiss&atilde;o sobre os trabalhos realizados pelas (os) nossas (os) anunciantes e os visitantes do site. As (os) modelos e demais anunciantes pagam um taxa mensal para manterem seus an&uacute;ncios conosco, portanto, todas as negocia&ccedil;&otilde;es devem ser feitas diretamente com as (os) anunciantes, atrav&eacute;s de seus pr&oacute;prios n&uacute;meros de telefone publicados em seus respectivos an&uacute;ncios. <br/>
<br/></span> 

				<a href="javascript:;" onclick="aparece('2');"><h4>2- O site vipluxuriagold.net anuncia menores de idade?</h4></a><a name="link2"></a><br/>
				<span id="2" style="display: none; ">N&atilde;o. O site vipluxuriagold.net respeita o Estatuto da Crian&ccedil;a e do Adolescente, portanto, n&atilde;o publica an&uacute;ncios de menores de idade. Para isso, temos um r&iacute;gido sistema de controle das anunciantes. Solicitamos ainda que, caso alguma pessoa tenha conhecimento, ou mesmo suspeite, de que menores de idade est&atilde;o anunciando no site (no caso com documentos falsos), que nos informe para que possamos averiguar e retir&aacute;-las do ar imediatamente.<br/><br/></span>                 

				<a href="javascript:;" onclick="aparece('3');"><h4>3- O site vipluxuriagold.net anuncia ag&ecirc;ncias de acompanhantes?</h4></a><a name="link3"></a><br/>
				<span id="3" style="display: none; ">Sim. O site vipluxuriagold.net anuncia ag&ecirc;ncias e agenciadores, pois foi verificado que uma parcela de modelos trabalha com uma pessoa intermediando os contatos. <br/> <br/>

Todas as informa&ccedil;&otilde;es contidas nos an&uacute;ncios de nossos clientes s&atilde;o de inteira responsabilidade do mesmo, sendo a Viplux&uacute;ria.com apenas um meio de publicidade no qual nossos clientes anunciam para seu p&uacute;blico alvo.<br/><br/></span>                
                
				<a href="javascript:;" onclick="aparece('4');"><h4>4- O que fazer se a acompanhante escolhida n&atilde;o for a mesma da foto do an&uacute;ncio ou a anunciada n&atilde;o condizer com a verdade?</h4></a><a name="link4"></a><br/>
				<span id="4" style="display: none; ">Caso voc&ecirc; negocie com alguma anunciante e apare&ccedil;a outra no lugar da mesma, recomendamos que voc&ecirc; cancele sumariamente seu encontro e nos denuncie imediatamente (O site vipluxuriagold.net mant&eacute;m sigilo total de todas as den&uacute;ncias recebidas) para que possamos retirar a anunciante do site at&eacute; que a situa&ccedil;&atilde;o seja esclarecida. A aceita&ccedil;&atilde;o deste tipo de comportamento estimular&aacute; outras anunciantes a fazerem o mesmo. <br/><br/>

Para maiores informa&ccedil;&otilde;es, detalhes e d&uacute;vidas sobre esse assunto por gentileza <a href="/dicas.php"><strong>clique aqui</strong></a>.<br/><br/> </span>               

				<a href="javascript:;" onclick="aparece('5');"><h4>5- Com que periodicidade o site &eacute; atualizado?</h4></a><a name="link5"></a><br/>
				<span id="5" style="display: none; ">O site vipluxuriagold.net &eacute; atualizado e monitorado diariamente. Atualizamos conforme a necessidade e a entrada de novas anunciantes.<br/><br/></span>               

				<a href="javascript:;" onclick="aparece('6');"><h4>6- De quem &eacute; a responsabilidade pelos contatos ou encontros realizados com suas anunciantes?</h4></a><a name="link6"></a><br/>
				<span id="6" style="display: none; ">Somos apenas uma empresa de classificados e n&atilde;o nos responsabilizamos por quaisquer problemas que houver entre visitantes e anunciantes. Portanto, recomendamos todos os cuidados poss&iacute;veis em uma negocia&ccedil;&atilde;o com anunciantes de qualquer tipo que venha a anunciar servi&ccedil;os na internet.<br/><br/>

Para maiores informa&ccedil;&otilde;es, detalhes e d&uacute;vidas sobre esse assunto por gentileza <a href="/dicas.php"><strong>clique aqui</strong></a>.<br/><br/> </span               

				><a href="javascript:;" onclick="aparece('7');"><h4>7- Como melhor devo proceder ao contratar ou escolher uma anunciante do site para sair?</h4></a><a name="link7"></a><br/>
				<span id="7" style="display: none; ">Para maiores informa&ccedil;&otilde;es, detalhes e d&uacute;vidas sobre esse assunto por gentileza <a href="/dicas.php"><strong>clique aqui</strong></a>.<br/><br/></span>                
           	  </div>
            	<!--coluna-full-->
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