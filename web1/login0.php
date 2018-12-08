<?php
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$name = $_POST["erabiltzailea"];
		$passw = $_POST["pasahitza"];
		$erabk = simplexml_load_file("data/erabiltzaileak.xml");
		$kont=0;
		
		//Egiaztatu sarrerako datuak erabiltzaile bati dagozkiola
		foreach($erabk->erabiltzaile as $erab){
			if($erab->izena==$name){
			    $kont=1;
				if(password_verify($erab->pasahitza==$passw)){ //Pasahitza enkriptatua konparatu
			    	header('location: pelikulak.html');
				}
			}
		}
	
		if($kont==1){
		    echo"<script>alert('Pasahitza ez da zuzena')</script>";
		}
		else{
		    echo"<script>alert('Erabiltzailea ez da existitzen')</script>";
		}
	}
 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>LOGIN</title>
		<meta charset="UTF-8">

		<script type="text/javascript" src="funtzioak.js"></script>
	</head>
	<body>
		<link rel="stylesheet" type="text/css" href="style.css">
		<div align="right">

			<a href="register.php">ERREGISTRATU</a><br>
			<a href="pelikulak.html">IRUZKINAK IKUSI</a><br>
			<a href="index.html">ATZERA</a>
		</div>

		<h2>Sartu zure kontuarekin.</h2>
		<form name="f" method="post" action="login0.php" >
			<center>
			 <div class="container">

			 	<b>Erabiltzaile izena: </b>
			 	<input type="text" placeholder="Sartu izena" name="erabiltzailea">
			 	<br>
			 	<!--
    			<b>Zure e-mail kontua: </b>
    			<input type="text" placeholder="adibide@bat.da"  name="emaila" >
    			<br>
				-->
    			<b>Pasahitza: </b>
    			<input type="password" placeholder="Sartu pasahitza" name="pasahitza" >
    		</div>
    		<h3>Eremu guztiak betetzea derrigorrezkoa da.</h3>
    	   	</br>
			<input type="submit" onclick="return balidatuL(this.form)" value="LOGIN">                 

			<button type="reset" class="reset">Ezeztatu</button>
			<br><br>
			<div>
    		<span class="pasahitza">Pasahitza <a href="pasahitza.php">ahaztuta?</a></span>
    		</div>
    		</center>
		</form>
	</body>
</html>