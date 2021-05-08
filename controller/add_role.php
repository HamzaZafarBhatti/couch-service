<?php

session_start();
if (isset($_SESSION['userid'])) {


	require '../admin/config.php';
	require '../admin/functions.php';
	require '../admin/connect_db.php';

	$errors = '';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);

		$errors = '';

		$sql = "INSERT INTO roles (name) VALUES ('$name')";
		$result = $connection->query($sql);

		if ($result !== false) {
			$status = 'success';
			$errors .= 'Role is created';
		} else {
			$status = 'danger';
			$errors .= $connection->error;
		}

		header('Location:' . $_SERVER['HTTP_REFERER']);
	}
} else {
	header('Location: ' . SITE_URL . '/controller/login.php');
}
