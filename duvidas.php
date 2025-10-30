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
        </div>
        <div class="degrade">
        <div class="duvidas-page-premium">
            <div class="container">
                
                <!-- Header das Dúvidas -->
                <div class="duvidas-header-premium">
                    <h1 class="duvidas-title-main">
                        <i class="bi bi-question-circle"></i>
                        Dúvidas <span class="text-rosa">Frequentes</span>
                    </h1>
                    <p class="duvidas-subtitle">Tudo que você precisa saber sobre nossos serviços</p>
                </div>

                <!-- FAQ Premium Accordion -->
                <div class="faq-container-premium">
                    
                    <div class="faq-item-premium">
                        <button class="faq-question" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#faq1" aria-expanded="false">
                            <span class="faq-number">01</span>
                            <span class="faq-text">O site vipluxuria.com agencia suas acompanhantes?</span>
                            <i class="bi bi-chevron-down faq-arrow"></i>
                        </button>
                        <div id="faq1" class="collapse faq-answer">
                            <div class="faq-answer-content">
                                O site Vip Luxúria não agencia nenhuma das acompanhantes do site. 
                                Não cobramos taxa ou comissão sobre os trabalhos realizados. 
                                As modelos pagam uma taxa mensal para manter seus anúncios conoscos. 
                                Todas as negociações devem ser feitas diretamente com as anunciantes, 
                                através de seus próprios números de telefone publicados.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item-premium">
                        <button class="faq-question" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#faq2" aria-expanded="false">
                            <span class="faq-number">02</span>
                            <span class="faq-text">O site vipluxuria.com anuncia menores de idade?</span>
                            <i class="bi bi-chevron-down faq-arrow"></i>
                        </button>
                        <div id="faq2" class="collapse faq-answer">
                            <div class="faq-answer-content">
                                Não. Respeitamos o Estatuto da Criança e do Adolescente e não publicamos 
                                anúncios de menores de idade. Temos um rígido sistema de controle das anunciantes. 
                                Caso suspeite de menores anunciando com documentos falsos, por favor nos informe 
                                imediatamente para averiguação e remoção.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item-premium">
                        <button class="faq-question" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#faq3" aria-expanded="false">
                            <span class="faq-number">03</span>
                            <span class="faq-text">O site vipluxuria.com anuncia agências de acompanhantes?</span>
                            <i class="bi bi-chevron-down faq-arrow"></i>
                        </button>
                        <div id="faq3" class="collapse faq-answer">
                            <div class="faq-answer-content">
                                Sim. Anunciamos agências e agenciadores, pois uma parcela de modelos trabalha 
                                com intermediação. Todas as informações nos anúncios são de inteira responsabilidade 
                                do anunciante, sendo o VipLuxúria.com apenas um meio de publicidade.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item-premium">
                        <button class="faq-question" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#faq4" aria-expanded="false">
                            <span class="faq-number">04</span>
                            <span class="faq-text">O que fazer se a acompanhante não for a mesma da foto?</span>
                            <i class="bi bi-chevron-down faq-arrow"></i>
                        </button>
                        <div id="faq4" class="collapse faq-answer">
                            <div class="faq-answer-content">
                                Se aparecer outra pessoa no lugar da anunciante, cancele o encontro e nos 
                                denuncie imediatamente. Mantemos sigilo total das denúncias. Retiraremos a 
                                anunciante do site até esclarecimento. 
                                <a href="/dicas.php" class="faq-link">Veja mais dicas aqui</a>.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item-premium">
                        <button class="faq-question" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#faq5" aria-expanded="false">
                            <span class="faq-number">05</span>
                            <span class="faq-text">Com que periodicidade o site é atualizado?</span>
                            <i class="bi bi-chevron-down faq-arrow"></i>
                        </button>
                        <div id="faq5" class="collapse faq-answer">
                            <div class="faq-answer-content">
                                O site vipluxuria.com é atualizado e monitorado diariamente. Atualizamos 
                                conforme a necessidade e a entrada de novas anunciantes, garantindo sempre 
                                conteúdo fresco e atual.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item-premium">
                        <button class="faq-question" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#faq6" aria-expanded="false">
                            <span class="faq-number">06</span>
                            <span class="faq-text">De quem é a responsabilidade pelos contatos ou encontros?</span>
                            <i class="bi bi-chevron-down faq-arrow"></i>
                        </button>
                        <div id="faq6" class="collapse faq-answer">
                            <div class="faq-answer-content">
                                Somos uma empresa de classificados e não nos responsabilizamos por problemas 
                                entre visitantes e anunciantes. Recomendamos todos os cuidados possíveis em 
                                negociações com anunciantes de qualquer tipo na internet. 
                                <a href="/dicas.php" class="faq-link">Confira nossas dicas de segurança</a>.
                            </div>
                        </div>
                    </div>

                    <div class="faq-item-premium">
                        <button class="faq-question" type="button" data-bs-toggle="collapse" 
                                data-bs-target="#faq7" aria-expanded="false">
                            <span class="faq-number">07</span>
                            <span class="faq-text">Como melhor proceder ao contratar uma anunciante?</span>
                            <i class="bi bi-chevron-down faq-arrow"></i>
                        </button>
                        <div id="faq7" class="collapse faq-answer">
                            <div class="faq-answer-content">
                                Preparamos um guia completo com dicas essenciais para garantir uma experiência 
                                segura e satisfatória. 
                                <a href="/dicas.php" class="faq-link">Acesse nosso guia de dicas completo</a>.
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Call to Action -->
                <div class="duvidas-cta-section">
                    <h3>Ainda tem dúvidas?</h3>
                    <p>Nossa equipe está pronta para ajudar</p>
                    <a href="/contato.php" class="btn-contact-premium">
                        <i class="bi bi-whatsapp"></i> Entre em Contato
                    </a>
                </div>

            </div>
        </div>
    </div>

        <?php include("rodape-novo.php"); ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <?php include("php/google.php"); ?>
</body>
</html>