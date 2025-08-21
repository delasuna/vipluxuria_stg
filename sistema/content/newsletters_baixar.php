<?php
$file = $_REQUEST['arquivo']; 
header("Content-type: application/save"); 
header("Content-Length:".filesize($file)); 
header('Content-Disposition: attachment; filename="' . $file . '"'); 
header('Expires: 0'); 
header('Pragma: no-cache'); 

readfile("$file"); 
?>