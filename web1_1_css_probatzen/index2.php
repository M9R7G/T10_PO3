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
    <source src="v1.mp4" type="video/mp4">
  </video>
  <div class="container h-100">
    <div class="d-flex text-center h-100">
      <div class="my-auto w-100 text-white">
        <center>
          <h1 class="display-3">HASIERAKO ORRIA</h1>
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
        <p>The HTML5 video element uses an mp4 video as a source. Change the source video to add in your own background! The header text is vertically centered using flex utilities that are build into Bootstrap 4.</p>
        <p>The overlay color can be changed by changing the <code>background-color</code> of the <code>.overlay</code> class in the CSS.</p>
        <p>Set the mobile fallback image in the CSS by changing the background image of the header element within the media query at the bottom of the CSS snippet.</p>
        <p class="mb-0">
          Created by <a href="https://startbootstrap.com">Start Bootstrap</a>
        </p>
      </div>
    </div>
  </div>
</section>
</body>

</html>