<?php 

if (isset($_POST['BTEnvia'])){

//Variaveis de POST, Alterar somente se necessário //==================================================== 
$nome = $_POST['nome']; 
$email = $_POST['email']; 
$telefone = $_POST['telefone']; 
$mensagem = $_POST['mensagem']; //====================================================

//REMETENTE –> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO //==================================================== 
$email_remetente = "rguimaraes-rs@hotmail.com"; // deve ser um email do dominio //====================================================

//Configurações do email, ajustar conforme necessidade //==================================================== 
$email_destinatario = "rguimaraes-rs@hotmail.com"; // qualquer email pode receber os dados 
$email_reply = $email; 
$email_assunto = "Contato formmail"; //====================================================

//Monta o Corpo da Mensagem //==================================================== 
$email_conteudo = $nome ; 
//$email_conteudo .= “Email = $email \n”; $email_conteudo .= “Telefone = $telefone \n”; 
//$email_conteudo .= “Mensagem = $mensagem \n”; //====================================================

//Seta os Headers (Alerar somente caso necessario) //==================================================== 
//$email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Subject: $email_assunto","Return-Path: $email_remetente","MIME-Version: 1.0?,"X-Priority: 3?,"Content-Type: text/html; charset=UTF-8? ) ); //====================================================


if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){ echo “</b>E-Mail enviado com sucesso!</b>”; } else{ echo “</b>Falha no envio do E-Mail!</b>”; } //==================================================== } ?>

<form action=”<? $PHP_SELF; ?>” method=”POST”> <p> Nome:<br /> <input type=”text” size=”30? name=”nome”> </p>

<p> E-mail:<br /> <input type=”text” size=”30? name=”email”> </p>

<p> Telefone:<br /> <input type=”text” size=”35? name=”telefone”> </p>

<p> Mensagem:<br /> <input type=”text” size=”35? name=”mensagem”> </p>

<p> <input type=”submit” name=”BTEnvia” value=”Enviar”> <input type=”reset” name=”BTApaga” value=”Apagar”> </p>

