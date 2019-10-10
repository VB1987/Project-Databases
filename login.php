<?php
session_start();

require_once('scripts/functions.php');
include_once('scripts/settings.php');

$db = makeConnection();

$_SESSION['naam'] = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['naam']) && isset($_POST['wachtwoord'])) {
	if ($_POST['naam'] === 'Student' && $_POST['wachtwoord'] === 'sliminict') {
		$_SESSION['naam'] = $_POST['naam'];
		$_SESSION['logged'] = true;
	} else {
		$_SESSION['naam'] = '';
		$_SESSION['logged'] = false;
	}
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
			<div class="login">
				<form action="" method="POST" enctype="multipart/form-data">
					<fieldset><legend>Gegevens</legend>
						<label>Naam: <input type="text" name="naam"></label>
						<label>Wachtwoord: <input type="password" name="wachtwoord"></label>
						<input type="submit" value="Inloggen">
					</fieldset>
				</form>
				<?php
				if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
					echo '<form action="" method="POST" enctype="multipart/form-data">
					<input type="submit" value="Uitloggen">
					</form>';
				} if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['naam']) && $_SESSION['logged'] == true) {
					$_SESSION['naam'] = '';
					$_SESSION['logged'] = false;
				}
				?>
			</div>
			</content>
			<footer>
				<?php include('scripts/footer.php') ?>
			</footer>
		</div>
	</body>
</html>