<?php
// O remetente deve ser um e-mail do seu dom�nio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/plain; charset=UTF-8\r\n";
$headers .= "From: vipluxuria@vipluxuriagold.net\r\n"; // remetente
$headers .= "Return-Path: vipluxuria@vipluxuriagold.net\r\n"; // return-path
$envio = mail("rguimaraes-rs@hotmail.com", "Assunto", "Texto", $headers);
 
if($envio)
 echo "Mensagem enviada com sucesso";
else
 echo "A mensagem n�o pode ser enviada";
?>

