<?php
date_default_timezone_set(get_setting($db, 'timezone'));
echo "<p>"."&copy; ".get_setting($db, 'meta copyright')." ".$_SERVER['REMOTE_ADDR']." ".date('Y')."</p>";


?>