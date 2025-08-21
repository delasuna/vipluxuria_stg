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
$uploaddir = "upload_blog/";


if($_FILES['imagem']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$imagem = isset($_FILES["imagem"]) ? $_FILES["imagem"] : FALSE;

	if($imagem) { 
		// Verifica se o mime-type do arquivo é de imagem
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagem["type"])) {
			echo "Imagem - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg,  .bmp, .gif ou .png são suportados";
		}
	}
	$caminho_imagem = "";
	if($_FILES['imagem']['size'] > "1000000") {
		print("<SCRIPT> alert('Imagem - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['imagem']['tmp_name'], $uploaddir . $_FILES['imagem']['name'])) {
			$caminho_imagem = $uploaddir . $_FILES['imagem']['name']; //local da imagem a ser armazenado no banco de dados
		} else {
			print("Imagem - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagem']['error']);
			if($_FILES['imagem']['error'] == 1) {
				print("Imagem - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['imagem']['error'] == 2) {
				print("Imagem - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['imagem']['error'] == 3) {
				print("Imagem - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['imagem']['error'] == 4) {
				print("Imagem - Não foi feito o upload do arquivo.");
			}
		}
	}
}


if($_FILES['imagem2']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$imagem2 = isset($_FILES["imagem2"]) ? $_FILES["imagem2"] : FALSE;

	if($imagem2) { 
		// Verifica se o mime-type do arquivo é de imagem2
		if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $imagem2["type"])) {
			echo "Imagem - Arquivo em formato inválido! Somente arquivos com extensão .jpg, .jpeg,  .bmp, .gif ou .png são suportados";
		}
	}
	$caminho_imagem2 = "";
	if($_FILES['imagem2']['size'] > "1000000") {
		print("<SCRIPT> alert('Imagem - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
		if(move_uploaded_file($_FILES['imagem2']['tmp_name'], $uploaddir . $_FILES['imagem2']['name'])) {
			$caminho_imagem2 = $uploaddir . $_FILES['imagem2']['name']; //local da imagem2 a ser armazenado no banco de dados
		} else {
			print("Imagem - Houve um erro na transferencia do arquivo:\n Erro=" .$_FILES['imagem2']['error']);
			if($_FILES['imagem2']['error'] == 1) {
				print("Imagem - O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini");
			} elseif($_FILES['imagem2']['error'] == 2) {
				print("Imagem - O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário html.");
			} elseif($_FILES['imagem2']['error'] == 3) {
				print("Imagem - o upload do arquivo foi feito parcialmente.");
			} elseif($_FILES['imagem2']['error'] == 4) {
				print("Imagem - Não foi feito o upload do arquivo.");
			}
		}
	}
}


/* Atualização dos dados, configure abaixo conforme suas necessidades */
// objeto para montagem de expressão sql
$sql = new UpdateSQL();

$sql->setTable("blog");
$sql->setKey("idBlog", anti_injection(getParam("id")), "Number");

$sql->addField("assunto", anti_injection(getParam("assunto")), "String");	
$sql->addField("mensagem", anti_injection(getParam("mensagem")), "String");

$sql->addField("nomeTag1", anti_injection(getParam("nomeTag1")), "String");	
$sql->addField("paginaTag1", anti_injection(getParam("paginaTag1")), "String");	
$sql->addField("nomeTag2", anti_injection(getParam("nomeTag2")), "String");	
$sql->addField("paginaTag2", anti_injection(getParam("paginaTag2")), "String");

$sql->addField("dataPublicacao", anti_injection(getParam("dataPublicacao")), "String");		

//$sql->addField("alturaVideo", getParam("alturaVideo"), "String");	
//$sql->addField("larguraVideo", getParam("larguraVideo"), "String");	
$sql->addField("video", getParam("video"), "String");	

if ($caminho_imagem != NULL)
	$sql->addField("imagem", $caminho_imagem, "String");

if ($caminho_imagem2 != NULL)
	$sql->addField("imagem2", $caminho_imagem2, "String");


if (strlen(getParam("id"))>0) { // alteração, retirar strlen se vier de edicao_aux
	$sql->setAction("UPDATE");
	
	$conn->execute($sql->getSQL());
	$destino = "blog_lista.php?pagina=".getParam("pagina"); 
} else { // inclusão

	//Verifica se está incluindo novo registro a partir de outro já existente ´para adicionar as imagens
	
	if (getParam("imagem") != NULL)
		$sql->addField("imagem", anti_injection(getParam("imagem")), "String");

	if (getParam("imagem2") != NULL)
		$sql->addField("imagem2", anti_injection(getParam("imagem2")), "String");

	$sql->setAction("INSERT");

	$last_id = $conn->execute($sql->getSQL());
	$destino = "blog_lista.php";
}
//echo $sql->getSQL();
// volta para a lista ou reapresenta o formulário em modo de edição
echo "<script>location.href='$destino';</script>";

/* 	Encerra a conexão com o banco de dados */
$conn->close();
?>