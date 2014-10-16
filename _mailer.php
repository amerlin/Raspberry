<?php

//Creazione variabili di sessione
session_start();

//Email destinazione
$myemail = "a.merlin@keantex.com";

$name = check_input($_POST['inputName'], "Your Name");
$email = check_input($_POST['inputEmail'], "Your E-mail Address");
$subject = check_input($_POST['inputSubject'], "Message Subject");
$message = check_input($_POST['inputMessage'], "Your Message");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("Invalid e-mail address");
}
/* Let's prepare the message for the e-mail */

$subject = "Someone has sent you a message";

$message = "

Richiesta di contatto proveniente dal sito internet :

Nome: $name
Email: $email
Oggetto: $subject

Messaggio email:
$message

";

$mittente = 'From: "Formail CasellaWireless" <casellawireless@keantex.com> \r\n';

/* Send the message using mail() function */
mail($myemail, $subject, $message,$mittente);

/* Redirect visitor to the thank you page */
header('Location: http://www.keantex.com/meteo/contatti.php');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
	{
	addError($problem);
	}
return $data;
}

//Aggiunge errore
function AddError($problem)
{
	print("Errore: ".$problem);
}


?>