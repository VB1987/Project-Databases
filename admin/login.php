<?php

session_start();
require_once '../scripts/functions.php';

if (isset($_POST['user']) && isset($_POST['pass'])) {
	$db = makeConnection();
	$user = mysqli_real_escape_string($db, $_POST['user'] );
	$pass = mysqli_real_escape_string($db, $_POST['pass'] );
	if (!login_check($db, $user, $pass)) {
		$message = 'Verkeerde gebruikersnaam/wachtwoord combinatie.';
	}
}

if (isset($_POST['logout'])) {
	$message = 'U bent uitgelogd.';
	unset($_SESSION['username']);
}

?><!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="../css/adminStyle.css">
	</head>
	<body class="login">
		<?php
			if (isset($message)) {
				echo '<p>'.$message.'</p>';
			}
		
			if (isAuthenticated()) {
				header('Location: index.php');
			} else {
				include 'templates/loginform.php';
			}
			echo '<p>Klik <a href="../index.php">hier</a> om terug te gaan naar de startpagina.';
		?>
	</body>
</html>