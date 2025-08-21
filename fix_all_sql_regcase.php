<?php
set_time_limit(300); // 5 minutos para processar tudo
header('Content-Type: text/html; charset=UTF-8');

echo "<h1>&#128295; Corrigindo todos os arquivos com sql_regcase()</h1>";

// Lista de arquivos a corrigir
$files_to_fix = array(
    '/conteudo/mulheres-old-25-06.php',
    '/conteudo/mulheres.php',
    '/conteudo/perfil-04.php',
    '/conteudo/perfil-2.php',
    '/conteudo/perfil-homens-2.php',
    '/conteudo/perfil-homens.php',
    '/conteudo/perfil-transex-2.php',
    '/conteudo/perfil-transex.php',
    '/conteudo/perfil.php',
    '/m/conteudo/acompanhantes-porto-alegre.php',
    '/m/conteudo/casais-e-homens.php',
    '/m/conteudo/classificados.php',
    '/m/conteudo/homens.php',
    '/m/conteudo/perfil-2.php',
    '/m/conteudo/perfil-homens-2.php',
    '/m/conteudo/perfil-homens.php',
    '/m/conteudo/perfil-transex-2.php',
    '/m/conteudo/perfil-transex.php',
    '/m/conteudo/perfil.php',
    '/m/conteudo/transex.php',
    '/m/php/topo.php',
    '/php/menu.php',
    '/sistema/inc/common.php',
    '/enviar_perfil.php',
    '/resultado_enquete.php'
);

