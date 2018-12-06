<?php

$name = $email = $comment  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["izena"];
  $email = $_POST["email"];
  $comment = $_POST["iruzkina"];
}



$bisitak = simplexml_load_file("data/bisitak.xml");

$id = substr($bisitak['azkenid'],1);
$num = (int)$id;
$num1 = ++$num;
$idberria='b'.$num1;
$idberria2='b'.$num;

$berria = $bisitak->addChild('bisita');
$berria->addChild('izena',$name);
$berria->addChild('iruzkina',$comment);
$berria->addChild('eposta',$email);
$berria->addChild('data', date("Y/m/d , h:i:s"));
$bisitak->asXML("data/bisitak.xml");
$berria->bisita[$num]["id"]=$idberria2;
$bisitak['azkenid']= $idberria;
?>
