<?php

//pego os dados enviados pelo formulário 
$nomeBD = $_POST["nomeBD"]; 
$emailBD = $_POST["emailBD"]; 
$telefoneBD = $_POST["telefoneBD"]; 


$nome = $_POST["nome"]; 
$email = $_POST["email"]; 
$telefone = $_POST["telefone"]; 
$telefone2 = $_POST["telefone2"]; 

$tipo = $_POST["tipo"];
$idade = $_POST["idade"];
$altura = $_POST["altura"];
$peso = $_POST["peso"];
$olhos = $_POST["olhos"];
$cabelos = $_POST["cabelos"];
$busto = $_POST["busto"];
$quadril = $_POST["quadril"];
$cintura = $_POST["cintura"];
$pes = $_POST["pes"];
$manequim = $_POST["manequim"];

$beijoBoca = $_POST["beijoBoca"];
$oral = $_POST["oral"];
$anal = $_POST["anal"];
$dominacao = $_POST["dominacao"];
$inversao = $_POST["inversao"];
$atendoEles = $_POST["atendoEles"];
$atendoElas = $_POST["atendoElas"];
$atendoCasais = $_POST["atendoCasais"];
$acessorios = $_POST["acessorios"];
$eventos = $_POST["eventos"];
$viagens = $_POST["viagens"];
$tenhoAmigas = $_POST["tenhoAmigas"];
$atende24horas = $_POST["atende24horas"];

$mensagem1 = $_POST["mensagem1"];
$horario = $_POST["horario"];
$cache = $_POST["cache"];
$locais = $_POST["locais"];
$cidades = $_POST["cidades"];


$emailsender = "felipe@vipluxuria.com";
$emaildestinatario = "rguimaraes-rs@hotmail.com";
$corpo = "Seguem as informações e imagens a serem alteradas no perfil da anunciante. <BR>"; 

if ($nomeBD != "")
	$corpo .= "<BR> Nome apenas para consultar no sistema:" . $nomeBD;
if ($emailBD != "")
	$corpo .= "<BR> E-mail apenas para consultar no sistema:" . $emailBD;
if ($telefoneBD != "")
	$corpo .= "<BR> Telefone apenas para consultar no sistema:" . $telefoneBD;


if ($nome != "")
	$corpo .= "<BR> Nome:" . $nome;
if ($email != "")
	$corpo .= "<BR> E-mail:" . $email;
if ($telefone != "")
	$corpo .= "<BR> Telefone:" . $telefone;
if ($telefone2 != "")
	$corpo .= "<BR> Telefone 2:" . $telefone2;

$corpo .= "<BR>"; 

if ($tipo != "")
	$corpo .= "<BR> Tipo: " . $tipo;
if ($idade != "")
	$corpo .= "<BR> Idade: " . $idade;
if ($altura != "")
	$corpo .= "<BR> Altura: " . $altura;
if ($peso != "")
	$corpo .= "<BR> Peso: " . $peso;
if ($olhos != "")
	$corpo .= "<BR> Olhos: " . $olhos;
if ($cabelos != "")
	$corpo .= "<BR> Cabelos: " . $cabelos;
if ($busto != "")
	$corpo .= "<BR> Busto: " . $busto;
if ($quadril != "")
	$corpo .= "<BR> Quadril: " . $quadril;
if ($cintura != "")
	$corpo .= "<BR> Cintura: " . $cintura;
if ($pes != "")
	$corpo .= "<BR> Pés: " . $pes;
if ($manequim != "")
	$corpo .= "<BR> Manequim: " . $manequim;

$corpo .= "<BR>"; 

if ($beijoBoca != "")
	$corpo .= "<BR> Beijo na Boca: " . $beijoBoca;
if ($oral != "")
	$corpo .= "<BR> Oral: " . $oral;
if ($anal != "")
	$corpo .= "<BR> Anal: " . $anal;
if ($dominacao != "")
	$corpo .= "<BR> Dominação: " . $dominacao;
if ($inversao != "")
	$corpo .= "<BR> Inversão: " . $inversao;
if ($atendoEles != "")
	$corpo .= "<BR> Atendo Eles: " . $atendoEles;
if ($atendoElas != "")
	$corpo .= "<BR> Atendo Elas: " . $atendoElas;
if ($atendoCasais != "")
	$corpo .= "<BR> Atendo Casais: " . $atendoCasais;
if ($acessorios != "")
	$corpo .= "<BR> Acessórios: " . $acessorios;
if ($eventos != "")
	$corpo .= "<BR> Eventos: " . $eventos;
if ($viagens != "")
	$corpo .= "<BR> Viagens: " . $viagens;
if ($tenhoAmigas != "")
	$corpo .= "<BR> Tenho Amigas: " . $tenhoAmigas;
if ($atende24horas != "")
	$corpo .= "<BR> Atende 24 horas: " . $atende24horas;

if ($mensagem1 != "")
	$corpo .= "<BR><BR> Mensagem: " . $mensagem1 . "<BR>";
if ($horario != "")
	$corpo .= "<BR> Horário: " . $horario;
if ($cache != "")
	$corpo .= "<BR> Cache: " . $cache;
if ($locais != "")
	$corpo .= "<BR> Locais: " . $locais;
if ($cidades != "")
	$corpo .= "<BR> Cidades: " . $cidades;


