<?php

		//Script per scrittura nella tabella dei dati
		//Messo nel crontab
		//usr/bin/php -q /home/keatenxc/public_html/meteo/script/update.php

		$path = getcwd();
		echo "SCRIPT PATH: ";
		echo $path;
		print("<br>");
		

		$nomefile="";
		
		//path to directory to scan
		$directory = "/home/keantexc/public_html/meteo/imgftp/";
		
		//get all image files with a .txt extension.
		$file= glob($directory . "*.dat");
		
		//print each file name
		foreach($file as $filew)
		{
		$nomefile = $filew;
		$files[] = $filew; // to create the array
		}
		
		if(count($files)==0)
			{
				print("No file to process.");
				exit;
			}
		
		$temperatura="";
		$datarilievo="";
		$orarilievo="";

		print("FILE NAME: ".$nomefile);
		print("<br>");

		//LETTURA DEL CONTENUTO DEL FILE
		$file = fopen($nomefile, "r");
		$i=0;
		while(!feof($file)){
		    
		    $line = fgets($file);
			
			if($i==0)
				$datarilievo = $line;
			if($i==1)
				$orarilievo = $line;
			if($i==2)
				$temperatura = $line;
			
			$i=$i+1;
		}
		fclose($file);

		//UPDATE NEL DATABASE
	
		print("DATA RILIEVO: ".$datarilievo);
		print("<br>");
		print("ORA RILIEVO: ".$orarilievo);
		print("<br>");
		print("TEMPERATURA: ".$temperatura);
		print("<br>");
	
		//print("Sono qui");
		
		$dbhost = 'localhost:3036';
		$dbuser = 'keantexc_cw';
		$dbpass = 'Tg3oQ0LSMZpO';
		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		if(! $conn )
		{
		  die('Could not connect: ' . mysql_error());
		}
		
		$datarilievo = $datarilievo. " ".$orarilievo;
		$sql = "INSERT INTO temperatura (tm_temperatura,tm_data) VALUES('$temperatura','$datarilievo')";
				
		mysql_select_db('keantexc_casellaw');
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
		  die('Could not update data: ' . mysql_error());
		}

		//CANCELLAZIONE DEL FILE
		unlink($filew);
?>