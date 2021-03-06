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
            <li><a href="contatti.php">Contatti</a></li>
			<li><a href="storicot.php">Storico temperatura</a></li>
			<li class="active"><a href="storicoi.php">Storico immagini</a></li>
			<li><a href="lastazione.php">La nostra stazione</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

	   <div><br/></div>
       <div class="alert alert-info" role="alert">Storico immagini (sono visualizzate solo le immagini della giornata)</div>
     
	   <?php
	   
	   		//Data Attuale
	   		$today = date('Y-m-j');

			$folder = 'imgftp/';
			$filetype = $today.'*.jpg';
			
			$files = glob($folder.$filetype);
			$count = count($files);
			 
			$sortedArray = array();
			for ($i = 0; $i < $count; $i++) {
			    $sortedArray[date ('YmdHis', filemtime($files[$i]))] = $files[$i];
			}
			 
			krsort($sortedArray);
	   ?>
	     
	    <div class="bs-example">
	    <php $i=0;?>
		<?php foreach ($sortedArray as &$filename) {?>
		<?php if($i==3 || $i==0) {?>
		<div class="row">
		<?php }?>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img alt="100%x200" data-src="holder.js/100%x200" style="height: 200px; width: 100%; display: block;" src="<?php print($filename); ?>">
					<div class="caption">
						<h4>Data Scatto:</h4>
						<p><?php 
							$prova = str_replace($folder, "",$filename);
							$tmp = explode("_", $prova);
							$data = $tmp[0];
							
							//Reverse della data
							$tmp2 = explode("-",$data);
							$datascatto = $tmp2[2]."-".$tmp2[1]."-".$tmp2[0];
							
							$ora = $tmp[1];
							$tmp3 = substr($ora,0,2);
							$tmp4 = substr($ora,2,2);
							
							print($datascatto. " ".$tmp3.":".$tmp4);
							?>
							</p>
						<p></p>
					</div>
				</div>
			</div>		
			<?php }?>
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
