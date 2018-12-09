<?php
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$name = $_POST["erabiltzailea"];
		$email = $_POST["emaila"];
		$passw = $_POST["pasahitza"];
		
		//ZERBITZARIAN FORMULARIOA BALIDATU
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			echo "<script>alert('Emaila oker idatzi duzu')</script>";
		}
		else if(!preg_match('/^[a-zA-Z].*[\s\.]*$/',$name)){
			echo "<script>alert('Izen bat idatzi behar duzu')</script>";
		}
		else if(!preg_match('/^[a-zA-Z].*[\s\.]*$/',$passw)){
			echo "<script>alert('Pasahitz bat idatzi behar duzu')</script>";
		}
		else {
		    //XML fitx. KARGATU
			$erabk = simplexml_load_file("data/erabiltzaileak.xml");
			
			
			//E-mail bera duen erabiltzailerik ez dagoela egiaztatu
			foreach($erabk->erabiltzaile as $erab)
			{
			    if($erab->emaila==$email){
			        echo "<script>alert('E-mail hori duen erabiltzailea existitzen da. Beste bat aukeratu.');
			        window.location.href = 'register.php'</script>";
			    }
			}
			
			
			//PASAHITZA ENKRIPTATU
			$enkriptatua = password_hash($passw,PASSWORD_BCRYPT);
			
			
			//XML-an GORDE
			$id = substr($erabk['azkenid'],1);
			$num = (int)$id;
			$num1 = ++$num;
			$idberria='b'.$num1;

			$berria = $erabk->addChild('erabiltzaile');
			$berria['id']= $idberria;
			$berria->addChild('emaila',$email);
			$berria->addChild('izena',$name);
			$berria->addChild('pasahitza',$enkriptatua); //Pasahitza gorde enkriptatua 
			
			$erabk['azkenid']= $idberria;
			$erabk->asXML("data/erabiltzaileak.xml");

			echo"<script>alert('Erregistratu zara');
			window.location.href = 'login0.php'</script>";
		}
	}
 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>REGISTER</title>
		<meta charset="UTF-8">

		<script type="text/javascript" src="funtzioak.js"></script>
	</head>
	<body>
		<link rel="stylesheet" type="text/css" href="style.css">
	<div align="right">
		<a href="login0.php">LOGIN</a><br>
		<a href="ipelikulak_ikusi.php">IRUZKINAK IKUSI</a><br>
		<a href="index.php">ATZERA</a>
	</div>

		<h2>Erabiltzaile kontua sortzeko zure datuak bete mesedez.</h2>
		<form name="f" method="post" action="register.php" >
			<center>
			 <div class="container">

			 	<b>Erabiltzaile izena: </b>
			 	<input type="text" placeholder="Sartu izena" name="erabiltzailea">
			 	<br>

    			<b>Zure e-mail kontua: </b>
    			<input type="text" placeholder="adibide@bat.da"  name="emaila" >
    			<br>

    			<b>Pasahitza: </b>
    			<input type="password" placeholder="Sartu pasahitza" name="pasahitza" >
    		</div>
    		<h3>Eremu guztiak betetzea derrigorrezkoa da.</h3>
    	   	</br>
			<input type="submit" onclick="return balidatuE(this.form)" value="REGISTER">                 

			<button type="reset" class="reset">Ezeztatu</button>
			<br><br>
			
    		</center>
		</form>


	</body>

</html>