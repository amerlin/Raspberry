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
			<li class="active"><a href="storicot.php">Storico temperatura</a></li>
			<li><a href="storicoi.php">Storico immagini</a></li>
			<li><a href="lastazione.php">La nostra stazione</a></li>
			<li><a href="lastazione.php">La nostra stazione</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

   <div><br/></div>       
   <div class="alert alert-info" role="alert">Storico giornaliero della temperatura</div>
   
   	<table class="table table-striped">
  <thead>
    <tr>
      <th>ID Temperatura</th>
      <th>Gradi rilevati</th>
      <th>Data/Ora Rilievo</th>
    </tr>
  </thead>
  <tbody>
   
   	<?php
		$dbhost = 'localhost:3036';
		$dbuser = 'keantexc_cw';
		$dbpass = 'Tg3oQ0LSMZpO';
		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		if(! $conn )
		{
		  die('Could not connect: ' . mysql_error());
		}
		$sql = 'SELECT tm_id, tm_temperatura , tm_data from temperatura order by tm_id desc LIMIT 10';
		
		mysql_select_db('keantexc_casellaw');
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
		  die('Could not get data: ' . mysql_error());
		}
		while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
		{
		         //"--------------------------------<br>";
		         print("<tr>");
		         print("<td>".$row['tm_id']."</td><td>".$row['tm_temperatura']."</td><td>".$row['tm_data']."</td>");
		         print("</tr>");
		         
		} 
		//echo "Fetched data successfully\n";
		mysql_close($conn);
	?>
     </tbody>
</table>

<div class="alert alert-info" role="alert">
 <strong><a href="grafico.php">Visualizza il grafico complessivo della temperatura</a></strong>
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
