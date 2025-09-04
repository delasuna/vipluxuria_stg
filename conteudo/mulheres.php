<?php
$conexao = require_once '../php/conecta_mysql.php';

// --- Função anti_injection atualizada ---
function anti_injection($str) {
    $str = trim($str);
    $str = strip_tags($str);
    $str = addslashes($str);
    return $str;
}

// --- SEO ---
$whereSEO = " descricao = 'Home' ";
if (!empty($_REQUEST["flagTipo"])) {
    $flag = anti_injection($_REQUEST["flagTipo"]);
    $map = [
        "Loiras"        => "descricao = 'Loiras'",
        "Morenas"       => "descricao = 'Morenas'",
        "Mulatas"       => "descricao = 'Mulatas'",
        "Atende24Horas" => "descricao = 'Atende24Horas'",
        "ComVideo"      => "descricao = 'ComVideo'",
        "ComLocal"      => "descricao = 'ComLocal'",
        "SexoVirtual"   => "descricao = 'SexoVirtual'"
    ];
    if (isset($map[$flag])) {
        $whereSEO = $map[$flag];
    }
}

$sql = "SELECT * FROM seo, tipoSeo WHERE seo.idTipoSeo = tipoSeo.idTipoSeo AND $whereSEO";
$resultado = mysqli_query($conexao, $sql) or die("Impossível visualizar SEO: " . mysqli_error($conexao));

$title = $description = $keywords = "";
if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    $title = $row['title'];
    $description = $row['description'];
    $keywords = $row['keywords'];
}
mysqli_free_result($resultado);

// --- Cidade ---
$cidade = "Porto Alegre";
if (!empty($_REQUEST["idCidade"])) {
    $idCidade = (int) $_REQUEST["idCidade"];
    $sql = "SELECT cidade FROM cidade WHERE idCidade = $idCidade";
    $resultado = mysqli_query($conexao, $sql) or die("Impossível visualizar as cidades: " . mysqli_error($conexao));
    if ($row = mysqli_fetch_assoc($resultado)) {
        $cidade = $row['cidade'];
    }
    mysqli_free_result($resultado);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<?php include '../head.php'; ?>
<body>
<div id="wrap">
    <div id="bg-rosa">
        <div id="menu"><?php include("../php/menu-2.php"); ?></div>
        <div id="topo"><?php include("../php/topo-2.php"); ?></div>
    </div>
    <?php include '../filters.php' ?>
    <div id="bg-couro">
        <div id="principal">
            <div id="principal-content-full">
                <div id="coluna-full">
                    <div id="titulo-pagina"><img src="/imagens/estrutura/titulo-mulheres-2.png" width="760" height="41" /></div>

                    <?php if (!empty($_REQUEST["flagTipo"]) && anti_injection($_REQUEST["flagTipo"]) == "SexoVirtual"): ?>
                    <div id="nota">
                        <p>Este espaço é destinado a destacar as acompanhantes que fazem shows privados pelo WhatsApp e venda de pacote de fotos, venda de vídeos!
                        E é tudo muito simples. Chame a garota de sua preferência, combine as condições e usufrua de sua companhia virtual!</p><br>
                        <p><i><strong>Consulte diretamente com a anunciante os serviços oferecidos por ela!</strong></i></p>
                    </div>
                    <?php endif; ?>

                    <ul id="thumbs-full">
                    <?php
                    $where = " WHERE flagAtivo = 'Sim' ";
                    if (!empty($_REQUEST["nome"])) {
                        $nome = mysqli_real_escape_string($conexao, $_REQUEST["nome"]);
                        $where .= " AND nomeURL LIKE '%$nome%'";
                    }

                    $flagTipo = !empty($_REQUEST["flagTipo"]) ? anti_injection($_REQUEST["flagTipo"]) : "";
                    switch ($flagTipo) {
                        case "Loiras":        $where .= " AND flagTipo = 'Lo' "; break;
                        case "Morenas":       $where .= " AND flagTipo = 'Mo' "; break;
                        case "Mulatas":       $where .= " AND flagTipo = 'Mu' "; break;
                        case "Atende24Horas": $where .= " AND flagAtende24Horas = 'Sim' "; break;
                        case "ComVideo":      $where .= " AND flagTemVideo = 'Sim' "; break;
                        case "ComLocal":      $where .= " AND atendoLocalProprio = 'Sim' "; break;
                        case "SexoVirtual":   $where .= " AND flagSexoVirtual = 'S' "; break;
                    }

                    if (!empty($_REQUEST["idCidade"])) {
                        $idCidade = (int) $_REQUEST["idCidade"];
                        $sql = "SELECT mulher.* FROM mulher
                                JOIN mulherCidade ON (mulher.idMulher = mulherCidade.idMulher AND mulherCidade.idCidade = $idCidade)
                                $where
                                ORDER BY flagPreferencial DESC, RAND()";
                    } else {
                        $sql = "SELECT * FROM mulher
                                $where
                                ORDER BY flagPreferencial DESC, RAND()";
                    }

                    $resultado = mysqli_query($conexao, $sql) or die("Impossível visualizar as anunciantes: " . mysqli_error($conexao));
                    $contador = 0;
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $idMulher = $row['idMulher'];
                        $nome = htmlspecialchars($row['nome']);
                        $sobrenome = htmlspecialchars($row['sobrenome']);
                        $imagemCapa = htmlspecialchars($row['imagemCapa']);
                        $contador++;

                        $nomeUrl = tirarAcentos($nome);
                        if ($sobrenome != "") {
                            $nomeUrl .= "-" . tirarAcentos(str_replace(" ", "-", $sobrenome));
                        }
                        ?>
                        <li<?= ($contador % 5 == 0 ? ' class="last"' : '') ?>>
                            <a href="/perfil/<?= $idMulher ?>/<?= $nomeUrl ?>">
                                <img src="/sistema/content/<?= $imagemCapa ?>" width="112" height="149" />
                                <p class="nome"><?= $nome ?> <?= $sobrenome ?></p>
                            </a>
                        </li>
                        <?php
                    }
                    mysqli_free_result($resultado);
                    ?>
                    </ul>

                    <div class="clear"></div>
                    <?php include("../php/destaques-2020.php"); ?>
                    <br><br>
                    <div class="bt-voltar"><a href="javascript:window.history.go(-1)"><img src="/imagens/estrutura/bt-voltar.png" /></a></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div id="rodape"><?php include("../php/rodape-2.php"); ?></div>
    <div id="tags"><?php include("../php/tags-mulheres.php"); ?></div>
</div>
<script>Cufon.now();</script>
<?php include("../php/google.php"); ?>
</body>
</html>
