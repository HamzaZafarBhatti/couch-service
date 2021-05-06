<?php

session_start();
if (isset($_SESSION['username'])) {


    require '../admin/config.php';
    require '../admin/functions.php';
    require '../admin/connect_db.php';

    $errors = '';

	$id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

    $result = delete_role($connection, $id);

	if ($result !== false) {
		$status = 'secondary';
		$errors .= 'Role is deleted';
	} else {
		$status = 'danger';
		$errors .= $connection->error;
	}
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: ' . SITE_URL . '/controller/login.php');
}
