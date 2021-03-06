<?php
session_start();
$BL_FILE='data/pelikulak.xml';


function gorde_iruzkina($izena, $email, $iruzkina)
{
	global $BL_FILE;	// Funtzio baten barrutik aldagai global erabiltzeko 'global' erabili behar da.
	
	
	$bl=simplexml_load_file($BL_FILE);
	if(!$bl)
		return false;
	
	$id = "b" . ((int) substr($bl->bisitak['azkenid'], 1) + 1);	// Kalkulatu pelikula berriaren identifikadorea.
	$berria=$bl->bisitak->addChild('bisita');	// Sortu 'pelikula' etiketa.
	$berria['id']=$id;
	$berria->addChild('izena',$izena);
	$berria->addChild('data1',date('r'));	// Sortu 'pelikula' etiketa barruko etiketak.
	$berria->addChild('email',$email);
	$berria->addChild('iruzkina',$iruzkina);
	$bl->bisitak['azkenid']=$id;	// Eguneratu erroko 'azkenid' atributua.
	return $bl->asXML($BL_FILE);	// Gorde aldaketak fitxategian.
}

function balidatu_berria($iruzkina)
{
	$mezua = '';
	if($iruzkina == '')	// Izena eremua ez da bete.
		$mezua = $mezua.'<li>Iruzkina ez da bete.</li>';
	return $mezua;
}

	$izena =  $_SESSION["izena"];
	$email = $_SESSION["email"];
	$iruzkina = trim($_POST['iruzkina']);

	//Balidatu formularioko datuak.
	$errorea = balidatu_berria($iruzkina);
	if($errorea == '')
		if(!gorde_pelikula($izena, $email, $iruzkina))	// Gorde iruzkina datu basean (XML fitxategia).
			$errorea = '<li>Ezin izan da iruzkina datu basean gorde.</li>';
?>
<!DOCTYPE html>
<html>
	<head>
	<?php
		if($errorea=='')
			echo '<title>Eskerrik asko zure iruzkina uzteagatik</title>';
		else
			echo '<title>Errorea iruzkin berria jasotzean</title>';
	?>
		<meta charset=UTF-8">
	</head>
	<body>
	<?php
		if($errorea != '')
		{
			echo('<h1>Errore bat gertatu da iruzkina gordetzean.</h1>');
			echo("<ul>$errorea</ul>");
		}
		else
		{
			echo('<h1>Eskerrik asko zure iruzkina uzteagatik.</h1>');
		}
	?>
		<a href="pelikulak_ikusi.php">Atzera</a>.
	</body>
</html>


?>