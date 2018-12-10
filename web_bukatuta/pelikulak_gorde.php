<?php
$BL_FILE='data/pelikulak.xml';
session_start();	

function gorde_pelikula($izena, $jabea, $data2, $trailerra, $pelikula, $argazki, $laburpen, $hizkuntza, $generoa)
{
	global $BL_FILE;	// Funtzio baten barrutik aldagai global erabiltzeko 'global' erabili behar da.
	
	if(!file_exists($BL_FILE))	// Pelikulak gordetzeko XML fitxategia ez bada existitzen, sortu iruzkinik gabeko XML fitxategia.
		$bl=new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE pelikulak SYSTEM "pelikulak.dtd"><pelikulak azkenid="b0"></pelikulak>');
	else	// Bestela, kargatu XML fitxategia.
		$bl=simplexml_load_file($BL_FILE);
	if(!$bl)
		return false;
	
	$id = "b" . ((int) substr($bl['azkenid'], 1) + 1);	// Kalkulatu pelikula berriaren identifikadorea.
	$berria=$bl->addChild('pelikula');	// Sortu 'pelikula' etiketa.
	$berria['id']=$id;
	$berria->addChild('jabea',$jabea);
	$berria->addChild('data1',$data2);	// Sortu 'pelikula' etiketa barruko etiketak.
	$berria->addChild('izena',$izena);
	$berria->addChild('trailer',$trailerra);
	$berria->addChild('esteka',$pelikula);
	$berria->addChild('argazki', $argazki);
	$berria->addChild('laburpen', $laburpen);
	$berria->addChild('hizkuntza', $hizkuntza);
	$berria->addChild('generoa', $generoa);
	$bisitak=$berria->addChild('bisitak');
	$bisitak['azkenid']='b0';


	$bl['azkenid']=$id;	// Eguneratu erroko 'azkenid' atributua.
	return $bl->asXML($BL_FILE);	// Gorde aldaketak fitxategian.
}

function balidatu_berria($izena, $pelikula)
{
	$mezua = '';
	if($izena == '')	// Izena eremua ez da bete.
		$mezua = $mezua.'<li>Izena eremua ez da bete.</li>';

	if($pelikula == '')	// Pelikula eremua ez da bete.
		$mezua = $mezua.'<li>Pelikula eremua ez da bete.</li>';

	return $mezua;
}

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$izena = $_POST["izena"];
		$jabea1 = $_SESSION['izena'];
		$data = date("Y-m-d h:i:sa");
		$trailer = trim($_POST['trailer_url']);
		$pelikula = trim($_POST['esteka']);
		$argazki = trim($_POST['argazki_url']);
		$laburpen = trim($_POST['laburpena']); 
		$hizkuntza = trim($_POST['hizkuntza']);
		$generoa = trim($_POST['generoa']);

		//Balidatu formularioko datuak.
		$errorea = balidatu_berria($izena, $pelikula);
		if($errorea == '')
			if(!gorde_pelikula($izena, $jabea1, $data, $trailer, $pelikula, $argazki, $laburpen, $hizkuntza, $generoa)) {	// Gorde iruzkina datu basean (XML fitxategia).
				$errorea = '<li>Ezin izan da pelikula datu basean gorde.</li>';
			}

	}
?>
<!DOCTYPE html>
<html>
	<head>

        <title>Eskerrik asko zure pelikula uzteagatik</title>
		
	    <link rel="stylesheet" type="text/css" href="style.css">
		<meta charset="UTF-8">
	</head>
	<body>

		<h1>Eskerrik asko zure pelikula uzteagatik.</h1>
		<div>
		<h4><a href="pelikulak_ikusi.php">Pelikulak ikusi</a></h4>
		<h4><a href="index.php">Hasierako orria</a></h4>
		</div>
	</body>
</html>


