
<!DOCTYPE html>
<html>
	<head>
		<title>IRUZKINAK</title>
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
		HEMEN PELIKULA BAKOITZEKO IRUZKINAK IKUS DAITEZKE; nork, noiz eta zer idatzi duen. <br>
		<ul>
			<li><a class="active" href="index.php">MENU NAGUSIRA</a></li>
			<li><a href="login0.php">LOGIN</a></li>
			<li><a href="erregistratu.php">ERREGISTRATU</a></li>
			<li><a href="pelikulak_ikusi.php">IRUZKINAK IKUSI</a></li>
		</ul>
		<?php
		    $BL_FILE = 'data/pelikulak.xml';
			if(!file_exists($BL_FILE))
			{
				echo('<p>pelikularen datuak hutsik daude. Iruzkin bat idazten lehenengoa izan nahi baduzu klikatu <a href="iruzkina_gehitu.html">hemen</a>.</p>');
			}
			elseif(!($bl=simplexml_load_file($BL_FILE)))
			{
				echo('<p>Errore bat gertatu da pelikulen datuak irakurtzean. Barkatu eragozpenak</p>');
			}
			else
			{
			foreach($bl->erabiltzaile as $erabiltzaile)
				{
						echo('<div class="iruzkina">');
						echo('<div class="ir_goiburua">');
						echo('<span class="izena">'.$erabiltzaile->izena.'</span>');
						echo('<span class="data">'.$erabiltzaile->data.'</span>');
						echo('</div>');
						echo('<div class="ir_gorputza" id="'.$erabiltzaile['id'].'">');
						echo('</div>');
				}
			}
		?>
	</body>
</html>