require_once('PHPMailer-master/class.phpmailer.php'); 

$email = new PHPMailer();
$email->IsHTML(true);
$email->From      = $emailsender;
$email->FromName  = $nome;
$email->Subject   = 'Atualização de Perfil de Anunciante - Vip Luxúria';
$email->Body      = $corpo;
$email->AddAddress( $emaildestinatario );

$imagemCapa = isset($_FILES["imagemCapa"]) ? $_FILES["imagemCapa"] : FALSE;
if(file_exists($imagemCapa["tmp_name"]) and !empty($imagemCapa)){
	$path = $_FILES['imagemCapa']['tmp_name']; 
	$fileType = $_FILES['imagemCapa']['type']; 
	$fileName = $_FILES['imagemCapa']['name'];
	
	$file_to_attach = $path;
	$email->AddAttachment( $file_to_attach , $fileName );
}
 
$imagem1 = isset($_FILES["imagem1"]) ? $_FILES["imagem1"] : FALSE;
if(file_exists($imagem1["tmp_name"]) and !empty($imagem1)){
	$path = $_FILES['imagem1']['tmp_name']; 
	$fileType = $_FILES['imagem1']['type']; 
	$fileName = $_FILES['imagem1']['name'];
	
	$file_to_attach = $path;
	$email->AddAttachment( $file_to_attach , $fileName );
}

$imagem2 = isset($_FILES["imagem2"]) ? $_FILES["imagem2"] : FALSE;
if(file_exists($imagem2["tmp_name"]) and !empty($imagem2)){
	$path = $_FILES['imagem2']['tmp_name']; 
	$fileType = $_FILES['imagem2']['type']; 
	$fileName = $_FILES['imagem2']['name'];
	
	$file_to_attach = $path;
	$email->AddAttachment( $file_to_attach , $fileName );
}

$imagem3 = isset($_FILES["imagem3"]) ? $_FILES["imagem3"] : FALSE;
if(file_exists($imagem3["tmp_name"]) and !empty($imagem3)){
	$path = $_FILES['imagem3']['tmp_name']; 
	$fileType = $_FILES['imagem3']['type']; 
	$fileName = $_FILES['imagem3']['name'];
	
	$file_to_attach = $path;
	$email->AddAttachment( $file_to_attach , $fileName );
}

$imagem4 = isset($_FILES["imagem4"]) ? $_FILES["imagem4"] : FALSE;
if(file_exists($imagem4["tmp_name"]) and !empty($imagem4)){
	$path = $_FILES['imagem4']['tmp_name']; 
	$fileType = $_FILES['imagem4']['type']; 
	$fileName = $_FILES['imagem4']['name'];
	
	$file_to_attach = $path;
	$email->AddAttachment( $file_to_attach , $fileName );
}

$imagem5 = isset($_FILES["imagem5"]) ? $_FILES["imagem5"] : FALSE;
if(file_exists($imagem5["tmp_name"]) and !empty($imagem5)){
	$path = $_FILES['imagem5']['tmp_name']; 
	$fileType = $_FILES['imagem5']['type']; 
	$fileName = $_FILES['imagem5']['name'];
	
	$file_to_attach = $path;
	$email->AddAttachment( $file_to_attach , $fileName );
}

$imagem6 = isset($_FILES["imagem6"]) ? $_FILES["imagem6"] : FALSE;
if(file_exists($imagem6["tmp_name"]) and !empty($imagem6)){
	$path = $_FILES['imagem6']['tmp_name']; 
	$fileType = $_FILES['imagem6']['type']; 
	$fileName = $_FILES['imagem6']['name'];
	
	$file_to_attach = $path;
	$email->AddAttachment( $file_to_attach , $fileName );
}

$imagem7 = isset($_FILES["imagem7"]) ? $_FILES["imagem7"] : FALSE;
if(file_exists($imagem7["tmp_name"]) and !empty($imagem7)){
	$path = $_FILES['imagem7']['tmp_name']; 
	$fileType = $_FILES['imagem7']['type']; 
	$fileName = $_FILES['imagem7']['name'];
	
	$file_to_attach = $path;
	$email->AddAttachment( $file_to_attach , $fileName );
}

$imagem8 = isset($_FILES["imagem8"]) ? $_FILES["imagem8"] : FALSE;
if(file_exists($imagem8["tmp_name"]) and !empty($imagem8)){
	$path = $_FILES['imagem8']['tmp_name']; 
	$fileType = $_FILES['imagem8']['type']; 
	$fileName = $_FILES['imagem8']['name'];
	
	$file_to_attach = $path;
	$email->AddAttachment( $file_to_attach , $fileName );
}

// Envia o e-mail
$enviado = $email->Send();

// Exibe uma mensagem de resultado
if ($enviado) {
	echo "E-mail enviado com Sucesso!";
} else {
	echo "Não foi possível enviar o e-mail.";
	echo "Informações do erro: " . $mail->ErrorInfo;
}

/*
$emailsender = "felipe@vipluxuria.com";
$emaildestinatario = "rguimaraes-rs@hotmail.com";
$assunto = "teste PHPMail";

$headers = "MIME-Version: 1.1\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From:".$emailsender."\n"; // remetente
$headers .= "Return-Path: ".$emailsender."\n"; // return-path
$envio = mail($emaildestinatario, $assunto, "Texto", $headers);
*/
 
?>