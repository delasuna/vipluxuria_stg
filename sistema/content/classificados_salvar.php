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
$uploaddir = "upload_classificados/";

if($_FILES['video']['tmp_name'] != "") { 
	// Prepara a variável do arquivo
	$video = isset($_FILES["video"]) ? $_FILES["video"] : FALSE;

	$caminho_video = "";
	/*	
	if($_FILES['video']['size'] > "1000000") {
		print("<SCRIPT> alert('Vídeo - Seu arquivo não poderá ser maior que 1mb'); window.history.go(-1); </SCRIPT>\n");
	} else {
	*/	
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
	//}
}


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

$sql->setTable("classificados2");
$sql->setKey("idClassificados", getParam("id"), "Number");

$sql->addField("titulo", anti_injection(getParam("titulo")), "String");
$sql->addField("mensagem", anti_injection(getParam("mensagem")), "String");		
$sql->addField("email", anti_injection(getParam("email")), "String");
$sql->addField("instagram", anti_injection(getParam("instagram")), "String");		
$sql->addField("twitter", anti_injection(getParam("twitter")), "String");		
$sql->addField("site", anti_injection(getParam("site")), "String");		
$sql->addField("flagWhats", anti_injection(getParam("flagWhats")), "String");		
$sql->addField("ddd", anti_injection(getParam("ddd")), "String");		
$sql->addField("telefone", anti_injection(getParam("telefone")), "String");		
$sql->addField("flagWhats2", anti_injection(getParam("flagWhats2")), "String");		
$sql->addField("ddd2", anti_injection(getParam("ddd2")), "String");		
$sql->addField("telefone2", anti_injection(getParam("telefone2")), "String");

$sql->addField("flagTipo", anti_injection(getParam("flagTipo")), "String");	
$sql->addField("flagAtende24Horas", anti_injection(getParam("flagAtende24Horas")), "String");
$sql->addField("flagTemVideo", anti_injection(getParam("flagTemVideo")), "String");
$sql->addField("flagAceitoCartao", anti_injection(getParam("flagAceitoCartao")), "String");
//$sql->addField("flagDominacao", anti_injection(getParam("flagDominacao")), "String");		
//$sql->addField("flagMassagista", anti_injection(getParam("flagMassagista")), "String");		
//$sql->addField("flagMILF", anti_injection(getParam("flagMILF")), "String");

$sql->addField("flagComLocal", anti_injection(getParam("flagComLocal")), "String");		
$sql->addField("flagSexoVirtual", anti_injection(getParam("flagSexoVirtual")), "String");

$sql->addField("cidade", anti_injection(getParam("cidade")), "String");

//$sql->addField("idEstado", anti_injection(getParam("idEstado")), "Number");		

if ($caminho_imagem != NULL)
	$sql->addField("imagem", $caminho_imagem, "String");

if ($caminho_video != NULL)
	$sql->addField("video", $caminho_video, "String");


if (strlen(getParam("id"))>0) { // alteração, retirar strlen se vier de edicao_aux
	$sql->setAction("UPDATE");
	
	$conn->execute($sql->getSQL());
	$destino = "classificados_lista.php?pagina=".getParam("pagina"); 
} else { // inclusão

	//Verifica se está incluindo novo registro a partir de outro já existente ´para adicionar as imagens
	
	if (getParam("imagem") != NULL)
		$sql->addField("imagem", anti_injection(getParam("imagem")), "String");

	$sql->setAction("INSERT");

	$last_id = $conn->execute($sql->getSQL());
	$destino = "classificados_lista.php";
}
//echo $sql->getSQL();
// volta para a lista ou reapresenta o formulário em modo de edição
echo "<script>location.href='$destino';</script>";

/* 	Encerra a conexão com o banco de dados */
$conn->close();
?>