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
$uploaddir = "upload_bannercentral/";

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


/* Atualização dos dados, configure abaixo conforme suas necessidades */
// objeto para montagem de expressão sql
$sql = new UpdateSQL();

$sql->setTable("bannercentral2");
$sql->setKey("idBannerCentral2", getParam("id"), "Number");

$sql->addField("descricao", anti_injection(getParam("descricao")), "String");
$sql->addField("site", anti_injection(getParam("site")), "String");		

if ($caminho_imagem != NULL)
	$sql->addField("imagem", $caminho_imagem, "String");


if (strlen(getParam("id"))>0) { // alteração, retirar strlen se vier de edicao_aux
	$sql->setAction("UPDATE");
	
	$conn->execute($sql->getSQL());
	$destino = "bannercentral_lista.php?pagina=".getParam("pagina"); 
} else { // inclusão

	//Verifica se está incluindo novo registro a partir de outro já existente ´para adicionar as imagens
	
	if (getParam("imagem") != NULL)
		$sql->addField("imagem", anti_injection(getParam("imagem")), "String");

	$sql->setAction("INSERT");

	$last_id = $conn->execute($sql->getSQL());
	$destino = "bannercentral_lista.php";
}
//echo $sql->getSQL();
// volta para a lista ou reapresenta o formulário em modo de edição
echo "<script>location.href='$destino';</script>";

/* 	Encerra a conexão com o banco de dados */
$conn->close();
?>