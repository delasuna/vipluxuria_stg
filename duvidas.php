<?php
$conexao = require_once 'php/conecta_mysql.php';

$sql = "SELECT * FROM seo, tipoSeo WHERE seo.idTipoSeo = tipoSeo.idTipoSeo AND descricao = 'DuvidasFrequentes'";
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

<title><?php echo !empty($title) ? htmlspecialchars($title) : "Dúvidas Frequentes - Vip Luxúria"; ?></title>

<!--CSS-->
<link href="/css-js/estilos-2.css" rel="stylesheet" type="text/css" />
<link href="/css-js/menu-2.css" rel="stylesheet" type="text/css" />
<!--CSS-->
<!--FONTES-->
<script src="/css-js/cufon-yui.js" type="text/javascript"></script>
<script src="/css-js/nome_400.font.js" type="text/javascript"></script>
<script src="/css-js/titulo_400.font.js" type="text/javascript"></script>
<!--FONTES-->
<script>
function aparece(id){
    var el = document.getElementById(id);
    el.style.display = (el.style.display === "none") ? "block" : "none";
}
</script>
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
                    <div id="titulo-pagina"><img src="/imagens/estrutura/titulo-duvidas.png" width="760" height="41" /></div>

                    <a href="javascript:;" onclick="aparece('1');"><h4>1- O site vipluxuria.com agencia suas acompanhantes?</h4></a><a name="link1"></a><br/>
                    <span id="1" style="display: none;">O site Vip Luxuria não agencia nenhuma das acompanhantes do site. Não faz parte do nosso negócio cobrar taxa ou comissão sobre os trabalhos realizados pelas(os) nossas(os) anunciantes e os visitantes do site. As(os) modelos e demais anunciantes pagam um taxa mensal para manterem seus anúncios conosco, portanto, todas as negociações devem ser feitas diretamente com as(os) anunciantes, através de seus próprios números de telefone publicados em seus respectivos anúncios. <br/><br/></span> 

                    <a href="javascript:;" onclick="aparece('2');"><h4>2- O site vipluxuria.com anuncia menores de idade?</h4></a><a name="link2"></a><br/>
                    <span id="2" style="display: none;">Não. O site vipluxuria.com respeita o Estatuto da Criança e do Adolescente, portanto, não publica anúncios de menores de idade. Para isso, temos um rígido sistema de controle das anunciantes. Solicitamos ainda que, caso alguma pessoa tenha conhecimento, ou mesmo suspeite, de que menores de idade estão anunciando no site (no caso com documentos falsos), que nos informe para que possamos averiguar e retirá-las do ar imediatamente.<br/><br/></span>                 

                    <a href="javascript:;" onclick="aparece('3');"><h4>3- O site vipluxuria.com anuncia agências de acompanhantes?</h4></a><a name="link3"></a><br/>
                    <span id="3" style="display: none;">Sim. O site vipluxuria.com anuncia agências e agenciadores, pois foi verificado que uma parcela de modelos trabalha com uma pessoa intermediando os contatos. <br/><br/>
                    Todas as informações contidas nos anúncios de nossos clientes são de inteira responsabilidade do mesmo, sendo a Vipluxúria.com apenas um meio de publicidade no qual nossos clientes anunciam para seu público alvo.<br/><br/></span>                

                    <a href="javascript:;" onclick="aparece('4');"><h4>4- O que fazer se a acompanhante escolhida não for a mesma da foto do anúncio ou a anunciada não condizer com a verdade?</h4></a><a name="link4"></a><br/>
                    <span id="4" style="display: none;">Caso você negocie com alguma anunciante e apareça outra no lugar da mesma, recomendamos que você cancele sumariamente seu encontro e nos denuncie imediatamente (O site vipluxuria.com mantém sigilo total de todas as denúncias recebidas) para que possamos retirar a anunciante do site até que a situação seja esclarecida. A aceitação deste tipo de comportamento estimulará outras anunciantes a fazerem o mesmo. <br/><br/>
                    Para maiores informações, detalhes e dúvidas sobre esse assunto por gentileza <a href="/dicas.php"><strong>clique aqui</strong></a>.<br/><br/></span>               

                    <a href="javascript:;" onclick="aparece('5');"><h4>5- Com que periodicidade o site é atualizado?</h4></a><a name="link5"></a><br/>
                    <span id="5" style="display: none;">O site vipluxuria.com é atualizado e monitorado diariamente. Atualizamos conforme a necessidade e a entrada de novas anunciantes.<br/><br/></span>               

                    <a href="javascript:;" onclick="aparece('6');"><h4>6- De quem é a responsabilidade pelos contatos ou encontros realizados com suas anunciantes?</h4></a><a name="link6"></a><br/>
                    <span id="6" style="display: none;">Somos apenas uma empresa de classificados e não nos responsabilizamos por quaisquer problemas que houver entre visitantes e anunciantes. Portanto, recomendamos todos os cuidados possíveis em uma negociação com anunciantes de qualquer tipo que venha a anunciar serviços na internet.<br/><br/>
                    Para maiores informações, detalhes e dúvidas sobre esse assunto por gentileza <a href="/dicas.php"><strong>clique aqui</strong></a>.<br/><br/></span>               

                    <a href="javascript:;" onclick="aparece('7');"><h4>7- Como melhor devo proceder ao contratar ou escolher uma anunciante do site para sair?</h4></a><a name="link7"></a><br/>
                    <span id="7" style="display: none;">Para maiores informações, detalhes e dúvidas sobre esse assunto por gentileza <a href="/dicas.php"><strong>clique aqui</strong></a>.<br/><br/></span>                

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
