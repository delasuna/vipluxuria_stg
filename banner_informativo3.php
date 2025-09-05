<script language="JavaScript">
    function validaEmail2(field) {
        usuario = field.substring(0, field.indexOf("@"));
        dominio = field.substring(field.indexOf("@") + 1, field.length);

        if ((usuario.length >= 1) && (dominio.length >= 3) && (usuario.search("@") == -1) && (dominio.search("@") == -1) && (usuario.search(" ") == -1) && (dominio.search(" ") == -1) && (dominio.search(".") != -1) && (dominio.indexOf(".") >= 1) && (dominio.lastIndexOf(".") < dominio.length - 1)) {
            document.formNews.submit();
        } else {
            alert("E-mail invalido. Informe novamente!");
        }
    }

    function assinarRemoverNews() {
        var rads = document.getElementsByName("acaoRadio");
        for (var i = 0; i < rads.length; i++) {
            if (rads[i].checked) {
                document.formNews.acao.value = rads[i].value;
            }
        }
        validaEmail2(document.getElementById("emailNews").value);
    }
</script>
<!-- Newsletter Moderno -->
<div class="py-5" style="background: linear-gradient(135deg, #e91e63, #d81b60); border-radius: 1rem;">
    <div class="container text-center text-white">

        <!-- Título -->
        <h4 class="fw-bold mb-2">
            📩 Receba Novidades e Promoções
        </h4>
        <p class="mb-4">Cadastre-se e fique por dentro das melhores oportunidades para anunciantes</p>

        <!-- Formulário -->
        <form id="formNews" name="formNews" method="post" action="/acompanhantes_porto_alegre.php" class="d-flex justify-content-center flex-wrap gap-2">
            <input type="hidden" name="acao" id="acao" value="assinar">

            <div class="input-group input-group-lg" style="max-width: 600px;">
                <input type="email" name="emailNews" id="emailNews" class="form-control rounded-pill" placeholder="Seu melhor e-mail" required>
                <button type="submit" class="btn btn-light rounded-pill fw-bold ms-2" style="color:#e91e63;">
                    Enviar
                </button>
            </div>

            <!-- Radios modernizados -->
            <div class="d-flex justify-content-center gap-3 mt-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="acaoRadio" id="assinar" value="assinar" checked onclick="document.getElementById('acao').value='assinar'">
                    <label class="form-check-label" for="assinar">Cadastrar</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="acaoRadio" id="remover" value="remover" onclick="document.getElementById('acao').value='remover'">
                    <label class="form-check-label" for="remover">Descadastrar</label>
                </div>
            </div>
        </form>

        <!-- Aviso -->
        <p class="small mt-3 mb-0">
            Prometemos não enviar spam. Máximo 2 e-mails por mês.
        </p>
    </div>
</div>

<?php
if (isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "assinar") {
    $email = $_POST["emailNews"];

    if ($email != "") {
        $sql = "SELECT * FROM newsletter WHERE email = '" . mysqli_real_escape_string($conexao, $email) . "'";
        $resultado = mysqli_query($conexao, $sql);

        if (!$resultado) {
            die("Impossível visualizar o newsletter: " . mysqli_error($conexao) . '<br>');
        }

        $registros = mysqli_num_rows($resultado);

        if ($registros > 0) {
            echo "<script>alert('E-mail já cadastrado!');</script>";
        } else {
            $sql = "INSERT INTO newsletter (email) VALUES ('" . mysqli_real_escape_string($conexao, $email) . "')";
            $resultado = mysqli_query($conexao, $sql);
            echo "<script>alert('Você foi adicionado com sucesso!');</script>";
        }
    }
}

if (isset($_REQUEST["acao"]) && $_REQUEST["acao"] == "remover") {
    $email = $_POST["emailNews"];

    if ($email != "") {
        $sql = "DELETE FROM newsletter WHERE email = '" . mysqli_real_escape_string($conexao, $email) . "'";
        $resultado = mysqli_query($conexao, $sql);
        echo "<script>alert('Você foi removido com sucesso!');</script>";
    }
}
?>