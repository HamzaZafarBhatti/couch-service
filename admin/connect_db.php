<?php


$connection = mysqli_connect($database['host'], $database['user'], $database['pass'], $database['db']);

if (!$connection) {
	header('Location: ' . SITE_URL . '/controller/error.php');
}

?>