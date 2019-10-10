<?php

require_once('../../scripts/functions.php');
include_once'../../scripts/settings.php';

$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['name']) {
	$db = makeConnection();
	$name = mysqli_real_escape_string($db, $_POST['name']);
	
	update_name($db, $name, $id);
	header('Location: ../users.php');
} 
if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['password']) {
	$db = makeConnection();
	$pass = mysqli_real_escape_string($db, $_POST['password']);
	
	update_pass($db, $pass, $id);
	header('Location: ../users.php');
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && $_FILES['bestand']) {
	$db = makeConnection();
	//$avatar = mysqli_real_escape_string($db, $_FILES['bestand']);
	$avatar = $_FILES['bestand'];
	
	update_file($db, $avatar, $id);
	header('Location: ../users.php');
} 


?><!DOCTYPE html>
<html lang="NL-nl">
	<head>
		<link type="text/css" rel="stylesheet" href="../../css/adminStyle.css">
		<title><?=get_setting($db, 'title');?></title>
	</head>
	<body>
		<div id="container">
			<content>
				<div class="users">
				<?php 
					$post = show_userById($db, $id); 
					echo $post;
					include'../templates/updateform.php';
				?>
				
				</div>
			</content>
		</div>
	</body>
</html>