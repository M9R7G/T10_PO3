<?php
session_start();
$_SESSION["izena"] = "";
$_SESSION["email"] = "";
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Hasiera</title>
		<meta charset="UTF-8">

	</head>
	<body>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
		<center>
			<h1>HASIERAKO ORRIA</h1>
			<h2>IKUS ETA IGO ITZAZU NAHI ADINA PELIKULA</h2>
			<div>
				<input type="button" class="hasi" value="LOGIN" onclick="location.href='login0.php'"><br>
				<input type="button" class="hasi" value="REGISTER" onclick="location.href='register.php'"><br>
				<input type="button" class="hasi" value="VIEW FILMS" onclick="location.href='pelikulak_ikusi.php'"><br>
			</div>
		</center>
	</body>


</html>