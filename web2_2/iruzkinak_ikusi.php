<?php
	$BL_FILE='data/pelikulak.xml';	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pelikulak: katalogoa.</title>
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
			<li><a href="pelikulak_ikusi.php">IRUZKINAK IKUSI</a></li>
		</ul>
		<h1>Pelikula</h1>
		<?php
		    
		    if(!($bl=simplexml_load_file($BL_FILE)))
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
						$kop++;
						echo('<div class="pelikula"><br>');
						echo('Pelikularen izena: <span class="izena"><b>'.$pelikula->izena.'</b></span><br>');
						echo('Pelikula igo den data: <span class="data">'.$pelikula->data1.'</span><br>');
						echo('Pelikularen jabea: <span class="jabea">'.$pelikula->jabea.'</span><br>');
						echo('</div><br>');
						foreach($pelikula->bisitak->bisita as $bisita){
							echo('<div class="iruzkina">');
							echo('<div class="iruzkina_goiburua">');
							echo('Erabiltzaile izena: <span class="izena"><b>'.$bisita->izena.'</b></span> ');
							echo('Iruzkina igo den data: <span class="data">'.$bisita->data1.'</span> ');
							echo('</div>');
							echo('<div class="iruzkina_gorputza"></br>');
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
		?>
	</body>
</html>