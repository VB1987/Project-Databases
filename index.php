<?php
session_start();

require_once('scripts/functions.php');
include_once('scripts/settings.php');

$db = makeConnection();

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
			<div class="index">
				<p><?=get_setting($db, 'paragraph')?></p>
				
				<img src="images/provincies-nederland.png" id="provincies" alt="Provincies Nederland" usemap="#provincies">
				
				<map name="provincies">
					<div class="tooltip"><area shape="poly" coords="465,755,410,750,400,730,430,650,340,630,450,590,430,540,465,540,435,490,450,490,495,550,500,595,470,635,480,656,445,690,480,720,465,755" alt="Limburg" href="https://nl.wikipedia.org/wiki/Limburg_(Nederland)" target="_prov"><span class="tooltiptext">Limburg</span></div>
					<div class="tooltip"><area shape="poly" coords="360,480,430,490,465,540,430,540,445,590,390,630,270,580,170,590,160,520,230,475,335,500,360,480" alt="Noord-Brabant" href="https://nl.wikipedia.org/wiki/Noord-Brabant" target="_prov"><span class="tooltiptext">Noord-Brabant</span></div>
					<div class="tooltip"><area shape="poly" coords="430,290,590,430,450,490,295,480,320,435,390,440,360,360,430,290" alt="Gelderland" href="https://nl.wikipedia.org/wiki/Gelderland" target="_prov"><span class="tooltiptext">Gelderland</span></div>
				</map>
			</div>
			</content>
			<footer>
				<?php include('scripts/footer.php') ?>
			</footer>
		</div>
	</body>
</html>