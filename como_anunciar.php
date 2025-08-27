<?php
$conexao = require_once 'php/conecta_mysql.php';

// SEO - Saiba Como Anunciar
$sql_seo = "SELECT * FROM seo 
            INNER JOIN tipoSeo ON seo.idTipoSeo = tipoSeo.idTipoSeo 
            WHERE descricao = 'SaibaComoAnunciar'";

$resultado_seo = mysqli_query($conexao, $sql_seo);
if (!$resultado_seo) {
    die("Impossível visualizar SEO: " . mysqli_error($conexao));
}

$seo = mysqli_fetch_assoc($resultado_seo);
$title = $seo['title'] ?? '';
$description = $seo['description'] ?? '';
$keywords = $seo['keywords'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="robots" content="index,follow">
<meta name="description" content="<?= htmlspecialchars($description) ?>">
<meta name="keywords" content="<?= htmlspecialchars($keywords) ?>">

<title><?= htmlspecialchars($title) ?></title>

<!--CSS-->
<link href="/css-js/estilos-2.css" rel="stylesheet" type="text/css">
<link href="/css-js/menu-2.css" rel="stylesheet" type="text/css">

<!--FONTES-->
<script src="/css-js/cufon-yui.js" type="text/javascript"></script>
<script src="/css-js/nome_400.font.js" type="text/javascript"></script>
<script src="/css-js/titulo_400.font.js" type="text/javascript"></script>

<!--SLIDER-->
<link rel="stylesheet" href="/css-js/slider/lightbox/lightbox.css" media="screen"/>
<link rel="stylesheet" href="/css-js/slider/slider-rows.css">
<script src="/css-js/slider/lightbox/modernizr.custom.js"></script>
<script src="/css-js/slider/slider-rows.js"></script>
</head>
<body>
<div id="wrap">
    <div id="bg-rosa">
        <div id="topo"><?php include("php/topo-2.php"); ?></div>
        <div id="menu"><?php include("php/menu-2.php"); ?></div>
    </div>

    <div id="bg-couro">
        <div id="principal">
            <div id="principal-content-full">
                <div id="coluna-full">
                    <div id="titulo-pagina">
                        <img src="/imagens/estrutura/titulo-como-anunciar.png" width="760" height="41" />
                    </div>

                    <p>Por favor, leia com atenção até o final o texto abaixo.</p>
                    <p>
                        <img src="/imagens/estrutura/ligue.png" width="300" height="182" align="right">
                        <strong>Para anunciar no Vip Luxúria é muito fácil.</strong>
                        Você deve entrar em contato via WhatsApp para agendar um horário, onde faremos um 
                        <strong>CONTRATO DE AUTORIZAÇÃO DE DIREITO DE USO DE IMAGEM* entre as partes</strong>, 
                        onde <strong>VOCÊ</strong> autoriza o uso das suas fotos no site, declara ser maior de idade 
                        e estar ciente que está colocando suas fotos em um site de anúncios de acompanhantes por vontade própria. 
                        Junto com o contrato será anexado uma cópia do documento de identidade ou carteira de motorista para comprovação dos dados informados.
                    </p>
                    <p><em>* Documento é para uso confidencial e exclusivo do site.</em></p>

                    <script>
                        function aparece(id) {
                            const el = document.getElementById(id);
                            el.style.display = (el.style.display === "none") ? "block" : "none";
                        }
                    </script>

                    <h4 style="text-align:center; font-size:18px; color:#FFF;">
                        OBS: O <strong>Único número</strong> de contato do site Vip Luxúria é o (51) 98144-0470<br>
                        Qualquer outro número falando ser do site é golpe!
                    </h4>

                    <br><br>
                    <a href="javascript:;" onclick="aparece('1');">
                        <h4 style="text-align:center; font-size:24px; color:#FD7AA4;">
                            Quais as vantagens em anunciar no site vipluxuria.com?
                        </h4>
                    </a>
                    <a name="link1"></a>
                    <br>

                    <div id="1" style="display:none; padding-left:50px; padding-right:40px;">
                        <ul>
                            <li>No Vip Luxúria, você tem a oportunidade de divulgar seus serviços diretamente ao seu público alvo, de forma dinâmica e diferenciada.</li>
                            <li>Para as acompanhantes, a negociação é diretamente com o interessado, recebendo o contato do cliente direto em seu telefone, sem intermediações nem comissões.</li>
                            <li>Você publica seu anúncio e o cliente negocia direto com você.</li>
                            <li>Contamos com uma divulgação de mídia planejada, para que você tenha o máximo de retorno ao anunciar conosco.</li>
                            <li>Divulgação em nível regional e nacional.</li>
                            <li>Estamos também nos principais sites de busca como o Google, através de palavras chaves como, por exemplo: "acompanhantes porto alegre".</li>
                            <li>Melhor custo-benefício: ao contrário do alcance restrito dos jornais impressos, seu anúncio alcançará o mundo inteiro por um custo bem menor.</li>
                            <li>Forneça seu perfil detalhado, formas de contato de seus serviços, características físicas, fotos, vídeos e endereços.</li>
                            <li>Altere seu anúncio quando desejar. Solicite alteração do seu perfil ou fotos e nossa equipe o fará em dias úteis em até 72 horas.</li>
                        </ul>
                    </div>

                </div><!--coluna-full-->
                <div class="clear"></div>
            </div><!--PRINCIPAL CONTENT FULL-->
        </div><!--PRINCIPAL-->
    </div><!--BG-COURO-->

    <div id="rodape"><?php include("php/rodape-2.php"); ?></div>
    <div id="tags"><?php include("php/tags-moteis.php"); ?></div>
</div><!--wrap-->

<script type="text/javascript"> Cufon.now(); </script>
<?php include("php/google.php"); ?>
</body>
</html>
