<?php
echo "<h2>Procurando arquivos com sql_regcase()...</h2>";

function searchInFiles($dir, $pattern) {
    $results = array();
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir),
        RecursiveIteratorIterator::SELF_FIRST
    );
    
    foreach ($files as $file) {
        if ($file->isFile() && substr($file->getFilename(), -4) === '.php') {
            $content = file_get_contents($file->getPathname());
            if (stripos($content, 'sql_regcase') !== false) {
                $results[] = str_replace($_SERVER['DOCUMENT_ROOT'], '', $file->getPathname());
            }
        }
    }
    return $results;
}

$problemFiles = searchInFiles($_SERVER['DOCUMENT_ROOT'], 'sql_regcase');

if (count($problemFiles) > 0) {
    echo "<h3>Arquivos que precisam ser corrigidos:</h3>";
    echo "<ul>";
    foreach ($problemFiles as $file) {
        echo "<li>$file</li>";
    }
    echo "</ul>";
} else {
    echo "<p>&#9989; Nenhum arquivo com sql_regcase encontrado!</p>";
}
?>