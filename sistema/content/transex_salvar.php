<? require_once("verifica.php"); ?>
<?
/*
	Transação de inclusão/alteração de registros
*/
include("../inc/common.php");

/*
	conexão com o banco de dados
*/
$conn = new db();
$conn->open();


/* upload do video */
//tentará fazer o upload da imagem que está no campo caminho_video  
$uploaddir = "upload_transex/";

/*
if($_FILES['video']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$video = isset($_FILES["video"]) ? $_FILES["video"] : FALSE;

	$caminho_video = "";
	if($_FILES['video']['size'] > "1000000") {
		print("<SCRIPT> alert('Vídeo - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['video']['tmp_name'], $uploaddir . $_FILES['video']['name'])) {
			$caminho_video = $uploaddir . $_FILES['video']['name']; //local da imagem a ser armazenado no banco de dados
		} else {
			print("Vídeo - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['video']['error']);
			if($_FILES['video']['error'] == 1) {
				print("Vídeo - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['video']['error'] == 2) {
				print("Vídeo - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['video']['error'] == 3) {
				print("Vídeo - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['video']['error'] == 4) {
				print("Vídeo - Não foi feito o upload do arquivo.");
			}
		}
	}
}
*/


if($_FILES['imagemComNome']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$imagemComNome = isset($_FILES["imagemComNome"]) ? $_FILES["imagemComNome"] : FALSE;

	if($imagemComNome) { 
		// Verifica se o mime-type do arquivo é de imagemComNome
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagemComNome["type"])) {
			echo "Imagem com Nome - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg,  .bmp, .gif ou .png são suportados";
		}
	}
	$caminho_imagemComNome = "";
	if($_FILES['imagemComNome']['size'] > "1000000") {
		print("<SCRIPT> alert('Imagem com Nome - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['imagemComNome']['tmp_name'], $uploaddir . $_FILES['imagemComNome']['name'])) {
			$caminho_imagemComNome = $uploaddir . $_FILES['imagemComNome']['name']; //local da imagemComNome a ser armazenado no banco de dados
		} else {
			print("Imagem com Nome - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagemComNome']['error']);
			if($_FILES['imagemComNome']['error'] == 1) {
				print("Imagem com Nome - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['imagemComNome']['error'] == 2) {
				print("Imagem com Nome - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['imagemComNome']['error'] == 3) {
				print("Imagem com Nome - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['imagemComNome']['error'] == 4) {
				print("Imagem com Nome - Não foi feito o upload do arquivo.");
			}
		}
	}
}



if($_FILES['imagemCentral1']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$imagemCentral1 = isset($_FILES["imagemCentral1"]) ? $_FILES["imagemCentral1"] : FALSE;

	if($imagemCentral1) { 
		// Verifica se o mime-type do arquivo é de imagemCentral1
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagemCentral1["type"])) {
			echo "Imagem Central 1 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg,  .bmp, .gif ou .png são suportados";
		}
	}
	$caminho_imagemCentral1 = "";
	if($_FILES['imagemCentral1']['size'] > "1000000") {
		print("<SCRIPT> alert('Imagem Central 1 - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['imagemCentral1']['tmp_name'], $uploaddir . $_FILES['imagemCentral1']['name'])) {
			$caminho_imagemCentral1 = $uploaddir . $_FILES['imagemCentral1']['name']; //local da imagemCentral a ser armazenado no banco de dados
		} else {
			print("Imagem Central 1 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagemCentral1']['error']);
			if($_FILES['imagemCentral1']['error'] == 1) {
				print("Imagem Central 1 - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['imagemCentral1']['error'] == 2) {
				print("Imagem Central 1 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['imagemCentral1']['error'] == 3) {
				print("Imagem Central 1 - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['imagemCentral1']['error'] == 4) {
				print("Imagem Central 1 - Não foi feito o upload do arquivo.");
			}
		}
	}
}

if($_FILES['imagemCentral2']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$imagemCentral2 = isset($_FILES["imagemCentral2"]) ? $_FILES["imagemCentral2"] : FALSE;

	if($imagemCentral2) { 
		// Verifica se o mime-type do arquivo é de imagemCentral2
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagemCentral2["type"])) {
			echo "imagemCentral2 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg,  .bmp, .gif ou .png são suportados";
		}
	}
	$caminho_imagemCentral2 = "";
	if($_FILES['imagemCentral2']['size'] > "1000000") {
		print("<SCRIPT> alert('Imagem Central 2 - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['imagemCentral2']['tmp_name'], $uploaddir . $_FILES['imagemCentral2']['name'])) {
			$caminho_imagemCentral2 = $uploaddir . $_FILES['imagemCentral2']['name']; //local da imagemCentral2 a ser armazenado no banco de dados
		} else {
			print("Imagem Central 2 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagemCentral2']['error']);
			if($_FILES['imagemCentral2']['error'] == 1) {
				print("Imagem Central 2 - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['imagemCentral2']['error'] == 2) {
				print("Imagem Central 2 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['imagemCentral2']['error'] == 3) {
				print("Imagem Central 2 - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['imagemCentral2']['error'] == 4) {
				print("Imagem Central 2 - Não foi feito o upload do arquivo.");
			}
		}
	}
}

if($_FILES['imagemCentral3']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$imagemCentral3 = isset($_FILES["imagemCentral3"]) ? $_FILES["imagemCentral3"] : FALSE;

	if($imagemCentral3) { 
		// Verifica se o mime-type do arquivo é de imagemCentral3
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagemCentral3["type"])) {
			echo "imagemCentral3 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg,  .bmp, .gif ou .png são suportados";
		}
	}
	$caminho_imagemCentral3 = "";
	if($_FILES['imagemCentral3']['size'] > "1000000") {
		print("<SCRIPT> alert('Imagem Central 3 - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['imagemCentral3']['tmp_name'], $uploaddir . $_FILES['imagemCentral3']['name'])) {
			$caminho_imagemCentral3 = $uploaddir . $_FILES['imagemCentral3']['name']; //local da imagemCentral3 a ser armazenado no banco de dados
		} else {
			print("Imagem Central 3 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagemCentral3']['error']);
			if($_FILES['imagemCentral3']['error'] == 1) {
				print("Imagem Central 3 - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['imagemCentral3']['error'] == 2) {
				print("Imagem Central 3 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['imagemCentral3']['error'] == 3) {
				print("Imagem Central 3 - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['imagemCentral3']['error'] == 4) {
				print("Imagem Central 3 - Não foi feito o upload do arquivo.");
			}
		}
	}
}

if($_FILES['imagemCentral4']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$imagemCentral4 = isset($_FILES["imagemCentral4"]) ? $_FILES["imagemCentral4"] : FALSE;

	if($imagemCentral4) { 
		// Verifica se o mime-type do arquivo é de imagemCentral4
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagemCentral4["type"])) {
			echo "Imagem Central 4 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg,  .bmp, .gif ou .png são suportados";
		}
	}
	$caminho_imagemCentral4 = "";
	if($_FILES['imagemCentral4']['size'] > "1000000") {
		print("<SCRIPT> alert('Imagem Central 4 - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['imagemCentral4']['tmp_name'], $uploaddir . $_FILES['imagemCentral4']['name'])) {
			$caminho_imagemCentral4 = $uploaddir . $_FILES['imagemCentral4']['name']; //local da imagemCentral4 a ser armazenado no banco de dados
		} else {
			print("Imagem Central 4 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagemCentral4']['error']);
			if($_FILES['imagemCentral4']['error'] == 1) {
				print("Imagem Central 4 - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['imagemCentral4']['error'] == 2) {
				print("Imagem Central 4 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['imagemCentral4']['error'] == 3) {
				print("Imagem Central 4 - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['imagemCentral4']['error'] == 4) {
				print("Imagem Central 4 - Não foi feito o upload do arquivo.");
			}
		}
	}
}

if($_FILES['imagemCentral5']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$imagemCentral5 = isset($_FILES["imagemCentral5"]) ? $_FILES["imagemCentral5"] : FALSE;

	if($imagemCentral5) { 
		// Verifica se o mime-type do arquivo é de imagemCentral5
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagemCentral5["type"])) {
			echo "Imagem Central 5 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg,  .bmp, .gif ou .png são suportados";
		}
	}
	$caminho_imagemCentral5 = "";
	if($_FILES['imagemCentral5']['size'] > "1000000") {
		print("<SCRIPT> alert('Imagem Central 5 - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['imagemCentral5']['tmp_name'], $uploaddir . $_FILES['imagemCentral5']['name'])) {
			$caminho_imagemCentral5 = $uploaddir . $_FILES['imagemCentral5']['name']; //local da imagemCentral5 a ser armazenado no banco de dados
		} else {
			print("Imagem Central 5 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagemCentral5']['error']);
			if($_FILES['imagemCentral5']['error'] == 1) {
				print("Imagem Central 5 - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['imagemCentral5']['error'] == 2) {
				print("Imagem Central 5 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['imagemCentral5']['error'] == 3) {
				print("Imagem Central 5 - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['imagemCentral5']['error'] == 4) {
				print("Imagem Central 5 - Não foi feito o upload do arquivo.");
			}
		}
	}
}

if($_FILES['imagemCentral6']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$imagemCentral6 = isset($_FILES["imagemCentral6"]) ? $_FILES["imagemCentral6"] : FALSE;

	if($imagemCentral6) { 
		// Verifica se o mime-type do arquivo é de imagemCentral6
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagemCentral6["type"])) {
			echo "Imagem Central 6 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg,  .bmp, .gif ou .png são suportados";
		}
	}
	$caminho_imagemCentral6 = "";
	if($_FILES['imagemCentral6']['size'] > "1000000") {
		print("<SCRIPT> alert('Imagem Central 6 - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['imagemCentral6']['tmp_name'], $uploaddir . $_FILES['imagemCentral6']['name'])) {
			$caminho_imagemCentral6 = $uploaddir . $_FILES['imagemCentral6']['name']; //local da imagemCentral6 a ser armazenado no banco de dados
		} else {
			print("Imagem Central 6 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagemCentral6']['error']);
			if($_FILES['imagemCentral6']['error'] == 1) {
				print("Imagem Central 6 - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['imagemCentral6']['error'] == 2) {
				print("Imagem Central 6 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['imagemCentral6']['error'] == 3) {
				print("Imagem Central 6 - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['imagemCentral6']['error'] == 4) {
				print("Imagem Central 6 - Não foi feito o upload do arquivo.");
			}
		}
	}
}

if($_FILES['imagemCentral7']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$imagemCentral7 = isset($_FILES["imagemCentral7"]) ? $_FILES["imagemCentral7"] : FALSE;

	if($imagemCentral7) { 
		// Verifica se o mime-type do arquivo é de imagemCentral7
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagemCentral7["type"])) {
			echo "Imagem Central 7 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg,  .bmp, .gif ou .png são suportados";
		}
	}
	$caminho_imagemCentral7 = "";
	if($_FILES['imagemCentral7']['size'] > "1000000") {
		print("<SCRIPT> alert('Imagem Central 7 - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['imagemCentral7']['tmp_name'], $uploaddir . $_FILES['imagemCentral7']['name'])) {
			$caminho_imagemCentral7 = $uploaddir . $_FILES['imagemCentral7']['name']; //local da imagemCentral7 a ser armazenado no banco de dados
		} else {
			print("Imagem Central 7 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagemCentral7']['error']);
			if($_FILES['imagemCentral7']['error'] == 1) {
				print("Imagem Central 7 - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['imagemCentral7']['error'] == 2) {
				print("Imagem Central 7 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['imagemCentral7']['error'] == 3) {
				print("Imagem Central 7 - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['imagemCentral7']['error'] == 4) {
				print("Imagem Central 7 - Não foi feito o upload do arquivo.");
			}
		}
	}
}

if($_FILES['imagemCentral8']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$imagemCentral8 = isset($_FILES["imagemCentral8"]) ? $_FILES["imagemCentral8"] : FALSE;

	if($imagemCentral8) { 
		// Verifica se o mime-type do arquivo é de imagemCentral8
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagemCentral8["type"])) {
			echo "Imagem Central 8 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg,  .bmp, .gif ou .png são suportados";
		}
	}
	$caminho_imagemCentral8 = "";
	if($_FILES['imagemCentral8']['size'] > "1000000") {
		print("<SCRIPT> alert('Imagem Central 8 - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['imagemCentral8']['tmp_name'], $uploaddir . $_FILES['imagemCentral8']['name'])) {
			$caminho_imagemCentral8 = $uploaddir . $_FILES['imagemCentral8']['name']; //local da imagemCentral8 a ser armazenado no banco de dados
		} else {
			print("Imagem Central 8 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagemCentral8']['error']);
			if($_FILES['imagemCentral8']['error'] == 1) {
				print("Imagem Central 8 - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['imagemCentral8']['error'] == 2) {
				print("Imagem Central 8 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['imagemCentral8']['error'] == 3) {
				print("Imagem Central 8 - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['imagemCentral8']['error'] == 4) {
				print("Imagem Central 8 - Não foi feito o upload do arquivo.");
			}
		}
	}
}

if($_FILES['imagemCentral9']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$imagemCentral9 = isset($_FILES["imagemCentral9"]) ? $_FILES["imagemCentral9"] : FALSE;

	if($imagemCentral9) { 
		// Verifica se o mime-type do arquivo é de imagemCentral9
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagemCentral9["type"])) {
			echo "Imagem Central 9 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg,  .bmp, .gif ou .png são suportados";
		}
	}
	$caminho_imagemCentral9 = "";
	if($_FILES['imagemCentral9']['size'] > "1000000") {
		print("<SCRIPT> alert('Imagem Central 9 - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['imagemCentral9']['tmp_name'], $uploaddir . $_FILES['imagemCentral9']['name'])) {
			$caminho_imagemCentral9 = $uploaddir . $_FILES['imagemCentral9']['name']; //local da imagemCentral9 a ser armazenado no banco de dados
		} else {
			print("Imagem Central 9 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagemCentral9']['error']);
			if($_FILES['imagemCentral9']['error'] == 1) {
				print("Imagem Central 9 - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['imagemCentral9']['error'] == 2) {
				print("Imagem Central 9 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['imagemCentral9']['error'] == 3) {
				print("Imagem Central 9 - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['imagemCentral9']['error'] == 4) {
				print("Imagem Central 9 - Não foi feito o upload do arquivo.");
			}
		}
	}
}

if($_FILES['imagemCentral10']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$imagemCentral10 = isset($_FILES["imagemCentral10"]) ? $_FILES["imagemCentral10"] : FALSE;

	if($imagemCentral10) { 
		// Verifica se o mime-type do arquivo é de imagemCentral10
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagemCentral10["type"])) {
			echo "Imagem Central 10 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg,  .bmp, .gif ou .png são suportados";
		}
	}
	$caminho_imagemCentral10 = "";
	if($_FILES['imagemCentral10']['size'] > "1000000") {
		print("<SCRIPT> alert('Imagem Central 10 - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['imagemCentral10']['tmp_name'], $uploaddir . $_FILES['imagemCentral10']['name'])) {
			$caminho_imagemCentral10 = $uploaddir . $_FILES['imagemCentral10']['name']; //local da imagemCentral10 a ser armazenado no banco de dados
		} else {
			print("Imagem Central 10 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagemCentral10']['error']);
			if($_FILES['imagemCentral10']['error'] == 1) {
				print("Imagem Central 10 - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['imagemCentral10']['error'] == 2) {
				print("Imagem Central 10 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['imagemCentral10']['error'] == 3) {
				print("Imagem Central 10 - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['imagemCentral10']['error'] == 4) {
				print("Imagem Central 10 - Não foi feito o upload do arquivo.");
			}
		}
	}
}

if($_FILES['imagemExtra1']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$imagemExtra1 = isset($_FILES["imagemExtra1"]) ? $_FILES["imagemExtra1"] : FALSE;

	if($imagemExtra1) { 
		// Verifica se o mime-type do arquivo é de imagemExtra1
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagemExtra1["type"])) {
			echo "Imagem Extra 1 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg,  .bmp, .gif ou .png são suportados";
		}
	}
	$caminho_imagemExtra1 = "";
	if($_FILES['imagemExtra1']['size'] > "1000000") {
		print("<SCRIPT> alert('Imagem Extra 1 - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['imagemExtra1']['tmp_name'], $uploaddir . $_FILES['imagemExtra1']['name'])) {
			$caminho_imagemExtra1 = $uploaddir . $_FILES['imagemExtra1']['name']; //local da imagemExtra a ser armazenado no banco de dados
		} else {
			print("Imagem Extra 1 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagemExtra1']['error']);
			if($_FILES['imagemExtra1']['error'] == 1) {
				print("Imagem Extra 1 - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['imagemExtra1']['error'] == 2) {
				print("Imagem Extra 1 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['imagemExtra1']['error'] == 3) {
				print("Imagem Extra 1 - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['imagemExtra1']['error'] == 4) {
				print("Imagem Extra 1 - Não foi feito o upload do arquivo.");
			}
		}
	}
}

if($_FILES['imagemExtra2']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$imagemExtra2 = isset($_FILES["imagemExtra2"]) ? $_FILES["imagemExtra2"] : FALSE;

	if($imagemExtra2) { 
		// Verifica se o mime-type do arquivo é de imagemExtra2
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagemExtra2["type"])) {
			echo "imagemExtra2 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg,  .bmp, .gif ou .png são suportados";
		}
	}
	$caminho_imagemExtra2 = "";
	if($_FILES['imagemExtra2']['size'] > "1000000") {
		print("<SCRIPT> alert('Imagem Extra 2 - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['imagemExtra2']['tmp_name'], $uploaddir . $_FILES['imagemExtra2']['name'])) {
			$caminho_imagemExtra2 = $uploaddir . $_FILES['imagemExtra2']['name']; //local da imagemExtra2 a ser armazenado no banco de dados
		} else {
			print("Imagem Extra 2 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagemExtra2']['error']);
			if($_FILES['imagemExtra2']['error'] == 1) {
				print("Imagem Extra 2 - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['imagemExtra2']['error'] == 2) {
				print("Imagem Extra 2 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['imagemExtra2']['error'] == 3) {
				print("Imagem Extra 2 - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['imagemExtra2']['error'] == 4) {
				print("Imagem Extra 2 - Não foi feito o upload do arquivo.");
			}
		}
	}
}

if($_FILES['imagemExtra3']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$imagemExtra3 = isset($_FILES["imagemExtra3"]) ? $_FILES["imagemExtra3"] : FALSE;

	if($imagemExtra3) { 
		// Verifica se o mime-type do arquivo é de imagemExtra3
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagemExtra3["type"])) {
			echo "imagemExtra3 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg,  .bmp, .gif ou .png são suportados";
		}
	}
	$caminho_imagemExtra3 = "";
	if($_FILES['imagemExtra3']['size'] > "1000000") {
		print("<SCRIPT> alert('Imagem Extra 3 - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['imagemExtra3']['tmp_name'], $uploaddir . $_FILES['imagemExtra3']['name'])) {
			$caminho_imagemExtra3 = $uploaddir . $_FILES['imagemExtra3']['name']; //local da imagemExtra3 a ser armazenado no banco de dados
		} else {
			print("Imagem Extra 3 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagemExtra3']['error']);
			if($_FILES['imagemExtra3']['error'] == 1) {
				print("Imagem Extra 3 - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['imagemExtra3']['error'] == 2) {
				print("Imagem Extra 3 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['imagemExtra3']['error'] == 3) {
				print("Imagem Extra 3 - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['imagemExtra3']['error'] == 4) {
				print("Imagem Extra 3 - Não foi feito o upload do arquivo.");
			}
		}
	}
}

if($_FILES['imagemExtra4']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$imagemExtra4 = isset($_FILES["imagemExtra4"]) ? $_FILES["imagemExtra4"] : FALSE;

	if($imagemExtra4) { 
		// Verifica se o mime-type do arquivo é de imagemExtra4
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagemExtra4["type"])) {
			echo "Imagem Extra 4 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg,  .bmp, .gif ou .png são suportados";
		}
	}
	$caminho_imagemExtra4 = "";
	if($_FILES['imagemExtra4']['size'] > "1000000") {
		print("<SCRIPT> alert('Imagem Extra 4 - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['imagemExtra4']['tmp_name'], $uploaddir . $_FILES['imagemExtra4']['name'])) {
			$caminho_imagemExtra4 = $uploaddir . $_FILES['imagemExtra4']['name']; //local da imagemExtra4 a ser armazenado no banco de dados
		} else {
			print("Imagem Extra 4 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagemExtra4']['error']);
			if($_FILES['imagemExtra4']['error'] == 1) {
				print("Imagem Extra 4 - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['imagemExtra4']['error'] == 2) {
				print("Imagem Extra 4 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['imagemExtra4']['error'] == 3) {
				print("Imagem Extra 4 - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['imagemExtra4']['error'] == 4) {
				print("Imagem Extra 4 - Não foi feito o upload do arquivo.");
			}
		}
	}
}

if($_FILES['imagemExtra5']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$imagemExtra5 = isset($_FILES["imagemExtra5"]) ? $_FILES["imagemExtra5"] : FALSE;

	if($imagemExtra5) { 
		// Verifica se o mime-type do arquivo é de imagemExtra5
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagemExtra5["type"])) {
			echo "Imagem Extra 5 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg,  .bmp, .gif ou .png são suportados";
		}
	}
	$caminho_imagemExtra5 = "";
	if($_FILES['imagemExtra5']['size'] > "1000000") {
		print("<SCRIPT> alert('Imagem Extra 5 - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['imagemExtra5']['tmp_name'], $uploaddir . $_FILES['imagemExtra5']['name'])) {
			$caminho_imagemExtra5 = $uploaddir . $_FILES['imagemExtra5']['name']; //local da imagemExtra5 a ser armazenado no banco de dados
		} else {
			print("Imagem Extra 5 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagemExtra5']['error']);
			if($_FILES['imagemExtra5']['error'] == 1) {
				print("Imagem Extra 5 - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['imagemExtra5']['error'] == 2) {
				print("Imagem Extra 5 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['imagemExtra5']['error'] == 3) {
				print("Imagem Extra 5 - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['imagemExtra5']['error'] == 4) {
				print("Imagem Extra 5 - Não foi feito o upload do arquivo.");
			}
		}
	}
}

if($_FILES['imagemExtra6']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$imagemExtra6 = isset($_FILES["imagemExtra6"]) ? $_FILES["imagemExtra6"] : FALSE;

	if($imagemExtra6) { 
		// Verifica se o mime-type do arquivo é de imagemExtra6
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagemExtra6["type"])) {
			echo "Imagem Extra 6 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg,  .bmp, .gif ou .png são suportados";
		}
	}
	$caminho_imagemExtra6 = "";
	if($_FILES['imagemExtra6']['size'] > "1000000") {
		print("<SCRIPT> alert('Imagem Extra 6 - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['imagemExtra6']['tmp_name'], $uploaddir . $_FILES['imagemExtra6']['name'])) {
			$caminho_imagemExtra6 = $uploaddir . $_FILES['imagemExtra6']['name']; //local da imagemExtra6 a ser armazenado no banco de dados
		} else {
			print("Imagem Extra 6 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagemExtra6']['error']);
			if($_FILES['imagemExtra6']['error'] == 1) {
				print("Imagem Extra 6 - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['imagemExtra6']['error'] == 2) {
				print("Imagem Extra 6 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['imagemExtra6']['error'] == 3) {
				print("Imagem Extra 6 - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['imagemExtra6']['error'] == 4) {
				print("Imagem Extra 6 - Não foi feito o upload do arquivo.");
			}
		}
	}
}

echo "pós imagens";


/* Atualização dos dados, configure abaixo conforme suas necessidades */
// objeto para montagem de expressão sql
$sql = new UpdateSQL();

$sql->setTable("transex");
$sql->setKey("idTransex", anti_injection(getParam("id")), "Number");

$sql->addField("nome", anti_injection(getParam("nome")), "String");
$sql->addField("sobrenome", anti_injection(getParam("sobrenome")), "String");		
$sql->addField("telefone", anti_injection(getParam("telefone")), "String");	
$sql->addField("email", anti_injection(getParam("email")), "String");	
$sql->addField("site", anti_injection(getParam("site")), "String");	
//$sql->addField("orkut", anti_injection(getParam("orkut")), "String");	
$sql->addField("msn", anti_injection(getParam("msn")), "String");
$sql->addField("twitter", anti_injection(getParam("twitter")), "String");	
$sql->addField("idade", anti_injection(getParam("idade")), "Number");
$sql->addField("manequim", anti_injection(getParam("manequim")), "String");	
$sql->addField("olhos", anti_injection(getParam("olhos")), "String");	
//$sql->addField("signo", anti_injection(getParam("signo")), "String");	
$sql->addField("busto", anti_injection(getParam("busto")), "String");	
$sql->addField("cabelos", anti_injection(getParam("cabelos")), "String");
$sql->addField("dote", anti_injection(getParam("dote")), "dote");		

$sql->addField("altura", anti_injection(getParam("altura")), "String");	
$sql->addField("cintura", anti_injection(getParam("cintura")), "String");	
$sql->addField("pes", anti_injection(getParam("pes")), "String");	
$sql->addField("peso", anti_injection(getParam("peso")), "String");	
$sql->addField("quadril", anti_injection(getParam("quadril")), "String");	
$sql->addField("horarioAtendimento", anti_injection(getParam("horarioAtendimento")), "String");	
$sql->addField("mensagem1", getParam("mensagem1"), "String");	
//$sql->addField("mensagem2", getParam("mensagem2"), "String");	
$sql->addField("flagPreferencial", anti_injection(getParam("flagPreferencial")), "String");	

$sql->addField("telefone2", anti_injection(getParam("telefone2")), "String");	
$sql->addField("horario", anti_injection(getParam("horario")), "String");
$sql->addField("locais", anti_injection(getParam("locais")), "String");	
$sql->addField("cache", anti_injection(getParam("cache")), "String");
$sql->addField("cidades", anti_injection(getParam("cidades")), "String");
$sql->addField("flagAtivo", anti_injection(getParam("flagAtivo")), "String");

$sql->addField("ddd", anti_injection(getParam("ddd")), "String");
$sql->addField("ddd2", anti_injection(getParam("ddd2")), "String");

$sql->addField("idOperadora", anti_injection(getParam("idOperadora")), "Number");		
$sql->addField("idOperadora2", anti_injection(getParam("idOperadora2")), "Number");

$sql->addField("flagWhats", anti_injection(getParam("flagWhats")), "String");	
$sql->addField("flagWhats2", anti_injection(getParam("flagWhats2")), "String");	

$sql->addField("flagTemVideo", anti_injection(getParam("flagTemVideo")), "String");
$sql->addField("aceitoCartao", anti_injection(getParam("aceitoCartao")), "String");
$sql->addField("flagSexoVirtual", anti_injection(getParam("flagSexoVirtual")), "String");	

$sql->addField("outros", anti_injection(getParam("outros")), "String");

$sql->addField("flagMostraConteudoExtra", anti_injection(getParam("flagMostraConteudoExtra")), "String");

$sql->addField("altImagemNome", anti_injection(getParam("altImagemNome")), "String");	

$sql->addField("altImagem1", anti_injection(getParam("altImagem1")), "String");	
$sql->addField("altImagem2", anti_injection(getParam("altImagem2")), "String");	
$sql->addField("altImagem3", anti_injection(getParam("altImagem3")), "String");	
$sql->addField("altImagem4", anti_injection(getParam("altImagem4")), "String");	
$sql->addField("altImagem5", anti_injection(getParam("altImagem5")), "String");	
$sql->addField("altImagem6", anti_injection(getParam("altImagem6")), "String");	
$sql->addField("altImagem7", anti_injection(getParam("altImagem7")), "String");	
$sql->addField("altImagem8", anti_injection(getParam("altImagem8")), "String");	


$sql->addField("altImagemExtra1", anti_injection(getParam("altImagemExtra1")), "String");	
$sql->addField("altImagemExtra2", anti_injection(getParam("altImagemExtra2")), "String");	
$sql->addField("altImagemExtra3", anti_injection(getParam("altImagemExtra3")), "String");	
$sql->addField("altImagemExtra4", anti_injection(getParam("altImagemExtra4")), "String");	
$sql->addField("altImagemExtra5", anti_injection(getParam("altImagemExtra5")), "String");	
$sql->addField("altImagemExtra6", anti_injection(getParam("altImagemExtra6")), "String");	


//$sql->addField("title", anti_injection(getParam("title")), "String");	
//$sql->addField("description", anti_injection(getParam("description")), "String");	
//$sql->addField("keywords", anti_injection(getParam("keywords")), "String");	
	

if (getParam("video") != NULL && getParam("video") != "")
	$sql->addField("video", anti_injection(getParam("video")), "String");


if ($caminho_imagemCentral1 != NULL)
	$sql->addField("imagemCentral1", $caminho_imagemCentral1, "String");
if ($caminho_imagemCentral2 != NULL)
	$sql->addField("imagemCentral2", $caminho_imagemCentral2, "String");
if ($caminho_imagemCentral3 != NULL)
	$sql->addField("imagemCentral3", $caminho_imagemCentral3, "String");
if ($caminho_imagemCentral4 != NULL)
	$sql->addField("imagemCentral4", $caminho_imagemCentral4, "String");
if ($caminho_imagemCentral5 != NULL)
	$sql->addField("imagemCentral5", $caminho_imagemCentral5, "String");
if ($caminho_imagemCentral6 != NULL)
	$sql->addField("imagemCentral6", $caminho_imagemCentral6, "String");
if ($caminho_imagemCentral7 != NULL)
	$sql->addField("imagemCentral7", $caminho_imagemCentral7, "String");
if ($caminho_imagemCentral8 != NULL)
	$sql->addField("imagemCentral8", $caminho_imagemCentral8, "String");
if ($caminho_imagemCentral9 != NULL)
	$sql->addField("imagemCentral9", $caminho_imagemCentral9, "String");
if ($caminho_imagemCentral10 != NULL)
	$sql->addField("imagemCentral10", $caminho_imagemCentral10, "String");

if ($caminho_imagemExtra1 != NULL)
	$sql->addField("imagemExtra1", $caminho_imagemExtra1, "String");
if ($caminho_imagemExtra2 != NULL)
	$sql->addField("imagemExtra2", $caminho_imagemExtra2, "String");
if ($caminho_imagemExtra3 != NULL)
	$sql->addField("imagemExtra3", $caminho_imagemExtra3, "String");
if ($caminho_imagemExtra4 != NULL)
	$sql->addField("imagemExtra4", $caminho_imagemExtra4, "String");
if ($caminho_imagemExtra5 != NULL)
	$sql->addField("imagemExtra5", $caminho_imagemExtra5, "String");
if ($caminho_imagemExtra6 != NULL)
	$sql->addField("imagemExtra6", $caminho_imagemExtra6, "String");


if ($caminho_imagemComNome != NULL)
	$sql->addField("imagemComNome", $caminho_imagemComNome, "String");


if (strlen(getParam("id"))>0) { // alteração, retirar strlen se vier de edicao_aux
	$sql->setAction("UPDATE");
	
	$conn->execute($sql->getSQL());
	$destino = getSession("redirectAnunciante") . "?pagina=".getParam("pagina"); 
} else { // inclusão
	//Verifica se está incluindo novo registro a partir de outro já existente ´para adicionar as imagens
	
	if (getParam("imagemCentral1") != NULL) {
		
		$sql->addField("imagemCentral1", anti_injection(getParam("imagemCentral1")), "String");
			
	}
	if (getParam("imagemCentral2") != NULL)
		$sql->addField("imagemCentral2", anti_injection(getParam("imagemCentral2")), "String");
	if (getParam("imagemCentral3") != NULL)
		$sql->addField("imagemCentral3", anti_injection(getParam("imagemCentral3")), "String");
	if (getParam("imagemCentral4") != NULL)
		$sql->addField("imagemCentral4", anti_injection(getParam("imagemCentral4")), "String");
	if (getParam("imagemCentral5") != NULL)
		$sql->addField("imagemCentral5", anti_injection(getParam("imagemCentral5")), "String");
	if (getParam("imagemCentral6") != NULL)
		$sql->addField("imagemCentral6", anti_injection(getParam("imagemCentral6")), "String");
	if (getParam("imagemCentral7") != NULL)
		$sql->addField("imagemCentral7", anti_injection(getParam("imagemCentral7")), "String");
	if (getParam("imagemCentral8") != NULL)
		$sql->addField("imagemCentral8", anti_injection(getParam("imagemCentral8")), "String");
	if (getParam("imagemCentral9") != NULL)
		$sql->addField("imagemCentral9", anti_injection(getParam("imagemCentral9")), "String");
	if (getParam("imagemCentral10") != NULL)
		$sql->addField("imagemCentral10", anti_injection(getParam("imagemCentral10")), "String");

	if (getParam("imagemComNome") != NULL)
		$sql->addField("imagemComNome", anti_injection(getParam("imagemComNome")), "String");


	if (getParam("imagemExtra1") != NULL)
		$sql->addField("imagemExtra1", anti_injection(getParam("imagemExtra1")), "String");
	if (getParam("imagemExtra2") != NULL)
		$sql->addField("imagemExtra2", anti_injection(getParam("imagemExtra2")), "String");
	if (getParam("imagemExtra3") != NULL)
		$sql->addField("imagemExtra3", anti_injection(getParam("imagemExtra3")), "String");
	if (getParam("imagemExtra4") != NULL)
		$sql->addField("imagemExtra4", anti_injection(getParam("imagemExtra4")), "String");
	if (getParam("imagemExtra5") != NULL)
		$sql->addField("imagemExtra5", anti_injection(getParam("imagemExtra5")), "String");
	if (getParam("imagemExtra6") != NULL)
		$sql->addField("imagemExtra6", anti_injection(getParam("imagemExtra6")), "String");

	if (getParam("imagemCapa") != NULL)
		$sql->addField("imagemCapa", anti_injection(getParam("imagemCapa")), "String");

	$sql->setAction("INSERT");
	$last_id = $conn->execute($sql->getSQL()); 
	$destino = getSession("redirectAnunciante");
}
//echo $sql->getSQL();
// volta para a lista ou reapresenta o formulário em modo de edição
echo "<script>location.href='$destino';</script>";

/* 	Encerra a conexão com o banco de dados */
$conn->close();
?>