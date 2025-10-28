<?php require_once("verifica.php"); ?>
<?php

/*
	Transa��o de inclus�o/altera��o de registros
*/
include("../inc/common.php");

/*
	conex�o com o banco de dados
*/
$conn = new db();
$conn->open();


/* upload do video */
//tentar� fazer o upload da imagem que est� no campo caminho_video  
$uploaddir = "upload_mulher2/"; 


/*
if($_FILES['video']['tmp_name'] != "") { 
	// Prepara a vari�vel do arquivo
	$video = isset($_FILES["video"]) ? $_FILES["video"] : FALSE;

	$caminho_video = "";
	if($_FILES['video']['size'] > "1000000") {
		print("<SCRIPT> alert('V�deo - Seu arquivo n�o poder� ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['video']['tmp_name'], $uploaddir . $_FILES['video']['name'])) {
			$caminho_video = $uploaddir . $_FILES['video']['name']; //local da imagem a ser armazenado no banco de dados
		} else {
			print("V�deo - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['video']['error']);
			if($_FILES['video']['error'] == 1) {
				print("V�deo - O arquivo no upload � maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['video']['error'] == 2) {
				print("V�deo - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formul�rio html.");
			} elseif($_FILES['video']['error'] == 3) {
				print("V�deo - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['video']['error'] == 4) {
				print("V�deo - N�o foi feito o upload do arquivo.");
			}
		}
	}
}
*/
if (isset($_FILES['imagemCapa']) && !empty($_FILES['imagemCapa']['tmp_name'])) {

    $imagemCapa = $_FILES['imagemCapa'];

    // Cria o diretório caso não exista
    if (!is_dir($uploaddir)) {
        mkdir($uploaddir, 0777, true);
    }

    // Verifica tamanho do arquivo (1MB)
    if ($imagemCapa['size'] > 1000000) {
        echo "<script>alert('Imagem - Seu arquivo não poderá ser maior que 1MB'); window.history.go(-1);</script>";
    } else {
        // Gera nome único para evitar sobrescrever arquivos
        $extensao = pathinfo($imagemCapa['name'], PATHINFO_EXTENSION);
        $novoNome = uniqid('imagemCapa_', true) . '.' . $extensao;
        $destino = $uploaddir . $novoNome;

        // Move o arquivo
        if (move_uploaded_file($imagemCapa['tmp_name'], $destino)) {
            $caminho_imagemCapa = $destino; // caminho que será salvo no banco
        } else {
            echo "Imagem - Houve um erro na transferência do arquivo. Erro = " . $imagemCapa['error'] . "<br>";

            switch ($imagemCapa['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo "O upload do arquivo foi feito parcialmente.";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo "Nenhum arquivo foi enviado.";
                    break;
                default:
                    echo "Erro desconhecido no upload.";
                    break;
            }
        }
    }
}


// Verifica se o arquivo foi enviado
if (isset($_FILES['imagemCentral1']) && !empty($_FILES['imagemCentral1']['tmp_name'])) {

    $imagemCentral1 = $_FILES['imagemCentral1'];

    // Verifica se é um tipo de imagem permitido
    if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/i", $imagemCentral1['type'])) {
        echo "Imagem Central 1 - Arquivo em formato inválido! Somente arquivos .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } else {

        // Verifica tamanho (máx. 1MB)
        if ($imagemCentral1['size'] > 1000000) {
            echo "<script>alert('Imagem Central 1 - Seu arquivo não poderá ser maior que 1MB'); window.history.go(-1);</script>";
        } else {

            // Garante que o diretório de upload existe
            if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0777, true);
            }

            // Gera nome único para evitar sobrescrever arquivos
            $extensao = pathinfo($imagemCentral1['name'], PATHINFO_EXTENSION);
            $novoNome = uniqid('imagemCentral1_', true) . '.' . $extensao;
            $destino = $uploaddir . $novoNome;

            // Move o arquivo
            if (move_uploaded_file($imagemCentral1['tmp_name'], $destino)) {
                $caminho_imagemCentral1 = $destino; // caminho que será salvo no banco
            } else {
                echo "Imagem Central 1 - Houve um erro na transferência do arquivo. Erro = " . $imagemCentral1['error'] . "<br>";

                switch ($imagemCentral1['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo "O upload do arquivo foi feito parcialmente.";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "Nenhum arquivo foi enviado.";
                        break;
                    default:
                        echo "Erro desconhecido no upload.";
                        break;
                }
            }
        }
    }
}

// Verifica se o arquivo foi enviado
if (isset($_FILES['imagemCentral2']) && !empty($_FILES['imagemCentral2']['tmp_name'])) {

    $imagemCentral2 = $_FILES['imagemCentral2'];

    // Verifica se é um tipo de imagem permitido
    if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/i", $imagemCentral2['type'])) {
        echo "Imagem Central 1 - Arquivo em formato inválido! Somente arquivos .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } else {

        // Verifica tamanho (máx. 1MB)
        if ($imagemCentral2['size'] > 1000000) {
            echo "<script>alert('Imagem Central 1 - Seu arquivo não poderá ser maior que 1MB'); window.history.go(-1);</script>";
        } else {

            // Garante que o diretório de upload existe
            if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0777, true);
            }

            // Gera nome único para evitar sobrescrever arquivos
            $extensao = pathinfo($imagemCentral2['name'], PATHINFO_EXTENSION);
            $novoNome = uniqid('imagemCentral2_', true) . '.' . $extensao;
            $destino = $uploaddir . $novoNome;

            // Move o arquivo
            if (move_uploaded_file($imagemCentral2['tmp_name'], $destino)) {
                $caminho_imagemCentral2 = $destino; // caminho que será salvo no banco
            } else {
                echo "Imagem Central 1 - Houve um erro na transferência do arquivo. Erro = " . $imagemCentral2['error'] . "<br>";

                switch ($imagemCentral2['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo "O upload do arquivo foi feito parcialmente.";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "Nenhum arquivo foi enviado.";
                        break;
                    default:
                        echo "Erro desconhecido no upload.";
                        break;
                }
            }
        }
    }
}

// Verifica se o arquivo foi enviado
if (isset($_FILES['imagemCentral3']) && !empty($_FILES['imagemCentral3']['tmp_name'])) {

    $imagemCentral3 = $_FILES['imagemCentral3'];

    // Verifica se é um tipo de imagem permitido
    if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/i", $imagemCentral3['type'])) {
        echo "Imagem Central 1 - Arquivo em formato inválido! Somente arquivos .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } else {

        // Verifica tamanho (máx. 1MB)
        if ($imagemCentral3['size'] > 1000000) {
            echo "<script>alert('Imagem Central 1 - Seu arquivo não poderá ser maior que 1MB'); window.history.go(-1);</script>";
        } else {

            // Garante que o diretório de upload existe
            if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0777, true);
            }

            // Gera nome único para evitar sobrescrever arquivos
            $extensao = pathinfo($imagemCentral3['name'], PATHINFO_EXTENSION);
            $novoNome = uniqid('imagemCentral3_', true) . '.' . $extensao;
            $destino = $uploaddir . $novoNome;

            // Move o arquivo
            if (move_uploaded_file($imagemCentral3['tmp_name'], $destino)) {
                $caminho_imagemCentral3 = $destino; // caminho que será salvo no banco
            } else {
                echo "Imagem Central 1 - Houve um erro na transferência do arquivo. Erro = " . $imagemCentral3['error'] . "<br>";

                switch ($imagemCentral3['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo "O upload do arquivo foi feito parcialmente.";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "Nenhum arquivo foi enviado.";
                        break;
                    default:
                        echo "Erro desconhecido no upload.";
                        break;
                }
            }
        }
    }
}

