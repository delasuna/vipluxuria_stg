<?php
// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/plain; charset=UTF-8\r\n";
$headers .= "From: vipluxuria@vipluxuria.com\r\n"; // remetente
$headers .= "Return-Path: vipluxuria@vipluxuria.com\r\n"; // return-path
$envio = mail("rguimaraes-rs@hotmail.com", "Assunto", "Texto", $headers);
 
if($envio)
 echo "Mensagem enviada com sucesso";
else
 echo "A mensagem não pode ser enviada";
?>

