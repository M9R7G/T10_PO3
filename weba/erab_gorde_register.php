<?php

$name = $email = $comment  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["erabiltzailea"];
  $email = $_POST["emaila"];
  $passw = $_POST["pasahitza"];
}



$erabk = simplexml_load_file("data/erabiltzaileak.xml");

$id = substr($erabk['azkenid'],1);
$num = (int)$id;
$num1 = ++$num;
$idberria='b'.$num1;
$idberria2='b'.$num;

$berria = $erabk->addChild('erab');
$berria->addChild('erabiltzailea',$name);
$berria->addChild('emaila',$email);
$berria->addChild('pasahitza',$passw);
$berria->addChild('data', date("Y/m/d , h:i:s"));
$erabk->asXML("data/erabiltzaileak.xml");
$berria->erab[$num]["id"]=$idberria2;
$erabk['azkenid']= $idberria;
?>
