<?php
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$name = $_POST["erabiltzailea"]; // Erabiltzaile izena eskuratu
		$passw = $_POST["pasahitza"]; 	 // Pasahitza eskuratu
		

		//Balidatu formularioa bete dela
		if($name!="" && $passw!=""){
			if(!file_exists("data/erabiltzaileak.xml"))
			{
				echo('<p>Erabiltzaile lista hutsik dago. Izan lehenengoa gure gunera sartzen, sakatu <a href="berria.html">hemen erregistratzeko</a>.</p>');

			}
			else if(!($erabk=simplexml_load_file("data/erabiltzaileak.xml"))) //Kargatu fitxategia
			{
				echo('<p>Errore bat gertatu da erabiltzaile lista irakurtzean. Barkatu eragozpenak</p>');
			}
			else
			{


				$kont=0;
				
				//Egiaztatu sarrerako datuak erabiltzaile bati dagozkiela
				foreach($erabk->erabiltzaile as $erab){
					if($erab->izena==$name){
					    $kont=1;
						if(password_verify($passw, $erab->pasahitza)){ //Pasahitza enkriptatua konparatu
						    $_SESSION['izena'] = $name; //Erabiltzaile izena aldagai superglobalean gorde
					    	//$_SESSION['email'] = $erab->emaila;
					    	header('location: pelikulak_ikusi.php');

					    	
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
		}
		else {
			echo"<script>alert('Formularioa ez da ongi bete')</script>";
		}
	}
 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>LOGIN</title>
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
			<li><a href="register.php">REGISTER</a></li>
			<li><a href="pelikulak_ikusi.php">IRUZKINAK IKUSI</a></li>
		</ul>

		<h2>Sartu zure kontuarekin.</h2>
		<form name="f" method="post" action="login0.php" >
			<center>
			 <div class="container">
              <table>
                <tr><td><b>Erabiltzaile izena: </b></td>
                <td><input type="text" placeholder="Sartu izena" name="erabiltzailea"></td></tr>
                <!--<tr><td><b>Zure e-mail kontua: </b></td>
                <td><input type="text" placeholder="adibide@bat.da"  name="emaila" ></td></tr>-->
                <tr><td><b>Pasahitza: </b></td>
                <td><input type="password" placeholder="Sartu pasahitza" name="pasahitza" ></td></tr>
    		  </table>
             
    		</div>
    		<br>
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