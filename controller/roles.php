<?php

session_start();
if (isset($_SESSION['username'])) {

	require '../admin/config.php';
	require '../admin/functions.php';
	require '../admin/connect_db.php';

	$errors = '';

	$roles = get_all_roles($connection);
	if (empty($roles)) {
		$errors .= '<div style="padding: 0px 15px;">No data found</div>';
	}

	$title_page = 'Roles';

	require '../views/header.view.php';
	require '../views/navbar.view.php';
	require '../views/roles.view.php';
	require '../views/footer.view.php';
} else {
	header('Location: ' . SITE_URL . '/controller/login.php');
}
