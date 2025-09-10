<?php
$conexao = require_once 'php/conecta_mysql.php';

$sql = "SELECT * FROM seo, tipoSeo WHERE seo.idTipoSeo = tipoSeo.idTipoSeo AND descricao = 'DuvidasFrequentes'";
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
                    <h1 class="display-6 fw-bold">Dúvidas Frequentes</h1>
                </div>

                <!-- Conteúdo de Dúvidas (Accordion Bootstrap) -->
                <div class="row">
                    <div class="col-12">
                        <div class="accordion" id="accordionDuvidas">
                            
                            <div class="accordion-item bg-secondary">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-secondary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                        1- O site vipluxuria.com agencia suas acompanhantes?
                                    </button>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionDuvidas">
                                    <div class="accordion-body text-light">
                                        O site Vip Luxúria não agencia nenhuma das acompanhantes do site. Não faz parte do nosso negócio cobrar taxa ou comissão sobre os trabalhos realizados pelas(os) nossas(os) anunciantes e os visitantes do site. As(os) modelos e demais anunciantes pagam uma taxa mensal para manterem seus anúncios conosco, portanto, todas as negociações devem ser feitas diretamente com as(os) anunciantes, através de seus próprios números de telefone publicados em seus respectivos anúncios.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item bg-secondary mt-2">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-secondary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                        2- O site vipluxuria.com anuncia menores de idade?
                                    </button>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#accordionDuvidas">
                                    <div class="accordion-body text-light">
                                        Não. O site vipluxuria.com respeita o Estatuto da Criança e do Adolescente, portanto, não publica anúncios de menores de idade. Para isso, temos um rígido sistema de controle das anunciantes. Solicitamos ainda que, caso alguma pessoa tenha conhecimento, ou mesmo suspeite, de que menores de idade estão anunciando no site (no caso com documentos falsos), que nos informe para que possamos averiguar e retirá-las do ar imediatamente.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item bg-secondary mt-2">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-secondary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                        3- O site vipluxuria.com anuncia agências de acompanhantes?
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#accordionDuvidas">
                                    <div class="accordion-body text-light">
                                        Sim. O site vipluxuria.com anuncia agências e agenciadores, pois foi verificado que uma parcela de modelos trabalha com uma pessoa intermediando os contatos. Todas as informações contidas nos anúncios de nossos clientes são de inteira responsabilidade do mesmo, sendo a Vipluxúria.com apenas um meio de publicidade no qual nossos clientes anunciam para seu público alvo.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item bg-secondary mt-2">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-secondary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                        4- O que fazer se a acompanhante escolhida não for a mesma da foto?
                                    </button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#accordionDuvidas">
                                    <div class="accordion-body text-light">
                                        Caso você negocie com alguma anunciante e apareça outra no lugar da mesma, recomendamos que você cancele sumariamente seu encontro e nos denuncie imediatamente (O site vipluxuria.com mantém sigilo total de todas as denúncias recebidas) para que possamos retirar a anunciante do site até que a situação seja esclarecida. Para maiores informações, <a href="/dicas.php" class="text-warning">clique aqui</a>.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item bg-secondary mt-2">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-secondary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5">
                                        5- Com que periodicidade o site é atualizado?
                                    </button>
                                </h2>
                                <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#accordionDuvidas">
                                    <div class="accordion-body text-light">
                                        O site vipluxuria.com é atualizado e monitorado diariamente. Atualizamos conforme a necessidade e a entrada de novas anunciantes.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item bg-secondary mt-2">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-secondary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6">
                                        6- De quem é a responsabilidade pelos contatos ou encontros?
                                    </button>
                                </h2>
                                <div id="collapse6" class="accordion-collapse collapse" data-bs-parent="#accordionDuvidas">
                                    <div class="accordion-body text-light">
                                        Somos apenas uma empresa de classificados e não nos responsabilizamos por quaisquer problemas que houver entre visitantes e anunciantes. Portanto, recomendamos todos os cuidados possíveis em uma negociação com anunciantes de qualquer tipo que venha a anunciar serviços na internet. Para maiores informações, <a href="/dicas.php" class="text-warning">clique aqui</a>.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item bg-secondary mt-2">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-secondary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7">
                                        7- Como melhor proceder ao contratar uma anunciante?
                                    </button>
                                </h2>
                                <div id="collapse7" class="accordion-collapse collapse" data-bs-parent="#accordionDuvidas">
                                    <div class="accordion-body text-light">
                                        Para maiores informações, detalhes e dúvidas sobre esse assunto por gentileza <a href="/dicas.php" class="text-warning">clique aqui</a>.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <?php include("banner_informativo.php") ?>
                <?php include("banner_informativo2.php") ?>
                <?php include("banner_informativo3.php") ?>
            </div>
        </div>

        <?php include("rodape-novo.php"); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <?php include("php/google.php"); ?>
</body>
</html>