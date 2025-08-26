<?php $conexao = require_once '../php/conecta_mysql.php'; ?>

<?php
$sql = "SELECT * FROM seo 
        INNER JOIN tipoSeo ON seo.idTipoSeo = tipoSeo.idTipoSeo 
        WHERE descricao = 'Transex'";

$resultado = mysqli_query($conexao, $sql);
if (!$resultado) {
    die("Impossível visualizar SEO: " . mysqli_error($conexao) . '<br>');
}

if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    $title = $row['title'];
    $description = $row['description'];
    $keywords = $row['keywords'];
} else {
    $title = "Transex - Vip Luxúria";
    $description = "";
    $keywords = "";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="robots" content="index,follow">
<meta name="description" content="<?php echo htmlspecialchars($description); ?>" />
<meta name="keywords" content="<?php echo htmlspecialchars($keywords); ?>" />

<title><?php echo htmlspecialchars($title); ?></title>

<!--CSS-->
<link href="../css-js/estilos-2.css" rel="stylesheet" type="text/css" />
<link href="../css-js/menu-2.css" rel="stylesheet" type="text/css" />
<!--CSS-->
<!--FONTES-->
<script src="../css-js/cufon-yui.js" type="text/javascript"></script>
<script src="../css-js/nome_400.font.js" type="text/javascript"></script>
<script src="../css-js/titulo_400.font.js" type="text/javascript"></script>
<script type="text/javascript">
    Cufon.replace('h1');
    Cufon.replace('h1#titulo,#menu-rodape-content',{ fontFamily: 'titulo' }); 
</script>
<!--SLIDER-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="../css-js/jquery.bxslider.min.js"></script>
<link href="../css-js/jquery.bxslider.css" rel="stylesheet" />
<!--SLIDER-->  

<script>
function carregaPerfil(id) {
    document.form_perfil.id.value = id;
    document.form_perfil.submit();
}
</script>    

</head>

<body>
<div id="wrap">
    <div id="bg-rosa">
        <div id="topo">
            <?php include("../php/topo-2.php"); ?>
        </div>
        <div id="menu">
            <?php include("../php/menu-2.php"); ?>
        </div>
    </div>
    <div id="bg-couro">    
        <div id="principal">
            <div id="principal-content-full">
                <div id="coluna-full" style="padding-top:20px;">
                    <?php include("../php/slider-transex.php"); ?>
                    <br/>
                    <div id="titulo-pagina"><img src="/imagens/estrutura/titulo-transex.png" width="760" height="41" /></div>
                    <ul id="thumbs-transex">
<?php
$sql = "SELECT * FROM transex WHERE flagAtivo = 'Sim' ORDER BY RAND()";
$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Impossível visualizar as anunciantes: " . mysqli_error($conexao) . '<br>');
}

$contador = 0;
$comAcentos = ['à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú'];
$semAcentos = ['a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','O','U','U','U'];

while ($row = mysqli_fetch_assoc($resultado)) {
    $idTransex = $row['idTransex'];
    $nome = $row['nome'];
    $sobrenome = $row['sobrenome'];
    $imagemComNome = $row['imagemComNome'];
    $contador++;

    $nomeURL = str_replace($comAcentos, $semAcentos, $nome);
    if ($sobrenome != "") {
        $nomeURL .= "-" . str_replace(" ", "-", str_replace($comAcentos, $semAcentos, $sobrenome));
    }

    $liClass = ($contador < 6) ? "zoom_img" : "last zoom_img";
    if ($contador >= 6) $contador = 0;
    ?>
    <li class="<?php echo $liClass; ?>">
        <a href="/perfil-transex/<?php echo $idTransex; ?>/<?php echo $nomeURL; ?>">
            <img src="<?php echo "/sistema/content/".$imagemComNome; ?>" width="112" height="149" />
            <p class="nome"><?php echo $nome." ".$sobrenome; ?></p>
        </a>
    </li>
    <?php
}
?>
                    </ul>
                    <div class="clear"></div>
                    <div class="bt-voltar"><a href="javascript:window.history.go(-1)"><img src="/imagens/estrutura/bt-voltar.png" /></a></div>
                </div>
                <div id="coluna-2"></div>
                <div class="clear"></div>

                <div id="box-texto">
                    <h2>Transex</h2>
                    <p>Nessa pagina do Vip Luxúria você vai encontrar as mas belas transex de Porto Alegre e grande Poa!</p><br>
                    <p>As mas belas transex para atendimento em Porto Alegre com local ou para atendimento em hotéis e motéis, disponíveis para sexo e serviços eróticos. Veja fotos e vídeos reais e entre em contato diretamente com a T-gata de sua escolha!</p>
                </div>                                

            </div><!--PRINCIPAL CONTENT-->
        </div><!--PRINCIPAL-->
    </div><!--BG-COURO-->
    <div id="rodape">
        <?php include("../php/rodape-2.php"); ?>
    </div>
    <div id="tags">
        <?php include("../php/tags-transex.php"); ?>
    </div>
</div><!--wrap-->
<script type="text/javascript"> Cufon.now(); </script>
<?php include("../php/google.php"); ?>
</body>
</html>
