<?php
	$BL_FILE='data/pelikulak.xml';	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pelikula liburua: pelikulak.</title>
		<meta charset=UTF-8">
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	<body>
		<h1>Bisita liburua</h1>
		<?php
			if(!file_exists($BL_FILE))
			{
				echo('<p>Pelikula liburua hutsik dago. Pelikula bat igotzen lehenengoa izan nahi baduzu klikatu <a href="pelikula_berria.html">hemen</a>.</p>');
			}
			elseif(!($bl=simplexml_load_file($BL_FILE)))
			{
				echo('<p>Errore bat gertatu da pelikulak irakurtzean. Barkatu eragozpenak</p>');
			}
			else
			{
			?>
			<p>Hona hemen eskatutako pelikula zerrenda. Menu nagusira itzultzeko sakatu <a href="index.html">hemen</a>.</p>
			<?php
				$kop=0;
				foreach($bl->pelikula as $pelikula)
				{
						$kop++;
						echo('<div class="pelikula">');
						echo('Pelikularen izena: <span class="izena">'.$pelikula->izena.'</span>');
						echo('Pelikula igo den data: <span class="data">'.$pelikula->data1.'</span>');
						echo('Pelikularen jabea: <span class="jabea">'.$pelikula->jabea.'</span>');
						echo('Pelikularen sorrera data: <span class="jabea">'.$pelikula->data2.'</span>');
						echo('Pelikularen trailerra: <a href="'.$pelikula->trailerra'">'.$pelikula->trailerra'</a>.</p>');
						echo('Pelikularen trailerra: <a href="'.$pelikula->trailerra'">'.$pelikula->pelikula'</a>.</p>');
						echo('</div>');
						echo('<div class="botoiak">');
						echo('<a href="iruzkin_berria.html">Iruzkina gehitu</a>.</p>');
						echo('<a href="iruzkinak_ikusi.php">Iruzkinak ikusi</a>.</p>');
						echo('</div>');
				}
				// Erakutsi mezu bat ez bada iruzkinik aurkitu.
				if($kop==0)
					echo('Oraindik ez dago pelikularik');
				echo('<a href="pelikula_berria.html">Pelikula igo</a>.</p>');
			}
		?>
	</body>
</html>
