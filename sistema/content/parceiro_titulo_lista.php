<?php
require_once("verifica.php");
include("../inc/common.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="index,follow">
    <meta name="description" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS">
    <meta name="keywords" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vip Luxúria - Parceiros</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS antigos -->
    <link href="/sistema/content/css-js/estilos-sistema.css" rel="stylesheet">
    <link href="/sistema/content/css-js/menu-sistema.css" rel="stylesheet">
    <link href="../css/config.css" rel="stylesheet">
    <link href="../css/text.css" rel="stylesheet">
    <link href="../css/lightbox.css" rel="stylesheet">
    <link href="../css/content_sis.css" rel="stylesheet">
    <link href="../css/header_sis.css" rel="stylesheet">

    <!-- JS -->
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

        <div id="topo"><div id="topo-content"><?php include("php/topo-sistema.php"); ?></div></div>
        <div id="header"><div id="header-content"><?php include("php/header-sistema.php"); ?></div></div>
        <div id="menu"><div id="menu-content"><?php include("php/menu-sistema.php"); ?></div></div>

        <div class="container-fluid mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="text-light">Parceiros - Título</h1>
            </div>
            <hr>

            <div class="card shadow-sm">
                <div class="card-body">

                    <?php
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

                    if (getParam("numeroRegistros") != "") setSession("numeroRegistros", getParam("numeroRegistros"));

                    $mesma_pagina = ($_SERVER['PHP_SELF'] == getSession("pagina_atual"));
                    if (!$mesma_pagina) setSession("pagina_atual", $_SERVER['PHP_SELF']);

                    $iSort = getParam("Sorting");
                    $iSorted = getParam("Sorted");
                    if (!$iSort && !$mesma_pagina && getSession("sOrder") == "") {
                        $iSort = 2;
                        $iSorted = "";
                    }

                    if ($iSort) {
                        $sDirection = ($iSort == $iSorted) ? " DESC" : " ASC";
                        if ($iSort == 2) setSession("sOrder", " ORDER BY titulo" . $sDirection);
                    }

                    $sql = "SELECT * FROM parceirotitulo " . getSession("sOrder");

                    if (getSession("numeroRegistros") == "Todos") {
                        $rs = new query($conn, $sql);
                        $numeroRegistros = $rs->numrows();
                    } else {
                        $numeroRegistros = getSession("numeroRegistros") ?: 15;
                    }

                    $rs = new query($conn, $sql, $pg, $numeroRegistros);
                    $pg_ant = $pg - 1;
                    $pg_prox = $pg + 1;
                    $totalPaginas = $rs->totalpages();
                    ?>

                    <!-- Botões e registros por página -->
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <a class="btn btn-primary" href="parceiro_titulo_edicao.php">Novo</a>
                            <a class="btn btn-danger" href="javascript:excluir()">Excluir</a>
                        </div>
                        <form method="post" class="d-flex align-items-center" action="parceiro_titulo_lista.php">
                            <label class="me-2 mb-0">Registros por página:</label>
                            <select name="numeroRegistros" class="form-select form-select-sm me-2" onchange="this.form.submit()">
                                <option value="Todos">Todos</option>
                                <option value="15" <?= ($numeroRegistros == 15)?"selected":"" ?>>15</option>
                                <option value="30" <?= ($numeroRegistros == 30)?"selected":"" ?>>30</option>
                                <option value="60" <?= ($numeroRegistros == 60)?"selected":"" ?>>60</option>
                            </select>
                            <button class="btn btn-sm btn-secondary" type="submit">OK</button>
                        </form>
                    </div>

                    <!-- Tabela -->
                    <form name="frm" method="post">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th><input type="checkbox" onclick="CheckAll()"></th>
                                        <th>Título</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($rs->numrows() > 0) {
                                        while ($rs->getrow()) {
                                            $id = $rs->field("idParceiroTitulo");
                                            $titulo = addLink($rs->field("titulo"), "parceiro_titulo_edicao.php?id=$id&pagina=$pg", "Clique para consultar ou editar registro");
                                            echo "<tr>";
                                            echo "<td><input type='checkbox' name='sel[]' value='$id'></td>";
                                            echo "<td>$titulo</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='2' class='text-center text-muted'>Nenhum registro encontrado!</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>

                    <!-- Paginação -->
                    <?php if ($totalPaginas > 1) { ?>
                        <nav>
                            <ul class="pagination justify-content-center">
                                <?php if ($pg > 1) { ?>
                                    <li class="page-item"><a class="page-link" href="<?= $_SERVER['PHP_SELF']."?pagina=$pg_ant" ?>">Anterior</a></li>
                                <?php } ?>
                                <?php 
                                for ($i = 1; $i <= $totalPaginas; $i++) {
                                    $active = ($i == $pg) ? "active" : "";
                                    echo "<li class='page-item $active'><a class='page-link' href='{$_SERVER['PHP_SELF']}?pagina=$i'>$i</a></li>";
                                }
                                ?>
                                <?php if ($pg < $totalPaginas) { ?>
                                    <li class="page-item"><a class="page-link" href="<?= $_SERVER['PHP_SELF']."?pagina=$pg_prox" ?>">Próximo</a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    <?php } ?>

                    <?php $conn->close(); ?>
                </div>
            </div>
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

// Google Analytics
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
