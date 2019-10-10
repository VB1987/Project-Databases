<?php

function makeMenu ($menu){
	foreach($menu as $item) {
		$url = $item['url'];
		$text = $item['text'];
		$target = $item['target'];
		echo '<li>';
		echo '<a href="'.$url.'" target="'.$target.'">'.$text.'</a>';
		echo '</li>';
	}
}

function makeArray() {
	$numbers = [];
	
	for ($i = 0; $i < 20; $i++) {
		$numbers[$i] = rand(0,999);
		foreach($numbers as $number) {
			if ($number % 2 == 0) {
				$numbers[$i] = $number+1;
			}
		}
	}
	return $numbers;
}

function writeLog(array $numbers) {
	$db = makeConnection();
	$file =fopen('files/'.get_setting($db, 'log'), 'a');
	fwrite($file, implode(PHP_EOL,$numbers));
	echo fread($file, filesize('files/'.get_setting($db, 'log')));
	fclose($file);
}

function makeConnection() {
	$host = 'localhost';
	$user = 'root';
	$password = ''; // VPS: 'School12345', USBWebserver: 'usbw'
	$database = 't04m91';

	return mysqli_connect($host, $user, $password, $database);	
}

function isAuthenticated() {
	return isset($_SESSION['username']);
}

function login_check($db, $username, $password) {
	if (isAuthenticated()) {return false;}
	$query = "
		SELECT * 
		FROM users 
		WHERE username = '$username'
	";
	
	$result = mysqli_query($db, $query);
	if ($data = mysqli_fetch_assoc($result)) {
		$salt = retrieve_salt($data['password']);
		$salt = '$2y$10$'.$salt.'$';
		$hash = crypt($password, $salt);
		if ($hash == $data['password']) {
			$_SESSION['username'] = $username;
			$_SESSION['id'] = $data['id'];
			$id = $data['id'];
			return true;
		}
	}
	return false;
}

function retrieve_salt($hash) {
	return substr($hash,7,22);
}

function generate_salt($length) {
	$chars = 'abcdefghijklmnopqrstuvwxyz'.
		'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.
		'0123456789';
	
	$size = strlen($chars);
	$str = '';
	for ($i = 0; $i < $length; $i++) {
		$str .= $chars[rand(0, $size-1)];
	}
	
	return $str;
}

function checkUsername($name) {
	return strlen($name) >= 4;
}

function checkPassword($password) {
	$errors = [];
	
	if (strlen($password) < 8) {
		$errors[] = 'Wachtwoord te kort.';
	}
	
	$klein = false;
	$groot = false;
	$getal = false;
	$speciaal = false;
	$tekens = '!@#$%^&*()_+-={}|[]\\;:\'"<>?,./';
	
	for ($i = 0; $i < strlen($password); $i++) {
		$c = $password[$i];
		if ($c >= 'a' && $c <= 'z') {$klein = true;}
		if ($c >= 'A' && $c <= 'Z') {$groot = true;}
		if ($c >= '0' && $c <= '9') {$getal = true;}
		if (strpos($tekens, $c) !== false) {$speciaal = true;}
	}
	
	if (!$klein) {$errors[] = 'Geen kleine letters.';}
	if (!$groot) {$errors[] = 'Geen hoofdletters.';}
	if (!$getal) {$errors[] = 'Geen cijfers.';}
	if (!$speciaal) {$errors[] = 'Geen speciale leestekens.';}
	
	return $errors;
}

function get_setting($db, $setting) {
	$query = "SELECT value FROM settings WHERE setting = '$setting'";
	$result = mysqli_query($db,$query);
	$data = mysqli_fetch_assoc($result);
	return $data['value'];
}

function get_style($db, $setting) {
	$query = "SELECT value FROM styles WHERE setting = '$setting'";
	$result = mysqli_query($db,$query);
	$data = mysqli_fetch_assoc($result);
	return $data['value'];
}

function set_setting($db, $setting, $value) {
	$query = "UPDATE settings SET value='$value' WHERE setting='$setting'";
	mysqli_query($db,$query);
}

function set_setting_array($db, $setting) {
	foreach($setting as $post) {
		$setting = $post['setting'];
		$value = $post['value'];
		$query = "UPDATE settings SET value='$value' WHERE setting='$setting'";
		mysqli_query($db,$query);
	}
}

function set_style_array($db, $setting) {
	foreach($setting as $post) {
		$setting = $post['setting'];
		$value = $post['value'];
		$query = "UPDATE styles SET value='$value' WHERE setting='$setting'";
		mysqli_query($db,$query);
	}
}

function writeStyle(array $numbers) {
	$db = makeConnection();
	$file =fopen('files/'.get_setting($db, 'log'), 'a');
	fwrite($file, implode(PHP_EOL,$numbers));
	echo fread($file, filesize('files/'.get_setting($db, 'log').'.txt'));
	fclose($file);
}

function get_users($db){
	$query = 'SELECT * FROM users';
	$result = mysqli_query($db,$query);
	$users = [];
	while ($data = mysqli_fetch_assoc($result)){
		$users[] = $data;
	}
	return $users;
}

