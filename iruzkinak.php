
<!DOCTYPE html>
<html>
	<head>
		<title>IRUZKINAK</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<link rel="stylesheet" type="text/css" href="style.css">
        <div>
	    	HEMEN PELIKULA BAKOITZEKO IRUZKINAK IKUS DAITEZKE; nork, noiz eta zer idatzi duen. <br>
	    	<a href="login0.php">LOGIN</a> <br>
	    	<a href="register.php">REGISTER</a><br>
	    	<a href="index.php">ATZERA</a><br>
	    </div>
		<?php
			if(!file_exists($BL_FILE))
			{
				echo('<p>erabiltzaile liburua hutsik dago. Iruzkin bat idazten lehenengoa izan nahi baduzu klikatu <a href="iruzkina_gehitu.html">hemen</a>.</p>');
			}
			elseif(!($bl=simplexml_load_file($BL_FILE)))
			{
				echo('<p>Errore bat gertatu da erabiltzaile liburua irakurtzean. Barkatu eragozpenak</p>');
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