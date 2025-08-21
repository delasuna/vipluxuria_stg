<?php

//if (!isset($_SESSION)) { 
	session_start();

//}
if (!isset($_SESSION['usuario2'])) {
	session_destroy(); 
	header("Location: index.php"); 
	//exit; 
} 
?> 

