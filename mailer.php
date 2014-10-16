<?php

//Apertura sessione
session_start();

//Dichiaro le variabili di sessione
//per la gestione degli errori
$_SESSION['errNome']="";
$_SESSION['errEmail']="";
$_SESSION['errSubject']="";
$_SESSION['errMessage']="";
$_SESSION['errore']="";

//Valori
$_SESSION['Nome']="";
$_SESSION['Email']="";
$_SESSION['Subject']="";
$_SESSION['Message']="";

//Recupero il valore dalla form
$name = check_input($_POST['inputName'], "1");
$email = check_input($_POST['inputEmail'], "2");
$subject = check_input($_POST['inputSubject'], "3");
$message = check_input($_POST['inputMessage'], "4");

$_SESSION['Nome']=$name;
$_SESSION['Email']=$email;
$_SESSION['Subject']=$subject;
$_SESSION['Message']=$message;

//Verifica indirizzo email destinazione
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
	$_SESSION['errEmail']="Indirizzo email non corretto!";
	$_SESSION['errore']="errore";
}

//Presenza di un errore
if($_SESSION['errore']=="")
{
	$subject = "Messaggio dal web";

	$message = "

	Richiesta di contatto proveniente dal sito internet :

	Nome: $name
	Email: $email
	Oggetto: $subject

	Messaggio email:
	$message

	";

	$mittente = 'From: "Casella Wireless" <casellawireless@keantex.com> \r\n';
	$myemail = "a.merlin@keantex.com";

	$_SESSION['invio'] ="OK";

	//Spedizione email
	mail($myemail, $subject, $message,$mittente);

	}
	
	//Redirect sulla form iniziale
	header('Location: http://www.keantex.com/meteo/contatti.php');
	exit();


//Funzione per la verifica dei campi in input
function check_input($data, $problem='')
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	if ($problem && strlen($data) == 0)
		{
			//Imposto errore
			$_SESSION['errore']="errore";
			
			//Errore rilevato
			//setup della variabile di sessione
			//print("Errore:#".$problem."#<br>");
			switch($problem)
			{
				case "1":	$_SESSION['errNome']="Inserire il nome";
						  	break;
				case "2":	$_SESSION['errEmail']="Inserire l'indirizzzo email";
							break;
				case "3": 	$_SESSION['errSubject']="Inserire l'oggetto della richiesta";
							break;
				case "4": 	$_SESSION['errMessage']="Inserire il corpo del messaggio";
							break;
			}	
					
		}
		
	return $data;
}



?>