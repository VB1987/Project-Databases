<?php
session_start();

require_once('scripts/functions.php');
include_once('scripts/settings.php');

$db = makeConnection();
$numbers = makeArray();
	
writeLog($numbers);

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
			<div id="numbers">
				<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
				<fieldset>
					<img src="images/pen.jpg" onclick="writeLog()" style="height: 35px;">
				</fieldset>
				</form>
			</div>
			</content>
			<footer>
				<?php include('scripts/footer.php') ?>
			</footer>
		</div>
	</body>
</html>