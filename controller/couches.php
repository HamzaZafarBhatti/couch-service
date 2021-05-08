<?php

session_start();
if (isset($_SESSION['userid'])) {

	require '../admin/config.php';
	require '../admin/functions.php';
	require '../admin/connect_db.php';

	$errors = '';

	$couches = get_all_couch($connection);

	if ($couches) {
		$errors .= $connection->error;
	}

	$title_page = 'Couches';
	// $users_total = number_users($connection);
	// echo json_encode($users);
	// die();

	require '../views/header.view.php';
	require '../views/navbar.view.php';
	require '../views/couches.view.php';
	require '../views/footer.view.php';
} else {
	header('Location: ' . SITE_URL . '/controller/login.php');
}
