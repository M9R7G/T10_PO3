<?php
session_start();
$_SESSION["izena"] = "";
$_SESSION["email"] = "";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>xd</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="style2.css"
</head>
<body>
  <header>
  <div class="overlay"></div>
  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="v2.mp4" type="video/mp4">
  </video>
  <div class="container h-100">
    <div class="d-flex text-center h-100">
      <div class="my-auto w-100 text-white">
        <center>
          <h1 class="display-3">PELIKULAK :)</h1>
          <h2>IKUS ETA IGO ITZAZU NAHI ADINA PELIKULA</h2>
          <div>
            <input type="button" class="hasi" value="LOGIN" onclick="location.href='login0.php'"><br>
            <input type="button" class="hasi" value="REGISTER" onclick="location.href='register.php'"><br>
            <input type="button" class="hasi" value="VIEW FILMS" onclick="location.href='pelikulak_ikusi.php'"><br>
          </div>
        </center>
      </div>
    </div>
  </div>
</header>

<section class="my-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
		<p>Webgune hau, pelikulen katalogo bat da. Webgunean pelikulak igo, hauek ikusteko estekak eskuratu, pelikulei buruzko iruzkinak ikusi eta pelikulei iruzkinak jarri daiteke.</p> 
		<p>Erregistratutako erabiltzailea pelikulak igo ditzake; pelikulak ikusteko estekak eskuratu ditzake; pelikulei buruzko iruzkinak ikus ditzake; eta pelikulei iruzkinak gehitu ditzake.</p> 
		<p>Erregistratu gabeko erabiltzailea berriz, ezin izango du pelikularik igo; ezin izango du iruzkinik jarri; eta ezin izango du pelikulak ikusteko estekak eskuratu. Beraz, erregistratu gabeko erabiltzaileak egin ahal duena pelikulen iruzkinak ikustea da. </p>

        
        <p class="mb-0">
          Created by Manu Ruiz, Iñigo Pérez and Mikel berganza</a>
        </p>
      </div>
    </div>
  </div>
</section>
</body>

</html>