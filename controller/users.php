<?php

session_start();
if (isset($_SESSION['username'])) {

	require '../admin/config.php';
	require '../admin/functions.php';
	require '../admin/connect_db.php';

	$errors = '';

	$users = get_all_users($connection);
	if ($users == false) {
		$errors .= $connection->error;
	}

	$title_page = 'Users';
	// $users_total = number_users($connection);
	// echo json_encode($users);
	// die();

	require '../views/header.view.php';
	require '../views/navbar.view.php';
	require '../views/users.view.php';
	require '../views/footer.view.php';
} else {
	header('Location: ' . SITE_URL . '/controller/login.php');
}