// Verifica se o arquivo foi enviado
if (isset($_FILES['imagemCentral4']) && !empty($_FILES['imagemCentral4']['tmp_name'])) {

    $imagemCentral4 = $_FILES['imagemCentral4'];

    // Verifica se é um tipo de imagem permitido
    if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/i", $imagemCentral4['type'])) {
        echo "Imagem Central 1 - Arquivo em formato inválido! Somente arquivos .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } else {

        // Verifica tamanho (máx. 1MB)
        if ($imagemCentral4['size'] > 1000000) {
            echo "<script>alert('Imagem Central 1 - Seu arquivo não poderá ser maior que 1MB'); window.history.go(-1);</script>";
        } else {

            // Garante que o diretório de upload existe
            if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0777, true);
            }

            // Gera nome único para evitar sobrescrever arquivos
            $extensao = pathinfo($imagemCentral4['name'], PATHINFO_EXTENSION);
            $novoNome = uniqid('imagemCentral4_', true) . '.' . $extensao;
            $destino = $uploaddir . $novoNome;

            // Move o arquivo
            if (move_uploaded_file($imagemCentral4['tmp_name'], $destino)) {
                $caminho_imagemCentral4 = $destino; // caminho que será salvo no banco
            } else {
                echo "Imagem Central 1 - Houve um erro na transferência do arquivo. Erro = " . $imagemCentral4['error'] . "<br>";

                switch ($imagemCentral4['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo "O upload do arquivo foi feito parcialmente.";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "Nenhum arquivo foi enviado.";
                        break;
                    default:
                        echo "Erro desconhecido no upload.";
                        break;
                }
            }
        }
    }
}

// Verifica se o arquivo foi enviado
if (isset($_FILES['imagemCentral5']) && !empty($_FILES['imagemCentral5']['tmp_name'])) {

    $imagemCentral5 = $_FILES['imagemCentral5'];

    // Verifica se é um tipo de imagem permitido
    if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/i", $imagemCentral5['type'])) {
        echo "Imagem Central 1 - Arquivo em formato inválido! Somente arquivos .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } else {

        // Verifica tamanho (máx. 1MB)
        if ($imagemCentral5['size'] > 1000000) {
            echo "<script>alert('Imagem Central 1 - Seu arquivo não poderá ser maior que 1MB'); window.history.go(-1);</script>";
        } else {

            // Garante que o diretório de upload existe
            if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0777, true);
            }

            // Gera nome único para evitar sobrescrever arquivos
            $extensao = pathinfo($imagemCentral5['name'], PATHINFO_EXTENSION);
            $novoNome = uniqid('imagemCentral5_', true) . '.' . $extensao;
            $destino = $uploaddir . $novoNome;

            // Move o arquivo
            if (move_uploaded_file($imagemCentral5['tmp_name'], $destino)) {
                $caminho_imagemCentral5 = $destino; // caminho que será salvo no banco
            } else {
                echo "Imagem Central 1 - Houve um erro na transferência do arquivo. Erro = " . $imagemCentral5['error'] . "<br>";

                switch ($imagemCentral5['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo "O upload do arquivo foi feito parcialmente.";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "Nenhum arquivo foi enviado.";
                        break;
                    default:
                        echo "Erro desconhecido no upload.";
                        break;
                }
            }
        }
    }
}

// Verifica se o arquivo foi enviado
if (isset($_FILES['imagemCentral6']) && !empty($_FILES['imagemCentral6']['tmp_name'])) {

    $imagemCentral6 = $_FILES['imagemCentral6'];

    // Verifica se é um tipo de imagem permitido
    if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/i", $imagemCentral6['type'])) {
        echo "Imagem Central 1 - Arquivo em formato inválido! Somente arquivos .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } else {

        // Verifica tamanho (máx. 1MB)
        if ($imagemCentral6['size'] > 1000000) {
            echo "<script>alert('Imagem Central 1 - Seu arquivo não poderá ser maior que 1MB'); window.history.go(-1);</script>";
        } else {

            // Garante que o diretório de upload existe
            if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0777, true);
            }

            // Gera nome único para evitar sobrescrever arquivos
            $extensao = pathinfo($imagemCentral6['name'], PATHINFO_EXTENSION);
            $novoNome = uniqid('imagemCentral6_', true) . '.' . $extensao;
            $destino = $uploaddir . $novoNome;

            // Move o arquivo
            if (move_uploaded_file($imagemCentral6['tmp_name'], $destino)) {
                $caminho_imagemCentral6 = $destino; // caminho que será salvo no banco
            } else {
                echo "Imagem Central 1 - Houve um erro na transferência do arquivo. Erro = " . $imagemCentral6['error'] . "<br>";

                switch ($imagemCentral6['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo "O upload do arquivo foi feito parcialmente.";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "Nenhum arquivo foi enviado.";
                        break;
                    default:
                        echo "Erro desconhecido no upload.";
                        break;
                }
            }
        }
    }
}

// Verifica se o arquivo foi enviado
if (isset($_FILES['imagemCentral7']) && !empty($_FILES['imagemCentral7']['tmp_name'])) {

    $imagemCentral7 = $_FILES['imagemCentral7'];

    // Verifica se é um tipo de imagem permitido
    if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/i", $imagemCentral7['type'])) {
        echo "Imagem Central 1 - Arquivo em formato inválido! Somente arquivos .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } else {

        // Verifica tamanho (máx. 1MB)
        if ($imagemCentral7['size'] > 1000000) {
            echo "<script>alert('Imagem Central 1 - Seu arquivo não poderá ser maior que 1MB'); window.history.go(-1);</script>";
        } else {

            // Garante que o diretório de upload existe
            if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0777, true);
            }

            // Gera nome único para evitar sobrescrever arquivos
            $extensao = pathinfo($imagemCentral7['name'], PATHINFO_EXTENSION);
            $novoNome = uniqid('imagemCentral7_', true) . '.' . $extensao;
            $destino = $uploaddir . $novoNome;

            // Move o arquivo
            if (move_uploaded_file($imagemCentral7['tmp_name'], $destino)) {
                $caminho_imagemCentral7 = $destino; // caminho que será salvo no banco
            } else {
                echo "Imagem Central 1 - Houve um erro na transferência do arquivo. Erro = " . $imagemCentral7['error'] . "<br>";

                switch ($imagemCentral7['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo "O upload do arquivo foi feito parcialmente.";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "Nenhum arquivo foi enviado.";
                        break;
                    default:
                        echo "Erro desconhecido no upload.";
                        break;
                }
            }
        }
    }
}

// Verifica se o arquivo foi enviado
if (isset($_FILES['imagemCentral8']) && !empty($_FILES['imagemCentral8']['tmp_name'])) {

    $imagemCentral8 = $_FILES['imagemCentral8'];

    // Verifica se é um tipo de imagem permitido
    if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/i", $imagemCentral8['type'])) {
        echo "Imagem Central 1 - Arquivo em formato inválido! Somente arquivos .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } else {

        // Verifica tamanho (máx. 1MB)
        if ($imagemCentral8['size'] > 1000000) {
            echo "<script>alert('Imagem Central 1 - Seu arquivo não poderá ser maior que 1MB'); window.history.go(-1);</script>";
        } else {

            // Garante que o diretório de upload existe
            if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0777, true);
            }

            // Gera nome único para evitar sobrescrever arquivos
            $extensao = pathinfo($imagemCentral8['name'], PATHINFO_EXTENSION);
            $novoNome = uniqid('imagemCentral8_', true) . '.' . $extensao;
            $destino = $uploaddir . $novoNome;

            // Move o arquivo
            if (move_uploaded_file($imagemCentral8['tmp_name'], $destino)) {
                $caminho_imagemCentral8 = $destino; // caminho que será salvo no banco
            } else {
                echo "Imagem Central 1 - Houve um erro na transferência do arquivo. Erro = " . $imagemCentral8['error'] . "<br>";

                switch ($imagemCentral8['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo "O upload do arquivo foi feito parcialmente.";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "Nenhum arquivo foi enviado.";
                        break;
                    default:
                        echo "Erro desconhecido no upload.";
                        break;
                }
            }
        }
    }
}

// if($_FILES['imagemCentral9']['tmp_name'] != "") { 
// 	// Prepara a vari�vel do arquivo
// 	$imagemCentral9 = isset($_FILES["imagemCentral9"]) ? $_FILES["imagemCentral9"] : FALSE;

