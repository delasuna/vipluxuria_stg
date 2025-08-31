<?php
require_once("verifica.php");
include("../inc/common.php");

$conn = new db();
$conn->open();

// Determina a página a ser exibida
$pg = getParam("pagina") ?: 1;

// Limpa ordenação e filtro
if (getParam("clear") == 1) {
    setSession("sOrder2", "");
    setSession("where", "");
    setSession("pagina_atual", "");
    setSession("numeroRegistros", "");
}

// Define número de registros por página
if (getParam("numeroRegistros") != "") {
    setSession("numeroRegistros", getParam("numeroRegistros"));
}

// Salva status da página atual
$mesma_pagina = ($_SERVER['PHP_SELF'] == getSession("pagina_atual"));
if (!$mesma_pagina) {
    setSession("pagina_atual", $_SERVER['PHP_SELF']);
}

// Ordenação
$iSort = getParam("Sorting");
$iSorted = getParam("Sorted");

if ((!$iSort) && (!$mesma_pagina)) {
    if (getSession("sOrder2") == "") {
        $iSort = 2;
        $iSorted = "";
    }
}

if ($iSort) {
    $sDirection = ($iSort == $iSorted) ? " DESC" : " ASC";
    $sSortParams = "Sorting={$iSort}&Sorted=" . (($iSort == $iSorted) ? $iSort : "") . "&";

    if ($iSort == 2) setSession("sOrder2", " ORDER BY descricao $sDirection");
    if ($iSort == 3) setSession("sOrder2", " ORDER BY title $sDirection");
}

// Executa a query
$sql = "SELECT * FROM seo 
        INNER JOIN tipoSeo ON seo.idTipoSeo = tipoSeo.idTipoSeo"
        . getSession("sOrder2");

// Número de registros
if (getSession("numeroRegistros") == "Todos") {
    $rs = new query($conn, $sql);
    $numeroRegistros = $rs->numrows();
} else {
    $numeroRegistros = getSession("numeroRegistros") ?: 15;
    $rs = new query($conn, $sql, $pg, $numeroRegistros);
}

// Paginação
$pg_ant = $pg - 1;
$pg_prox = $pg + 1;

// Função de exclusão
$excluirJS = "if(confirm('Excluir registros selecionados?')) { document.frm.action='seo_excluir.php'; document.frm.submit(); }";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="index,follow">
    <meta name="description" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS">
    <meta name="keywords" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS">
    <title>Vip Luxúria - SEO</title>

    <link href="/sistema/content/css-js/estilos-sistema.css" rel="stylesheet">
    <link href="/sistema/content/css-js/menu-sistema.css" rel="stylesheet">
    <link href="../css/config.css" rel="stylesheet">
    <link href="../css/text.css" rel="stylesheet">
    <link href="../css/lightbox.css" rel="stylesheet" media="screen">
    <link href="../css/content_sis.css" rel="stylesheet">
    <link href="../css/header_sis.css" rel="stylesheet">

    <script src="../imagens/js/prototype.js"></script>
    <script src="../imagens/js/scriptaculous.js?load=effects"></script>
    <script src="../imagens/js/lightbox.js"></script>
    <script src="../js/checkall.js"></script>
    <script src="/css-js/cufon-yui.js"></script>
    <script src="/css-js/Bauhaus_Md_BT_400.font.js"></script>
    <script src="/css-js/functions.js"></script>

    <script>
        Cufon.replace('#navmenu-h, #slogan, h1, h2, h3, h4, .menu-rodape');

        function excluir() {
            <?= $excluirJS ?>
        }
    </script>
</head>
<body>
<a name="inicio"></a>
<div class="voltar-inicio">
    <a href="#inicio"><img src="/imagens/base/seta-topo.png" alt="Retornar Topo" width="30" height="30"></a>
