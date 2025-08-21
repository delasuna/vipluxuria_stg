<? 	$conexao = require_once 'php/conecta_mysql.php';  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="robots" content="index,follow">

<meta name="description" content="Vip Luxúria é um classificados de anúncio de Acompanhantes de Porto Alegre." />
<meta name="keywords" content="Acompanhantes Porto Alegre, Acompanhantes em Porto Alegre, Acompanhante em Porto Alegre, Garota de Programa Porto Alegre, Garotas de Programa Porto Alegre, Acompanhante Porto Alegre, Acompanhantes RS, Acompanhantes Rio Grande do Sul, Acompanhantes poa, Guia Erótico Porto Alegre, Guia de Acompanhantes Porto Alegre, Anúncios de Acompanhantes Porto Alegre, Acompanhantes POA, Acompanhante" />


<title>
	Atualização de Perfil - Mulheres - Vip Lux&uacute;ria - Acompanhantes Porto Alegre

</title>

<!--CSS-->
<link href="css-js/estilos.css" rel="stylesheet" type="text/css" />
<link href="css-js/menu.css" rel="stylesheet" type="text/css" />
<!--CSS-->
<!--FONTES-->
<script src="css-js/cufon-yui.js" type="text/javascript"></script>
<script src="css-js/nome_400.font.js" type="text/javascript"></script>
<script src="css-js/titulo_400.font.js" type="text/javascript"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript">
	Cufon.replace('h1');
	Cufon.replace('h1#titulo,.titulo-destaques, #menu-content, #menu-rodape-content, #rodape-content h3,#titulo-pag, #coluna-perfil-2 h3',{ fontFamily: 'titulo' }); 
	Cufon.replace('p.nome,.nome-acompanhante',{ fontFamily: 'nome' }); 
</script>
<!--FONTES-->

<script type="text/javascript">
//desabilita menu de opcoes ao clicar no botao direito
function desabilitaMenu(e)
{
if (window.Event)
{
if (e.which == 2 || e.which == 3)
return false;
}
else
{
event.cancelBubble = true
event.returnValue = false;
return false;
}
}

//desabilita botao direito
function desabilitaBotaoDireito(e)
{
if (window.Event)
{
if (e.which == 2 || e.which == 3)
return false;
}
else
if (event.button == 2 || event.button == 3)
{
event.cancelBubble = true
event.returnValue = false;
return false;
}
}

//desabilita botao direito do mouse
if ( window.Event )
document.captureEvents(Event.MOUSEUP);
if ( document.layers )
document.captureEvents(Event.MOUSEDOWN);

document.oncontextmenu = desabilitaMenu;
document.onmousedown = desabilitaBotaoDireito;
document.onmouseup = desabilitaBotaoDireito;
</script>

<script type="text/javascript" src="/html5gallery/jquery.js"></script>
<script type="text/javascript" src="/html5gallery/html5gallery.js"></script>

<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5694f32a6ce4d64c" async="async"></script>

</head>

<body>

<form name="form3" method="post" action='enviar_perfil.php'>


<div id="wrap">
	<div id="faixa"></div><!--FAIXA-->
    <div id="bg-rosa">
        <div id="topo">
            <?php include("php/topo.php"); ?>
        </div><!--TOPO-->
        <div id="menu">
            <?php include("php/menu.php"); ?>
        </div><!--MENU-->
        <div id="titulo-pag">
        	<!-- <h1>Acompanhantes Mulheres</h1>-->
        </div><!--TITULO-PAG-->
    </div><!--BG ROSA-->
    <div id="bg-couro">    
        <div id="principal">
            <div id="principal-perfil">
				<div id="header-perfil">
					<div>
						<BR>
						<span style="display: inline-block; margin-left:10px; font-weight: bold; font-size: 18px;">
							Para atualizar seu perfil, informe os dados abaixo de acordo com o que está no site VipLuxúria.
						</span>
						<BR><BR>
						<p>
							<span style="display: inline-block; width: 80px; margin-left:10px; font-size: 16px;">Nome:</span>
							<input type="text" id="nomeBD" name="nomeBD" size="32" style="padding:3px;" tabindex="1" required=""  aria-required="true">
						</p>
						<BR>
						<p>
							<label style="display: inline-block; width: 80px; margin-left:10px;  font-size: 16px;">Telefone:</label>
							<input type="text" id="telefoneBD" name="telefoneBD" size="32" style="padding:3px;"  tabindex="1"  required=""  aria-required="true">
						</p>
						<BR>
						<p>
							<label style="display: inline-block; width: 80px; margin-left:10px;  font-size: 16px;">E-mail:</label>
							<input type="email" id="emailBD" name="emailBD" style="padding:3px;"  size="32" tabindex="1"  required=""  aria-required="true">
						</p>
					</div><!--ENDERECO-->
                    <div class="clear"></div>
				</div><!--HEADER PERFIL-->
              	<div id="perfil-content">
	                <div class="divisor" style="margin-bottom:20px;"></div>   			
					<div class="bt-voltar"><a href="javascript:document.form3.submit()"><img width="110px" height="30px" src="/imagens/estrutura/bt-entrar.png" /></a></div>
                	</div><!--COLUNA-PERFIL-1-->
   	              <div class="clear"></div>                  
				</div><!--PERFIL CONTENT-->
            </div><!--PRINCIPAL CONTENT-->
        </div><!--PRINCIPAL-->
	</div><!--BG-COURO-->
    <div id="rodape">
		<?php include("php/rodape.php"); ?>
    </div><!--RODAPE-->
    <div id="menu-rodape">
		<?php include("php/menu-rodape.php"); ?>
    </div><!--MENU RODAPE-->
    <div id="tags">
		<?php include("php/tags-mulheres.php"); ?>
    </div><!--TAGS-->
</div><!--wrap-->
</form>
<script type="text/javascript"> Cufon.now(); </script>
<?php include("php/google.php"); ?>
</body>
</html>
