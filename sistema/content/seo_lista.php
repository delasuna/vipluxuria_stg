<?php
require_once("verifica.php");
include("../inc/common.php");

$conn = new db();
$conn->open();

// Determina a página
$pg = getParam("pagina") ?: 1;

// Limpa ordenação/filtro
if (getParam("clear") == 1) {
    setSession("sOrder2", "");
    setSession("where", "");
    setSession("pagina_atual", "");
    setSession("numeroRegistros", "");
}

// Número de registros por página
if (getParam("numeroRegistros") != "") setSession("numeroRegistros", getParam("numeroRegistros"));

// Salva status da página atual
$mesma_pagina = ($_SERVER['PHP_SELF'] == getSession("pagina_atual"));
if (!$mesma_pagina) setSession("pagina_atual", $_SERVER['PHP_SELF']);

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
    if ($iSort == 2) setSession("sOrder2", " ORDER BY descricao $sDirection");
    if ($iSort == 3) setSession("sOrder2", " ORDER BY title $sDirection");
}

// Executa a query
$sql = "SELECT * FROM seo INNER JOIN tipoSeo ON seo.idTipoSeo = tipoSeo.idTipoSeo" . getSession("sOrder2");

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

// JS de exclusão
$excluirJS = "if(confirm('Excluir registros selecionados?')) { document.frm.action='seo_excluir.php'; document.frm.submit(); }";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="index,follow">
    <meta name="description" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS">
    <meta name="keywords" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vip Luxúria - SEO</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS antigos -->
    <link href="/sistema/content/css-js/estilos-sistema.css" rel="stylesheet">
    <link href="/sistema/content/css-js/menu-sistema.css" rel="stylesheet">
    <link href="../css/config.css" rel="stylesheet">
    <link href="../css/text.css" rel="stylesheet">
    <link href="../css/lightbox.css" rel="stylesheet" media="screen">
    <link href="../css/content_sis.css" rel="stylesheet">
    <link href="../css/header_sis.css" rel="stylesheet">

    <!-- JS antigos -->
    <script src="../imagens/js/prototype.js"></script>
    <script src="../imagens/js/scriptaculous.js?load=effects"></script>
    <script src="../imagens/js/lightbox.js"></script>
    <script src="../js/checkall.js"></script>
    <script src="/css-js/cufon-yui.js"></script>
    <script src="/css-js/Bauhaus_Md_BT_400.font.js"></script>
    <script src="/css-js/functions.js"></script>

    <script>
        Cufon.replace('#navmenu-h, #slogan, h1, h2, h3, h4, .menu-rodape');
        function excluir() { <?= $excluirJS ?> }
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

        <div class="container-fluid mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="text-light">SEO</h1>
            </div>
            <hr>

            <div class="card shadow-sm">
                <div class="card-body">

                    <?php pageTitle("", "Lista"); ?>

                    <!-- Filtro de registros por página -->
                    <form name="form2" method="post" action="seo_lista.php" class="d-flex justify-content-end mb-3 align-items-center">
                        <label class="me-2 mb-0">Registros por página:</label>
                        <select name="numeroRegistros" class="form-select form-select-sm me-2" onchange="this.form.submit()">
                            <option value="Todos">Todos</option>
                            <option value="15" <?= ($numeroRegistros == 15 ? "selected" : "") ?>>15</option>
                            <option value="30" <?= ($numeroRegistros == 30 ? "selected" : "") ?>>30</option>
                            <option value="60" <?= ($numeroRegistros == 60 ? "selected" : "") ?>>60</option>
                        </select>
                        <button class="btn btn-sm btn-secondary" type="submit">OK</button>
                    </form>

                    <!-- Botões -->
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <a class="btn btn-primary" href="seo_edicao.php">Novo</a>
                            <a class="btn btn-danger" href="javascript:excluir()">Excluir</a>
                        </div>
                        <div>
                            <?php if ($pg > 1): ?>
                                <a class="btn btn-sm btn-outline-secondary" href="<?= $_SERVER['PHP_SELF'] ?>?pagina=<?= $pg_ant ?>">Anterior</a>
                            <?php endif; ?>
                            <?php if ($pg < $rs->totalpages()): ?>
                                <a class="btn btn-sm btn-outline-secondary" href="<?= $_SERVER['PHP_SELF'] ?>?pagina=<?= $pg_prox ?>">Próximo</a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Tabela -->
                    <form name="frm" method="post">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th><input type="checkbox" name="checkall" onclick="CheckAll()"></th>
                                        <th>Tipo SEO</th>
                                        <th>Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($rs->numrows() > 0) {
                                        while ($rs->getrow()) {
                                            $id = $rs->field("idSeo");
                                            $descricao = addLink($rs->field("descricao"), "seo_edicao.php?id=$id&pagina=$pg", "Clique para consultar ou editar registro");
                                            $title = addLink($rs->field("title"), "seo_edicao.php?id=$id&pagina=$pg", "Clique para consultar ou editar registro");
                                            echo "<tr>";
                                            echo "<td><input type='checkbox' name='sel[]' value='$id'></td>";
                                            echo "<td>$descricao</td>";
                                            echo "<td>$title</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='3' class='text-center text-muted'>Nenhum registro encontrado!</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>

                    <!-- Paginação numerada -->
                    <?php
                    $totalPaginas = $rs->totalpages();
                    if ($totalPaginas > 1) { ?>
                        <nav>
                            <ul class="pagination justify-content-center">
                                <?php if ($pg > 1): ?>
                                    <li class="page-item"><a class="page-link" href="<?= $_SERVER['PHP_SELF'] ?>?pagina=<?= $pg_ant ?>">Anterior</a></li>
                                <?php endif; ?>
                                <?php
                                for ($i = 1; $i <= $totalPaginas; $i++) {
                                    $active = ($i == $pg) ? "active" : "";
                                    echo "<li class='page-item $active'><a class='page-link' href='{$_SERVER['PHP_SELF']}?pagina=$i'>$i</a></li>";
                                }
                                ?>
                                <?php if ($pg < $totalPaginas): ?>
                                    <li class="page-item"><a class="page-link" href="<?= $_SERVER['PHP_SELF'] ?>?pagina=<?= $pg_prox ?>">Próximo</a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>

</div>

<script>
    Cufon.now();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $conn->close(); ?>
