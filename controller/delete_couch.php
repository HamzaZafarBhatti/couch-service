<?php

session_start();
if (isset($_SESSION['username'])) {


    require '../admin/config.php';
    require '../admin/functions.php';
    require '../admin/connect_db.php';

    $errors = '';

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {


	$errors = '';
    //echo json_encode($_GET);
    //die();
    $id = $_GET['id'];
    
    $result = delete_couch($connection, $id);

	if ($result !== false) {
		header('Location: ' . SITE_URL . '/controller/couch.php');
	} else {
		$errors .= $connection->error;
	}
    }
} else {
    header('Location: ' . SITE_URL . '/controller/login.php');
}