function show_users($users) {
	$html = '';
	
	foreach($users as $user) {
		$naam = $user['username'];
		$password = $user['password'];
		$id = $user['id'];
		
		$buttons = '<ul class="buttons">';
		$buttons .= '<li class="buttonDel"><a href="scripts/delete.php?id='.$id.'"></a></li>';
		$buttons .= '<li class="buttonUp"><a href="scripts/update.php?id='.$id.'"></a></li>';
		$buttons .= '</ul>';
		
		$html .= '<section class="list">';
		$html .= $buttons;
		$html .= '<h3>ID: '.$id.'</h3>';
		$html .= '<p>Naam: '.$naam.'</p>';
		$html .= '<p>Wachtwoord: '.$password.'</p>';
		$html .= '</section>';
		
	}
	
	return $html;
	
}

function show_userById($db, $id){
	$query = "SELECT * FROM users WHERE id='$id'";
	$result = mysqli_query($db,$query);
	$users = [];
	
	$data = mysqli_fetch_assoc($result);
		$users[] = $data;
	
	foreach($users as $user) {
		$naam = $user['username'];
		$pass = $user['password'];
		$id = $user['id'];
		
		$html = '<section class="list">';
		$html .= '<h3>ID: '.$id.'</h3>';
		$html .= '<p>Naam: '.$naam.'</p>';
		$html .= '<p>Wachtwoord: '.$pass.'</p>';
		$html .= '</section>';
	}
	return $html;
}

function delete_user($db, $id) {
	
	$query = "DELETE FROM users WHERE id='$id'";
	
	mysqli_query($db, $query);
}

function update_name($db, $name, $id) {
	$query = "UPDATE users SET username='$name' WHERE id='$id'";
	
	mysqli_query($db, $query);
}

function update_pass($db, $pass, $id) {
	$salt = '$2y$10$'.generate_salt(22).'$';
	$pass = crypt($pass, $salt);
	$query = "UPDATE users SET password='$pass' WHERE id='$id'";
	
	mysqli_query($db, $query);
}

function update_file($db, $file, $id) {
	$errors    = array();
	$permitted = array('jpg', 'png', 'gif');
	$info      = pathinfo($_FILES['bestand']['name']);
	$ext       = $info['extension'];
	
	if (!in_array($ext, $permitted)){
		$errors[] = 'Uw bestand heeft geen toegestaan bestandstype.';
	}
	
	if ($_FILES['bestand']['size'] > 2097152){
		$errors[] = 'Uw bestand is te groot.';
	}
	
	if (count($errors) > 0){
		return $errors;
	} else {
		$filename = $_FILES['bestand']['tmp_name'];
		$file = fopen($filename, 'r');
		$content = fread($file, filesize($filename));
		fclose($file);

		$thumbnail = generate_thumbnail($content);
		
		$content = addslashes($content);
		$thumbnail = addslashes($thumbnail);
		$query = "UPDATE users SET avatar='$content' WHERE id='$id'";
		
		mysqli_query($db, $query);
	}
}

function register_user($db, $user, $pass, $file ){
	$errors    = array();
	$permitted = array('jpg', 'png', 'gif');
	$info      = pathinfo($_FILES['bestand']['name']);
	$ext       = $info['extension'];
	$salt = '$2y$10$'.generate_salt(22).'$';
	$pass = crypt($pass, $salt);

	if (!in_array($ext, $permitted)){
		$errors[] = 'Uw bestand heeft geen toegestaan bestandstype.';
	}
	
	if ($_FILES['bestand']['size'] > 2097152){
		$errors[] = 'Uw bestand is te groot.';
	}
	
	if (count($errors) > 0){
		return $errors;
	} else {
		$filename = $_FILES['bestand']['tmp_name'];
		$file = fopen($filename, 'r');
		$content = fread($file, filesize($filename));
		fclose($file);

		$thumbnail = generate_thumbnail($content);
		
		$content = addslashes($content);
		$thumbnail = addslashes($thumbnail);
		
		$query = "
			INSERT INTO users (username, password, avatar)
			VALUES ('$user','$pass','$content')
		";
		mysqli_query($db, $query);
		return ['Uw bestand is succesvol ge&uuml;pload'];
	}
}

function generate_thumbnail($data) {
	$source = imagecreatefromstring($data);

	$width = imagesx($source);
	$height = imagesy($source);
	
	$newheight = 120;
	$ratio = $newheight / $height;
	$newwidth = round($width * $ratio);
	
	$thumb = imagecreatetruecolor($newwidth, $newheight);
	
	imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	
	ob_start();
	imagejpeg($thumb, NULL, 50);
	$image = ob_get_contents();
	ob_end_clean();
	
	return $image;
}

	function getFiles($db, $userId) {
		$query = "SELECT * FROM users WHERE id = '$userId'";
		$result = mysqli_query($db, $query);
		$rows = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;			
		}
		return $rows;
	}
	
	function showFiles($files) {
		$html = '';
		foreach ($files as $file) {
			$url = 'data:image/jpeg;base64,'.base64_encode($file['avatar']);
			
			$html .= "<figure>";
			$html .= "<img src=\"$url\">";
			$html .= "</figure>";
		}
		return $html;
	}

?>