<?php
	
	echo"<script>alert('KAIXO!')</script>";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$name = $_POST["erabiltzailea"];
		$passw = $_POST["pasahitza"];
		$erabk = simplexml_load_file("data/erabiltzaileak.xml");
		echo"<script>alert('AUPA!')</script>";
		foreach($erabk->erabiltzaile as $erab){
			if($erab->izena==$name && $erab->pasahitza==$passw){
				header('location: pelikulak.html');
			}
		}
		echo"<script>alert('Erabiltzailea ez da existitzen')</script>";
		header('location: login0.html');
	}
 
?>

