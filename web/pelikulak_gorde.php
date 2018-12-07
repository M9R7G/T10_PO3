<?php
$BL_FILE='data/pelikulak.xml';	

function gorde_pelikula($izena, $jabea, $data2, $trailerra, $pelikula)
{
	global $BL_FILE;	// Funtzio baten barrutik aldagai global erabiltzeko 'global' erabili behar da.
	
	if(!file_exists($BL_FILE))	// Pelikulak gordetzeko XML fitxategia ez bada existitzen, sortu iruzkinik gabeko XML fitxategia.
		$bl=new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE pelikulak SYSTEM "pelikulak.dtd"><pelikulak azkenid="b0"></pelikulak>')
	else	// Bestela, kargatu XML fitxategia.
		$bl=simplexml_load_file($BL_FILE);
	if(!$bl)
		return false;
	
	$id = "b" . ((int) substr($bl['azkenid'], 1) + 1);	// Kalkulatu pelikula berriaren identifikadorea.
	$berria=$bl->addChild('pelikula');	// Sortu 'pelikula' etiketa.
	$berria['id']=$id;
	$berria->addChild('jabea',$jabea);
	$berria->addChild('data1',date('r'));	// Sortu 'pelikula' etiketa barruko etiketak.
	$berria->addChild('izena',$izena);
	$berria->addChild('data2',$data2);
	$berria->addChild('trailer',$trailerra);
	$berria->addChild('esteka',$pelikula);
	$bl['azkenid']=$id;	// Eguneratu erroko 'azkenid' atributua.
	return $bl->asXML($BL_FILE);	// Gorde aldaketak fitxategian.
}

function balidatu_berria($izena, $jabea, $data2, $trailer, $pelikula)
{
	$mezua = '';
	if($izena == '')	// Izena eremua ez da bete.
		$mezua = $mezua.'<li>Izena eremua ez da bete.</li>';
	if($jabea == '')	// Jabea eremua ez da bete.
		$mezua = $mezua.'<li>Jabea eremua ez da bete.</li>';
	if($pelikula == '')	// Pelikula eremua ez da bete.
		$mezua = $mezua.'<li>Pelikula eremua ez da bete.</li>';
	if($trailer == '')	// Trailer eremua ez da bete.
		$mezua = $mezua.'<li>Trailer eremua ez da bete.</li>';
	return $mezua;
}

	$izena = trim($_POST['izena']);
	$jabea = trim($_POST['jabea']);
	$data = trim($_POST['data']);
	$trailer = trim($_POST['trailer']);
	$pelikula = trim($_POST['esteka']);

	//Balidatu formularioko datuak.
	$errorea = balidatu_berria($izena, $jabea, $data, $trailer, $pelikula);
	if($errorea == '')
		if(!gorde_iruzkina($izena, $jabea, $data, $trailer, $pelikula))	// Gorde iruzkina datu basean (XML fitxategia).
			$errorea = '<li>Ezin izan da pelikula datu basean gorde.</li>';
?>
<!DOCTYPE html>
<html>
	<head>
	<?php
		if($errorea=='')
			echo '<title>Eskerrik asko zure pelikula uzteagatik</title>';
		else
			echo '<title>Errorea pelikula berria jasotzean</title>';
	?>
		<meta charset=UTF-8">
	</head>
	<body>
	<?php
		if($errorea != '')
		{
			echo('<h1>Errore bat gertatu da pelikula gordetzean.</h1>');
			echo("<ul>$errorea</ul>");
		}
		else
		{
			echo('<h1>Eskerrik asko zure pelikula uzteagatik.</h1>');
		}
	?>
		<a href="pelikulak_ikusi.php">Atzera</a>.
	</body>
</html>


?>