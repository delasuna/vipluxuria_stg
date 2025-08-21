<?php
echo "<h2>Diagnóstico de Caminhos:</h2>";

// Verificar estrutura de pastas
echo "<h3>1. Document Root:</h3>";
echo "<pre>" . $_SERVER['DOCUMENT_ROOT'] . "</pre>";

echo "<h3>2. Pasta atual:</h3>";
echo "<pre>" . __DIR__ . "</pre>";

echo "<h3>3. Verificando arquivos CSS/JS:</h3>";

$files_to_check = [
    'css-js/estilos-2.css',
    'css-js/popup/jquery-1.10.1.min.js',
    'css-js/popup/jquery.mousewheel-3.0.6.pack.js',
    'imagens/estrutura/vip-luxuria-home-2018.png',
    'imagens/estrutura/bt-desktop-2018.png',
    'imagens/estrutura/bt-mobile-2018.png'
];

foreach ($files_to_check as $file) {
    $full_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $file;
    $exists = file_exists($full_path);
    
    echo $exists ? "&#9989;" : "&#10060;";
    echo " /{$file}";
    
    if ($exists) {
        $size = filesize($full_path);
        echo " (" . number_format($size) . " bytes)";
    } else {
        // Tentar sem a barra inicial
        $alt_path = $_SERVER['DOCUMENT_ROOT'] . '/' . ltrim($file, '/');
        if (file_exists($alt_path)) {
            echo " - ENCONTRADO em: " . $alt_path;
        }
    }
    echo "<br>";
}

echo "<h3>4. Pastas na raiz:</h3>";
echo "<pre>";
$dirs = scandir($_SERVER['DOCUMENT_ROOT']);
foreach ($dirs as $dir) {
    if (is_dir($_SERVER['DOCUMENT_ROOT'] . '/' . $dir) && $dir != '.' && $dir != '..') {
        echo "&#128193; " . $dir . "\n";
    }
}
echo "</pre>";

echo "<h3>5. URL atual do site:</h3>";
echo "<pre>";
echo "Protocol: " . (isset($_SERVER['HTTPS']) ? 'https' : 'http') . "\n";
echo "Host: " . $_SERVER['HTTP_HOST'] . "\n";
echo "Base URL: " . (isset($_SERVER['HTTPS']) ? 'https' : 'http') . "://" . $_SERVER['HTTP_HOST'] . "/";
echo "</pre>";
?>