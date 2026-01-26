<?php
$conexao = require_once 'php/conecta_mysql.php';

$title = "Calculadora de Ganhos | Vip Luxuria";
$description = "Descubra quanto voc&ecirc; pode ganhar como acompanhante com nossa calculadora de ganhos.";
$keywords = "calculadora de ganhos, acompanhantes, faturamento";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<?php include 'head.php'; ?>

<body>
    <div id="wrap">

        <?php include("php/menu-2.php"); ?>

        <div class="degrade">
            <div class="calculadora-page pb-5">
                <div class="container">

                    <!-- HERO -->
                    <div class="calc-hero text-center pt-3">
                        <div class="calc-hero-text">
                            <h1><span class="text-light">Calculadora de</span> <span class="text-rosa">Ganhos</span></h1>
                            <p class="text-light">Descubra quanto voc&ecirc; pode ganhar com seu an&uacute;ncio.</p>
                            <button class="btn-anuncie-badge"><a href="/como-anunciar" class="btn btn-rosa">Anuncie no Vip Lux&uacute;ria</a></button>
                        </div>
                    </div>

                    <div class="calc-texto-intro text-center mt-5">

                        <h2 class="text-light">
                            Quanto voc&ecirc; pode ganhar com seu an&uacute;ncio na
                            <span class="text-rosa">Vip Lux&uacute;ria</span>
                        </h2>

                        <p class="text-light fw-semibold mt-3">
                            Planeje sua vida com a calculadora de ganhos.
                        </p>

                        <p class="text-light mt-3 calc-descricao mx-auto">
                            A calculadora ajuda voc&ecirc; a estimar seus rendimentos de forma personalizada,
                            facilitando sua organiza&ccedil;&atilde;o financeira.
                            <br><br>
                            <strong>Importante:</strong> Esta ferramenta &eacute; para uso exclusivo pessoal,
                            e os valores s&atilde;o estimativos. A Vip Lux&uacute;ria apenas oferece o espa&ccedil;o publicit&aacute;rio,
                            sem gerenciar negocia&ccedil;&otilde;es ou pagamentos, que s&atilde;o de responsabilidade da pessoa
                            acompanhante, conforme a legisla&ccedil;&atilde;o vigente.
                            <br><br>
                        </p>

                    </div>


                    <!-- CALCULADORA -->
                    <div class="calc-box">

                        <div class="calc-form">

                            <h3>Calcule seus <span class="text-rosa">Ganhos</span></h3>

                            <label>Valor de cada atendimento</label>
                            <div class="calc-input-number">
                                <button type="button" class="btn-calc" onclick="alterarValor(-10)">&#8722;</button>
                                <input id="valor" value="200">
                                <button type="button" class="btn-calc" onclick="alterarValor(10)">+</button>
                            </div>

                            <div class="calc-slider">
                                <span class="calc-slider-label" id="diaLabel">
                                    4 atendimentos por dia
                                </span>
                                <input type="range" id="atendimentosDia" min="1" max="10" value="4">
                            </div>

                            <div class="calc-slider mt-4">
                                <span class="calc-slider-label" id="semanaLabel">
                                    5 dias por semana
                                </span>
                                <input type="range" id="diasSemana" min="1" max="7" value="5">
                            </div>

                        </div>

                        <div class="calc-result d-flex align-items-center">
                            <div>
                                <h4>Total estimado por m&ecirc;s</h4>
                                <div class="calc-valor">
                                    R$ <span id="resultado">0,00</span>
                                </div>

                                <p class="calc-info">
                                    Valores estimados. N&atilde;o representam garantia de faturamento.
                                </p>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>

        <?php include("rodape-novo.php"); ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/calculadora-ganhos.js"></script>
    <script>
        function alterarValor(delta) {
            const input = document.getElementById("valor");
            let valor = parseInt(input.value) || 0;

            valor += delta;
            if (valor < 0) valor = 0;

            input.value = valor;
            calcularGanhos();
        }


        function calcularGanhos() {
            const valor = parseFloat(document.getElementById("valor").value) || 0;
            const atendimentos = parseInt(document.getElementById("atendimentosDia").value);
            const dias = parseInt(document.getElementById("diasSemana").value);

            const semanasMes = 4;
            const total = valor * atendimentos * dias * semanasMes;

            document.getElementById("resultado").innerText =
                total.toLocaleString("pt-BR", {
                    minimumFractionDigits: 2
                });
        }

        document.querySelectorAll("#valor, #atendimentosDia, #diasSemana")
            .forEach(el => el.addEventListener("input", calcularGanhos));

        document.getElementById("atendimentosDia").addEventListener("input", e => {
            document.getElementById("diaLabel").innerText =
                `${e.target.value} atendimentos por dia`;
        });

        document.getElementById("diasSemana").addEventListener("input", e => {
            document.getElementById("semanaLabel").innerText =
                `${e.target.value} dias por semana`;
        });


        calcularGanhos();
    </script>
    <?php include("php/google.php"); ?>
</body>

</html>