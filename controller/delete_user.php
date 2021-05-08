<?php

session_start();
if (isset($_SESSION['userid'])) {


    require '../admin/config.php';
    require '../admin/functions.php';
    require '../admin/connect_db.php';

    $errors = '';

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {


	$errors = '';
    $id = $_GET['id'];
    
    $result = delete_user($connection, $id);

	if ($result !== false) {
		header('Location: ' . SITE_URL . '/controller/users.php');
	} else {
		$errors .= $connection->error;
	}
    }
} else {
    header('Location: ' . SITE_URL . '/controller/login.php');
}
