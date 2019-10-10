<?php

header('Location: ../index.php');

require_once('../../scripts/functions.php');

$db = makeConnection();

delete_user ($db, $_GET['id']);

?>