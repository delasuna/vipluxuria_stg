<?php


$emailsender = "felipe@vipluxuriagold.net";
$emaildestinatario = "rguimaraes-rs@hotmail.com";
$assunto = "teste PHPMail";

/*
$mensagem = "Conteudo";
$mensagemHTML = '<p> Teste de funcao PHP Mail ();' .$mensagem .'</p>';
mail($emaildestinatario,$assunto, $mensagemHTML,$headers, "-r".$emailsender);
print "Mensagem enviada com sucesso";
*/


$headers = "MIME-Version: 1.1\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From:".$emailsender."\n"; // remetente
$headers .= "Return-Path: ".$emailsender."\n"; // return-path
$envio = mail($emaildestinatario, $assunto, "Texto", $headers);

?>