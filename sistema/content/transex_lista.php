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

    <title>Painel Administrativo - Anunciantes Transex</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS antigos mantidos se necessário -->
    <link href="/sistema/content/css-js/estilos-sistema.css" rel="stylesheet" />
    <link href="/sistema/content/css-js/menu-sistema.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/config.css" />
    <link rel="stylesheet" href="../css/text.css" />
    <link rel="stylesheet" href="../css/lightbox.css" />
    <link rel="stylesheet" href="../css/content_sis.css">
    <link rel="stylesheet" href="../css/header_sis.css">

    <style>
        table.table { font-size: 0.95rem; }
    </style>

    <script>
        function excluir() {
            if (confirm('Excluir registros selecionados?')) {
                document.frm.action = "transex_excluir.php";
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
                <h1 class="text-light">Anunciantes - Transex</h1>
            </div>
            <hr>

            <div class="card shadow-sm">
                <div class="card-body">

                    <?php pageTitle("","Lista"); ?>

                    <?php
                        $conn = new db();
                        $conn->open();

                        if (getParam("clear")==1) {
                            setSession("sOrder","");
                            setSession("where","");
                            setSession("pagina_atual","");
                            setSession("numeroRegistros",""); 
                        }

                        $pg = getParam("pagina");
                        if ($pg == "") $pg = 1;

                        if (getParam("clear")==1) {
                            setSession("sOrder","");
                            setSession("where","");
                            setSession("pagina_atual","");
                            setSession("numeroRegistros",""); 
                        }

                        if (getParam("numeroRegistros") != "") {
                            setSession("numeroRegistros", getParam("numeroRegistros"));    
                        }
                        setSession("redirectAnunciante","transex_lista.php");

                        $iSort = getParam("Sorting");
                        $iSorted = getParam("Sorted");

                        if ($iSort) {
                            $sDirection = ($iSort == $iSorted) ? " DESC" : " ASC";
                            if ($iSort == 2) setSession("sOrder"," order by nome" . $sDirection); 
                            if ($iSort == 3) setSession("sOrder"," order by sobrenome" . $sDirection); 
                            if ($iSort == 4) setSession("sOrder"," order by email" . $sDirection); 
                            if ($iSort == 5) setSession("sOrder"," order by telefone" . $sDirection);
                            if ($iSort == 6) setSession("sOrder"," order by flagAtivo" . $sDirection);
                        }

                        $sql = "SELECT * FROM transex WHERE flagAtivo = 'Sim' " . getSession("sOrder");

                        if (getSession("numeroRegistros") == "Todos") {
                            $rs = new query($conn, $sql); 
                            $numeroRegistros = $rs->numrows();
                        } elseif (getSession("numeroRegistros") != "") {
                            $numeroRegistros = getSession("numeroRegistros");
                        } else {
                            $numeroRegistros = 15;
                        }

                        $rs = new query($conn, $sql, $pg, $numeroRegistros); 
                        $pg_ant = $pg-1;
                        $pg_prox = $pg+1;
                        $totalPaginas = $rs->totalpages();
                    ?>

                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <a class="btn btn-primary" href="transex_edicao.php">Novo</a>
                            <a class="btn btn-danger" href="javascript:excluir()">Excluir</a>
                        </div>
                        <form class="d-flex align-items-center" method="post" action="transex_lista.php">
                            <label class="me-2 mb-0">Registros por página:</label>
                            <select name="numeroRegistros" class="form-select form-select-sm me-2">
                                <option value="Todos">Todos</option>
                                <option value="15" <?= (getParam("numeroRegistros")==15 || getSession("numeroRegistros")==15 || getSession("numeroRegistros")=="") ? "selected" : "" ?>>15</option>
                                <option value="30" <?= (getParam("numeroRegistros")==30 || getSession("numeroRegistros")==30) ? "selected" : "" ?>>30</option>
                                <option value="60" <?= (getParam("numeroRegistros")==60 || getSession("numeroRegistros")==60) ? "selected" : "" ?>>60</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-secondary">OK</button>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <form name="frm" method="post">
                            <table class="table table-striped table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th><input type="checkbox" onclick="CheckAll()"></th>
                                        <th>Nome</th>
                                        <th>Sobrenome</th>
                                        <th>E-mail</th>
                                        <th>Telefone</th>
                                        <th>Ativo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($rs->numrows() > 0) {
                                        while ($rs->getrow()) {
                                            $id = $rs->field("idTransex");
                                            echo "<tr>";
                                            echo "<td><input type='checkbox' name='sel[]' value='$id'></td>";
                                            echo "<td><a href='transex_edicao.php?id=$id&pagina=$pg' class='fw-semibold text-decoration-none'>{$rs->field('nome')}</a></td>";
                                            echo "<td>{$rs->field('sobrenome')}</td>";
                                            echo "<td>{$rs->field('email')}</td>";
                                            echo "<td>{$rs->field('telefone')}</td>";
                                            echo "<td>{$rs->field('flagAtivo')}</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6' class='text-center text-muted'>Nenhum registro encontrado!</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>

                    <?php if ($totalPaginas > 1) { ?>
                        <nav>
                            <ul class="pagination justify-content-center">
                                <?php if ($pg > 1) { ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?= $_SERVER['PHP_SELF']."?pagina=$pg_ant"; ?>">Anterior</a>
                                    </li>
                                <?php } ?>

                                <?php 
                                for ($i = 1; $i <= $totalPaginas; $i++) {
                                    $active = ($i == $pg) ? "active" : "";
                                    echo "<li class='page-item $active'><a class='page-link' href='{$_SERVER['PHP_SELF']}?pagina=$i'>$i</a></li>";
                                }
                                ?>

                                <?php if ($pg < $totalPaginas) { ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?= $_SERVER['PHP_SELF']."?pagina=$pg_prox"; ?>">Próximo</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </nav>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
