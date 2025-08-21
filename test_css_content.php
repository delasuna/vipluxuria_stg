<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Teste CSS</title>
    <link href="/css-js/estilos-2.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>Teste de CSS</h1>
    <div id="wrap-2">
        <div id="abertura-content-2">
            <p>Se este texto aparecer estilizado, o CSS está funcionando.</p>
        </div>
    </div>
    
    <h2>Verificação de Charset:</h2>
    <p>Acentuação: áéíóú âêîôû ãõ ç</p>
    
    <h2>Status do CSS:</h2>
    <?php
    $css_file = $_SERVER['DOCUMENT_ROOT'] . '/css-js/estilos-2.css';
    $css_content = file_get_contents($css_file);
    echo "<p>Tamanho do CSS: " . strlen($css_content) . " bytes</p>";
    echo "<p>Primeiros 200 caracteres do CSS:</p>";
    echo "<pre>" . htmlspecialchars(substr($css_content, 0, 200)) . "</pre>";
    ?>
</body>
</html>