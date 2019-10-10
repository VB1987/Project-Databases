<?php

$menu = [
		['text' => 'Home', 'url' => 'index.php', 'target' => '_self'],
		['text' => 'Contact', 'url' => 'contact.php', 'target' => '_self'],
		['text' => 'Nieuws', 'url' => 'nieuws.php', 'target' => '_self'],
		['text' => 'Numbers', 'url' => 'numbers.php', 'target' => '_self'],
		['text' => 'Login', 'url' => 'login.php', 'target' => '_self'],
	];

echo '<ul>';
echo makeMenu ($menu);
echo '</ul>';


?>