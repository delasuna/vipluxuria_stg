<?php
$conexao = require_once 'php/conecta_mysql.php';

$sql = "SELECT * FROM seo, tipoSeo WHERE seo.idTipoSeo = tipoSeo.idTipoSeo AND descricao = 'Dicas'";
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
        <div class="dicas-page-premium">
            <div class="container">
                
                <!-- Header das Dicas -->
                <div class="dicas-header-premium">
                    <h1 class="dicas-title-main">
                        <i class="bi bi-lightbulb"></i>
                        Dicas para Contratar <span class="text-rosa">Acompanhantes</span>
                    </h1>
                    <p class="dicas-subtitle">Guia completo para uma experiência segura e satisfatória</p>
                </div>

                <!-- Introdução -->
                <div class="dicas-intro-card">
                    <h2>O que é preciso saber antes de contratar?</h2>
                    <p>Baseado em nossa experiência desde 2008, preparamos 
                    11 dicas essenciais para garantir a melhor experiência possível.</p>
                </div>

                <!-- Grid de Dicas -->
                <div class="dicas-grid-premium">
                    
                    <div class="dica-card">
                        <div class="dica-number">01</div>
                        <div class="dica-content">
                            <h3>Prefira perfis com vídeos</h3>
                            <p>Acompanhantes que têm vídeos em seus perfis diminuem consideravelmente 
                            a probabilidade de insatisfação em relação ao perfil físico. 
                            <strong>Use o filtro "Com Vídeo" no menu do site.</strong></p>
                        </div>
                    </div>

                    <div class="dica-card">
                        <div class="dica-number">02</div>
                        <div class="dica-content">
                            <h3>Leia o perfil completo</h3>
                            <p>Antes de ligar, leia atentamente o perfil da modelo. Nossos perfis 
                            são completos e dão uma boa noção do tipo de serviço oferecido.</p>
                        </div>
                    </div>

                    <div class="dica-card">
                        <div class="dica-number">03</div>
                        <div class="dica-content">
                            <h3>Consulte fóruns especializados</h3>
                            <p>Existem fóruns como www.gpguia.net onde você pode ver relatos de 
                            outros clientes e compartilhar suas próprias experiências.</p>
                        </div>
                    </div>

                    <div class="dica-card">
                        <div class="dica-number">04</div>
                        <div class="dica-content">
                            <h3>Seja educado e cordial</h3>
                            <p>Ao ligar, seja educado. Gentileza atrai gentileza. Deixe claro suas 
                            expectativas e confirme se ela pode atendê-las.</p>
                        </div>
                    </div>

                    <div class="dica-card">
                        <div class="dica-number">05</div>
                        <div class="dica-content">
                            <h3>Estabeleça condições claras</h3>
                            <p>Enfatize que se a modelo não for a mesma das fotos ou tiverem muito 
                            photoshop, você não utilizará os serviços. Seja firme mas respeitoso.</p>
                        </div>
                    </div>

                    <div class="dica-card">
                        <div class="dica-number">06</div>
                        <div class="dica-content">
                            <h3>Não seja conivente com fraudes</h3>
                            <p>Se a modelo não for a mesma das fotos, dispense educadamente. Sua 
                            atitude ajuda a melhorar o mercado para todos.</p>
                        </div>
                    </div>

                    <div class="dica-card">
                        <div class="dica-number">07</div>
                        <div class="dica-content">
                            <h3>Compartilhe sua experiência</h3>
                            <p>Use fóruns e avaliações para reclamar de mau serviço e elogiar 
                            bons atendimentos. Seu feedback é importante.</p>
                        </div>
                    </div>

                    <div class="dica-card">
                        <div class="dica-number">08</div>
                        <div class="dica-content">
                            <h3>Valorize o bom atendimento</h3>
                            <p>Quando for bem atendido, faça propaganda positiva. Isso incentiva 
                            a melhoria contínua dos serviços.</p>
                        </div>
                    </div>

                    <div class="dica-card">
                        <div class="dica-number">09</div>
                        <div class="dica-content">
                            <h3>Evite pechinchar</h3>
                            <p>Não peça desconto. Pesquise bem entre as opções disponíveis e 
                            escolha o serviço que cabe no seu orçamento.</p>
                        </div>
                    </div>

                    <div class="dica-card">
                        <div class="dica-number">10</div>
                        <div class="dica-content">
                            <h3>Trate como qualquer serviço</h3>
                            <p>A prestação de serviços de acompanhantes é semelhante a outras. 
                            Tome os mesmos cuidados e exigências.</p>
                        </div>
                    </div>

                </div>

                <!-- Call to Action -->
                <div class="dicas-cta-section">
                    <h3>Precisa de mais ajuda?</h3>
                    <p>Nossa equipe está disponível para orientações</p>
                    <div class="dicas-cta-buttons">
                        <a href="/duvidas.php" class="btn-dicas-premium">
                            <i class="bi bi-question-circle"></i> Ver Dúvidas Frequentes
                        </a>
                
                        </a>
                    </div>
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