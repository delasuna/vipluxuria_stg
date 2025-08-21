<?php
$pontos = array(
array(
    "Id" => "1",
    "Latitude" => "-19.212355602107472",
    "Longitude" => "-44.20234468749999",
	"Descricao" => "Anunciante 1"
    ),
array(
    "Id" => "2",
    "Latitude" => "-22.618827234831404",
    "Longitude" => "-42.57636812499999",
	"Descricao" => "Anunciante 2"
    ),
array(
    "Id" => "3",
    "Latitude" => "-22.57825604463875",
    "Longitude" => "-48.68476656249999",
	"Descricao" => "Anunciante 3"
    ),
array(
    "Id" => "4",
    "Latitude" => "-17.082777073226872",
    "Longitude" => "-47.10273531249999",
	"Descricao" => "Anunciante 4"
    ),
array(
    "Id" => "5",
    "Latitude" => "-22.88936803353243",
    "Longitude" => "-47.03139838867173",
	"Descricao" => "Anunciante 5"
    ),
array(
    "Id" => "6",
    "Latitude" => "-22.88794472694071",
    "Longitude" => "-47.08066520385728",
	"Descricao" => "Anunciante 6"
    ),
array(
    "Id" => "7",
    "Latitude" => "-22.899488894308515",
    "Longitude" => "-47.06023749999986",
	"Descricao" => "Anunciante 7"
    ),

array(
    "Id" => "8",
    "Latitude" => "-30.0350",
    "Longitude" => "-51.2320",
	"Descricao" => "Anunciante 8"
    ),

array(
    "Id" => "9",
    "Latitude" => "-30.0420",
    "Longitude" => "-51.2083",
	"Descricao" => "Anunciante 9"
    ),
	
array(
    "Id" => "10",
    "Latitude" => "-30.0277",
    "Longitude" => "-51.2287",
	"Descricao" => "Anunciante 10"
    ),
array(
    "Id" => "11",
    "Latitude" => "-30.0477",
    "Longitude" => "-51.1787",
	"Descricao" => "<a href='intent://send/5191912600#Intent;scheme=smsto;package=com.whatsapp;action=a??ndroid.intent.action.SENDTO;end'>Anunciante 11</a>"
    ),
array(
    "Id" => "12",
    "Latitude" => "-30.0077",
    "Longitude" => "-51.1787",
	"Descricao" => "Anunciante 12"
    )
	
);


$fp = fopen('pontos2.json', 'w');
fwrite($fp, json_encode($pontos));
fclose($fp);
?>