<?php
	session_start();
	$BL_FILE='data/pelikulak.xml';	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Pelikulak</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	<body>
		<h1>Pelikulak</h1>
		<?php
			if(!file_exists($BL_FILE))
			{
				echo('<p>Oraindik ez dago pelikularik. Pelikula bat igotzen lehenengoa izan nahi baduzu klikatu <a href="pelikula_berria.html">hemen</a>.</p>');
			}
			elseif(!($bl=simplexml_load_file($BL_FILE)))
			{
				echo('<p>Errore bat gertatu da pelikulak irakurtzean. Barkatu eragozpenak</p>');
			}
			else
			{
			?>
			<div>
			<p><b>Hona hemen eskatutako pelikula zerrenda. Menu nagusira itzultzeko sakatu <a href="index.php">hemen</a>.</b></p>
			<p><b>Pelikula berri bat gehitu nahi baduzu <a href="pelikula_berria.html">klikatu hemen</a></b></p>
			</div>
			<br><br>
			<?php
				$username=$_SESSION['izena'];
				$kop=0;
				foreach($bl->pelikula as $pelikula)
				{
						$kop++;
						echo('<div class="pelikula"></br>');
						echo('<table><tr><td>Pelikularen izena: <h2>'.$pelikula->izena.'</h2></br></td>');
						if($pelikula->argazki!="")
							echo('<td><pre><pre><img src="'.$pelikula->argazki.'"alt="Pelikularen portada"><br></td></tr></table>');
						else echo('</tr></table>');
						echo('Pelikularen jabea: <span class="jabea">'.$pelikula->jabea.'</span></br>');
						echo('Pelikula igo da: <span class="data2">'.$pelikula->data2.'</span></br>');
						if($pelikula->trailer!="")
							echo('Pelikularen trailerra: <a href="'.$pelikula->trailer.'">'.$pelikula->trailer.'</a>.</br>');
						if($username==''){
							echo('Pelikuraren esteka eskuratzeko saioa hasi behar duzu');
						}
						else{
							echo('Pelikularen esteka: <a href="'.$pelikula->esteka.'">'.$pelikula->esteka.'</a>.</br>');
						}
						echo('Laburpena: <span class="laburpena">'.$pelikula->laburpen.'</span></br>');
						echo('Hizkuntza: <span class="hizkuntza">'.$pelikula->hizkuntza.'</span></br>');
						echo('Generoa: <span class="generoa">'.$pelikula->generoa.'</span></br>');
						echo('</div>');
						echo('<br>');
						echo('<div class="botoiak">');
						if($username==''){
							echo('Iruzkina gehitzeko saioa hasi behar duzu.</p>');
							echo('<a href="iruzkinak_ikusi.php">Iruzkinak ikusi</a>.</p>');
						}
						else{
							echo('<a href="iruzkin_berria.html">Iruzkina gehitu</a>.</p>');
							echo('<a href="iruzkinak_ikusi.php">Iruzkinak ikusi</a>.</p>');
						}
						echo('</div>');
						echo('<br><br>');
				}
				// Erakutsi mezu bat ez bada pelikularik aurkitu.
				if($kop==0)
					echo('Oraindik ez dago pelikularik');

				if($username==""){
					echo('Pelikula bat igotzeko saioa hasi behar duzu.</p>');
				}
				else{
					echo('<a href="pelikula_berria.html">Pelikula igo</a>.</p>');
				}
				echo('<br><br><br><br>');
			}
		?>
	</body>
</html>
