<?php require_once("verifica.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="index,follow">
    <meta name="description" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS" />
    <meta name="keywords" content="Acompanhantes Porto Alegre , Acompanhante em Porto Alegre , Garota de Programa Porto Alegre , Acompanhante Rio Grande do Sul, Acompanhante RS" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vip Luxúria - Acompanhantes Porto Alegre</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS antigos -->
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
</head>

<body> 
<a name="inicio"></a> 
<div class="voltar-inicio">
    <a href="#inicio"><img src="/imagens/base/seta-topo.png" alt="Retornar Topo da Página" width="30" height="30" /></a>
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

        <div class="container-fluid mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="text-light">Anunciantes - Mulheres</h1>
            </div>
            <hr>

            <div class="card shadow-sm">
                <div class="card-body">
                    
                    <?php
                        include("../inc/common.php");
                        pageTitle("", "Lista");

                        $conn = new db();
                        $conn->open();

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

                        $pg = getParam("pagina");
                        if ($pg == "") $pg = 1;

                        $busca = trim(getParam("busca"));
                        $whereBusca = "";

                        if ($busca != "") {
                            // proteção básica
                            $buscaSql = anti_injection($busca);
                            $whereBusca = " AND nomeUrl LIKE '%$buscaSql%'";
                        }

                        $sql = "SELECT * 
                        FROM mulher 
                        WHERE flagAtivo = 'Sim' 
                        $whereBusca
                        $orderBy";

                        // TOTAL DE REGISTROS (sem paginação)
                        $sqlTotal = "SELECT COUNT(*) AS total 
                                    FROM mulher 
                                    WHERE flagAtivo = 'Sim' $whereBusca";

                        $rsTotal = new query($conn, $sqlTotal);
                        $rsTotal->getrow();
                        $totalRegistros = (int)$rsTotal->field("total");


                        if (getSession("numeroRegistros") == "Todos") {
                            $rs = new query($conn, $sql); 
                            $numeroRegistros = $rs->numrows();
                        } else if (getSession("numeroRegistros") != "") {
                            $numeroRegistros = getSession("numeroRegistros");
                        } else {
                            $numeroRegistros = 15;
                        }

                        $rs = new query($conn, $sql, $pg, $numeroRegistros); 
                        $pg_ant = $pg-1;
                        $pg_prox = $pg+1;
                        $totalPaginas = $rs->totalpages();
                    ?>

                    <div>
                        <a class="btn btn-primary" href="mulher_edicao.php">Novo</a>
                        <a class="btn btn-danger" href="javascript:excluir()">Excluir</a>
                    </div>

                    <!-- Seleção de registros por página -->
                    <form name="form2" id="form2" method="post" action="mulher_lista.php" class="row g-2 mb-3 justify-content-end">
                        <div class="col-auto">
                            <label class="form-label mb-0">Registros por página:</label>
                        </div>
                        <div class="col-auto">
                            <select name="numeroRegistros" class="form-select form-select-sm">
                                <option value="Todos">Todos</option>
                                <option value="15" <?php if (getParam("numeroRegistros") == 15 || getSession("numeroRegistros") == 15 || getSession("numeroRegistros") == "") echo "selected"; ?>>15</option>
                                <option value="30" <?php if (getParam("numeroRegistros") == 30 || getSession("numeroRegistros") == 30) echo "selected"; ?>>30</option>
                                <option value="60" <?php if (getParam("numeroRegistros") == 60 || getSession("numeroRegistros") == 60) echo "selected"; ?>>60</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-sm btn-secondary">OK</button>
                        </div>
                    </form>

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
                                    <a href="mulher_lista.php" class="btn btn-secondary">
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

                    <!-- Lista -->
                    <form name="frm" id="frm" method="post">
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
                                    if ($rs->numrows()>0) {
                                        while ($rs->getrow()) {
                                            $id = $rs->field("idMulher");
                                            echo "<tr>";
                                            echo "<td><input type='checkbox' name='sel[]' value='$id'></td>";
                                            echo "<td><a href='mulher_edicao.php?id=$id&pagina=$pg' class='fw-semibold text-decoration-none'>" . htmlspecialchars($rs->field("nomeUrl")) . "</a></td>";
                                            echo "<td>{$rs->field('email')}</td>";
                                            echo "<td>{$rs->field('telefone')}</td>";
                                            echo "<td>{$rs->field('flagAtivo')}</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5' class='text-center text-muted'>Nenhum registro encontrado!</td></tr>";
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
                                    <li class="page-item">
                                        <a class="page-link" href="<?php echo $_SERVER['PHP_SELF']."?pagina=$pg_ant"; ?>">Anterior</a>
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
                                        <a class="page-link" href="<?php echo $_SERVER['PHP_SELF']."?pagina=$pg_prox"; ?>">Próximo</a>
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
<script>
function excluir() {
    if (confirm('Excluir registros selecionados?')) {
        document.frm.action = "mulher_excluir.php";
        document.frm.submit();
    }
}
</script>
</body>
</html>
