<?php
	$BL_FILE='data/pelikulak.xml';	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pelikulak: katalogoa.</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	<body>
		<h1>Pelikula</h1>
		<?php
			if(!file_exists($BL_FILE))
			{
				echo('<p>Oraindik ez dago iruzkinik. Iruzkin bat igotzen lehenengoa izan nahi baduzu klikatu "<a href=\'iruzkina_berria.php?id=$ident\'>hemen</a>.</p>"');
			}
			elseif(!($bl=simplexml_load_file($BL_FILE)))
			{
				echo('<p>Errore bat gertatu da iruzkinak irakurtzean. Barkatu eragozpenak</p>');
			}
			else
			{
			?>
			<p>Hona hemen eskatutako iruzkin zerrenda. Pelikula katalogora itzultzeko sakatu <a href="pelikulak_ikusi.php">hemen</a>.</p>
			<?php
				$kop=0;
				$a=$_GET['id'];
				foreach($bl->pelikula as $pelikula)
				{	
					if($pelikula['id']==$a){
						//$kop++;
						echo('<div class="pelikula"></br>');
						echo('Pelikularen izena: <span class="izena">'.$pelikula->izena.'</span></br>');
						echo('Pelikula igo den data: <span class="data">'.$pelikula->data1.'</span></br>');
						echo('Pelikularen jabea: <span class="jabea">'.$pelikula->jabea.'</span></br>');
						echo('Pelikularen sorrera data: <span class="data2">'.$pelikula->data2.'</span></br>');
						echo('</div>');
						foreach($pelikula->bisitak->bisita as $bisita){
							echo('<div class="iruzkina"></br>');
							echo('<div class="iruzkina_goiburua"></br>');
							echo('Erabiltzaile izena: <span class="izena">'.$bisita->izena.'</span></br>');
							echo('Iruzkina egin den data: <span class="data">'.$bisita->data1.'</span></br>');
							echo('Erabiltzailearen emaila: <span class="email">'.$bisita->email.'</span></br>');
							echo('</div>');
							echo('<div class="iruzkina_gorputza"></br>')
							echo($bisita->iruzkina);
							echo('</div>');
							echo('</div>');
						}
					}
				}
				// Erakutsi mezu bat ez bada iruzkinik aurkitu.
				if($kop==0)
					echo('Oraindik ez dago iruzkinik');
				
				echo('<a href="pelikulak_ikusi.php">Atzera</a>.</p>');
				}
			}
		?>
	</body>
</html>