</div>
<div id="tudo">
    <div id="conteudo">
        <div id="topo"><?php include("php/topo-sistema.php"); ?></div>
        <div id="header"><?php include("php/header-sistema.php"); ?></div>
        <div id="menu"><?php include("php/menu-sistema.php"); ?></div>
        <div id="titulo">
            <h1>SEO</h1>
            <div class="traco"></div>
        </div>

        <div id="principal">
            <div id="principal-topo"></div>
            <div id="principal-content">
                <div id="coluna-esquerda-full">

                    <?php pageTitle("", "Lista"); ?>

                    <!-- Form para seleção de registros por página -->
                    <form name="form2" method="post" action="seo_lista.php">
                        <div align="right">
                            <table height="5">
                                <tr>
                                    <td class="LabelFONT">
                                        <input type="hidden" name="rodou" value="s">
                                        Registros por página:
                                    </td>
                                    <td class="campoSelect">
                                        <select name="numeroRegistros">
                                            <option value="Todos">Todos</option>
                                            <option value="15" <?= ($numeroRegistros == 15 ? "selected" : "") ?>>15</option>
                                            <option value="30" <?= ($numeroRegistros == 30 ? "selected" : "") ?>>30</option>
                                            <option value="60" <?= ($numeroRegistros == 60 ? "selected" : "") ?>>60</option>
                                        </select>
                                    </td>
                                    <td><input type="button" value="OK" onclick="document.form2.submit();" style="cursor:pointer;"></td>
                                </tr>
                            </table>
                        </div>
                    </form>

                    <!-- Ações -->
                    <div class='acoes2'>
                        <table width="100%">
                            <tr>
                                <td>
                                    <a class='botao' href='seo_edicao.php'>Novo</a>
                                    <a class='botao' href='javascript:excluir()'>Excluir</a>
                                </td>
                                <td align="right">
                                    <?php if ($pg > 1): ?>
                                        <a class='botao' href='<?= $_SERVER['PHP_SELF'] ?>?pagina=<?= $pg_ant ?>'>Anterior</a>
                                    <?php endif; ?>
                                    <?php if ($pg < $rs->totalpages()): ?>
                                        <a class='botao' href='<?= $_SERVER['PHP_SELF'] ?>?pagina=<?= $pg_prox ?>'>Próximo</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <!-- Lista de registros -->
                    <div align="center">
                        <form name="frm" method="post">
                            <?php
                            if ($rs->numrows() > 0) {
                                echo "<table width='100%' border='0'>
                                        <tr>
                                            <td class='DataFONT' align='right'>Página $pg de " . $rs->totalpages() . "</td>
                                            <td class='DataFONT' align='right'>Foram encontrados " . $rs->numrows() . " registros.</td>
                                        </tr>
                                      </table>";
                            } else {
                                echo "<div class='DataFONT'>Nenhum registro encontrado!</div>";
                            }

                            $table = new Table("", "100%", 4);
                            $table->addColumnHeader('<input type="checkbox" name="checkall" onclick="CheckAll()">');
                            $table->addColumnHeader("Tipo SEO", true, "40%", "L");
                            $table->addColumnHeader("Title", true, "60%", "L");
                            $table->addRow();

                            while ($rs->getrow()) {
                                $id = $rs->field("idSeo");
                                $table->addData("<input type='checkbox' name='sel[]' value='$id'>");
                                $table->addData(addLink($rs->field("descricao"), "seo_edicao.php?id=$id&pagina=$pg", "Clique para consultar ou editar registro"));
                                $table->addData(addLink($rs->field("title"), "seo_edicao.php?id=$id&pagina=$pg", "Clique para consultar ou editar registro"));
                                $table->addRow();
                            }

                            if ($rs->numrows() > 0) {
                                echo $table->writeHTML();
                                echo "<table width='100%' border='0'>
                                        <tr>
                                            <td class='DataFONT' align='right'>Página $pg de " . $rs->totalpages() . "</td>
                                            <td class='DataFONT' align='right'></td>
                                        </tr>
                                      </table>";
                            }
                            ?>
                        </form>
                    </div>

                </div>
            </div>

            <div id="principal-rodape"></div>
            <div class="clear"></div>
        </div>
    </div>

    <div id="rodape">
        <div class="traco"></div>
        <div id="rodape-content">
            <?php include("php/menu-rodape-sistema.php"); ?>
        </div>
    </div>
</div>

<script>
    Cufon.now();
</script>

</body>
</html>
<?php
$conn->close();
?>
