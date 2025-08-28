<?php
$conexao = require_once 'php/conecta_mysql.php';

// SEO
$sql = "SELECT * FROM seo, tipoSeo WHERE seo.idTipoSeo = tipoSeo.idTipoSeo AND descricao = 'VipEnquetes'";
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-BR" xml:lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="robots" content="index,follow">
<meta name="description" content="<?php echo htmlspecialchars($description); ?>" />
<meta name="keywords" content="<?php echo htmlspecialchars($keywords); ?>" />

<title><?php echo !empty($title) ? htmlspecialchars($title) : "Vip Enquetes"; ?></title>

<!--CSS-->
<link href="/css-js/estilos-2.css" rel="stylesheet" type="text/css" />
<link href="/css-js/menu-2.css" rel="stylesheet" type="text/css" />
<!--FONTES-->
<script src="/css-js/cufon-yui.js" type="text/javascript"></script>
<script src="/css-js/nome_400.font.js" type="text/javascript"></script>
<script src="/css-js/titulo_400.font.js" type="text/javascript"></script> 

<script> 
function marcaVoto(idEnquete) { 
    document.formulario.enviando.value = "S";
    document.formulario.idEnquete.value = idEnquete;

    var marcouAlternativa = false;

    for(var i=0;i<document.formulario.alternativa.length;i++) {        
        if(document.formulario.alternativa[i].checked) {            
            document.formulario.voto.value = document.formulario.alternativa[i].id;        
            marcouAlternativa = true;
        }    
    }    

    if (marcouAlternativa)
        document.formulario.submit();
    else 
        alert("Selecione uma das alternativas!");
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
                    <div id="titulo-pagina"><img src="/imagens/estrutura/titulo-vip-enquetes.png" width="760" height="41" /></div>
                    
                    <!-- Inicio Enquete -->
                    <form name="formulario" method="post" action="/vip-enquetes/">  
                        <input type="hidden" name="idEnquete" value=""> 
                        <input type="hidden" name="enviando" value="">
                        <input type="hidden" name="voto" value="">

                        <?php
                        $sql = "SELECT * FROM enquete WHERE flagAtivo = 'S' ORDER BY idEnquete DESC";
                        $resultado = mysqli_query($conexao, $sql);

                        if (!$resultado) {
                            die("Impossível visualizar as enquetes: " . mysqli_error($conexao) . '<br>');
                        }

                        $contador = 0;

                        if (mysqli_num_rows($resultado) > 0) {
                            while ($row = mysqli_fetch_assoc($resultado)) {
                                $idEnquete = $row['idEnquete'];
                                $pergunta = $row['pergunta'];    
                                $alternativa1 = $row['alternativa1'];
                                $alternativa2 = $row['alternativa2'];
                                $alternativa3 = $row['alternativa3'];
                                $alternativa4 = $row['alternativa4'];
                                
                                $contador++;
                        ?>
                                <div class='enquete'>
                                    <p class="pergunta"><?php echo htmlspecialchars($pergunta); ?></p>
                                    <p>
                                        <?php if ($alternativa1 != "") { ?>                                
                                            <label>
                                                <input type="radio" name="alternativa" id="valor1" style="cursor:pointer;"> 
                                                <?php echo htmlspecialchars($alternativa1); ?>
                                            </label><br>
                                        <?php } ?>
                                        <?php if ($alternativa2 != "") { ?>
                                            <label>                                
                                                <input type="radio" name="alternativa" id="valor2" style="cursor:pointer;"> 
                                                <?php echo htmlspecialchars($alternativa2); ?>
                                            </label><br>
                                        <?php } ?>
                                        <?php if ($alternativa3 != "") { ?>
                                            <label>                                
                                                <input type="radio" name="alternativa" id="valor3" style="cursor:pointer;"> 
                                                <?php echo htmlspecialchars($alternativa3); ?>
                                            </label><br>
                                        <?php } ?>
                                        <?php if ($alternativa4 != "") { ?>
                                            <label>
                                                <input type="radio" name="alternativa" id="valor4" style="cursor:pointer;"> 
                                                <?php echo htmlspecialchars($alternativa4); ?>
                                            </label><br>
                                        <?php } ?>
                                    </p>
                                    
                                    <input name="votar" type="button" onclick="marcaVoto('<?php echo $idEnquete; ?>')" value="Votar" class="btn_votar">
                                    <p class="resultado">
                                        <a href="#" onclick="window.open('/resultado_enquete.php?idEnquete=<?php echo $idEnquete; ?>','','location=0,status=1,scrollbars=1,toolbar=0,resizable=1,width=650,height=350');" target="_self" class="titulo">Resultado Parcial</a>
                                    </p>
                                </div>
                        <?php
                                if ($contador > 2) {
                                    $contador = 0;
                                    echo "<div class='clear'></div>";
                                } 
                            }
                        }
                        ?>
                    </form>

                    <div class="clear"></div>
                    <?php include("php/banner-enquetes.php"); ?>                
                </div><!--COLUNA-FULL-->
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

<?php
if (isset($_POST["enviando"]) && $_POST["enviando"] == "S") {
    $idEnquete = $_POST["idEnquete"]; 
    $voto = $_POST["voto"];     
    
    if ($voto != "") {
        $sql = "UPDATE enquete SET `$voto` = `$voto` + 1, totalValor = totalValor + 1 WHERE idEnquete = $idEnquete"; 
        mysqli_query($conexao, $sql);
        echo "<script>alert('Obrigado pelo seu voto!');</script>";
    }
}
?>

<script type="text/javascript"> Cufon.now(); </script>
<?php include("php/google.php"); ?>
</body>
</html>
