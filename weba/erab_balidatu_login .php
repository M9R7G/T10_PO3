<?php

$name = $passw = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["erabiltzailea"];
  $passw = $_POST["pasahitza"];
}



$erabk = simplexml_load_file("data/erabiltzaileak.xml");

$id = substr($erabk['azkenid'],1);
$num = (int)$id;
//for erabiltzaile guztiak
	//if izena=izen && pasahitza=passw: return orri berria -> logeatuta


?>
