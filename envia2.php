<?php

  // Destinatário
  $para = "rguimaraes.rs@gmail.com";

  // Assunto do e-mail
  $assunto = "Contato do site";

  // Campos do formulário de contato
$para = $_POST["nome_para"]; 
$email = $_POST["email"]; 
$mensagem = $_POST["mensagem"]; 
$assunto = $_POST["assunto"];

$headers = "Content-Type:text/html; charset=UTF-8\n"; 
$headers .= "From: rguimaraes.rs@gmail.com\n"; 
$headers .= "X-Sender: <rguimaraes.rs@gmail.com>\n"; 
$headers .= "X-Mailer: PHP v".phpversion()."\n"; 
$headers .= "X-IP: ".$_SERVER['REMOTE_ADDR']."\n"; 
$headers .= "Return-Path: <sistema@dominio.com.br>\n"; 
$headers .= "MIME-Version: 1.0\n"; 

mail($para, $assunto, $mensagem, $headers);


  // Mostra a mensagem acima e redireciona para index.html
 // echo "<script>location.href=`formulario_atualizacao.html`; alert(`$msg`);</script>";

?>