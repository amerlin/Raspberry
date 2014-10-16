<!DOCTYPE html>
<html lang="en">
<?php
  define('BASE_DIR', dirname(__FILE__));
  require_once(BASE_DIR.'/config.php');
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Dott. Andrea Merlin">
    <link rel="icon" href="favicon.ico">
    <script src="script.js"></script>
    <title>Casella Wireless - Camera</title>

    <!-- Bootstrap core CSS -->
    <link href="./dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="./assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body onload="setTimeout('init();', 100);">

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Casella Wireless</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="chisiamo.php">Chi siamo</a></li>
            <li ><a href="contatti.php">Contatti</a></li>
	    <li><a href="storicot.php">Storico temperatura</a></li>
	    <li><a href="storicoi.php">Storico immagini</a></li>
	    <li class="active"><a href="lastazione.php">La nostra stazione</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

    	   <div><br/></div>
		  
		  <div class="panel panel-default">
  <div class="panel-heading">La nostra stazione</div>
  <div class="panel-body">
    La nostra stazione è stata realizzata utilizzando:<br/><br/>
    <ul>
	  <li><b>RaspBerry Pi (versione B)</b>: un piccolo computer SBC (single-board computer), progettato e realizzato dalla <a href="http://www.raspberrypi.org/">Raspberry Pi Foundation</a>.<br/><br/>
		<img src="img/raspberry.png" alt="Raspberry versione B"><br/><br/>
		<table class="table">
		<tr><td>Dimensioni</td><td>85.60mm x 56mm x 21mm</td></tr>
		<tr><td>Peso</td><td>5 grammi</td></tr>
		<tr><td>Memoria Ram</td><td>512 Mb</td></tr>
		<tr><td>SSD</td><td>SSD 4Gb</td></tr>
		<tr><td>Sistema operativo</td><td>Raspian OS (basato su Debian)</td></tr>
		</table>
	  </li>
	  <li><b>Rpi modulo cam</b>: una Telecamera da 5MP specificatamente studiata per il Raspberry PI.<br/><br/>
	  	  <img src="img/modulo-cam.png" alt="Modulo Ri-Cam"><br/><br/>
		  <table class="table">
		  <tr><td>Dimensioni</td><td>25mm x 20mm x 9mm</td></tr>
		  <tr><td>Sensore</td><td>5 Megapixel 1080p / 720p / 640x480p Video </td></tr>
		  </table>
	  </li>
	  <li><b>Sensore di temperatura</b> basato su integrato DS18B20. Il sensore DS18B20 è una una sonda in grado di rilevare una temperatura compresa nel campo -55°C÷125°C con un’accuratezza di ±0.5°C nel campo -10°C÷85°C .
		  <br/><img src="img/sonda.png"/><br/><br/>
	  </li>
	  <li><b>Adattatore Wi-fi Usb</b>: utilizzata per poter accedere al rasberry direttamente senza utilizzare il cavo ethernet.
		  <br/><br/><img src="img/wifi.png"></br></br>
	  </li>
	  <li><b>Scatola elettrica stagna</b>: per ospitare tutta la cicuiteria.</li>
	  <br><img src="img/scatola.png"/><br></br>
	  <li><b>Script realizzato in Pyton per l'acquisizione dei dati dalla sonda della temperatura.</b></li>
	  <li><b>Script realizzato in Bash per l'acquisizione delle immagini dalla fotocamera.</b></li>
  </div>
</div>
		     
       
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="./dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
