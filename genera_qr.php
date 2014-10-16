<?php
	
	//Prova di generazione di un qr
	$url = "http://www.keantex.com/meteo";
	
	$dimensione = 150;
	$livello_codifica = "L";
	$margine = 0;
	
		
	echo '<img src="http://chart.apis.google.com/chart?chs='.$dimensione.'x'.$dimensione.'&cht=qr&chld='.$livello_codifica.'|'.$margine.'&chl='.$url.'" alt="QRCode" widhtHeight="'.$dimensione.'" widhtHeight="'.$dimensione.'"/>';
?>
	
	
?>