<?php

session_start();
if (isset($_SESSION['username'])) {

	require '../admin/config.php';
	require '../admin/functions.php';
	require '../admin/connect_db.php';

	$errors = '';

	$users = get_all_users($connection);
	if (empty($users)) {
		$errors .= '<div style="padding: 0px 15px;">No data found</div>';
	}

	$title_page = 'Couch Surfing';
	// $users_total = number_users($connection);
	// echo json_encode($users);
	// die();

	require '../views/header.view.php';
	require '../views/navbar.view.php';
	require '../views/couch.view.php';
	require '../views/footer.view.php';
} else {
	header('Location: ' . SITE_URL . '/controller/login.php');
}
