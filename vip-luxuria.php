<?php
$conexao = require_once 'php/conecta_mysql.php';

$sql = "SELECT * FROM seo, tipoSeo WHERE seo.idTipoSeo = tipoSeo.idTipoSeo AND descricao = 'ConhecaVL'";
$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Impossível visualizar SEO: " . mysqli_error($conexao) . '<br>');
}

if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    $title = $row['title'];
    $description = $row['description'];
    $keywords = $row['keywords'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="index,follow">
<meta name="description" content="<?php echo htmlspecialchars($description); ?>" />
<meta name="keywords" content="<?php echo htmlspecialchars($keywords); ?>" />

<title><?php echo !empty($title) ? htmlspecialchars($title) : "Conheça Vip Luxúria"; ?></title>

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
                    <div id="texto">
                        <p>O <strong>VIP LUXÚRIA</strong> é um site de anúncio classificados de acompanhantes, de produtos e serviços eróticos, direcionado para um público adulto, maior de 18 anos, que procura desfrutar momentos de prazer ao lado de acompanhantes de alto nível.</p>
                        <p>Não temos nenhum vínculo com nenhuma de nossas anunciantes no que diz respeito à prestação de serviço, muito menos fazemos seleção para entrar no site. As anunciantes têm que ser maior de idade e quanto às suas fotos, não temos como identificar se foi feito photoshop ou não.</p>
                        <p>A anunciante deverá se dirigir ao estúdio para assinar um termo de autorização de imagem munida de documentos, ou seja, todas elas existem, o que não impede elas de poder mandar outras no lugar.</p>
                        <p>Nós do Vip Luxuria aconselhamos as anunciantes a prestar um bom serviço, mas preciso que você entenda que somos contratados e não contratantes.</p>
                        <p><strong>Por exemplo: </strong>Se você olha um anúncio de uma promoção ou prestação de serviço em um jornal e esse anúncio não corresponde à verdade, o que você faz? Reclama na loja ou denuncia a loja no PROCON e não para o Jornal. O Jornal vende espaços publicitários assim como o Vip Luxúria.<br />&nbsp;</p>
                        <p>O Vip Luxuria é uma vitrine para clientes que buscam serviços e produtos eróticos. Então navegue pelo site e verifique que oferecemos bem mais que somente anúncio de acompanhantes e estamos sempre buscando trazer ferramentas novas para facilitar sua escolha. Abaixo vamos citar dicas de como usar melhor os recursos do site.</p>
                        <p>&nbsp;</p>
                        <p>A navegação do site é simples e intuitiva, todos os links para as páginas estão disponíveis no menu principal.</p>
                        <p><img src="/imagens/tutorial-vip-01.png" width="100%"  alt="Vip Luxúria - Menu Principal" /></p>
                        <p>Os anunciantes estão divididos nas seguintes categorias e sub-categorias:</p>
                        <ul>
                            <li><a href="http://vipluxuria.com/conteudo/mulheres.php" title="Vip Luxúria - Acompanhantes Mulheres" target="_blank">Acompanhantes Mulheres</a>
                                <ul>
                                    <li><a href="http://www.vipluxuria.com/Acompanhantes-Loiras" title="Vip Luxúria - Acompanhantes Loiras" target="_blank">Acompanhantes Loiras</a></li>
                                    <li><a href="http://www.vipluxuria.com/Acompanhantes-Morenas" title="Vip Luxúria - Acompanhantes Morenas" target="_blank">Acompanhantes Morenas</a></li>
                                    <li><a href="http://www.vipluxuria.com/Acompanhantes-Mulatas" title="Vip Luxúria - Acompanhantes Mulatas">Acompanhantes Mulatas</a></li>
                                    <li><a href="http://www.vipluxuria.com/Acompanhantes-ComVideo" title="Vip Luxúria - Acompanhantes com Vídeo" target="_blank">Acompanhantes com Vídeo</a></li>
                                    <li><a href="http://www.vipluxuria.com/Acompanhantes-Atende24Horas" title="Vip Luxúria - Acompanhantes que Atende 24 horas" target="_blank">Acompanhantes que Atende 24 horas</a></li>
                                </ul>
                            </li>
                            <li><a href="http://vipluxuria.com/conteudo/homens.php" title="Vip Luxúria - Acompanhantes Homens" target="_blank">Acompanhantes Homens</a></li>
                            <li><a href="http://vipluxuria.com/conteudo/transex.php" title="Vip Luxúria - Acompanhantes Transex" target="_blank">Acompanhantes Transex</a></li>
                        </ul>     
                        <p>Na categoria Acompanhantes Mulheres é possível procurar anúncios por cidades e regiões:</p>
                        <ul>
                            <li><a href="http://www.vipluxuria.com/Acompanhantes/2/Novo-Hamburgo" title="Vip Luxúria - Acompanhantes de Novo Hamburgo" target="_blank">Acompanhantes de Novo Hamburgo</a></li>
                            <li><a href="http://www.vipluxuria.com/Acompanhantes/1/Porto-Alegre" title="Vip Luxúria - Acompanhantes de Porto Alegre" target="_blank">Acompanhantes de Porto Alegre</a></li>
                            <li><a href="http://www.vipluxuria.com/Acompanhantes/6/Grande-Porto-Alegre" title="Vip Luxúria - Acompanhantes da Grande Porto Alegre" target="_blank">Acompanhantes da Grande Porto Alegre</a></li>
                            <li><a href="http://www.vipluxuria.com/Acompanhantes/3/Vale-dos-Sinos" title="Vip Luxúria - Acompanhantes do Vale dos Sinos" target="_blank">Acompanhante do Vale dos Sinos</a></li>
                            <li><a href="http://www.vipluxuria.com/Acompanhantes/5/Litoral-Gaucho" title="Vip Luxúria - Acompanhantes do Litoral Gaúcho" target="_blank">Acompanhantes do Litoral Gaúcho</a></li>
                        </ul>        

                        <img src="/imagens/tutorial-vip-02.png" alt="Vip Luxúria - Versão Mobile" width="180" height="250" align="left" class="celular" />
                        <p style="padding-top:40px; padding-left:30px; padding-right:30px; padding-bottom:20px;">A novidade do início do ano de 2014 foi a remodelação do nosso site e o lançamento versão para Smartphone. Para saber mais a respeito desta versão, acesse o <a href="http://vipluxuria.com/tutorial.php" title="Vip Luxúria - Tutorial Vip Mobile" target="_blank">tutorial do Vip Mobile</a>.</p>
                        <br/>
                        <p class="atencao">Obs.: O <strong>VIP LUXÚRIA</strong> não intermedia os contatos das empresas e/ou clientes anunciantes. As informações contidas nos anúncios são de inteira responsabilidade dos anunciantes.</p>
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
