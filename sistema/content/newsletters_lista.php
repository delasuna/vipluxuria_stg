<?php
require_once("verifica.php");
ob_start();
include("../inc/common.php"); 
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="index,follow">
    <meta name="description" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS" />
    <meta name="keywords" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vip Luxúria - Newsletters</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS antigos -->
    <link href="/sistema/content/css-js/estilos-sistema.css" rel="stylesheet">
    <link href="/sistema/content/css-js/menu-sistema.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/config.css">
    <link rel="stylesheet" href="../css/text.css">
    <link rel="stylesheet" href="../css/lightbox.css">
    <link rel="stylesheet" href="../css/content_sis.css">
    <link rel="stylesheet" href="../css/header_sis.css">

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
                <h1 class="text-light">Newsletters</h1>
            </div>
            <hr>

            <div class="card shadow-sm">
                <div class="card-body">

                    <script>
                        function excluir() {
                            if (confirm('Excluir registros selecionados?')) {
                                document.frm.action = "newsletters_excluir.php";
                                document.frm.submit();
                            }
                        }
                        function gerar() {
                            document.frm.action = "newsletters_arquivo.php";
                            document.frm.submit();
                        }
                    </script>

                    <?php
                    pageTitle("", "Lista");

                    $conn = new db();
                    $conn->open();

                    // Trata mudança de registros por página
                    $numeroReq = getParam("numeroRegistros");

                    if ($numeroReq != "") {
                        setSession("numeroRegistros", $numeroReq);

                        // volta para a página 1 ao alterar o tamanho
                        $pg = 1;
                    }

                    if (getParam("clear")==1) {
                            setSession("sOrder","");
                            setSession("where","");
                            setSession("pagina_atual","");
                            setSession("numeroRegistros",""); 
                        }

                    $busca = trim(getParam("busca"));
                        $whereBusca = "";

                        if ($busca != "") {
                            // proteção básica
                            $buscaSql = anti_injection($busca);
                            $whereBusca = " WHERE email LIKE '%$buscaSql%'";
                        }

                    /* ===== ORDENAÇÃO (CORRIGIDA) ===== */

                        $iSort   = (int) getParam("Sorting");
                        $iSorted = (int) getParam("Sorted");

                        /* padrão */
                        $orderBy = "";

                        /* se veio da URL, manda nela */
                        if ($iSort > 0) {

                            // define direção
                            if ($iSort === $iSorted) {
                                $direction = "DESC";
                            } else {
                                $direction = "ASC";
                            }

                            // mapeamento seguro
                            switch ($iSort) {
                                case 2:
                                    $orderBy = " ORDER BY email $direction";
                                    break;
                            }

                            // salva sessão apenas para paginação
                            setSession("sOrder", $orderBy);

                        } else {
                            // fallback (primeiro carregamento)
                            $orderBy = getSession("sOrder");
                        }

                    $pg = getParam("pagina") ?: 1;

                    // Função para gerar paginação resumida
                        function pagination_resumida($pagina_atual, $total_paginas, $url)
                        {
                            $pagina_atual = max(1, min($pagina_atual, $total_paginas)); // segurança
                            echo '<nav><ul class="pagination justify-content-center flex-wrap">';

                            // Botão Anterior
                            if ($pagina_atual > 1) {
                                echo '<li class="page-item"><a class="page-link" href="' . $url . '?pagina=' . ($pagina_atual - 1) . '">Anterior</a></li>';
                            }

                            // Primeira página
                            if ($pagina_atual > 3) {
                                echo '<li class="page-item"><a class="page-link" href="' . $url . '?pagina=1">1</a></li>';
                                if ($pagina_atual > 4) echo '<li class="page-item disabled"><span class="page-link">…</span></li>';
                            }

                            // Páginas próximas à atual
                            for ($i = max(1, $pagina_atual - 2); $i <= min($total_paginas, $pagina_atual + 2); $i++) {
                                $active = ($i == $pagina_atual) ? "active" : "";
                                echo '<li class="page-item ' . $active . '"><a class="page-link" href="' . $url . '?pagina=' . $i . '">' . $i . '</a></li>';
                            }

                            // Última página
                            if ($pagina_atual < $total_paginas - 2) {
                                if ($pagina_atual < $total_paginas - 3) echo '<li class="page-item disabled"><span class="page-link">…</span></li>';
                                echo '<li class="page-item"><a class="page-link" href="' . $url . '?pagina=' . $total_paginas . '">' . $total_paginas . '</a></li>';
                            }

                            // Botão Próximo
                            if ($pagina_atual < $total_paginas) {
                                echo '<li class="page-item"><a class="page-link" href="' . $url . '?pagina=' . ($pagina_atual + 1) . '">Próximo</a></li>';
                            }

                            echo '</ul></nav>';
                        }

                    if ($nr = getParam("numeroRegistros")) setSession("numeroRegistros", $nr);

                    $mesma_pagina = ($_SERVER['PHP_SELF'] == getSession("pagina_atual"));
                    if (!$mesma_pagina) setSession("pagina_atual", $_SERVER['PHP_SELF']);

                    // $sql = "SELECT * FROM newsletter " . getSession("sOrder");

                    $sql = "SELECT * 
                        FROM newsletter 
                        $whereBusca
                        $orderBy";

                    // TOTAL DE REGISTROS (sem paginação)
                    $sqlTotal = "SELECT COUNT(*) AS total 
                                FROM newsletter 
                                $whereBusca";

                    $rsTotal = new query($conn, $sqlTotal);
                    $rsTotal->getrow();
                    $totalRegistros = (int)$rsTotal->field("total");

                    if (getSession("numeroRegistros") == "Todos") {
                        $rs = new query($conn, $sql); 
                        $numeroRegistros = $rs->numrows();
                    } else {
                        $numeroRegistros = getSession("numeroRegistros") ?: 15;
                    }

                    $rs = new query($conn, $sql, $pg, $numeroRegistros);
                    $pg_ant = $pg-1;
                    $pg_prox = $pg+1;
                    $totalPaginas = $rs->totalpages();
                    ?>

                    <!-- Botões e registros por página -->
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <a class="btn btn-success" href="javascript:gerar()">Gerar Arquivo</a>
                            <a class="btn btn-danger" href="javascript:excluir()">Excluir</a>
                        </div>
                        <form method="post" class="d-flex align-items-center" action="newsletters_lista.php">
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

                    <div class="d-flex justify-content-around">
                        <form method="get" class="row g-2 mb-3 w-100">
                            <div class="col-md-4">
                                <input type="text"
                                    name="busca"
                                    class="form-control"
                                    placeholder="Buscar por nome..."
                                    value="<?php echo htmlspecialchars($busca); ?>">
                            </div>

                            <!-- mantém ordenação -->
                            <input type="hidden" name="Sorting" value="<?php echo $iSort; ?>">
                            <input type="hidden" name="Sorted" value="<?php echo $iSorted; ?>">

                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">
                                    Buscar
                                </button>
                                <?php if ($busca != "") { ?>
                                    <a href="newsletters_lista.php" class="btn btn-secondary">
                                        Limpar
                                    </a>
                                <?php } ?>
                            </div>
                        </form>

                        <p class="text-muted mb-2">
                            Total encontrados:
                            <strong><?php echo isset($totalRegistros) ? $totalRegistros : 0; ?></strong>
                        </p>


                    </div>

                    <!-- Tabela -->
                    <form name="frm" method="post">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th><input type="checkbox" onclick="CheckAll()"></th>
                                        <?php
                                            $isDescNome = ($iSort === 2 && $iSorted === 2);
                                        ?>

                                        <th>
                                            <a href="?Sorting=2<?php echo $isDescNome ? '' : '&Sorted=2'; ?>"
                                            class="text-white text-decoration-none">
                                                E-mail
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($rs->numrows() > 0) {
                                        while ($rs->getrow()) {
                                            $id = $rs->field("id");
                                            echo "<tr>";
                                            echo "<td><input type='checkbox' name='sel[]' value='$id'></td>";
                                            echo "<td>{$rs->field('email')}</td>";
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
                    <?php
                        $totalPaginas = $rs->totalpages();
                        if ($totalPaginas > 1) {
                            pagination_resumida($pg, $totalPaginas, $_SERVER['PHP_SELF']);
                        }
                        ?>

                    <?php $conn->close(); ?>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>Cufon.now();</script>

</body>
</html>
