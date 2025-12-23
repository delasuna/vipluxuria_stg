<?php
require_once("verifica.php");
include("../inc/common.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,nofollow">
    <meta name="description" content="Painel Administrativo - Vip Luxúria" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Painel Administrativo - Anunciantes Mulheres Inativos</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS antigos mantidos se necessário -->
    <link href="/sistema/content/css-js/estilos-sistema.css" rel="stylesheet" />
    <link href="/sistema/content/css-js/menu-sistema.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/config.css" />
    <link rel="stylesheet" href="../css/lightbox.css" />
    <link rel="stylesheet" href="../css/content_sis.css">
    <link rel="stylesheet" href="../css/header_sis.css">

    <style>
        table.table {
            font-size: 0.95rem;
        }
    </style>

    <script>
        function excluir() {
            if (confirm('Excluir registros selecionados?')) {
                document.frm.action = "mulher_excluir.php";
                document.frm.submit();
            }
        }
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
                <div id="topo-content"><?php include("php/topo-sistema.php"); ?></div>
            </div>

            <div id="header">
                <div id="header-content"><?php include("php/header-sistema.php"); ?></div>
            </div>

            <div id="menu">
                <div id="menu-content"><?php include("php/menu-sistema.php"); ?></div>
            </div>

            <div class="container-fluid mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="text-light">Anunciantes Mulheres - Inativos</h1>
                </div>
                <hr>

                <div class="card shadow-sm">
                    <div class="card-body">

                        <?php pageTitle("", "Lista"); ?>

                        <?php
                        $conn = new db();
                        $conn->open();
                        $conn->execute("SET NAMES utf8mb4");

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
                                    $orderBy = " ORDER BY nomeUrl $direction";
                                    break;
                                case 3:
                                    $orderBy = " ORDER BY email $direction";
                                    break;
                                case 4:
                                    $orderBy = " ORDER BY telefone $direction";
                                    break;
                                case 5:
                                    $orderBy = " ORDER BY flagAtivo $direction";
                                    break;
                            }

                            // salva sessão apenas para paginação
                            setSession("sOrder", $orderBy);

                        } else {
                            // fallback (primeiro carregamento)
                            $orderBy = getSession("sOrder");
                        }

                        $pg = getParam("pagina") ?: 1;

                        $busca = trim(getParam("busca"));
                        $whereBusca = "";

                        if ($busca != "") {
                            // proteção básica
                            $buscaSql = anti_injection($busca);
                            $whereBusca = " AND nomeUrl LIKE '%$buscaSql%'";
                        }

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


                        if (getParam("clear") == 1) {
                            setSession("sOrder", "");
                            setSession("where", "");
                            setSession("pagina_atual", "");
                            setSession("numeroRegistros", "");
                        }

                        if (getParam("numeroRegistros") != "") {
                            setSession("numeroRegistros", getParam("numeroRegistros"));
                        }
                        setSession("redirectAnunciante", "mulher_lista_inativo.php");

                        $mesma_pagina = ($_SERVER['PHP_SELF'] == getSession("pagina_atual"));
                        if (!$mesma_pagina) setSession("pagina_atual", $_SERVER['PHP_SELF']);

                        $sql = "SELECT * 
                        FROM mulher 
                        WHERE flagAtivo = 'Nao' 
                        $whereBusca
                        $orderBy";

                        if (getSession("numeroRegistros") == "Todos") {
                            $rs = new query($conn, $sql);
                            $numeroRegistros = $rs->numrows();
                        } elseif (getSession("numeroRegistros") != "") {
                            $numeroRegistros = getSession("numeroRegistros");
                        } else {
                            $numeroRegistros = 15;
                        }

                        $rs = new query($conn, $sql, $pg, $numeroRegistros);
                        $pg_ant = $pg - 1;
                        $pg_prox = $pg + 1;
                        $totalPaginas = $rs->totalpages();
                        ?>

                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <a class="btn btn-primary" href="mulher_edicao.php">Novo</a>
                                <a class="btn btn-danger" href="javascript:excluir()">Excluir</a>
                            </div>
                            <form class="d-flex align-items-center" method="post" action="mulher_lista_inativo.php">
                                <label class="me-2 mb-0">Registros por página:</label>
                                <select name="numeroRegistros" class="form-select form-select-sm me-2">
                                    <option value="Todos">Todos</option>
                                    <option value="15" <?= (getSession("numeroRegistros") == 15 || getSession("numeroRegistros") == "") ? "selected" : "" ?>>15</option>
                                    <option value="30" <?= (getSession("numeroRegistros") == 30) ? "selected" : "" ?>>30</option>
                                    <option value="60" <?= (getSession("numeroRegistros") == 60) ? "selected" : "" ?>>60</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-secondary">OK</button>
                            </form>
                        </div>

                        <div class="table-responsive">
                            <form method="get" class="row g-2 mb-3">
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
                                        <a href="mulher_lista.php" class="btn btn-secondary">
                                            Limpar
                                        </a>
                                    <?php } ?>
                                </div>
                            </form>
                            <form name="frm" method="post">
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
                                                    Nome
                                                </a>
                                            </th>


                                            <?php $isDescEmail = ($iSort === 3 && $iSorted === 3); ?>
                                            <th>
                                                <a href="?Sorting=3<?php echo $isDescEmail ? '' : '&Sorted=3'; ?>"
                                                class="text-white text-decoration-none">
                                                    E-mail
                                                </a>
                                            </th>


                                            <?php $isDescTel = ($iSort === 4 && $iSorted === 4); ?>
                                            <th>
                                                <a href="?Sorting=4<?php echo $isDescTel ? '' : '&Sorted=4'; ?>"
                                                class="text-white text-decoration-none">
                                                    Telefone
                                                </a>
                                            </th>


                                            <?php $isDescAtivo = ($iSort === 5 && $iSorted === 5); ?>
                                            <th>
                                                <a href="?Sorting=5<?php echo $isDescAtivo ? '' : '&Sorted=5'; ?>"
                                                class="text-white text-decoration-none">
                                                    Ativo
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($rs->numrows() > 0) {
                                            while ($rs->getrow()) {
                                                $id = $rs->field("idMulher");
                                                echo "<tr>";
                                                echo "<td><input type='checkbox' name='sel[]' value='$id'></td>";
                                                echo "<td><a href='mulher_edicao.php?id=$id&pagina=$pg' class='fw-semibold text-decoration-none'>" . htmlspecialchars($rs->field("nomeUrl")) . "</a></td>";
                                                echo "<td>" . htmlspecialchars($rs->field("email")) . "</td>";
                                                echo "<td>" . htmlspecialchars($rs->field("telefone")) . "</td>";
                                                echo "<td>" . htmlspecialchars($rs->field("flagAtivo")) . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5' class='text-center text-muted'>Nenhum registro encontrado!</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>