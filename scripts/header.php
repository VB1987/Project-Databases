<?php

echo '<h1>'.get_setting($db, 'header').'</h1>';
echo '<span class="admin"><a href="admin/index.php" target="_self">Admin</a></span>';
echo '<span><a href="index.php" target="_self">'.NAAM.' </a></span>';

foreach($talen as $key => $value) {
	echo '<a href="index.php?lang='.$key.'">';
	echo '<img src="images/'.$value['image'].'.png">';
	echo '</a>';
}

echo '<div><h2>'.$talen[$taal]['Welcome'].$_SESSION['naam'].'!</h2></div>';



?>