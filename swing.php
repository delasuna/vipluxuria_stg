<? 	$conexao = require_once 'php/conecta_mysql.php';  ?>
<?
	$sql = " SELECT * FROM seo, tipoSeo Where seo.idTipoSeo = tipoSeo.idTipoSeo AND descricao = 'Swing'"; 

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
<script type="text/javascript">

	
	function validaEmail(field) { 
		usuario = field.substring(0, field.indexOf("@")); 
		dominio = field.substring(field.indexOf("@")+ 1, field.length); 
		
		if ((usuario.length >=1) && (dominio.length >=3) && (usuario.search("@")==-1) && (dominio.search("@")==-1) && (usuario.search(" ")==-1) && (dominio.search(" ")==-1) && (dominio.search(".")!=-1) && (dominio.indexOf(".") >=1)&& (dominio.lastIndexOf(".") < dominio.length - 1)) { 
			document.formulario2.submit();
		} else{ 
			alert("E-mail invalido. Informe novamente!"); 
		} 
	}

	function formSubmit() {
		document.formulario2.enviando2.value = "S";	
		validaEmail(document.getElementById("email").value);
	}
</script>
</head>

<body>
<?
if ($_REQUEST["enviando2"] == "S") {
	$de = $_POST["de"]; 
	$cidade = $_POST["cidade"]; 
	$idade = $_POST["idade"]; 
	$email = $_POST["email"]; 
	$anuncio = $_POST["anuncio"]; 
	
	$sql = " SELECT * FROM swings WHERE email = '" . $email . "'";
	$resultado = mysql_query($sql, $conexao);
	if(!$resultado){
		die("Impossível visualizar o swing: " . mysql_error() . '<br>');
	}
	$sts = mysql_query($sql);
	$registros = mysql_num_rows($sts);
		 

	if ($registros>0) {
			echo "'<script>alert('E-mail já cadastrado!');</script>";		
	} else {
		if ($email != "" && $de != "" && $anuncio != "" && $cidade != "") {
			$sql = " INSERT INTO swings (email, de, anuncio, cidade, flagAtivo) VALUES ('" . $email . "','" . $de . "', '" . $anuncio . "', '" . $cidade . "','N');"; 
			$resultado = mysql_query($sql, $conexao);
			echo "'<script>alert('Anúncio cadastrado com sucesso!');</script>";
		} else {
			echo "'<script>alert('Para cadastrar é necessário informar nome, cidade, e-mail e anúncio!');</script>";
		}
	}
}
?>
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
					
					<div id="titulo-pagina"><img src="/imagens/estrutura/titulo-swing.png" width="760" height="41" /></div>
					<div id="icone"><img src="/imagens/estrutura/icone-swing.png" width="90" height="90" /></div>     					
					
					<div id="texto">
					
<h2>O que é Swing?</h2>
<p>A troca de casais, também conhecida como swinging, é um termo usado para descrever uma prática na qual casais em relacionamentos consensuais e confiantes escolhem se envolver em relações sexuais com outros casais ou indivíduos fora de seu relacionamento primário. O swing é baseado na comunicação aberta, confiança e consentimento mútuo. É importante enfatizar que a troca de casais é uma escolha pessoal e não é apropriada para todos os casais.</p>
<p>A prática do swing tem suas próprias regras e normas que variam de acordo com os casais envolvidos. Ela é frequentemente realizada em clubes ou encontros específicos, onde casais podem se conhecer e explorar essa dinâmica de forma segura e respeitosa. A troca de casais é baseada no respeito mútuo e na igualdade de poder entre todos os envolvidos, com a ênfase na satisfação de ambos os parceiros e na manutenção do relacionamento principal.</p>
<p>É importante notar que o swing é uma prática adulta e consensual, e não deve ser confundida com traição ou infidelidade. Envolver-se no swing requer uma comunicação aberta, honesta e um alto nível de confiança entre os parceiros. Para casais que escolhem seguir essa prática, é fundamental estabelecer limites claros, ter um respeito mútuo pelos desejos e sentimentos do parceiro e garantir que todas as interações ocorram de maneira segura e consensual.</p>
             
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
		<?php include("php/tags-swing.php"); ?>
    </div><!--TAGS-->
</div><!--wrap-->
<script type="text/javascript"> Cufon.now(); </script>
<?php include("php/google.php"); ?>

</body>
</html>
