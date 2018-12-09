
<!DOCTYPE html>
<html>
	<head>
		<title>Pelikulak: iruzkin berria.</title>
		<meta charset=UTF-8">
		<script type="text/javascript" src="funtzioak.js"></script>
	</head>
	<body>
		<?php
		$a=$_GET['id'];	
		?>
		<h1>Gehitu iruzkin berri bat</h1>
		<p> Zure iruzkina idatzi eta bidali:</p>
		<form action='iruzkinak_gorde.php?x=$a' method="post">
			Iruzkina(*): <br>
			<textarea name="iruzkina" rows="15" cols="80"></textarea><br>
			<input type="submit" onclick="return balidatu_iruzkina(this.form);">
		</form>
	</body>
</html>