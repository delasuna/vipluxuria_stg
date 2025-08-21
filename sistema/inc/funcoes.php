<?
function alert($msg) {
	echo "<script language='JavaScript'>";
	echo "alert('$msg');";
	echo "</script>";
}

function dia_semana() {
	switch(date("w")) {
		case 0	: return("domingo");		break;
		case 1	: return("segunda-feira");	break;
		case 2	: return("terça-feira");	break;
		case 3	: return("quarta-feira");	break;
		case 4	: return("quinta-feira");	break;
		case 5	: return("sexta-feira");	break;
		case 6	: return("sábado");			break;
		default	: return("erro");			break;
	}
}

function strLimit($str, $size, $showDots = false) {
	if (strlen($str) > $size) {
		$tmp = substr($str, 0, $size);
		$p = strrpos($tmp, ' ');
		if ($p) {
			$str = substr($tmp, 0, $p);
		} else {
			$str = $tmp;
		}
		return $str . ($showDots ? "..." : "");
	} else {
		return $str;
	}
}

function geraURL($url) {
	if (substr($url,0,7) == "http://" || substr($url,0,7) == "rtsp://") {
		return($url);
	} elseif (trim($url) == "#" || trim($url) == "javascript:;" || trim($url) == "javascript:void(0)") {
		return($url);
	} else {
		return("http://" . $url);
	}
}

function _stodt($str) {
	$aStr = explode(" ",$str);
	$d = $aStr[0];
	$t = $aStr[1];
	$aD = explode("-",$d);
	$datetime = $aD[2] . "/" . $aD[1] . "/" . $aD[0] . " " . $t;
	return $datetime;
}

function _dttos($datetime) {
	$aDT = explode(" ",$str);
	$s = $aDT[0];
	$t = $aDT[1];
	$aS = explode("/",$s);
	$str = $aS[2] . "-" . $aS[1] . "-" . $aS[0] . " " . $t;
	return $str;
}

function stod($texto) {
	if ($texto=="") return "";
	if (strlen($texto)>10) {
		return _stodt($texto);
	} else {
		$data = explode("-",$texto);
		return $data[2] . "/" . $data[1] . "/" . $data[0];
	}
}

function dtos($data) {
	if ($data=="") return "";
	if (strlen($data)>10) {
		return _dttos($data);
	} else {
		$texto = explode("/",$data);
		return $texto[2] . "-" . $texto[1] . "-" . $texto[0];
	}
}
?>