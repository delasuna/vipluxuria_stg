<?php
// CAMADA DE COMPATIBILIDADE MYSQL - FUNCIONA ATÉ PHP 8.3
if (!function_exists('mysql_connect')) {
    $GLOBALS['mysql_link'] = null;
    
    function mysql_connect($host, $user, $pass) {
        $GLOBALS['mysql_link'] = mysqli_connect($host, $user, $pass);
        return $GLOBALS['mysql_link'];
    }
    
    function mysql_select_db($db, $link = null) {
        $link = $link ?: $GLOBALS['mysql_link'];
        return mysqli_select_db($link, $db);
    }
    
    function mysql_query($query, $link = null) {
        $link = $link ?: $GLOBALS['mysql_link'];
        return mysqli_query($link, $query);
    }
    
    function mysql_fetch_array($result, $type = MYSQLI_BOTH) {
        if (!$result) return false;
        return mysqli_fetch_array($result, $type);
    }
    
    function mysql_fetch_row($result) {
        if (!$result) return false;
        return mysqli_fetch_row($result);
    }
    
    function mysql_fetch_assoc($result) {
        if (!$result) return false;
        return mysqli_fetch_assoc($result);
    }
    
    function mysql_num_rows($result) {
        if (!$result) return 0;
        return mysqli_num_rows($result);
    }
    
    function mysql_error($link = null) {
        $link = $link ?: $GLOBALS['mysql_link'];
        return mysqli_error($link);
    }
    
    function mysql_insert_id($link = null) {
        $link = $link ?: $GLOBALS['mysql_link'];
        return mysqli_insert_id($link);
    }
    
    function mysql_real_escape_string($string, $link = null) {
        $link = $link ?: $GLOBALS['mysql_link'];
        return mysqli_real_escape_string($link, $string);
    }
    
    function mysql_close($link = null) {
        $link = $link ?: $GLOBALS['mysql_link'];
        return mysqli_close($link);
    }
    
    function mysql_free_result($result) {
        if (!$result) return false;
        return mysqli_free_result($result);
    }
    
    function mysql_affected_rows($link = null) {
        $link = $link ?: $GLOBALS['mysql_link'];
        return mysqli_affected_rows($link);
    }
}
?>