// Função anti_injection corrigida para substituir
$new_function = '
function anti_injection($sql) {
    if (empty($sql)) {
        return \'\';
    }
    
    // Lista de palavras perigosas para SQL
    $palavras_perigosas = array(
        \'from\', \'select\', \'insert\', \'delete\', \'where\', \'having\', 
        \'union\', \'drop table\', \'sleep\', \'show tables\', \'#\', \'--\'
    );
    
    // Remove palavras perigosas (case insensitive)
    foreach ($palavras_perigosas as $palavra) {
        $sql = preg_replace(\'/\b\' . preg_quote($palavra, \'/\') . \'\b/i\', \'\', $sql);
    }
    
    // Remove caracteres especiais perigosos
    $sql = str_replace(array(\'\\\\\', \'*\', \'|\'), \'\', $sql);
    $sql = trim($sql);
    $sql = strip_tags($sql);
    $sql = addslashes($sql);
    
    return $sql;
}';

$new_function2 = '
function anti_injection2($sql) {
    if (empty($sql)) {
        return \'\';
    }
    
    // Lista de palavras perigosas para SQL
    $palavras_perigosas = array(
        \'from\', \'select\', \'insert\', \'delete\', \'where\', \'having\', 
        \'union\', \'drop table\', \'sleep\', \'show tables\', \'#\', \'--\'
    );
    
    // Remove palavras perigosas (case insensitive)
    foreach ($palavras_perigosas as $palavra) {
        $sql = preg_replace(\'/\b\' . preg_quote($palavra, \'/\') . \'\b/i\', \'\', $sql);
    }
    
    // Remove caracteres especiais perigosos
    $sql = str_replace(array(\'\\\\\', \'*\', \'|\'), \'\', $sql);
    $sql = trim($sql);
    $sql = strip_tags($sql);
    $sql = addslashes($sql);
    
    return $sql;
}';

$fixed_count = 0;
$error_count = 0;

foreach ($files_to_fix as $file) {
    $full_path = $_SERVER['DOCUMENT_ROOT'] . $file;
    
    if (!file_exists($full_path)) {
        echo "&#10060; Arquivo não encontrado: $file<br>";
        $error_count++;
        continue;
    }
    
    // Fazer backup
    $backup_path = $full_path . '.backup_' . date('Y-m-d_H-i-s');
    copy($full_path, $backup_path);
    
    // Ler conteúdo
    $content = file_get_contents($full_path);
    $original_content = $content;
    
    // Verificar qual função anti_injection existe
    $has_anti_injection = (strpos($content, 'function anti_injection(') !== false);
    $has_anti_injection2 = (strpos($content, 'function anti_injection2(') !== false);
    
    // Substituir a função anti_injection existente
    if ($has_anti_injection) {
        // Encontrar e substituir a função completa
        $pattern = '/function\s+anti_injection\s*\([^)]*\)\s*\{[^}]*sql_regcase[^}]*\}/s';
        if (preg_match($pattern, $content)) {
            $content = preg_replace($pattern, ltrim($new_function), $content);
        }
    }
    
    // Substituir a função anti_injection2 existente
    if ($has_anti_injection2) {
        // Encontrar e substituir a função completa
        $pattern = '/function\s+anti_injection2\s*\([^)]*\)\s*\{[^}]*sql_regcase[^}]*\}/s';
        if (preg_match($pattern, $content)) {
            $content = preg_replace($pattern, ltrim($new_function2), $content);
        }
    }
    
    // Se ainda tiver sql_regcase, fazer substituição direta
    if (strpos($content, 'sql_regcase') !== false) {
        // Substituir sql_regcase por preg_quote com flag 'i' para case insensitive
        $content = preg_replace(
            '/sql_regcase\s*\(\s*"([^"]+)"\s*\)/',
            '"/$1/i"',
            $content
        );
        
        // Alternativa para quando usa aspas simples
        $content = preg_replace(
            '/sql_regcase\s*\(\s*\'([^\']+)\'\s*\)/',
            '\'/$1/i\'',
            $content
        );
    }
    
    // Substituir tags PHP curtas
    $content = str_replace('<?', '<?php', $content);
    $content = str_replace('<?php=', '<?=', $content); // Manter <?= funcionando
    $content = str_replace('<?phpphp', '<?php', $content); // Corrigir duplicação
    
    // Verificar se $_REQUEST está sendo usado sem isset()
    $content = preg_replace(
        '/\$_REQUEST\["([^"]+)"\]/',
        'isset($_REQUEST["$1"]) ? $_REQUEST["$1"] : ""',
        $content
    );
    
    // Evitar duplicação de isset
    $content = str_replace('isset(isset(', 'isset(', $content);
    
    // Salvar arquivo corrigido
    if ($content !== $original_content) {
        if (file_put_contents($full_path, $content)) {
            echo "&#9989; Corrigido: $file<br>";
            $fixed_count++;
        } else {
            echo "&#10060; Erro ao salvar: $file<br>";
            $error_count++;
        }
    } else {
        echo "&#9197;&#65039; Sem mudanças: $file<br>";
    }
}

echo "<hr>";
echo "<h2>&#128202; Resumo:</h2>";
echo "<p>&#9989; Arquivos corrigidos: $fixed_count</p>";
echo "<p>&#10060; Erros: $error_count</p>";
echo "<p>&#128193; Backups criados com extensão .backup_" . date('Y-m-d_H-i-s') . "</p>";

echo "<hr>";
echo "<h3>&#128269; Verificando se ainda existe sql_regcase:</h3>";

// Verificar novamente
$still_has_problems = false;
foreach ($files_to_fix as $file) {
    $full_path = $_SERVER['DOCUMENT_ROOT'] . $file;
    if (file_exists($full_path)) {
        $content = file_get_contents($full_path);
        if (stripos($content, 'sql_regcase') !== false) {
            echo "&#9888;&#65039; Ainda tem sql_regcase em: $file<br>";
            $still_has_problems = true;
        }
    }
}

if (!$still_has_problems) {
    echo "<p>&#9989; <strong>Todos os arquivos foram corrigidos com sucesso!</strong></p>";
    echo "<p><a href='/'>Testar o site</a></p>";
} else {
    echo "<p>&#9888;&#65039; Alguns arquivos ainda precisam de correção manual.</p>";
}
?>