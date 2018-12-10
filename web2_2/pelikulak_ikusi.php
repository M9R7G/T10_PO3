<?php
    session_start();
	$BL_FILE='data/pelikulak.xml';	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Pelikulak</title>
		<meta charset="UTF-8">
		<style>
		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #333;
		}

		li {
			float: left;
		}

		li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		li a:hover {
			background-color: #111;
		}
		</style>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		
		<ul>
			<li><a class="active" href="index.php">MENU NAGUSIRA</a></li>
			<li><a href="login0.php">LOGIN</a></li>
			<li><a href="register.php">REGISTER</a></li>
		</ul>

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
			
			<?php
			
			$username=$_SESSION["izena"];
			if($username!="") {
			?>
				<p>
					<b>Pelikula berri bat gehitu nahi baduzu 
						<a href="pelikula_berria.html">klikatu hemen
						</a>
					</b>
				</p>
			<?php
			}
			?>
			
			</div>
			<br><br>
			<?php

				$kop=0;
				foreach($bl->pelikula as $pelikula)
				{		$ident=$pelikula['id'];
						$kop++;
						echo('<div class="pelikula"></br>');
						
						if($pelikula->argazki!="")
							echo('<table><tr><td><img class="pel" src="'.$pelikula->argazki.'" alt="Pelikularen portada"><br></td>');
						else echo('<table>');
						echo('<pre><td><h4>Pelikularen izena:</h4> <h2>'.$pelikula->izena.'</h2><br>');
						echo('Pelikularen jabea: <span class="jabea">'.$pelikula->jabea.'</span></br>');
						echo('Pelikula igo da: <span class="data2">'.$pelikula->data2.'</span></br>');
						if($pelikula->trailer!="")
							echo('Pelikularen trailerra: <a href="'.$pelikula->trailer.'">'.$pelikula->trailer.'</a>.</br>');
						if($username==''){
							echo('Pelikuraren esteka eskuratzeko saioa hasi behar duzu. </br>');
						}
						else{
							echo('<b>Pelikularen esteka: <a href="'.$pelikula->esteka.'">'.$pelikula->esteka.'</a>.</br></b>');
						}
						echo('Laburpena: <span class="laburpena">'.$pelikula->laburpen.'</span></br>');
						echo('Hizkuntza: <span class="hizkuntza">'.$pelikula->hizkuntza.'</span></br>');
						echo('Generoa: <span class="generoa">'.$pelikula->generoa.'</span></br></td></tr></table>');
						echo('</div>');
						echo('<br>');
						echo('<div class="botoiak">');
						if($username==''){
							echo('Iruzkina gehitzeko saioa hasi behar duzu.</p>');
							echo "<a href='iruzkinak_ikusi.php?id=$ident'>Iruzkinak ikusi</a>.</p>";
						}
						else{
							echo "<a href='iruzkina_berria.php?id=$ident'>Iruzkina gehitu</a>.</p>";
							echo "<a href='iruzkinak_ikusi.php?id=$ident'>Iruzkinak ikusi</a>.</p>";
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
