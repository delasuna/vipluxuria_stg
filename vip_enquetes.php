<?php
$conexao = require_once 'php/conecta_mysql.php';

// SEO
$sql = "SELECT * FROM seo, tipoSeo WHERE seo.idTipoSeo = tipoSeo.idTipoSeo AND descricao = 'VipEnquetes'";
$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    die("Impossível visualizar SEO: " . mysqli_error($conexao));
}

if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    $title = $row['title'];
    $description = $row['description'];
    $keywords = $row['keywords'];
}
mysqli_free_result($resultado);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php include 'head.php'; ?>

<body>
    <div id="wrap">
        <div>
            <?php include("php/menu-2.php"); ?>
            <div id="topo"><?php include("php/topo-2.php"); ?></div>
        </div>
        <?php include("php/slider.php"); ?>
        <?php include 'filters.php' ?>
        
        <div class="bg-dark text-light py-4">
            <div class="container">
                
                <!-- Título -->
                <div class="text-center mb-5">
                    <h1 class="display-6 fw-bold">Vip Enquetes</h1>
                </div>

                <!-- Enquetes -->
                <div class="row g-4">
                    <?php
                    $sql = "SELECT * FROM enquete WHERE flagAtivo = 'S' ORDER BY idEnquete DESC";
                    $resultado = mysqli_query($conexao, $sql);

                    if (!$resultado) {
                        die("Impossível visualizar as enquetes: " . mysqli_error($conexao));
                    }

                    if (mysqli_num_rows($resultado) > 0) {
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            $idEnquete = $row['idEnquete'];
                            $pergunta = $row['pergunta'];    
                            $alternativa1 = $row['alternativa1'];
                            $alternativa2 = $row['alternativa2'];
                            $alternativa3 = $row['alternativa3'];
                            $alternativa4 = $row['alternativa4'];
                    ?>
                        <div class="col-md-6">
                            <div class="card bg-secondary">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($pergunta); ?></h5>
                                    <form method="post" action="/vip-enquetes/">
                                        <input type="hidden" name="idEnquete" value="<?php echo $idEnquete; ?>">
                                        <input type="hidden" name="enviando" value="S">
                                        
                                        <?php if ($alternativa1 != "") { ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="voto" value="valor1" id="alt1_<?php echo $idEnquete; ?>">
                                                <label class="form-check-label" for="alt1_<?php echo $idEnquete; ?>">
                                                    <?php echo htmlspecialchars($alternativa1); ?>
                                                </label>
                                            </div>
                                        <?php } ?>
                                        
                                        <?php if ($alternativa2 != "") { ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="voto" value="valor2" id="alt2_<?php echo $idEnquete; ?>">
                                                <label class="form-check-label" for="alt2_<?php echo $idEnquete; ?>">
                                                    <?php echo htmlspecialchars($alternativa2); ?>
                                                </label>
                                            </div>
                                        <?php } ?>
                                        
                                        <?php if ($alternativa3 != "") { ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="voto" value="valor3" id="alt3_<?php echo $idEnquete; ?>">
                                                <label class="form-check-label" for="alt3_<?php echo $idEnquete; ?>">
                                                    <?php echo htmlspecialchars($alternativa3); ?>
                                                </label>
                                            </div>
                                        <?php } ?>
                                        
                                        <?php if ($alternativa4 != "") { ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="voto" value="valor4" id="alt4_<?php echo $idEnquete; ?>">
                                                <label class="form-check-label" for="alt4_<?php echo $idEnquete; ?>">
                                                    <?php echo htmlspecialchars($alternativa4); ?>
                                                </label>
                                            </div>
                                        <?php } ?>
                                        
                                        <div class="mt-3">
                                            <button type="submit" class="btn btn-primary">Votar</button>
                                            <a href="#" onclick="window.open('/resultado_enquete.php?idEnquete=<?php echo $idEnquete; ?>','','location=0,status=1,scrollbars=1,toolbar=0,resizable=1,width=650,height=350');" class="btn btn-outline-light ms-2">Ver Resultados</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    }
                    ?>
                </div>

                <?php include("banner_informativo.php") ?>
                <?php include("banner_informativo2.php") ?>
                <?php include("banner_informativo3.php") ?>
            </div>
        </div>

        <?php include("rodape-novo.php"); ?>
    </div>

    <?php
    if (isset($_POST["enviando"]) && $_POST["enviando"] == "S") {
        $idEnquete = $_POST["idEnquete"]; 
        $voto = $_POST["voto"];     
        
        if ($voto != "") {
            $sql = "UPDATE enquete SET `$voto` = `$voto` + 1, totalValor = totalValor + 1 WHERE idEnquete = $idEnquete"; 
            mysqli_query($conexao, $sql);
            echo "<script>alert('Obrigado pelo seu voto!');</script>";
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <?php include("php/google.php"); ?>
</body>
</html>