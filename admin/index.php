<?php
	
	//Login voor docentenaccount:
	//Gebruikersnaam:	Begeleider
	//Wachtwoord:		School!2345
	session_start();
	require_once'../scripts/functions.php';
	include_once'../scripts/settings.php';
	
	if (!isAuthenticated()) {
		header('Location: ../index.php');
	}
	
	$db = makeConnection();
	/*
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if(!empty($_POST['titel'])) {
			$titel = mysqli_real_escape_string($db, set_setting($db, 'title', $_POST['titel'] ));
		}
		if(!empty($_POST['style'])) {
			$style = mysqli_real_escape_string($db, set_setting($db, 'style', $_POST['style'] ));
		}
		if(!empty($_POST['timezone'])) {
			$timezone = mysqli_real_escape_string($db, set_setting($db, 'timezone', $_POST['timezone'] ));
		}
		if(!empty($_POST['email'])) {
			$email = mysqli_real_escape_string($db, set_setting($db, 'email', $_POST['email'] ));
		}
		if(!empty($_POST['keywords'])) {
			$key = mysqli_real_escape_string($db, set_setting($db, 'meta keywords', $_POST['keywords'] ));
		}
		if(!empty($_POST['description'])) {
			$desc = mysqli_real_escape_string($db, set_setting($db, 'meta description', $_POST['description'] ));
		}
		if(!empty($_POST['author'])) {
			$author = mysqli_real_escape_string($db, set_setting($db, 'meta author', $_POST['author'] ));
		}
		if(!empty($_POST['header'])) {
			$head = mysqli_real_escape_string($db, set_setting($db, 'header', $_POST['header'] ));
		}
		if(!empty($_POST['paragraph'])) {
			$par = mysqli_real_escape_string($db, set_setting($db, 'paragraph', $_POST['paragraph'] ));
		}
		if(!empty($_POST['log'])) {
			$log = mysqli_real_escape_string($db, set_setting($db, 'log', $_POST['log'] ));
		}
		if(!empty($_POST['cookie'])) {
			$cookie = mysqli_real_escape_string($db, set_setting($db, 'cookieTime', $_POST['cookie'] ));
		}
	}
	*/
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$post = [
			['setting' => 'title', 'value' => $_POST['titel']],
			['setting' => 'style', 'value' => $_POST['style']],
			['setting' => 'timezone', 'value' => $_POST['timezone']],
			['setting' => 'email', 'value' => $_POST['email']],
			['setting' => 'meta keywords', 'value' => $_POST['keywords']],
			['setting' => 'meta description', 'value' => $_POST['description']],
			['setting' => 'meta author', 'value' => $_POST['author']],
			['setting' => 'meta copyright', 'value' => $_POST['copyright']],
			['setting' => 'meta charset', 'value' => $_POST['charset']],
			['setting' => 'header', 'value' => $_POST['header']],
			['setting' => 'paragraph', 'value' => $_POST['paragraph']],
			['setting' => 'log', 'value' => $_POST['log']],
			['setting' => 'cookieTime', 'value' => $_POST['cookie']],
		];
		mysqli_real_escape_string($db, set_setting_array($db, $post));
	}
	
?><!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="../css/adminStyle.css">
		<title><?=get_setting($db, 'title');?></title>
	</head>
	<body>
		<div id="container">
			<header>
				<h2>Admin index</h2>
				<?php
					$uploads = getFiles($db, $_SESSION['userid']);
					echo showFiles($uploads);
				?>
			</header>
			<menu>
				<?php include'scripts/menu.php'; ?>
			</menu>
			<content>
				<?php include'templates/settings.php'; ?>
			</content>
			<footer>
				<?php include'../scripts/footer.php'?>
			</footer>
		</div>
	</body>
</html>