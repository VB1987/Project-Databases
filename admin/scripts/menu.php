<?php

$menu = [
		['text' => 'Algemeen', 'url' => 'index.php', 'target' => '_self'],
		['text' => 'Styles', 'url' => 'styles.php', 'target' => '_self'],
		['text' => 'Users', 'url' => 'users.php', 'target' => '_self'],
		['text' => 'Login', 'url' => 'login.php', 'target' => '_self'],
		['text' => 'Uitloggen', 'url' => 'templates/logoutform.php', 'target' => '_self']
	];

echo '<ul>';
echo makeMenu ($menu);
echo '</ul>';


?>