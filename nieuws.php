<?php
session_start();

require_once('scripts/functions.php');
include_once('scripts/settings.php');
$db = makeConnection();

$xml = simplexml_load_file('xml/news.xml');

$lang = $xml['lang'];

$dag = date('D');
$backgroundColor = 'blue';

switch ($dag) {
	case 'Mon':
		$backgroundColor = 'tomato';
		break;
	case 'Tue':
		$backgroundColor = 'orange';
		break;
	case 'Wed':
		$backgroundColor = 'dodgerblue';
		break;
	case 'Thu':
		$backgroundColor = 'mediumseagreen';
		break;
	case 'Fri':
		$backgroundColor = 'gray';
		break;
	case 'Sat':
		$backgroundColor = 'slateblue';
		break;
	case 'Sun':
		$backgroundColor = 'violet';
		break;
}

?><!DOCTYPE html>
<html lang="<?=$taal ?>">
	<head>
		<?php include('scripts/meta.php') ?>
	</head>
	<body>
		<div id="container">
			<header>
				<?php include('scripts/header.php') ?>
				<style>
			#container content {
				background-color: <?php echo $backgroundColor; ?>;
			}
			</style>
			</header>
			<menu>
				<?php include('scripts/menu.php') ?>
			</menu>
			<content>
				<div class="artikel">
					<article>
					<?php
					echo $lang[0];
					
					echo '<h3>'.$xml->article[0]->title.'</h3>';
					echo '<p>'.$xml->article[0]->pubdate.'</p>';
					echo '<p>'.$xml->article[0]->body.'</p>';
					
					?>
					</article>
					<article>
					<?php
					echo $lang[1];
					
					echo '<h3>'.$xml->article[1]->title.'</h3>';
					echo '<p>'.$xml->article[1]->pubdate.'</p>';
					echo '<p>'.$xml->article[1]->body.'</p>';
					
					?>
					</article>
					<article>
					<?php
					echo $lang[2];
					
					echo '<h3>'.$xml->article[2]->title.'</h3>';
					echo '<p>'.$xml->article[2]->pubdate.'</p>';
					echo '<p>'.$xml->article[2]->body.'</p>';
					echo date('D');
					?>
					</article>
				</div>
			</content>
			<footer>
				<?php include('scripts/footer.php') ?>
			</footer>
		</div>
	</body>
</html>