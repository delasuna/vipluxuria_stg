<?php
$conexao = require_once '../php/conecta_mysql.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php include '../head.php'; ?>

<body>
<div id="wrap">

    <div>
        <?php include("../php/menu-2.php"); ?>
    </div>

    <div class="degrade">
        <div class="vantagens-page-premium">
            <div class="container">

                <!-- Header -->
                <div class="dicas-header-premium pt-5">
                    <h1 class="dicas-title-main">
                        <i class="bi bi-gem"></i>
                        Vantagens <span class="text-rosa">Vip</span>
                    </h1>
                </div>

                <!-- Introdução -->
                <div class="dicas-intro-card">
                    <h2>Por que anunciar conosco?</h2>
                    <p>
                        Oferecemos visibilidade, credibilidade e um ambiente seguro
                        para acompanhantes e clientes.
                    </p>
                </div>

                <!-- Grid de Vantagens -->
                <div class="dicas-grid-premium" style="margin-bottom: 0 !important;">

                    <div class="dica-card">
                        <div class="dica-number">01</div>
                        <div class="dica-content">
                            <img src="6.png" alt="Alta Visibilidade" class="img-fluid rounded">
                        </div>
                    </div>

                    <div class="dica-card">
                        <div class="dica-number">02</div>
                        <div class="dica-content">
                            <img src="medieval.png" alt="Credibilidade" class="img-fluid rounded">
                        </div>
                    </div>

                    <div class="dica-card">
                        <div class="dica-number">03</div>
                        <div class="dica-content">
                            <img src="sherwood.png" alt="Segurança" class="img-fluid rounded">
                        </div>
                    </div>

                    <div class="dica-card">
                        <div class="dica-number">04</div>
                        <div class="dica-content">
                            <img src="5.png" alt="Alcance" class="img-fluid rounded">
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <?php include("../rodape-novo.php"); ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<?php include("../php/google.php"); ?>

</body>
</html>