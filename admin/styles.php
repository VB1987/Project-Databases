<?php
	session_start();
	require_once'../scripts/functions.php';
	include_once'../scripts/settings.php';
	
	if (!isAuthenticated()) {
		header('Location: ../index.php');
	}
	
	$db = makeConnection();
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$post = [
			['setting' => 'background', 'value' => $_POST['background']],
			['setting' => 'font', 'value' => $_POST['font']],
			['setting' => 'fontSize', 'value' => $_POST['fontSize']],
			['setting' => 'color', 'value' => $_POST['color']],
			['setting' => 'paddingLeft', 'value' => $_POST['paddingLeft']],
			['setting' => 'paddingRight', 'value' => $_POST['paddingRight']],
			['setting' => 'shadow', 'value' => $_POST['shadow']],
			['setting' => 'footerHeight', 'value' => $_POST['height']],
			['setting' => 'menuBackground', 'value' => $_POST['menuBackground']],
			['setting' => 'menuListType', 'value' => $_POST['menuListType']],
			
		];
		mysqli_real_escape_string($db, set_style_array($db, $post));
	}
	
	
?><!DOCTYPE html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="../css/adminStyle.css">
		<title><?=get_setting($db, 'title');?></title>
		<style>
			body {
				background-color: <?=get_style($db, 'background')?>;
				
			}
			menu {
				background-color: <?=get_style($db, 'menuBackground')?>;
			}
			menu ul {
				list-style-type: <?=get_style($db, 'menuListType')?>;
			}
			content {
				font-family: <?=get_style($db, 'font')?>;
				font-size: <?=get_style($db, 'fontSize')?>;
				color: <?=get_style($db, 'color')?>;
				padding-left: <?=get_style($db, 'paddingLeft')?>;
				padding-right: <?=get_style($db, 'paddingRight')?>;
			}
			footer {
				height: <?=get_style($db, 'footerHeigth')?>;
			}
			footer p {
				text-shadow: <?=get_style($db, 'shadow')?>;
			}
		</style>
	</head>
	<body>
		<div id="container">
			<header>
				<h2>Admin styles</h2>
				<?php
					$uploads = getFiles($db, $_SESSION['userid']);
					echo showFiles($uploads);
				?>
			</header>
			<menu>
				<?php include'scripts/menu.php'; ?>
			</menu>
			<content>
				<form class="settings" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
					<fieldset>
						<legend>Body style</legend>
						<label>Achtergrondkleur: <input type="text" name="background" value="<?=get_style($db, 'background');?>"></label>
					</fieldset>
					<fieldset>
						<legend>Menu style</legend>
						<label>Achtergrondkleur: <input type="text" name="menuBackground" value="<?=get_style($db, 'menuBackground');?>"></label>
						<label>List type: <input type="text" name="menuListType" value="<?=get_style($db, 'menuListType');?>"></label>
					</fieldset>
					<fieldset>
						<legend>Content style</legend>
						<label>Lettertype: <input type="text" name="font" value="<?=get_style($db, 'font');?>"></label>
						<label>Lettertype grootte: <input type="text" name="fontSize" value="<?=get_style($db, 'fontSize');?>"></label>
						<label>Lettertype kleur: <input type="text" name="color" value="<?=get_style($db, 'color');?>"></label>
						<label>Padding links: <input type="text" name="paddingLeft" value="<?=get_style($db, 'PaddingLeft');?>"></label>
						<label>Padding rechts: <input type="text" name="paddingRight" value="<?=get_style($db, 'paddingRight');?>"></label>
					</fieldset>
					<fieldset>
						<legend>Footer style</legend>
						<label>Schaduw: <input type="text" name="shadow" value="<?=get_style($db, 'shadow');?>"></label>
						<label>Height: <input type="text" name="height" value="<?=get_style($db, 'footerHeight');?>"></label>
					</fieldset>
					
						<input type="submit" id="submit" value="Versturen">
				</form>
			</content>
			<footer>
				<?php include'../scripts/footer.php'?>
			</footer>
		</div>
	</body>
</html>