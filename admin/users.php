<?php
	session_start();
	require_once'../scripts/functions.php';
	include_once'../scripts/settings.php';
	
	if (!isAuthenticated()) {
		header('Location: ../index.php');
	}
	
	
	if (isset($_POST['user']) && isset($_POST['pass'])) {
		$db = makeConnection();
		
		$errors = checkPassword($_POST['pass']);
		if (!checkUsername($_POST['user'])) {
			$errors = 'Gebruikersnaam te kort.';
		}

		if (count($errors) == 0) {
			$user = mysqli_real_escape_string($db, $_POST['user'] );
			$pass = $_POST['pass'];
			$avatar = $_FILES['bestand'];
			if (register_user($db, $user, $pass, $avatar)) {
				$message = 'Gebruiker geregistreerd.';
			}		
		} else {
			$message = implode('<br>', $errors);
		}	
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
				<h2>Admin users</h2>
				<?php
					$uploads = getFiles($db, $_SESSION['id']);
					echo showFiles($uploads);
				?>
			</header>
			<menu>
				<?php include'scripts/menu.php'; ?>
			</menu>
			<content>
				<div class="users">
					<?php 
						include'templates/registerform.php';
						
						$posts = get_users($db);
						$data = show_users($posts);
						//echo $message;
						echo $data;
					?>
				</div>
			</content>
			<footer>
				<?php include'../scripts/footer.php'?>
			</footer>
		</div>
	</body>
</html>