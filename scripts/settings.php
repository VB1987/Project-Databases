<?php
require_once'functions.php';
define("NAAM", "V.M. Braamburg", true);

$db = makeConnection();

$talen = [
		'nl' => ['Welcome' => 'Welkom op deze site ', 'image' => 'nl'],
		'en' => ['Welcome' => 'Welcome to this site ', 'image' => 'gb'],
		'de' => ['Welcome' => 'Willkommen auf dieser Seite ', 'image' => 'de'],
		'fr' => ['Welcome' => 'Bienvenue sur ce site ', 'image' => 'fr'],
	];

if (isset($_GET['lang'])){
		$taal = $_GET['lang'];
		if (isset($talen[$taal])) {
		setcookie ('lang', $taal, time()+get_setting($db, 'cookieTime'));
		}
	} else {
		$taal = 'nl';
	}

if(isset($_COOKIE['lang'])) {
	$taal = $_COOKIE['lang'];
}

?>