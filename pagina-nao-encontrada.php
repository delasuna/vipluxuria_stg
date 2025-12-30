<?php
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php include 'head.php'; ?>

<body>
    <div id="wrap">

        <div>
            <?php include("php/menu-2.php"); ?>
        </div>

        <div class="degrade">
            <div class="vantagens-page-premium">
                <div class="container">

                    <!-- Header -->
                    <div class="dicas-header-premium pt-5 text-center">
                        <h1 class="dicas-title-main">
                            <i class="bi bi-exclamation-triangle"></i>
                            P&aacute;gina <span class="text-rosa">n&atilde;o encontrada</span>
                        </h1>
                        <p class="mt-2">
                            Parece que o conte&uacute;do que voc&ecirc; procura n&atilde;o existe, foi removido
                            ou o link est&aacute; incorreto.
                        </p>
                    </div>

                    <!-- Intro -->
                    <div class="dicas-intro-card text-center mb-0">
                        <h2>Mas n&atilde;o se preocupe 😉</h2>
                        <p>
                            Voc&ecirc; pode voltar para a p&aacute;gina inicial ou explorar outras &aacute;reas do site.
                        </p>

                        <a href="javascript:void(0)" class="btn btn-primary mt-2" onclick="history.back()">
                            <i class="bi bi-house"></i> Voltar para a p&aacute;gina anterior
                        </a>

                    </div>

                </div>

            </div>

            <?php include("rodape-novo.php"); ?>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
        <?php include("php/google.php"); ?>

</body>

</html>