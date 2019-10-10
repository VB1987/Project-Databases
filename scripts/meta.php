<?php

echo "
	<title>".get_setting($db, 'title')."</title>
	<link rel="."icon"." href="."images/favicon.ico"." type="."image/ico"." sizes="."16x16".">
	<link type="."text/css"." rel="."stylesheet"." href=".get_setting($db, 'style').">
	<meta name="."viewport"." content="."width=device-width, initial-scale=1.0".">
	<meta charset=".get_setting($db, 'meta charset').">
	<meta name="."keywords"." content=".get_setting($db, 'meta keywords').">
	<meta name="."description"." content=".get_setting($db, 'meta description').">
	<meta name="."author"." content=".get_setting($db, 'meta author').">
	<meta name="."copyright"." content=".get_setting($db, 'meta copyright`').">
";

?>