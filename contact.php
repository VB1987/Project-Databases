<?php
session_start();

require_once('scripts/functions.php');
include_once('scripts/settings.php');
require_once 'scripts/config.php';
require_once 'swift-mailer/lib/swift_required.php';

$db = makeConnection();

	$onderwerp = "Contact formulier";
	$emailadres = "example@1234.com";
	$bericht = " ";
	$message = "";
	
	if($_SERVER['REQUEST_METHOD'] === 'POST')	{
		if(isset($_POST['submit']))
			{
			if(!empty($_POST['naam']))
				{
				$afzender =  $_POST['naam'];
				}
				
			if(!empty($_POST['email']))
				{
				$emailadres =  $_POST['email'];
				}
				
			if(!empty($_POST['leeftijd']))
				{
				$leeftijd =  $_POST['leeftijd'];
				}
				
			if(!empty($_POST['bericht']))
				{
				$bericht =  $_POST['bericht'];
				}
			}
			
		
	
	// Nieuwe e-mail componeren
	$message = Swift_Message::newInstance();
	// "Subject" instellen
	$message->setSubject($onderwerp);
	// "From" instellen
	$message->setFrom(array(SMTP_USER));
	// "To" instellen
	$message->setTo(array(get_setting($db, 'email')=>'owner'));
	// "Body" instellen
	$message->setBody($bericht);
	// Een alternatieve "Body" instellen voor als HTML toegelaten wordt
	$message->addPart('<q>Ik citeer hier een bericht.</q>','text/html');
	
	// De instellingen voor het mailen configureren
	$transport = Swift_SmtpTransport::newInstance(SMTP_HOST,SMTP_PORT);
	$transport->setUsername(SMTP_USER);
	$transport->setPassword(SMTP_PASS);
	
	// De mailer opstellen op basis van de gezette instellingen
	$mailer	= Swift_Mailer::newInstance($transport);
	
	// Het bericht daadwerkelijk versturen
	$result = $mailer->send($message);	
	
	}
	
?><!DOCTYPE html>
<html lang="<?=$taal ?>">
	<head>
		<?php include('scripts/meta.php') ?>
	</head>
	<body>
		<div id="container">
			<header>
				<?php include('scripts/header.php') ?>
			</header>
			<menu>
				<?php include('scripts/menu.php') ?>
			</menu>
			<content>
			<div class="contact">
				<form action="" method="POST" enctype="multipart/form-data">
					<fieldset><legend>Gegevens</legend>
						<label>Naam: <input type="text" name="naam"></label>
						<label>Email: <input type="email" name="email"></label>
						<label>Leeftijd	: <input type="number" name="leeftijd"></label>
					</fieldset>
					<fieldset>
						<textarea name="bericht"></textarea>
						<input type="submit">
					</fieldset>
				</form>
				<?=$message?>
			</div>
			</content>
			<footer>
				<?php include('scripts/footer.php') ?>
			</footer>
		</div>
	</body>
</html>