// 	if($imagemCentral9) { 
// 		// Verifica se o mime-type do arquivo � de imagemCentral9
// 		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagemCentral9["type"])) {
// 			echo "Imagem Central 9 - Arquivo em formato inv�lido! Somente arquivos com extens�o .jpg, .jpeg,  .bmp, .gif ou .png s�o suportados";
// 		}
// 	}
// 	$caminho_imagemCentral9 = "";
// 	if($_FILES['imagemCentral9']['size'] > "1000000") {
// 		print("<SCRIPT> alert('Imagem Central 9 - Seu arquivo n�o poder� ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
// 	} else {
// 		if(move_uploaded_file($_FILES['imagemCentral9']['tmp_name'], $uploaddir . $_FILES['imagemCentral9']['name'])) {
// 			$caminho_imagemCentral9 = $uploaddir . $_FILES['imagemCentral9']['name']; //local da imagemCentral9 a ser armazenado no banco de dados
// 		} else {
// 			print("Imagem Central 9 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagemCentral9']['error']);
// 			if($_FILES['imagemCentral9']['error'] == 1) {
// 				print("Imagem Central 9 - O arquivo no upload � maior do que o limite definido em upload_max_filesize no php.ini");
// 			} elseif($_FILES['imagemCentral9']['error'] == 2) {
// 				print("Imagem Central 9 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formul�rio html.");
// 			} elseif($_FILES['imagemCentral9']['error'] == 3) {
// 				print("Imagem Central 9 - o upload do arquivo foi feito parcialmente.");
// 			} elseif($_FILES['imagemCentral9']['error'] == 4) {
// 				print("Imagem Central 9 - N�o foi feito o upload do arquivo.");
// 			}
// 		}
// 	}
// }

// if($_FILES['imagemCentral10']['tmp_name'] != "") { 
// 	// Prepara a vari�vel do arquivo
// 	$imagemCentral10 = isset($_FILES["imagemCentral10"]) ? $_FILES["imagemCentral10"] : FALSE;

// 	if($imagemCentral10) { 
// 		// Verifica se o mime-type do arquivo � de imagemCentral10
// 		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagemCentral10["type"])) {
// 			echo "Imagem Central 10 - Arquivo em formato inv�lido! Somente arquivos com extens�o .jpg, .jpeg,  .bmp, .gif ou .png s�o suportados";
// 		}
// 	}
// 	$caminho_imagemCentral10 = "";
// 	if($_FILES['imagemCentral10']['size'] > "1000000") {
// 		print("<SCRIPT> alert('Imagem Central 10 - Seu arquivo n�o poder� ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
// 	} else {
// 		if(move_uploaded_file($_FILES['imagemCentral10']['tmp_name'], $uploaddir . $_FILES['imagemCentral10']['name'])) {
// 			$caminho_imagemCentral10 = $uploaddir . $_FILES['imagemCentral10']['name']; //local da imagemCentral10 a ser armazenado no banco de dados
// 		} else {
// 			print("Imagem Central 10 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagemCentral10']['error']);
// 			if($_FILES['imagemCentral10']['error'] == 1) {
// 				print("Imagem Central 10 - O arquivo no upload � maior do que o limite definido em upload_max_filesize no php.ini");
// 			} elseif($_FILES['imagemCentral10']['error'] == 2) {
// 				print("Imagem Central 10 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formul�rio html.");
// 			} elseif($_FILES['imagemCentral10']['error'] == 3) {
// 				print("Imagem Central 10 - o upload do arquivo foi feito parcialmente.");
// 			} elseif($_FILES['imagemCentral10']['error'] == 4) {
// 				print("Imagem Central 10 - N�o foi feito o upload do arquivo.");
// 			}
// 		}
// 	}
// }



