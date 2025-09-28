<?php require_once("verifica.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="index,follow">
    <meta name="description" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS" />
    <meta name="keywords" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS" />

    <title>Vip Luxúria - Acompanhantes Porto Alegre</title>

    <!-- CSS Principais -->
    <link href="/sistema/content/css-js/estilos-sistema.css" rel="stylesheet" type="text/css" />
    <link href="/sistema/content/css-js/menu-sistema.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="../css/config.css" type="text/css" />
    <link rel="stylesheet" href="../css/text.css" type="text/css" />
    <link rel="stylesheet" href="../css/lightbox.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/content_sis.css">
    <link rel="stylesheet" type="text/css" href="../css/header_sis.css">

    <!-- JS -->
    <script src="../imagens/js/prototype.js"></script>
    <script src="../imagens/js/scriptaculous.js?load=effects"></script>
    <script src="../imagens/js/lightbox.js"></script>
    <script src="../js/checkall.js"></script>

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
    <a href="#inicio">
        <img src="/imagens/base/seta-topo.png" alt="Retornar Topo da Página" width="30" height="30" />
    </a>
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
                <h1>Parceiros</h1>
            </div>
            <div class="traco"></div>
        </div>

        <div id="principal">
            <div id="principal-topo"></div>
            <div id="principal-content">
                <div id="coluna-esquerda-full">
                    <p>
                    <?php
                        include("../inc/common.php");
                        pageTitle("", "Lista");

                        function excluirJS() {
                            echo "
                            <script>
                                function excluir() {
                                    if (confirm('Excluir registros selecionados?')) {
                                        document.frm.action = 'parceiro_excluir.php';
                                        document.frm.submit();
                                    }
                                }
                            </script>";
                        }
                        excluirJS();

                        $conn = new db();
                        $conn->open();

                        $pg = getParam("pagina");
                        if ($pg == "") $pg = 1;

                        if (getParam("clear") == 1) {
                            setSession("sOrder", "");
                            setSession("where", "");
                            setSession("pagina_atual", "");
                            setSession("numeroRegistros", "");
                        }

                        if (getParam("numeroRegistros") != "") {
                            setSession("numeroRegistros", getParam("numeroRegistros"));
                        }

                        // ✅ Correção aplicada aqui
                        $pagina_atual = getSession("pagina_atual") ?? "";

                        if ($_SERVER['PHP_SELF'] != $pagina_atual) {
                            $mesma_pagina = false;
                            setSession("pagina_atual", $_SERVER['PHP_SELF']);
                        } else {
                            $mesma_pagina = true;
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
                            if ($iSort == 3) setSession("sOrder", " ORDER BY descricao" . $sDirection);
                        }

                        $sql = "SELECT * FROM parceiro 
                                INNER JOIN parceirotitulo 
                                ON parceiro.idParceiroTitulo = parceirotitulo.idParceiroTitulo " 
                                . getSession("sOrder");

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

                    <!-- Form de seleção de registros -->
                    <form name="form2" method="post" action="parceiro_lista.php">
                        <div align="right">
                            <label>
                                Registros por página:
                                <select name="numeroRegistros" onchange="this.form.submit()">
                                    <option value="Todos">Todos</option>
                                    <option value="15" <?= (getSession("numeroRegistros") == 15 || getSession("numeroRegistros") == "" ? "selected" : "") ?>>15</option>
                                    <option value="30" <?= (getSession("numeroRegistros") == 30 ? "selected" : "") ?>>30</option>
                                    <option value="60" <?= (getSession("numeroRegistros") == 60 ? "selected" : "") ?>>60</option>
                                </select>
                            </label>
                        </div>
                    </form>

                    <!-- Botões de ação -->
                    <div class='acoes2'>
                        <table width="100%">
                            <tr>
                                <td>
                                    <a class='botao' href='parceiro_edicao.php'>&nbsp;Novo&nbsp;</a>
                                    <a class='botao' href='javascript:excluir()'>&nbsp;Excluir&nbsp;</a>
                                </td>
                                <td align="right">
                                    <?php if ($pg > 1) { ?>
                                        <a class='botao' href='<?= $_SERVER['PHP_SELF'] . "?pagina=$pg_ant" ?>'>&nbsp;<?= LISTA_ANTERIOR ?>&nbsp;</a>
                                    <?php } ?>
                                    <?php if ($pg < $rs->totalpages()) { ?>
                                        <a class='botao' href='<?= $_SERVER['PHP_SELF'] . "?pagina=$pg_prox" ?>'>&nbsp;<?= LISTA_PROXIMO ?>&nbsp;</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <!-- Lista -->
                    <div align="center">
                        <form name="frm" method="post">
                        <?php
                            if ($rs->numrows() > 0) {
                                echo "<table width='100%' border='0'> 
                                        <tr>
                                            <td class='DataFONT' align='right'>Página $pg de " . $rs->totalpages() . "</td>
                                            <td class='DataFONT' align='right'>" . ($rs->numrows() == 1 ? "Foi encontrado 1 registro." : "Foram encontrados " . $rs->numrows() . " registros.") . "</td>
                                        </tr>
                                      </table>";
                            } else {
                                echo "<div class='DataFONT'>Nenhum registro encontrado!</div>";
                            }

                            $table = new Table("", "100%", 4);
                            $table->addColumnHeader("<input type='checkbox' name='checkall' onclick='CheckAll()'>");
                            $table->addColumnHeader("Título", true, "40%", "L");
                            $table->addColumnHeader("Descrição", true, "60%", "L");
                            $table->addRow();

                            while ($rs->getrow()) {
                                $id = $rs->field("idParceiro");
                                $table->addData("<input type='checkbox' name='sel[]' value='$id'>");
                                $table->addData(addLink($rs->field("titulo"), "parceiro_edicao.php?id=$id&pagina=$pg", "Clique para consultar ou editar registro"));
                                $table->addData(addLink($rs->field("descricao"), "parceiro_edicao.php?id=$id&pagina=$pg", "Clique para consultar ou editar registro"));
                                $table->addRow();
                            }

                            if ($rs->numrows() > 0) {
                                echo $table->writeHTML();
                                echo "<table width='100%' border='0'> 
                                        <tr>
                                            <td class='DataFONT' align='right'>Página $pg de " . $rs->totalpages() . "</td>
                                            <td class='DataFONT'>&nbsp;</td>
                                        </tr>
                                      </table>";
                            }
                            $conn->close();
                        ?>
                        </form>
                    </div>
                    </p>
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

<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-3970078-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){ dataLayer.push(arguments); }
  gtag('js', new Date());
  gtag('config', 'UA-3970078-1');
</script>

<script>Cufon.now();</script>
</body>
</html>
