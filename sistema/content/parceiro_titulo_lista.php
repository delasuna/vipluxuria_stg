<?php require_once("verifica.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="index,follow">
    <meta name="description" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS">
    <meta name="keywords" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS">

    <title>Vip Luxúria - Acompanhantes Porto Alegre</title>

    <!-- CSS Principais -->
    <link href="/sistema/content/css-js/estilos-sistema.css" rel="stylesheet">
    <link href="/sistema/content/css-js/menu-sistema.css" rel="stylesheet">
    <link href="../css/config.css" rel="stylesheet">
    <link href="../css/text.css" rel="stylesheet">
    <link href="../css/lightbox.css" rel="stylesheet" media="screen">
    <link href="../css/content_sis.css" rel="stylesheet">
    <link href="../css/header_sis.css" rel="stylesheet">

    <!-- Scripts Principais -->
    <script src="../imagens/js/prototype.js"></script>
    <script src="../imagens/js/scriptaculous.js?load=effects"></script>
    <script src="../imagens/js/lightbox.js"></script>
    <script src="../js/checkall.js"></script>
    <script src="/css-js/functions.js"></script>

    <!-- Cufon -->
    <script src="/css-js/cufon-yui.js"></script>
    <script src="/css-js/Bauhaus_Md_BT_400.font.js"></script>
    <script>
        Cufon.replace('#navmenu-h');
        Cufon.replace('#slogan');
        Cufon.replace('h1, h2, h3, h4');
        Cufon.replace('.menu-rodape');
    </script>
</head>
<body>
<a name="inicio"></a>
<div class="voltar-inicio">
    <a href="#inicio"><img src="/imagens/base/seta-topo.png" alt="Retornar Topo da Página" width="30" height="30"></a>
</div>

<div id="tudo">
    <div id="conteudo">
        <div id="topo">
            <div id="topo-content">
                <?php include("php/topo-sistema.php"); ?>
            </div>
        </div>

        <div id="header">
            <div id="header-content">
                <?php include("php/header-sistema.php"); ?>
            </div>
        </div>

        <div id="menu">
            <div id="menu-content">
                <?php include("php/menu-sistema.php"); ?>
            </div>
        </div>

        <div id="titulo">
            <div id="titulo-content">
                <h1>Parceiros - Título</h1>
            </div>
            <div class="traco"></div>
        </div>

        <div id="principal">
            <div id="principal-topo"></div>
            <div id="principal-content">
                <div id="coluna-esquerda-full">
                    <?php
                        include("../inc/common.php");
                        pageTitle("", "Lista");

                        $conn = new db();
                        $conn->open();

                        $pg = getParam("pagina") ?: 1;

                        if (getParam("clear") == 1) {
                            setSession("sOrder", "");
                            setSession("where", "");
                            setSession("pagina_atual", "");
                            setSession("numeroRegistros", "");
                        }

                        if (getParam("numeroRegistros") != "") {
                            setSession("numeroRegistros", getParam("numeroRegistros"));
                        }

						$pagina_atual = getSession("pagina_atual");
                        $mesma_pagina = ($_SERVER['PHP_SELF'] == $pagina_atual);
                        if (!$mesma_pagina) {
                            setSession("pagina_atual", $_SERVER['PHP_SELF']);
                        }

                        $iSort = getParam("Sorting");
                        $iSorted = getParam("Sorted");
                        if ((!$iSort) && (!$mesma_pagina)) {
                            $form_sorting = "";
                            if (getSession("sOrder") == "") {
                                $iSort = 2;
                                $iSorted = "";
                            }
                        }

                        if ($iSort) {
                            if ($iSort == $iSorted) {
                                $form_sorting = "";
                                $sDirection = " DESC";
                                $sSortParams = "Sorting=" . $iSort . "&Sorted=" . $iSort . "&";
                            } else {
                                $form_sorting = $iSort;
                                $sDirection = " ASC";
                                $sSortParams = "Sorting=" . $iSort . "&Sorted=&";
                            }

                            if ($iSort == 2) setSession("sOrder", " ORDER BY titulo" . $sDirection);
                        }

                        $sql = "SELECT * FROM parceirotitulo " . getSession("sOrder");

                        if (getSession("numeroRegistros") == "Todos") {
                            $rs = new query($conn, $sql);
                            $numeroRegistros = $rs->numrows();
                        } else if (getSession("numeroRegistros") != "") {
                            $numeroRegistros = getSession("numeroRegistros");
                        } else {
                            $numeroRegistros = 15;
                        }

                        $rs = new query($conn, $sql, $pg, $numeroRegistros);
                        $pg_ant = $pg - 1;
                        $pg_prox = $pg + 1;
                    ?>

                    <form name="form2" method="post" action="parceiro_titulo_lista.php">
                        <div align="right">
                            <table height="5px">
                                <tr>
                                    <td class="LabelFONT">
                                        <input type="hidden" name="rodou" value="s">
                                        Registros por página:
                                    </td>
                                    <td class="campoSelect">
                                        <select name="numeroRegistros">
                                            <option value="Todos">Todos</option>
                                            <option value="15" <?php if (getParam("numeroRegistros") == 15 || getSession("numeroRegistros") == 15 || getSession("numeroRegistros") == "") echo "selected"; ?>>15</option>
                                            <option value="30" <?php if (getParam("numeroRegistros") == 30 || getSession("numeroRegistros") == 30) echo "selected"; ?>>30</option>
                                            <option value="60" <?php if (getParam("numeroRegistros") == 60 || getSession("numeroRegistros") == 60) echo "selected"; ?>>60</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="button" value=" OK " onclick="document.form2.submit()" style="cursor:pointer;">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>

                    <div class='acoes2'>
                        <table width="100%">
                            <tr>
                                <td>
                                    <a class='botao' href='parceiro_titulo_edicao.php'>&nbsp;Novo&nbsp;</a>
                                    <a class='botao' href='javascript:excluir()'>&nbsp;Excluir&nbsp;</a>
                                </td>
                                <td align="right">
                                    <?php if ($pg > 1) { ?>
                                        <a class='botao' href='<?php echo $_SERVER['PHP_SELF']."?pagina=$pg_ant"; ?>'>&nbsp;<?=LISTA_ANTERIOR?>&nbsp;</a>
                                    <?php } ?>
                                    <?php if ($pg < $rs->totalpages()) { ?>
                                        <a class='botao' href='<?php echo $_SERVER['PHP_SELF']."?pagina=$pg_prox"; ?>'>&nbsp;<?=LISTA_PROXIMO?>&nbsp;</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div align="center">
                        <form name="frm" method="post">
                            <?php
                                if ($rs->numrows() > 0) {
                                    echo "<table width='100%' border='0'>";
                                    echo "<tr>";
                                    echo "<td class='DataFONT' align='right' width='53%'>&nbsp;Página $pg de ".$rs->totalpages()."</td>";
                                    echo "<td class='DataFONT' align='right' width='47%'>&nbsp;".($rs->numrows() == 1 ? "Foi encontrado 1 registro." : "Foram encontrados ".$rs->numrows()." registros.")."</td>";
                                    echo "</tr>";
                                    echo "</table>";
                                } else {
                                    echo "<div class='DataFONT'>Nenhum registro encontrado!</div>";
                                }

                                $table = new Table("", "100%", 4);
                                $table->addColumnHeader("<input type=\"checkbox\" name=\"checkall\" onclick=\"CheckAll()\">");
                                $table->addColumnHeader("Título", true, "100%", "L");
                                $table->addRow();

                                while ($rs->getrow()) {
                                    $id = $rs->field("idParceiroTitulo");
                                    $table->addData("<input type=\"checkbox\" name=\"sel[]\" value=\"$id\">");
                                    $table->addData(addLink($rs->field("titulo"), "parceiro_titulo_edicao.php?id=$id&pagina=$pg", "Clique para consultar ou editar registro"));
                                    $table->addRow();
                                }

                                if ($rs->numrows() > 0) {
                                    echo $table->writeHTML();
                                    echo "<table width='100%' border='0'>";
                                    echo "<tr>";
                                    echo "<td class='DataFONT' align='right' width='53%'>&nbsp;Página $pg de ".$rs->totalpages()."</td>";
                                    echo "<td class='DataFONT' align='right' width='47%'>&nbsp;</td>";
                                    echo "</tr>";
                                    echo "</table>";
                                }

                                $conn->close();
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

<script type="text/javascript">
function excluir() {
    if (confirm('Excluir registros selecionados?')) {
        document.frm.action = "parceiro_titulo_excluir.php";
        document.frm.submit();
    }
}

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-3970078-1']);
_gaq.push(['_trackPageview']);
(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = (document.location.protocol === 'https:' ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

Cufon.now();
</script>
</body>
</html>
