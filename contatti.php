<?php

	//Apertura della sessione
	session_start();
	
	//Recupero errore
	$errore = $_SESSION['errore'];
	$risinvio = $_SESSION['invio'];
	
	//print("Il valore di Invio:".$risinvio);
		
	//((print("Il valore di errore: #".$errore."#");	
		
	//Se valorizzato errore
	//if(isset($errore))
	//{
	//	print("".$_SESSION['errNome']."<br/>");
	//	print("".$_SESSION['errEmail']."<br/>");
	//	print("".$_SESSION['errSubject']."<br/>");
	//	print("".$_SESSION['errMessage']."<br/>");
	//}
	
	//Variabili per errore
	$errNome = "";
	$errEmail="";
	$errSubject="";
	$errMessage="";
	
	if($errore<>"")
	{
		//Imposto asterisco
		if($_SESSION['errNome']<>"")
			$errNome="*";
		if($_SESSION['errEmail']<>"")
			$errEmail="*";
		if($_SESSION['errSubject']<>"")
			$errSubject="*";
		if($_SESSION['errMessage']<>"")
			$errMessage="*";
			
		$risinvio ="KO";
	}
	
	//Recupero i valori della form
	$name=$_SESSION['Nome'];
	$email=$_SESSION['Email'];
	$subject=$_SESSION['Subject'];
	$message=$_SESSION['Message'];
	
		
	//Distruzione della variabile di sessione
	session_unset();
	
?>
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
            <li class="active"><a href="contatti.php">Contatti</a></li>
	    <li><a href="storicot.php">Storico temperatura</a></li>
	    <li><a href="storicoi.php">Storico immagini</a></li>
	    <li><a href="lastazione.php">La nostra stazione</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

    	   <div><br/></div>
		   <div class="alert alert-info" role="alert">Contatti</div>     
		   
		   <p class="text-success">Per qualsiasi informazione e/o attivazione di una stazione potete contattarci compilando il modulo qui sotto.</p>
		   
		 	<div style="margin-top:50px">
			<div class="container">
				<div class="panel panel-default" style="margin:0 auto;width:500px">
					<div class="panel-heading">
						<h2 class="panel-title">Richiesta informazioni</h2>
					</div>
					<div class="panel-body">
						<form name="contactform" method="post" action="http://www.keantex.com/meteo/mailer.php" class="form-horizontal" role="form">
							<div class="form-group">
								<label for="inputName" class="col-lg-2 control-label">Nome <strong><font color="color="#00FF00""><?php print($errNome); ?></font></strong></label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="inputName" name="inputName" placeholder="Il tuo nome" value="<?php print($name);?>">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail1" class="col-lg-2 control-label">Email <strong><font color="color="#00FF00""><?php print($errEmail);?></strong></font></label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Il tuo indirizzo email" value="<?php print($email);?>"> <?php print($errEmail);?>
								</div>
							</div>
							<div class="form-group">
								<label for="inputSubject" class="col-lg-2 control-label" value="<?php print($subject);?>">Oggetto <strong><font color="color="#00FF00""><?php print($errSubject);?></strong></font></label>
								<div class="col-lg-10">
									<input type="text" class="form-control" id="inputSubject" name="inputSubject" placeholder="Oggetto">	
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword1" class="col-lg-2 control-label" value="<?php print($message);?>">Messaggio <strong><font color="color="#00FF00""><?php print($errMessage);?></strong></font></label>
								<div class="col-lg-10">
									<textarea class="form-control" rows="4" id="inputMessage" name="inputMessage" placeholder="Il tuo messaggio..."></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<button class="btn btn-primary pull-right" type="submit">Invia</button>									
								</div>
							</div>
							
						</form>

						<p><?php if($risinvio=="OK") {?>
						<div class="alert alert-success" role="alert">
							<?print("Invio effettuato correttamente."); ?>
						</div>
						<?php }?>
						<?php if($risinvio=="KO"){ ?>
						<div class="alert alert-danger" role="alert">
						<?print("Errore nei dati inseriti."); ?>
						<?php }	?>
						</p>


					</div>
				</div>
			</div>
		</div>
		   
<?php
			   
//mail("a.merlin@keantex.com","This is the message subject","This is the message body","From: web@keantex.com" . "\r\n" . "Content-Type:text/plain; charset=utf-8","-fweb.keantex.com");

?>
       
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
