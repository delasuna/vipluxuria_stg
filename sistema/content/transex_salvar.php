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
$uploaddir = "upload_transex/";

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


if (isset($_FILES['imagemComNome']) && !empty($_FILES['imagemComNome']['tmp_name'])) {

    $imagemComNome = $_FILES['imagemComNome'];

    // Cria o diretório caso não exista
    if (!is_dir($uploaddir)) {
        mkdir($uploaddir, 0777, true);
    }

    // Verifica tipo de arquivo (MIME)
    $tiposPermitidos = ['image/jpeg', 'image/pjpeg', 'image/png', 'image/gif', 'image/bmp'];
    if (!in_array($imagemComNome['type'], $tiposPermitidos)) {
        echo "<script>alert('Imagem com Nome - Formato inválido! Use .jpg, .jpeg, .png, .gif ou .bmp'); window.history.go(-1);</script>";
    } 
    // Verifica tamanho do arquivo (1MB)
    elseif ($imagemComNome['size'] > 1000000) {
        echo "<script>alert('Imagem com Nome - Seu arquivo não poderá ser maior que 1MB'); window.history.go(-1);</script>";
    } else {
        // Gera nome único para evitar sobrescrever arquivos
        $extensao = pathinfo($imagemComNome['name'], PATHINFO_EXTENSION);
        $novoNome = uniqid('imagemComNome_', true) . '.' . $extensao;
        $destino = $uploaddir . $novoNome;

        // Move o arquivo para o destino
        if (move_uploaded_file($imagemComNome['tmp_name'], $destino)) {
            $caminho_imagemComNome = $destino; // Caminho salvo no banco
        } else {
            echo "Imagem com Nome - Houve um erro na transferência do arquivo. Erro = " . $imagemComNome['error'] . "<br>";

            switch ($imagemComNome['error']) {
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

echo "p�s imagens";


/* Atualiza��o dos dados, configure abaixo conforme suas necessidades */
// objeto para montagem de express�o sql
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

$caminho_imagemComNome = $caminho_imagemComNome ?? $_POST['imagemComNome'] ?? null;

if ($caminho_imagemComNome !== null) {
    $sql->addField("imagemComNome", $caminho_imagemComNome, "String");
}


if (strlen(getParam("id"))>0) { // altera��o, retirar strlen se vier de edicao_aux
	$sql->setAction("UPDATE");
	
	$conn->execute($sql->getSQL());
	$destino = getSession("redirectAnunciante") . "?pagina=".getParam("pagina"); 
} else { // inclus�o
	//Verifica se est� incluindo novo registro a partir de outro j� existente �para adicionar as imagens
	
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
// volta para a lista ou reapresenta o formul�rio em modo de edi��o
echo "<script>location.href='/sistema/content/transex_lista.php?clear=1';</script>";

/* 	Encerra a conex�o com o banco de dados */
$conn->close();
?>