if (isset($_FILES['imagem1']) && !empty($_FILES['imagem1']['tmp_name'])) {

    // Prepara a variável do arquivo
    $imagem1 = $_FILES["imagem1"];

    // Verifica se o arquivo é uma imagem válida (MIME type)
    if (!preg_match("/^image\/(jpeg|pjpeg|png|gif|bmp)$/i", $imagem1["type"])) {
        echo "Imagem 1 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } else {
        $caminho_imagem1 = "";
        $uploaddir = "uploads/"; // defina seu diretório de destino

        // Verifica o tamanho (máx 1MB)
        if ($imagem1['size'] > 1000000) {
            echo "<script>alert('Imagem 1 - Seu arquivo não pode ser maior que 1MB'); window.history.go(-1);</script>";
        } else {
            // Tenta mover o arquivo
            if (move_uploaded_file($imagem1['tmp_name'], $uploaddir . $imagem1['name'])) {
                $caminho_imagem1 = $uploaddir . $imagem1['name']; // caminho salvo no banco
            } else {
                echo "Imagem 1 - Houve um erro na transferência do arquivo. Erro=" . $imagem1['error'] . "<br>";

                switch ($imagem1['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        echo "O arquivo é maior que o limite definido em upload_max_filesize no php.ini.";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo "O upload foi feito parcialmente.";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "Nenhum arquivo foi enviado.";
                        break;
                    default:
                        echo "Erro desconhecido no upload.";
                        break;
                }
            }
        }
    }
} else {
    // Nenhum arquivo novo enviado — pode usar a imagem anterior, se existir
    $caminho_imagem1 = $_POST['imagem1'] ?? '';
}

if (isset($_FILES['imagem2']) && !empty($_FILES['imagem2']['tmp_name'])) {

    // Prepara a variável do arquivo
    $imagem2 = $_FILES['imagem2'];
    $caminho_imagem2 = '';
    $uploaddir = "uploads/"; // defina seu diretório de destino

    // Cria o diretório se não existir
    if (!is_dir($uploaddir)) {
        mkdir($uploaddir, 0777, true);
    }

    // Verifica se o arquivo é realmente uma imagem válida (MIME type)
    if (!preg_match("/^image\/(jpeg|pjpeg|png|gif|bmp)$/i", $imagem2["type"])) {
        echo "Imagem 2 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } 
    // Verifica o tamanho máximo permitido (1MB)
    elseif ($imagem2['size'] > 1000000) {
        echo "<script>alert('Imagem 2 - Seu arquivo não pode ser maior que 1MB'); window.history.go(-1);</script>";
    } 
    else {
        // Gera nome único para evitar sobrescrita
        $extensao = pathinfo($imagem2['name'], PATHINFO_EXTENSION);
        $novoNome = uniqid('imagem2_', true) . '.' . $extensao;
        $destino = $uploaddir . $novoNome;

        // Move o arquivo para o destino
        if (move_uploaded_file($imagem2['tmp_name'], $destino)) {
            $caminho_imagem2 = $destino; // Caminho salvo no banco
        } else {
            echo "Imagem 2 - Houve um erro na transferência do arquivo. Erro = " . $imagem2['error'] . "<br>";

            switch ($imagem2['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo "O upload do arquivo foi feito parcialmente.";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo "Nenhum arquivo foi enviado.";
                    break;
                default:
                    echo "Erro desconhecido no upload.";
                    break;
            }
        }
    }
} else {
    // Nenhum arquivo novo enviado — mantém o anterior, se existir
    $caminho_imagem2 = $_POST['imagem2'] ?? '';
}

if (isset($_FILES['imagem3']) && !empty($_FILES['imagem3']['tmp_name'])) {

    // Prepara a variável do arquivo
    $imagem3 = $_FILES['imagem3'];
    $caminho_imagem3 = '';
    $uploaddir = "uploads/"; // Defina seu diretório de destino

    // Cria o diretório se não existir
    if (!is_dir($uploaddir)) {
        mkdir($uploaddir, 0777, true);
    }

    // Verifica se o arquivo é realmente uma imagem válida (MIME type)
    if (!preg_match("/^image\/(jpeg|pjpeg|png|gif|bmp)$/i", $imagem3["type"])) {
        echo "Imagem 3 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } 
    // Verifica o tamanho máximo permitido (1MB)
    elseif ($imagem3['size'] > 1000000) {
        echo "<script>alert('Imagem 3 - Seu arquivo não pode ser maior que 1MB'); window.history.go(-1);</script>";
    } 
    else {
        // Gera nome único para evitar sobrescrita
        $extensao = pathinfo($imagem3['name'], PATHINFO_EXTENSION);
        $novoNome = uniqid('imagem3_', true) . '.' . $extensao;
        $destino = $uploaddir . $novoNome;

        // Move o arquivo para o destino
        if (move_uploaded_file($imagem3['tmp_name'], $destino)) {
            $caminho_imagem3 = $destino; // Caminho salvo no banco
        } else {
            echo "Imagem 3 - Houve um erro na transferência do arquivo. Erro = " . $imagem3['error'] . "<br>";

            switch ($imagem3['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo "O upload do arquivo foi feito parcialmente.";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo "Nenhum arquivo foi enviado.";
                    break;
                default:
                    echo "Erro desconhecido no upload.";
                    break;
            }
        }
    }
} else {
    // Nenhum arquivo novo enviado — mantém o anterior, se existir
    $caminho_imagem3 = $_POST['imagem3'] ?? '';
}

if (isset($_FILES['imagem4']) && !empty($_FILES['imagem4']['tmp_name'])) {

    // Prepara a variável do arquivo
    $imagem4 = $_FILES['imagem4'];
    $caminho_imagem4 = '';
    $uploaddir = "uploads/"; // Defina seu diretório de destino

    // Cria o diretório se não existir
    if (!is_dir($uploaddir)) {
        mkdir($uploaddir, 0777, true);
    }

    // Verifica se o arquivo é realmente uma imagem válida (MIME type)
    if (!preg_match("/^image\/(jpeg|pjpeg|png|gif|bmp)$/i", $imagem4["type"])) {
        echo "Imagem 4 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } 
    // Verifica o tamanho máximo permitido (1MB)
    elseif ($imagem4['size'] > 1000000) {
        echo "<script>alert('Imagem 4 - Seu arquivo não pode ser maior que 1MB'); window.history.go(-1);</script>";
    } 
    else {
        // Gera nome único para evitar sobrescrita
        $extensao = pathinfo($imagem4['name'], PATHINFO_EXTENSION);
        $novoNome = uniqid('imagem4_', true) . '.' . $extensao;
        $destino = $uploaddir . $novoNome;

        // Move o arquivo para o destino
        if (move_uploaded_file($imagem4['tmp_name'], $destino)) {
            $caminho_imagem4 = $destino; // Caminho salvo no banco
        } else {
            echo "Imagem 4 - Houve um erro na transferência do arquivo. Erro = " . $imagem4['error'] . "<br>";

            switch ($imagem4['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo "O upload do arquivo foi feito parcialmente.";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo "Nenhum arquivo foi enviado.";
                    break;
                default:
                    echo "Erro desconhecido no upload.";
                    break;
            }
        }
    }
} else {
    // Nenhum arquivo novo enviado — mantém o anterior, se existir
    $caminho_imagem4 = $_POST['imagem4'] ?? '';
}

if (isset($_FILES['imagem5']) && !empty($_FILES['imagem5']['tmp_name'])) {

    // Prepara a variável do arquivo
    $imagem5 = $_FILES['imagem5'];
    $caminho_imagem5 = '';
    $uploaddir = "uploads/"; // Defina seu diretório de destino

    // Cria o diretório se não existir
    if (!is_dir($uploaddir)) {
        mkdir($uploaddir, 0777, true);
    }

    // Verifica se o arquivo é realmente uma imagem válida (MIME type)
    if (!preg_match("/^image\/(jpeg|pjpeg|png|gif|bmp)$/i", $imagem5["type"])) {
        echo "Imagem 5 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } 
    // Verifica o tamanho máximo permitido (1MB)
    elseif ($imagem5['size'] > 1000000) {
        echo "<script>alert('Imagem 5 - Seu arquivo não pode ser maior que 1MB'); window.history.go(-1);</script>";
    } 
    else {
        // Gera nome único para evitar sobrescrita
        $extensao = pathinfo($imagem5['name'], PATHINFO_EXTENSION);
        $novoNome = uniqid('imagem5_', true) . '.' . $extensao;
        $destino = $uploaddir . $novoNome;

        // Move o arquivo para o destino
        if (move_uploaded_file($imagem5['tmp_name'], $destino)) {
            $caminho_imagem5 = $destino; // Caminho salvo no banco
        } else {
            echo "Imagem 5 - Houve um erro na transferência do arquivo. Erro = " . $imagem5['error'] . "<br>";

            switch ($imagem5['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo "O upload do arquivo foi feito parcialmente.";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo "Nenhum arquivo foi enviado.";
                    break;
                default:
                    echo "Erro desconhecido no upload.";
                    break;
            }
        }
    }
} else {
    // Nenhum arquivo novo enviado — mantém o anterior, se existir
    $caminho_imagem5 = $_POST['imagem5'] ?? '';
}

if (isset($_FILES['imagem6']) && !empty($_FILES['imagem6']['tmp_name'])) {

    // Prepara a variável do arquivo
    $imagem6 = $_FILES['imagem6'];
    $caminho_imagem6 = '';
    $uploaddir = "uploads/"; // Defina seu diretório de destino

    // Cria o diretório se não existir
    if (!is_dir($uploaddir)) {
        mkdir($uploaddir, 0777, true);
    }

    // Verifica se o arquivo é realmente uma imagem válida (MIME type)
    if (!preg_match("/^image\/(jpeg|pjpeg|png|gif|bmp)$/i", $imagem6["type"])) {
        echo "Imagem 6 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } 
    // Verifica o tamanho máximo permitido (1MB)
    elseif ($imagem6['size'] > 1000000) {
        echo "<script>alert('Imagem 6 - Seu arquivo não pode ser maior que 1MB'); window.history.go(-1);</script>";
    } 
    else {
        // Gera nome único para evitar sobrescrita
        $extensao = pathinfo($imagem6['name'], PATHINFO_EXTENSION);
        $novoNome = uniqid('imagem6_', true) . '.' . $extensao;
        $destino = $uploaddir . $novoNome;

        // Move o arquivo para o destino
        if (move_uploaded_file($imagem6['tmp_name'], $destino)) {
            $caminho_imagem6 = $destino; // Caminho salvo no banco
        } else {
            echo "Imagem 6 - Houve um erro na transferência do arquivo. Erro = " . $imagem6['error'] . "<br>";

            switch ($imagem6['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo "O upload do arquivo foi feito parcialmente.";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo "Nenhum arquivo foi enviado.";
                    break;
                default:
                    echo "Erro desconhecido no upload.";
                    break;
            }
        }
    }
} else {
    // Nenhum arquivo novo enviado — mantém o anterior, se existir
    $caminho_imagem6 = $_POST['imagem6'] ?? '';
}


if (isset($_FILES['imagem7']) && !empty($_FILES['imagem7']['tmp_name'])) {

    // Prepara a variável do arquivo
    $imagem7 = $_FILES['imagem7'];
    $caminho_imagem7 = '';
    $uploaddir = "uploads/"; // Defina seu diretório de destino

    // Cria o diretório se não existir
    if (!is_dir($uploaddir)) {
        mkdir($uploaddir, 0777, true);
    }

    // Verifica se o arquivo é realmente uma imagem válida (MIME type)
    if (!preg_match("/^image\/(jpeg|pjpeg|png|gif|bmp)$/i", $imagem7["type"])) {
        echo "Imagem 6 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } 
    // Verifica o tamanho máximo permitido (1MB)
    elseif ($imagem7['size'] > 1000000) {
        echo "<script>alert('Imagem 6 - Seu arquivo não pode ser maior que 1MB'); window.history.go(-1);</script>";
    } 
    else {
        // Gera nome único para evitar sobrescrita
        $extensao = pathinfo($imagem7['name'], PATHINFO_EXTENSION);
        $novoNome = uniqid('imagem7_', true) . '.' . $extensao;
        $destino = $uploaddir . $novoNome;

        // Move o arquivo para o destino
        if (move_uploaded_file($imagem7['tmp_name'], $destino)) {
            $caminho_imagem7 = $destino; // Caminho salvo no banco
        } else {
            echo "Imagem 6 - Houve um erro na transferência do arquivo. Erro = " . $imagem7['error'] . "<br>";

            switch ($imagem7['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo "O upload do arquivo foi feito parcialmente.";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo "Nenhum arquivo foi enviado.";
                    break;
                default:
                    echo "Erro desconhecido no upload.";
                    break;
            }
        }
    }
} else {
    // Nenhum arquivo novo enviado — mantém o anterior, se existir
    $caminho_imagem7 = $_POST['imagem7'] ?? '';
}


if (isset($_FILES['imagem8']) && !empty($_FILES['imagem8']['tmp_name'])) {

    // Prepara a variável do arquivo
    $imagem8 = $_FILES['imagem8'];
    $caminho_imagem8 = '';
    $uploaddir = "uploads/"; // Defina seu diretório de destino

    // Cria o diretório se não existir
    if (!is_dir($uploaddir)) {
        mkdir($uploaddir, 0777, true);
    }

    // Verifica se o arquivo é realmente uma imagem válida (MIME type)
    if (!preg_match("/^image\/(jpeg|pjpeg|png|gif|bmp)$/i", $imagem8["type"])) {
        echo "Imagem 6 - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } 
    // Verifica o tamanho máximo permitido (1MB)
    elseif ($imagem8['size'] > 1000000) {
        echo "<script>alert('Imagem 6 - Seu arquivo não pode ser maior que 1MB'); window.history.go(-1);</script>";
    } 
    else {
        // Gera nome único para evitar sobrescrita
        $extensao = pathinfo($imagem8['name'], PATHINFO_EXTENSION);
        $novoNome = uniqid('imagem8_', true) . '.' . $extensao;
        $destino = $uploaddir . $novoNome;

        // Move o arquivo para o destino
        if (move_uploaded_file($imagem8['tmp_name'], $destino)) {
            $caminho_imagem8 = $destino; // Caminho salvo no banco
        } else {
            echo "Imagem 6 - Houve um erro na transferência do arquivo. Erro = " . $imagem8['error'] . "<br>";

            switch ($imagem8['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo "O upload do arquivo foi feito parcialmente.";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo "Nenhum arquivo foi enviado.";
                    break;
                default:
                    echo "Erro desconhecido no upload.";
                    break;
            }
        }
    }
} else {
    // Nenhum arquivo novo enviado — mantém o anterior, se existir
    $caminho_imagem8 = $_POST['imagem8'] ?? '';
}


// if($_FILES['imagem9']['tmp_name'] != "") { 
// 	// Prepara a vari�vel do arquivo
// 	$imagem9 = isset($_FILES["imagem9"]) ? $_FILES["imagem9"] : FALSE;

// 	if($imagem9) { 
// 		// Verifica se o mime-type do arquivo � de imagem9
// 		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagem9["type"])) {
// 			echo "Imagem 9 - Arquivo em formato inv�lido! Somente arquivos com extens�o .jpg, .jpeg,  .bmp, .gif ou .png s�o suportados";
// 		}
// 	}
// 	$caminho_imagem9 = "";
// 	if($_FILES['imagem9']['size'] > "1000000") {
// 		print("<SCRIPT> alert('Imagem 9 - Seu arquivo n�o poder� ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
// 	} else {
// 		if(move_uploaded_file($_FILES['imagem9']['tmp_name'], $uploaddir . $_FILES['imagem9']['name'])) {
// 			$caminho_imagem9 = $uploaddir . $_FILES['imagem9']['name']; //local da imagem9 a ser armazenado no banco de dados
// 		} else {
// 			print("Imagem 9 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagem9']['error']);
// 			if($_FILES['imagem9']['error'] == 1) {
// 				print("Imagem 9 - O arquivo no upload � maior do que o limite definido em upload_max_filesize no php.ini");
// 			} elseif($_FILES['imagem9']['error'] == 2) {
// 				print("Imagem 9 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formul�rio html.");
// 			} elseif($_FILES['imagem9']['error'] == 3) {
// 				print("Imagem 9 - o upload do arquivo foi feito parcialmente.");
// 			} elseif($_FILES['imagem9']['error'] == 4) {
// 				print("Imagem 9 - N�o foi feito o upload do arquivo.");
// 			}
// 		}
// 	}
// }

// if($_FILES['imagem10']['tmp_name'] != "") { 
// 	// Prepara a vari�vel do arquivo
// 	$imagem10 = isset($_FILES["imagem10"]) ? $_FILES["imagem10"] : FALSE;

// 	if($imagem10) { 
// 		// Verifica se o mime-type do arquivo � de imagem10
// 		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagem10["type"])) {
// 			echo "Imagem 10 - Arquivo em formato inv�lido! Somente arquivos com extens�o .jpg, .jpeg,  .bmp, .gif ou .png s�o suportados";
// 		}
// 	}
// 	$caminho_imagem10 = "";
// 	if($_FILES['imagem10']['size'] > "1000000") {
// 		print("<SCRIPT> alert('Imagem 10 - Seu arquivo n�o poder� ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
// 	} else {
// 		if(move_uploaded_file($_FILES['imagem10']['tmp_name'], $uploaddir . $_FILES['imagem10']['name'])) {
// 			$caminho_imagem10 = $uploaddir . $_FILES['imagem10']['name']; //local da imagem10 a ser armazenado no banco de dados
// 		} else {
// 			print("Imagem 10 - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagem10']['error']);
// 			if($_FILES['imagem10']['error'] == 1) {
// 				print("Imagem 10 - O arquivo no upload � maior do que o limite definido em upload_max_filesize no php.ini");
// 			} elseif($_FILES['imagem10']['error'] == 2) {
// 				print("Imagem 10 - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formul�rio html.");
// 			} elseif($_FILES['imagem10']['error'] == 3) {
// 				print("Imagem 10 - o upload do arquivo foi feito parcialmente.");
// 			} elseif($_FILES['imagem10']['error'] == 4) {
// 				print("Imagem 10 - N�o foi feito o upload do arquivo.");
// 			}
// 		}
// 	}
// }


// Verifica se o arquivo foi enviado
if (isset($_FILES['imagemExtra1']) && !empty($_FILES['imagemExtra1']['tmp_name'])) {

    $imagemExtra1 = $_FILES['imagemExtra1'];

    // Verifica se é um tipo de imagem permitido
    if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/i", $imagemExtra1['type'])) {
        echo "Imagem Extra 1 - Arquivo em formato inválido! Somente arquivos .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } else {

        // Verifica tamanho (máx. 1MB)
        if ($imagemExtra1['size'] > 1000000) {
            echo "<script>alert('Imagem Extra 1 - Seu arquivo não poderá ser maior que 1MB'); window.history.go(-1);</script>";
        } else {

            // Garante que o diretório de upload existe
            if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0777, true);
            }

            // Gera nome único para evitar sobrescrever arquivos
            $extensao = pathinfo($imagemExtra1['name'], PATHINFO_EXTENSION);
            $novoNome = uniqid('imagemExtra1_', true) . '.' . $extensao;
            $destino = $uploaddir . $novoNome;

            // Move o arquivo
            if (move_uploaded_file($imagemExtra1['tmp_name'], $destino)) {
                $caminho_imagemExtra1 = $destino; // caminho que será salvo no banco
            } else {
                echo "Imagem Extra 1 - Houve um erro na transferência do arquivo. Erro = " . $imagemExtra1['error'] . "<br>";

                switch ($imagemExtra1['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo "O upload do arquivo foi feito parcialmente.";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "Nenhum arquivo foi enviado.";
                        break;
                    default:
                        echo "Erro desconhecido no upload.";
                        break;
                }
            }
        }
    }
}


// Verifica se o arquivo foi enviado
if (isset($_FILES['imagemExtra2']) && !empty($_FILES['imagemExtra2']['tmp_name'])) {

    $imagemExtra2 = $_FILES['imagemExtra2'];

    // Verifica se é um tipo de imagem permitido
    if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/i", $imagemExtra2['type'])) {
        echo "Imagem Extra 1 - Arquivo em formato inválido! Somente arquivos .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } else {

        // Verifica tamanho (máx. 1MB)
        if ($imagemExtra2['size'] > 1000000) {
            echo "<script>alert('Imagem Extra 1 - Seu arquivo não poderá ser maior que 1MB'); window.history.go(-1);</script>";
        } else {

            // Garante que o diretório de upload existe
            if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0777, true);
            }

            // Gera nome único para evitar sobrescrever arquivos
            $extensao = pathinfo($imagemExtra2['name'], PATHINFO_EXTENSION);
            $novoNome = uniqid('imagemExtra2_', true) . '.' . $extensao;
            $destino = $uploaddir . $novoNome;

            // Move o arquivo
            if (move_uploaded_file($imagemExtra2['tmp_name'], $destino)) {
                $caminho_imagemExtra2 = $destino; // caminho que será salvo no banco
            } else {
                echo "Imagem Extra 1 - Houve um erro na transferência do arquivo. Erro = " . $imagemExtra2['error'] . "<br>";

                switch ($imagemExtra2['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo "O upload do arquivo foi feito parcialmente.";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "Nenhum arquivo foi enviado.";
                        break;
                    default:
                        echo "Erro desconhecido no upload.";
                        break;
                }
            }
        }
    }
}

// Verifica se o arquivo foi enviado
if (isset($_FILES['imagemExtra3']) && !empty($_FILES['imagemExtra3']['tmp_name'])) {

    $imagemExtra3 = $_FILES['imagemExtra3'];

    // Verifica se é um tipo de imagem permitido
    if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/i", $imagemExtra3['type'])) {
        echo "Imagem Extra 1 - Arquivo em formato inválido! Somente arquivos .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } else {

        // Verifica tamanho (máx. 1MB)
        if ($imagemExtra3['size'] > 1000000) {
            echo "<script>alert('Imagem Extra 1 - Seu arquivo não poderá ser maior que 1MB'); window.history.go(-1);</script>";
        } else {

            // Garante que o diretório de upload existe
            if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0777, true);
            }

            // Gera nome único para evitar sobrescrever arquivos
            $extensao = pathinfo($imagemExtra3['name'], PATHINFO_EXTENSION);
            $novoNome = uniqid('imagemExtra3_', true) . '.' . $extensao;
            $destino = $uploaddir . $novoNome;

            // Move o arquivo
            if (move_uploaded_file($imagemExtra3['tmp_name'], $destino)) {
                $caminho_imagemExtra3 = $destino; // caminho que será salvo no banco
            } else {
                echo "Imagem Extra 1 - Houve um erro na transferência do arquivo. Erro = " . $imagemExtra3['error'] . "<br>";

                switch ($imagemExtra3['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo "O upload do arquivo foi feito parcialmente.";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "Nenhum arquivo foi enviado.";
                        break;
                    default:
                        echo "Erro desconhecido no upload.";
                        break;
                }
            }
        }
    }
}

// Verifica se o arquivo foi enviado
if (isset($_FILES['imagemExtra4']) && !empty($_FILES['imagemExtra4']['tmp_name'])) {

    $imagemExtra4 = $_FILES['imagemExtra4'];

    // Verifica se é um tipo de imagem permitido
    if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/i", $imagemExtra4['type'])) {
        echo "Imagem Extra 1 - Arquivo em formato inválido! Somente arquivos .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } else {

        // Verifica tamanho (máx. 1MB)
        if ($imagemExtra4['size'] > 1000000) {
            echo "<script>alert('Imagem Extra 1 - Seu arquivo não poderá ser maior que 1MB'); window.history.go(-1);</script>";
        } else {

            // Garante que o diretório de upload existe
            if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0777, true);
            }

            // Gera nome único para evitar sobrescrever arquivos
            $extensao = pathinfo($imagemExtra4['name'], PATHINFO_EXTENSION);
            $novoNome = uniqid('imagemExtra4_', true) . '.' . $extensao;
            $destino = $uploaddir . $novoNome;

            // Move o arquivo
            if (move_uploaded_file($imagemExtra4['tmp_name'], $destino)) {
                $caminho_imagemExtra4 = $destino; // caminho que será salvo no banco
            } else {
                echo "Imagem Extra 1 - Houve um erro na transferência do arquivo. Erro = " . $imagemExtra4['error'] . "<br>";

                switch ($imagemExtra4['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo "O upload do arquivo foi feito parcialmente.";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "Nenhum arquivo foi enviado.";
                        break;
                    default:
                        echo "Erro desconhecido no upload.";
                        break;
                }
            }
        }
    }
}

// Verifica se o arquivo foi enviado
if (isset($_FILES['imagemExtra5']) && !empty($_FILES['imagemExtra5']['tmp_name'])) {

    $imagemExtra5 = $_FILES['imagemExtra5'];

    // Verifica se é um tipo de imagem permitido
    if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/i", $imagemExtra5['type'])) {
        echo "Imagem Extra 1 - Arquivo em formato inválido! Somente arquivos .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } else {

        // Verifica tamanho (máx. 1MB)
        if ($imagemExtra5['size'] > 1000000) {
            echo "<script>alert('Imagem Extra 1 - Seu arquivo não poderá ser maior que 1MB'); window.history.go(-1);</script>";
        } else {

            // Garante que o diretório de upload existe
            if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0777, true);
            }

            // Gera nome único para evitar sobrescrever arquivos
            $extensao = pathinfo($imagemExtra5['name'], PATHINFO_EXTENSION);
            $novoNome = uniqid('imagemExtra5_', true) . '.' . $extensao;
            $destino = $uploaddir . $novoNome;

            // Move o arquivo
            if (move_uploaded_file($imagemExtra5['tmp_name'], $destino)) {
                $caminho_imagemExtra5 = $destino; // caminho que será salvo no banco
            } else {
                echo "Imagem Extra 1 - Houve um erro na transferência do arquivo. Erro = " . $imagemExtra5['error'] . "<br>";

                switch ($imagemExtra5['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo "O upload do arquivo foi feito parcialmente.";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "Nenhum arquivo foi enviado.";
                        break;
                    default:
                        echo "Erro desconhecido no upload.";
                        break;
                }
            }
        }
    }
}

// Verifica se o arquivo foi enviado
if (isset($_FILES['imagemExtra6']) && !empty($_FILES['imagemExtra6']['tmp_name'])) {

    $imagemExtra6 = $_FILES['imagemExtra6'];

    // Verifica se é um tipo de imagem permitido
    if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/i", $imagemExtra6['type'])) {
        echo "Imagem Extra 1 - Arquivo em formato inválido! Somente arquivos .jpg, .jpeg, .bmp, .gif ou .png são suportados.";
    } else {

        // Verifica tamanho (máx. 1MB)
        if ($imagemExtra6['size'] > 1000000) {
            echo "<script>alert('Imagem Extra 1 - Seu arquivo não poderá ser maior que 1MB'); window.history.go(-1);</script>";
        } else {

            // Garante que o diretório de upload existe
            if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0777, true);
            }

            // Gera nome único para evitar sobrescrever arquivos
            $extensao = pathinfo($imagemExtra6['name'], PATHINFO_EXTENSION);
            $novoNome = uniqid('imagemExtra6_', true) . '.' . $extensao;
            $destino = $uploaddir . $novoNome;

            // Move o arquivo
            if (move_uploaded_file($imagemExtra6['tmp_name'], $destino)) {
                $caminho_imagemExtra6 = $destino; // caminho que será salvo no banco
            } else {
                echo "Imagem Extra 1 - Houve um erro na transferência do arquivo. Erro = " . $imagemExtra6['error'] . "<br>";

                switch ($imagemExtra6['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                        echo "O arquivo é maior do que o limite definido em upload_max_filesize no php.ini";
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        echo "O arquivo ultrapassa o limite de tamanho definido em MAX_FILE_SIZE no formulário HTML.";
                        break;
                    case UPLOAD_ERR_PARTIAL:
                        echo "O upload do arquivo foi feito parcialmente.";
                        break;
                    case UPLOAD_ERR_NO_FILE:
                        echo "Nenhum arquivo foi enviado.";
                        break;
                    default:
                        echo "Erro desconhecido no upload.";
                        break;
                }
            }
        }
    }
}



/* Atualiza��o dos dados, configure abaixo conforme suas necessidades */
// objeto para montagem de express�o sql
$sql = new UpdateSQL();

$sql->setTable("mulher");
$sql->setKey("idMulher", anti_injection(getParam("id")), "Number");

// $sql->addField("nome", anti_injection(getParam("nome")), "String");
$nome = anti_injection(getParam("nome"));

$sql->addField("nome", $nome, "String");

$sql->addField("sobrenome", anti_injection(getParam("sobrenome")), "String");		
//$sql->addField("nomeCompleto", anti_injection(getParam("nomeCompleto")), "String");
$sql->addField("telefone", anti_injection(getParam("telefone")), "String");	
$sql->addField("email", anti_injection(getParam("email")), "String");	
$sql->addField("site", anti_injection(getParam("site")), "String");	
//$sql->addField("orkut", anti_injection(getParam("orkut")), "String");	
$sql->addField("msn", anti_injection(getParam("msn")), "String");	
$sql->addField("idade", anti_injection(getParam("idade")), "Number");
$sql->addField("manequim", anti_injection(getParam("manequim")), "String");	
$sql->addField("olhos", anti_injection(getParam("olhos")), "String");	
$sql->addField("signo", anti_injection(getParam("signo")), "String");	
$sql->addField("busto", anti_injection(getParam("busto")), "String");	
$sql->addField("cabelos", anti_injection(getParam("cabelos")), "String");	

$sql->addField("twitter", anti_injection(getParam("twitter")), "String");

$sql->addField("altura", anti_injection(getParam("altura")), "String");	
$sql->addField("cintura", anti_injection(getParam("cintura")), "String");	
$sql->addField("pes", anti_injection(getParam("pes")), "String");	
$sql->addField("peso", anti_injection(getParam("peso")), "String");	
$sql->addField("quadril", anti_injection(getParam("quadril")), "String");	
$sql->addField("horarioAtendimento", anti_injection(getParam("horarioAtendimento")), "String");	
$sql->addField("mensagem1", getParam("mensagem1"), "String");	
$sql->addField("mensagem2", getParam("mensagem2"), "String");	
$sql->addField("flagPreferencial", anti_injection(getParam("flagPreferencial")), "String");	
$sql->addField("flagAgenciada", anti_injection(getParam("flagAgenciada")), "String");	
$sql->addField("flagTipo", anti_injection(getParam("flagTipo")), "String");	
//$sql->addField("cidade", anti_injection(getParam("cidade")), "String");

$sql->addField("flagBeijoBoca", anti_injection(getParam("flagBeijoBoca")), "String");	
$sql->addField("flagOral", anti_injection(getParam("flagOral")), "String");	
$sql->addField("flagAnal", anti_injection(getParam("flagAnal")), "String");	
$sql->addField("flagDominacao", anti_injection(getParam("flagDominacao")), "String");	
$sql->addField("flagInversao", anti_injection(getParam("flagInversao")), "String");	
$sql->addField("flagAtendoEles", anti_injection(getParam("flagAtendoEles")), "String");	
$sql->addField("flagAtendoElas", anti_injection(getParam("flagAtendoElas")), "String");
$sql->addField("flagAtendoCasais", anti_injection(getParam("flagAtendoCasais")), "String");	
$sql->addField("flagTenhoAmigas", anti_injection(getParam("flagTenhoAmigas")), "String");		

$sql->addField("flagTemVideo", anti_injection(getParam("flagTemVideo")), "String");
//$sql->addField("flagComLocal", anti_injection(getParam("flagComLocal")), "String");

$sql->addField("telefone2", anti_injection(getParam("telefone2")), "String");	
$sql->addField("flagEventos", anti_injection(getParam("flagEventos")), "String");	
$sql->addField("flagViagens", anti_injection(getParam("flagViagens")), "String");	
$sql->addField("flagAcessorios", anti_injection(getParam("flagAcessorios")), "String");
$sql->addField("flagAtende24Horas", anti_injection(getParam("flagAtende24Horas")), "String");	
$sql->addField("horario", anti_injection(getParam("horario")), "String");
$sql->addField("locais", anti_injection(getParam("locais")), "String");	
$sql->addField("cache", anti_injection(getParam("cache")), "String");
$sql->addField("cidades", anti_injection(getParam("cidades")), "String");

$sql->addField("nomeUrl", anti_injection(getParam("nomeUrl")), "String");
$sql->addField("flagAtivo", anti_injection(getParam("flagAtivo")), "String");

$sql->addField("idOperadora", anti_injection(getParam("idOperadora")), "Number");		
$sql->addField("idOperadora2", anti_injection(getParam("idOperadora2")), "Number");

$sql->addField("flagWhats", anti_injection(getParam("flagWhats")), "String");	
$sql->addField("flagWhats2", anti_injection(getParam("flagWhats2")), "String");	

$sql->addField("flagMostraRosto", anti_injection(getParam("flagMostraRosto")), "String");
$sql->addField("aceitoCartao", anti_injection(getParam("aceitoCartao")), "String");
$sql->addField("atendoHoteis", anti_injection(getParam("atendoHoteis")), "String");
$sql->addField("atendoMoteis", anti_injection(getParam("atendoMoteis")), "String");
$sql->addField("atendoDominicio", anti_injection(getParam("atendoDominicio")), "String");
$sql->addField("atendoLocalProprio", anti_injection(getParam("atendoLocalProprio")), "String");

$sql->addField("ddd", anti_injection(getParam("ddd")), "String");
$sql->addField("ddd2", anti_injection(getParam("ddd2")), "String");

$sql->addField("flagCarrossel", anti_injection(getParam("flagCarrossel")), "String");


$sql->addField("outros", anti_injection(getParam("outros")), "String");
$sql->addField("flagSexoVirtual", anti_injection(getParam("flagSexoVirtual")), "String");

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
		

/*
if ($caminho_video != NULL)
	$sql->addField("video", $caminho_video, "String");
*/	
if (getParam("video") != NULL && getParam("video") != "")
	$sql->addField("video", anti_injection(getParam("video")), "String");

if (getParam("videoMobile") != NULL && getParam("videoMobile") != "")
	$sql->addField("videoMobile", anti_injection(getParam("videoMobile")), "String");
			

$caminho_imagemCapa = $caminho_imagemCapa ?? $_POST['imagemCapa'] ?? null;

if ($caminho_imagemCapa !== null) {
    $sql->addField("imagemCapa", $caminho_imagemCapa, "String");
}
	

$caminho_imagemCentral1 = $caminho_imagemCentral1 ?? $_POST['imagemCentral1'] ?? null;
if ($caminho_imagemCentral1 !== null)
    $sql->addField("imagemCentral1", $caminho_imagemCentral1, "String");

$caminho_imagemCentral2 = $caminho_imagemCentral2 ?? $_POST['imagemCentral2'] ?? null;
if ($caminho_imagemCentral2 !== null)
    $sql->addField("imagemCentral2", $caminho_imagemCentral2, "String");

$caminho_imagemCentral3 = $caminho_imagemCentral3 ?? $_POST['imagemCentral3'] ?? null;
if ($caminho_imagemCentral3 !== null)
    $sql->addField("imagemCentral3", $caminho_imagemCentral3, "String");

$caminho_imagemCentral4 = $caminho_imagemCentral4 ?? $_POST['imagemCentral4'] ?? null;
if ($caminho_imagemCentral4 !== null)
    $sql->addField("imagemCentral4", $caminho_imagemCentral4, "String");

$caminho_imagemCentral5 = $caminho_imagemCentral5 ?? $_POST['imagemCentral5'] ?? null;
if ($caminho_imagemCentral5 !== null)
    $sql->addField("imagemCentral5", $caminho_imagemCentral5, "String");

$caminho_imagemCentral6 = $caminho_imagemCentral6 ?? $_POST['imagemCentral6'] ?? null;
if ($caminho_imagemCentral6 !== null)
    $sql->addField("imagemCentral6", $caminho_imagemCentral6, "String");

$caminho_imagemCentral7 = $caminho_imagemCentral7 ?? $_POST['imagemCentral7'] ?? null;
if ($caminho_imagemCentral7 !== null)
    $sql->addField("imagemCentral7", $caminho_imagemCentral7, "String");

$caminho_imagemCentral8 = $caminho_imagemCentral8 ?? $_POST['imagemCentral8'] ?? null;
if ($caminho_imagemCentral8 !== null)
    $sql->addField("imagemCentral8", $caminho_imagemCentral8, "String");

$caminho_imagemCentral9 = $caminho_imagemCentral9 ?? $_POST['imagemCentral9'] ?? null;
if ($caminho_imagemCentral9 !== null)
    $sql->addField("imagemCentral9", $caminho_imagemCentral9, "String");

$caminho_imagemCentral10 = $caminho_imagemCentral10 ?? $_POST['imagemCentral10'] ?? null;
if ($caminho_imagemCentral10 !== null)
    $sql->addField("imagemCentral10", $caminho_imagemCentral10, "String");


$caminho_imagem1 = $caminho_imagem1 ?? $_POST['imagem1'] ?? null;
if ($caminho_imagem1 !== null)
    $sql->addField("imagem1", $caminho_imagem1, "String");

$caminho_imagem2 = $caminho_imagem2 ?? $_POST['imagem2'] ?? null;
if ($caminho_imagem2 !== null)
    $sql->addField("imagem2", $caminho_imagem2, "String");

$caminho_imagem3 = $caminho_imagem3 ?? $_POST['imagem3'] ?? null;
if ($caminho_imagem3 !== null)
    $sql->addField("imagem3", $caminho_imagem3, "String");

$caminho_imagem4 = $caminho_imagem4 ?? $_POST['imagem4'] ?? null;
if ($caminho_imagem4 !== null)
    $sql->addField("imagem4", $caminho_imagem4, "String");

$caminho_imagem5 = $caminho_imagem5 ?? $_POST['imagem5'] ?? null;
if ($caminho_imagem5 !== null)
    $sql->addField("imagem5", $caminho_imagem5, "String");

$caminho_imagem6 = $caminho_imagem6 ?? $_POST['imagem6'] ?? null;
if ($caminho_imagem6 !== null)
    $sql->addField("imagem6", $caminho_imagem6, "String");

$caminho_imagem7 = $caminho_imagem7 ?? $_POST['imagem7'] ?? null;
if ($caminho_imagem7 !== null)
    $sql->addField("imagem7", $caminho_imagem7, "String");

$caminho_imagem8 = $caminho_imagem8 ?? $_POST['imagem8'] ?? null;
if ($caminho_imagem8 !== null)
    $sql->addField("imagem8", $caminho_imagem8, "String");

$caminho_imagem9 = $caminho_imagem9 ?? $_POST['imagem9'] ?? null;
if ($caminho_imagem9 !== null)
    $sql->addField("imagem9", $caminho_imagem9, "String");

$caminho_imagem10 = $caminho_imagem10 ?? $_POST['imagem10'] ?? null;
if ($caminho_imagem10 !== null)
    $sql->addField("imagem10", $caminho_imagem10, "String");


$caminho_imagemExtra1 = $caminho_imagemExtra1 ?? $_POST['imagemExtra1'] ?? null;
if ($caminho_imagemExtra1 !== null)
    $sql->addField("imagemExtra1", $caminho_imagemExtra1, "String");

$caminho_imagemExtra2 = $caminho_imagemExtra2 ?? $_POST['imagemExtra2'] ?? null;
if ($caminho_imagemExtra2 !== null)
    $sql->addField("imagemExtra2", $caminho_imagemExtra2, "String");

$caminho_imagemExtra3 = $caminho_imagemExtra3 ?? $_POST['imagemExtra3'] ?? null;
if ($caminho_imagemExtra3 !== null)
    $sql->addField("imagemExtra3", $caminho_imagemExtra3, "String");

$caminho_imagemExtra4 = $caminho_imagemExtra4 ?? $_POST['imagemExtra4'] ?? null;
if ($caminho_imagemExtra4 !== null)
    $sql->addField("imagemExtra4", $caminho_imagemExtra4, "String");

$caminho_imagemExtra5 = $caminho_imagemExtra5 ?? $_POST['imagemExtra5'] ?? null;
if ($caminho_imagemExtra5 !== null)
    $sql->addField("imagemExtra5", $caminho_imagemExtra5, "String");

$caminho_imagemExtra6 = $caminho_imagemExtra6 ?? $_POST['imagemExtra6'] ?? null;
if ($caminho_imagemExtra6 !== null)
    $sql->addField("imagemExtra6", $caminho_imagemExtra6, "String");

$id = getParam("id");

if (strlen(getParam("id"))>0) { // altera��o, retirar strlen se vier de edicao_aux
	$sql->setAction("UPDATE");
	
	$conn->execute($sql->getSQL());
	
	$destino = getSession("redirectAnunciante") . "?pagina=".getParam("pagina"); 
	
} else { // inclus�o

	//Verifica se est� incluindo novo registro a partir de outro j� existente �para adicionar as imagens
	
	/*
	if (getParam("video") != NULL)
		$sql->addField("video", getParam("video"), "String");
    */
	
	if (getParam("imagemCentral1") != NULL)
		$sql->addField("imagemCentral1", anti_injection(getParam("imagemCentral1")), "String");
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

	if (getParam("imagem1") != NULL)
		$sql->addField("imagem1", anti_injection(getParam("imagem1")), "String");
	if (getParam("imagem2") != NULL)
		$sql->addField("imagem2", anti_injection(getParam("imagem2")), "String");
	if (getParam("imagem3") != NULL)
		$sql->addField("imagem3", anti_injection(getParam("imagem3")), "String");
	if (getParam("imagem4") != NULL)
		$sql->addField("imagem4", anti_injection(getParam("imagem4")), "String");
	if (getParam("imagem5") != NULL)
		$sql->addField("imagem5", anti_injection(getParam("imagem5")), "String");
	if (getParam("imagem6") != NULL)
		$sql->addField("imagem6", anti_injection(getParam("imagem6")), "String");
	if (getParam("imagem7") != NULL)
		$sql->addField("imagem7", anti_injection(getParam("imagem7")), "String");
	if (getParam("imagem8") != NULL)
		$sql->addField("imagem8", anti_injection(getParam("imagem8")), "String");
	if (getParam("imagem9") != NULL)
		$sql->addField("imagem9", anti_injection(getParam("imagem9")), "String");
	if (getParam("imagem10") != NULL)
		$sql->addField("imagem10", anti_injection(getParam("imagem10")), "String");


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
	//echo $sql->getSQL();
}
//echo $sql->getSQL();
// volta para a lista ou reapresenta o formul�rio em modo de edi��o
// echo "<script>location.href='$destino';</script>";
echo "<script>location.href='/sistema/content/mulher_lista.php?clear=1';</script>";

/* 	Encerra a conex�o com o banco de dados */
$conn->close();


// Salvando as cidades de atendimento das anunciantes 
if (strlen(getParam("id"))>0) { 
	$idMulher = getParam("id");
} else {
	$idMulher = $last_id;
}

$conn = new db();
$conn->open();

/*  captura e prepara a lista de registros */ 
$lista_cidade = getParam("cidade");

if (is_array($lista_cidade)) {
	$sql = "DELETE FROM mulherCidade WHERE idMulher = ".$idMulher.";";
	$conn->execute($sql);

	foreach($lista_cidade as $idCidade) {
		$sql = "INSERT INTO mulherCidade (idMulher, idCidade) VALUES (".$idMulher.",".$idCidade.");";
		$conn->execute($sql);
	}
}

$conn->close();
	
?>