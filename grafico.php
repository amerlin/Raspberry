<?php

//Parametri di accesso al database
$dbhost = 'localhost:3036';
$dblogin = 'keantexc_cw';
$dbpwd = 'Tg3oQ0LSMZpO';
$dbname="keantexc_casellaw";


//Selezionare il mese
//$anno = "select distinct YEAR(tm_data) from temperatura";

//Selezionare anno
//$mese = "select distinct MONTH(tm_data) from temperatura";

//Query per anno
$query = "SELECT DATE_FORMAT(tm_data, '%m-%Y') AS created_month FROM temperatura GROUP BY created_month";

$con=mysql_connect($dbhost,$dblogin,$dbpwd) or die("Failed to connect with database!!!!");
mysql_select_db($dbname, $con); 
$sth = mysql_query("SELECT * FROM temperatura");
 
$rows = array();
//flag is not needed
$flag = true;
$table = array();
$table['cols'] = array(
 
    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
    array('label' => 'giorni', 'type' => 'string'),
    array('label' => 'temperatura', 'type' => 'number')
 
);
 
$rows = array();
while($r = mysql_fetch_assoc($sth)) {
    $temp = array();
    // the following line will be used to slice the Pie chart
    $temp[] = array('v' => (string) $r['tm_data']); 
 
    // Values of each slice
    $temp[] = array('v' => (double) $r['tm_temperatura']); 
    $rows[] = array('c' => $temp);
}
 
$table['rows'] = $rows;
$jsonTable = json_encode($table);

?>
 
<html>
  <head>
    <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">
 
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
 
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);
 
    function drawChart() {
 
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
           title: ' Grafico Temperatura ',
          is3D: 'true',
          width: 800,
          height: 600
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
      //var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
    </script>
  </head>
 
  <body>
    <!--this is the div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>