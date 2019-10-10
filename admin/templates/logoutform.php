<?php
session_start();

if (isset($_POST['logout'])) {
	header('Location: ../index.php');
	//$message = 'U bent uitgelogd.';
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
		?>
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
			<fieldset>
				<legend>Uitloggen</legend>
				<input type="submit" name="logout" value="Uitloggen">
			</fieldset>
		</form>
	</body>
</html>