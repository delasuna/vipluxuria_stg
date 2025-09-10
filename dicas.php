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
            <div id="topo"><?php include("php/topo-2.php"); ?></div>
        </div>
        <?php include("php/slider.php"); ?>
        <?php include 'filters.php' ?>
        
        <div class="bg-dark text-light py-4">
            <div class="container">
                
                <!-- Título -->
                <div class="text-center mb-5">
                    <h1 class="display-6 fw-bold">Dicas para Contratar Acompanhantes</h1>
                </div>

                <!-- Conteúdo de Dicas -->
                <div class="row">
                    <div class="col-12">
                        <div class="p-4 bg-secondary rounded">
                            <h2 class="mb-4">O que é preciso saber antes de contratar os serviços de uma acompanhante?</h2>
                            <p class="lead">Baseado nas nossas experiências e vendo um número crescente de insatisfação dos clientes em relação à prestação de serviço de sexo pago, vamos aqui citar 11 dicas de o que fazer e como proceder para encontrar e melhorar a prestação de serviço.</p>

                            <ol class="mt-4">
                                <li class="mb-3">De preferência as acompanhantes que tem vídeos em seus perfis, isso diminui consideravelmente a probabilidade de insatisfação em relação ao perfil físico da modelo, ou seja, a modelo ter muito photoshop. Também diminui a possibilidade da mesma mandar outra em seu lugar. <strong>No menu do site há um botão que filtra as modelos que tem vídeo.</strong></li>
                                
                                <li class="mb-3">Antes de ligar para modelo leia o perfil dela, o perfil no site é bem completo e vai dar uma boa noção do tipo de serviço que a modelo promete oferecer.</li>
                                
                                <li class="mb-3">Existe fórum como o www.gpguia.net onde você pode ver relatos de outros clientes e você mesmo relatar experiências positivas e ou negativas sobre o site.</li>
                                
                                <li class="mb-3">Ao ligar para modelo seja educado e cordial, gentileza atrai gentileza. Deixe bem claro o que deseja no encontro e se ela está disposta a atender suas expectativas.</li>
                                
                                <li class="mb-3">Sempre ao marcar enfatize que se a modelo não for a mesma das fotos ou as fotos estiverem com muito photoshop você não vai utilizar dos serviços, dificilmente uma modelo vai aceitar tal exigência se ela não se garante em ser o mesmo visto em fotos ou vídeos (claro que para você poder fazer isso você tem que negar o serviço na chegada da modelo no quarto antes da mesma tirar a roupa ou você tocá-la).</li>
                                
                                <li class="mb-3">É fundamental não ser conivente com acompanhantes que prestam serviços mentirosos ou que mandam outras modelos em seu lugar. A modelo não é a mesma das fotos mande embora. (sabemos que é difícil, mais se você já deixar claro que não será conivente com tal prática dificilmente uma modelo que tenha muito photoshop ou que pretende mandar outra em seu lugar o fará, se você já está enfatizando esse ponto ao marcar.</li>
                                
                                <li class="mb-3">Aprenda a usar ferramentas como o fórum www.gpguia.net e outros para fazer reclamações de modelos que agem de má fé bem como elogiar as que atendem bem.</li>
                                
                                <li class="mb-3">É fundamental que você ao ter sido atendido bem faça uma propaganda positiva dessa acompanhante das formas possíveis a você. Somente engrandecendo os atos corretos e não sendo conivente com má prestação de serviço. A prestação de serviço nesse meio irá melhorar.</li>
                                
                                <li class="mb-3">Nós do Vip Luxúria estamos dispostos a fazer o possível para que você encontre um atendimento de qualidade. Fique à vontade de nos mandar um e-mail pedindo indicação das modelos com melhor reputação do site que lhe mandaremos o link das que tem melhor reputação. Lembramos que o Vip Luxúria criou o site Vipluxuriagold.com que conta com algumas das modelos mais bonitas do site, nele não há modelos agenciadas ou com muito photoshop todas tem fotos e vídeos.</li>
                                
                                <li class="mb-3">Evite pedir desconto ou tentar pechinchar cachês, prestadores de serviços dessa área odeiam essa prática. O Site oferece um número elevado de opções, então pesquise bem, que é provável que encontre o que procura. Mas não esqueça que ao contratar um serviço 5 estrelas ou 3 estrelas haverá uma diferença em valor tanto quanto em qualidade.</li>
                                
                                <li class="mb-3">Nunca esqueça que a prestação de serviços de acompanhantes é uma prestação de serviço semelhante a várias outras, então os cuidados e exigências a serem tomadas devem ser semelhantes também.</li>
                            </ol>
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