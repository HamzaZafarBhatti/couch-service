<?php




session_start();

require '../admin/config.php';
require '../admin/functions.php';
require '../admin/connect_db.php';

if (isset($_SESSION['username'])) {

	header('Location: ' . SITE_URL . '/controller/home.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = filter_var(strtolower($_POST['email']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];

	$errors = '';

	$user = get_user_by_email($connection, $email);

	if ($user !== false && password_verify($password, $user['password'])) {
		$_SESSION['username'] = $user['username'];
		$_SESSION['userid'] = $user['id'];
		$_SESSION['useremail'] = $user['email'];
		header('Location: ' . SITE_URL . '/controller/home.php');
	} else {
		$errors .= 'Incorrect login data';
	}
}


$title_page = 'Sign In';
require '../views/header.view.php';
require '../views/login.view.php';
require '../views/footer.view.php';
