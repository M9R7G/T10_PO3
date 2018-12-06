<?php
	if(isset($_POST['emaila'])){
		if(!preg_match('/^.@.\..$/',$_POST['emaila'])){
			echo "<script>alert('Emaila oker idatzi duzu')</script>";
			echo "<a href='pasahitza.html'>Itzuli</a>";
		}
		else if(!preg_match('/^[a-z]+$/',$_POST['erabiltzailea'])){
			echo "<script>alert('Izen bat idatzi behar duzu')</script>";
			echo "<a href='pasahitza.html'>Itzuli</a>";
		}
		else header('location: login0.html');
	}
?>