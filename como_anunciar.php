<? 	$conexao = require_once 'php/conecta_mysql.php';  ?>
<?
	$sql = " SELECT * FROM seo, tipoSeo Where seo.idTipoSeo = tipoSeo.idTipoSeo AND descricao = 'SaibaComoAnunciar'";

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
<!--FONTES-->
<!--SLIDER-->
<link rel="stylesheet" href="/css-js/slider/lightbox/lightbox.css" media="screen"/>
<!--<link rel="stylesheet" href="css-js/slider/reset.css">-->
<link rel="stylesheet" href="/css-js/slider/slider-rows.css">
<script src="/css-js/slider/lightbox/modernizr.custom.js"></script>
<script src="/css-js/slider/slider-rows.js"></script>
<!--SLIDER-->        

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
					<div id="titulo-pagina"><img src="/imagens/estrutura/titulo-como-anunciar.png" width="760" height="41" /></div>
					<p>Por favor, leia com atenção at&eacute; o final o texto abaixo.</p>
                    <p><br />
                    <img src="/imagens/estrutura/ligue.png" width="300" height="182" align="right" /><strong>Para anunciar no Vip Luxúria é muito fácil.</strong>                    Você deve entrar em contato via WhatsApp para agendar um horário, onde faremos um <strong>CONTRATO DE AUTORIZA&Ccedil;&Atilde;O DE DIREITO DE USO DE IMAGEM* entre as partes</strong>, onde <strong>VOC&Ecirc;</strong> autoriza o uso das suas fotos no site, declara ser maior de idade e de estar ciente que est&aacute; colocando suas fotos em um site de an&uacute;ncios de acompanhantes por vontade pr&oacute;pria. Junto com o contrato ser&aacute; anexado uma c&oacute;pia  do documento de identidade ou carteira de motorista, para comprova&ccedil;&atilde;o dos dados informados.</p>
                    <p><br />
                      <em>* Documento é para uso confidencial e exclusivo do site.</em><br />
            <br />
            <br />
</p>
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
	  			<h4 style="text-align:center; font-size:18px; color:#FFF;">OBS: O <strong>Único número</strong> de contato do site Vip Luxúria e o (51) 98144-0470 <br>Qualquer outro número falando ser do site é golpe!</h4><br><br/><br/><br/>
				<a href="javascript:;" onclick="aparece('1');"><h4 style="text-align:center; font-size:24px; color:#FD7AA4;">Quais as vantagens em anunciar no site vipluxuria.com?</h4></a><a name="link1"></a><br>
				<span id="1" style="display: none; padding-left:50px; padding-right:40px; ">
                * No Vip Luxúria, você tem a oportunidade de divulgar seus serviços diretamente ao seu público alvo, de forma dinâmica e diferenciada.<br /><br />
* Para as acompanhantes, a negociação é diretamente com o interessado, recebe o contato do cliente direto em seu telefone, sem intermediações nem comissões.<br /><br />
* Você publica seu anúncio e o cliente negocia direto com você.<br /><br />
* Contamos com uma divulgação de mídia planejada, para que você tenha o máximo de retorno ao anunciar conosco.<br /><br />
* Divulgação em nível regional e nacional.<br /><br />
* Estamos também nos principais sites de busca como o Google, através de palavras chaves como, por exemplo: "acompanhantes porto alegre" entre várias outras ações de marketing que visam sempre o melhor retorno para nossos anunciantes.<br /><br />
* Melhor custo benefício: ao contrário do alcance restrito dos jornais impressos, seu anúncio alcançará o mundo inteiro por um custo bem menor. Um anúncio no jornal, custa em média, R$30,00 para um único dia. No Vip Luxúria o custo diário é bem inferior e o retorno é excelente.<br /><br />
* Forneça seu perfil detalhado, formas de contato de seus serviços, características físicas, fotos, vídeos e endereços, bem como todos os detalhes que informarão e provocarão o interesse em um número bastante significativo de clientes.<br /><br />
* Altere seu anúncio quando desejar. Solicite alteração do seu perfil ou fotos e nossa equipe o fará em dias úteis em até 72 horas.<br /><br />
</span><br/><br/><br/>                 
                    
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