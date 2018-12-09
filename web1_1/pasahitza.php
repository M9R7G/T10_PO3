<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$name = $_POST["erabiltzailea"];
		$email = $_POST["emaila"];
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo "<script>alert('Emaila oker idatzi duzu')</script>";
		}
		else if(!preg_match('/^[a-zA-Z].*[\s\.]*$/',$name)){
			echo "<script>alert('Izen bat idatzi behar duzu')</script>";
		}
		else{
			$erabk = simplexml_load_file("data/erabiltzaileak.xml");
			foreach($erabk->erabiltzaile as $erab){
				if($erab->izena==$name && $erab->emaila==$email){
					echo "<script>alert('Zure pasahitza hau da: ".$erab->pasahitza."');window.location.href = 'login0.php'</script>";
				}
			}
			//$encrypted_passw = base64_decode($plain_text);
            //$decoded = mcrypt_decrypt($algorithm, $key, $encrypted_passw, $mode, $iv);
			echo "<script>alert('Erabiltzailea ez da existitzen')</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Pasahitza berreskuratu</title>
		<meta charset="UTF-8">

		<script type="text/javascript" src="funtzioak.js"></script>
	</head>
	<body>
		<link rel="stylesheet" type="text/css" href="style.css">
		<div align="right">
			<a href="login0.php">LOGIN</a><br>
			<a href="register.php">ERREGISTRATU</a><br>
			<a href="pelikulak.html">IRUZKINAK IKUSI</a><br>
			<a href="index.html">ATZERA</a>
		</div>

		<h2>Berreskuratu zure pasahitza</h2>
		<form name="f" method="post" action="pasahitza.php">
			<center>
			 <div class="container">

			 	<b>Erabiltzaile izena: </b>
			 	<input type="text" placeholder="Sartu izena" name="erabiltzailea">
			 	<br>
			 	
    			<b>Zure e-mail kontua: </b>
    			<input type="text" placeholder="adibide@bat.da"  name="emaila" >
    			<br>
				<!--
    			<b>Pasahitza: </b>
    			<input type="password" placeholder="Sartu pasahitza" name="pasahitza" >
				-->
    		</div>
    		<h3>Eremu guztiak betetzea derrigorrezkoa da.</h3>
    	   	</br>
			<input type="submit" onclick="return balidatuP(this.form)" value="PASAHITZA BERRESKURATU">                 

			<button type="reset" class="reset">Ezeztatu</button>
			<br><br>
	    		</center>
		</form>
	</body>
</html>
