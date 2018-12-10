
<!DOCTYPE html>
<html>
	<head>
		<title>Pelikulak: iruzkin berria.</title>
		<meta charset="UTF-8">
		<script type="text/javascript" src="funtzioak.js"></script>
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
			<li><a href="erregistratu.php">ERREGISTRATU</a></li>
			<li><a href="pelikulak_ikusi.php">IRUZKINAK IKUSI</a></li>
		</ul>
		<?php
		$a=$_GET['id'];	
		echo "<h1>Gehitu iruzkin berri bat</h1>";
		echo "<p> Zure iruzkina idatzi eta bidali:</p>";
		echo "<form action='iruzkinak_gorde.php?id=$a' method=\"post\">";
		echo "Iruzkina(*): <br>";
		echo "<textarea name=\"iruzkina\" rows=\"15\" cols=\"80\"></textarea><br>";
		echo "<input type=\"submit\" onclick=\"return balidatu_iruzkina(this.form);\" value=\"BIDALDI IRUZKINA\">";
		echo "</form>";
		?>
	</body>
</html>