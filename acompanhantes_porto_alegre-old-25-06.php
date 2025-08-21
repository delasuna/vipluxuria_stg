<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="robots" content="index,follow">
<meta name="description" content="Vip Luxúria é um classificados de anúncios de Acompanhantes de Porto Alegre." />
<meta name="keywords" content="Acompanhantes Porto Alegre, Acompanhantes em Porto Alegre, Acompanhante em Porto Alegre, Garota de Programa Porto Alegre, Garotas de Programa Porto Alegre, Acompanhante Porto Alegre, Acompanhantes RS, Acompanhantes Rio Grande do Sul, Acompanhantes poa, Guia Erótico Porto Alegre, Guia de Acompanhantes Porto Alegre, Anúncios de Acompanhantes Porto Alegre, Acompanhantes POA, Acompanhante" />

<meta name="google-translate-customization" content="47516143a922ad1d-908eb38b3da0e2e8-gfbda7755c951dd96-12"></meta>
<meta http-equiv="Cache-Control" content="no-store" />

<title>Vip Lux&uacute;ria - Acompanhantes Porto Alegre</title>

<!--CSS-->
<link href="/css-js/estilos-2.css" rel="stylesheet" type="text/css" />
<link href="/css-js/menu-2.css" rel="stylesheet" type="text/css" />
<!--CSS-->
<!--FONTES-->
<script src="/css-js/cufon-yui.js" type="text/javascript"></script>
<script src="/css-js/nome_400.font.js" type="text/javascript"></script>
<script src="/css-js/titulo_400.font.js" type="text/javascript"></script> 
<script type="text/javascript">
	Cufon.replace('h1');
	Cufon.replace('h1#titulo,#menu-rodape-content',{ fontFamily: 'titulo' }); 
</script>
<!--FONTES-->

<!--SLIDER-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="/css-js/jquery.bxslider.min.js"></script>
<link href="/css-js/jquery.bxslider.css" rel="stylesheet" />
<!--SLIDER-->

<!--SLIDER - 2-->
<link rel="stylesheet" href="/css-js/slider/lightbox/lightbox.css" media="screen"/>
<link rel="stylesheet" href="/css-js/slider/slider-rows.css">
<script src="/css-js/slider/lightbox/modernizr.custom.js"></script>
<script src="/css-js/slider/slider-rows.js"></script>
<!--SLIDER -2 -->   

<!-- DROPMENU -->
<link rel="stylesheet" type="text/css" href="/css-js/style-dropmenu.css" /> 


</head>
<body>
<? 	$conexao = require_once 'php/conecta_mysql.php';  ?>
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
        <div id="slider">
			<?php include("php/slider.php"); ?>
        </div><!--SLIDER-->        		
		<div id="principal">
            <div id="principal-content">
            	<div id="coluna-1">
                	<div id="slider-2">
	       				<?php include("php/slider-2.php"); ?>
                    </div>

                  	<div id="filtro">
                        <div class="wrapper-demo">
                            <div id="dd" class="wrapper-dropdown-3" tabindex="1">
                                <span>Filtro por Cidades</span>
                                <ul class="dropdown">
                                    <li><a href="/conteudo/mulheres.php">Todas as Cidades</a></li>                                                                        
									<? 
									$sql = "SELECT idCidade, cidade FROM cidade ORDER BY ordem;";
							
									$resultado = mysql_query($sql, $conexao);
									if(!$resultado){
										die("Impossível visualizar as cidades: " . mysql_error() . '<br>');
									}
							
									while($row = mysql_fetch_array($resultado)) {
										$idCidade = $row['idCidade'];
										$cidade = $row['cidade'];
											echo "<li><a href=javascript:carregaCidade('".$row['idCidade']."')>".$cidade."</a></li>";
									}
									?>                
                                </ul>
                            </div>
                        </div> 			
                    </div><!-- filtro -->
					
					<div id="titulo"><img src="/imagens/estrutura/titulo-mulheres.png"></div>
					
					<div id="bt-mural"><a href="/mural-recados/"><img src="/imagens/estrutura/bt-mural-de-recados-2.png"></a></div>
					
                    <div class="clear"></div>
					
                      <ul id="thumbs">
						<?
						$sql = " SELECT * FROM mulher  WHERE flagAtivo = 'Sim' "  
							 . " ORDER BY flagPreferencial desc, flagAgenciada asc, rand(); ";
		
										 
						$resultado = mysql_query($sql, $conexao);
						if(!$resultado){
							die("Impossível visualizar as anunciantes: " . mysql_error() . '<br>');
						}
						$contador = 0;
		
						$sts = mysql_query($sql);
						$registros = mysql_num_rows($sts);
		
						if ($registros>0) {
							while($row = mysql_fetch_array($resultado)) {
								$idMulher = $row['idMulher'];
								$nome = $row['nome'];	
								$sobrenome = $row['sobrenome'];
								$imagemCapa = $row['imagemCapa'];				
				
								$contador++;
							
								if ($contador < 5) { 
							?>
									<li class="zoom_img"><a href="/perfil/<?=$idMulher?>/<?=tirarAcentos($nome)?><? if($sobrenome != "") { echo "-".tirarAcentos(str_replace(" ", "-", $sobrenome));}?>"><img src="<?="/sistema/content/".$imagemCapa?>" width="112" height="149" /><p class="nome"><?=$nome?> <?=$sobrenome?></p></a></li>
							<? 	} else { ?>
									<li class="last zoom_img"><a href="/perfil/<?=$idMulher?>/<?=tirarAcentos($nome)?><? if($sobrenome != "") { echo "-".tirarAcentos(str_replace(" ", "-", $sobrenome));}?>"><img src="<?="/sistema/content/".$imagemCapa?>" width="112" height="149" /><p class="nome"><?=$nome?> <?=$sobrenome?></p></a></li>
						    <?  	$contador = 0;
								} 
							}
						}
						?>	 						
					
                    </ul>                    
                
                </div><!--COLUNA-1-->
                <div id="coluna-2">
                	<?php include("php/destaques-2.php"); ?>
                </div><!--COLUNA-2-->
                <div class="clear"></div>
            </div><!--PRINCIPAL CONTENT-->
        </div><!--PRINCIPAL-->
	</div><!--BG-COURO-->
    <div id="rodape">
		<?php include("php/rodape-2.php"); ?>
    </div><!--RODAPE-->
    <div id="tags">
		<?php include("php/tags.php"); ?>
    </div><!--TAGS-->
</div><!--wrap-->
<script type="text/javascript"> Cufon.now(); </script>
<?php include("php/google.php"); ?>

		<script type="text/javascript">

			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-3').removeClass('active');
				});

			});

		</script>
</body>
</html>
