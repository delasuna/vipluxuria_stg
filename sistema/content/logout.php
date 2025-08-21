<?
/*
	Esta transaзгo destrуi a sessгo do usuбrio e exibe
	o formulбrio de login
*/
include("../inc/common.php");
setSession("sis_username","");
setSession("sis_level","");
setSession("sis_apl","");
unset($_SESSION["sis_username"]);
unset($_SESSION["sis_level"]);
unset($_SESSION["sis_apl"]);
unset($_SESSION["cod_agencia"]);
unset($_SESSION["agencia"]);
redirect("../common/index.php","top");
?>