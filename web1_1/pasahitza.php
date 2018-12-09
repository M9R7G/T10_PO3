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
					$random=substr(base64_encode(sha1(mt_rand())),0,10);//10 luzerako string random-a sortu
					$zifratu=password_hash($random, PASSWORD_BCRYPT);
					echo "<script>alert('Zure pasahitza hau da: ".$random."');window.location.href = 'login0.php'</script>";
					$erab->pasahitza=$zifratu;
				}
			}
			$erabk->asXML("data/erabiltzaileak.xml");
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
		<script type="text/javascript" src="funtzioak.js"></script>
	</head>
	<body>
		<link rel="stylesheet" type="text/css" href="style.css">
		<ul>
			<li><a class="active" href="index.php">MENU NAGUSIRA</a></li>
			<li><a class="active" href="index.php">LOGIN</a></li>
			<li><a href="register.php">ERREGISTRATU</a></li>
			<li><a href="pelikulak_ikusi.php">IRUZKINAK IKUSI</a></li>
			<li><a href="index.php">ATZERA</a></li>
		</ul>

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
