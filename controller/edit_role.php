<?php

session_start();
if (isset($_SESSION['userid'])) {


	require '../admin/config.php';
	require '../admin/functions.php';
	require '../admin/connect_db.php';

	$errors = '';
	
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

	$sql = "UPDATE roles SET name = '$name' WHERE id = '$id'";
    $result = $connection->query($sql);

	if ($result !== false) {
		$status = 'success';
		$errors .= 'Role is edited';
	} else {
		$status = 'danger';
		$errors .= $connection->error;
	}

	header('Location:' . $_SERVER['HTTP_REFERER']);

} else {
	header('Location: ' . SITE_URL . '/controller/login.php');
}
