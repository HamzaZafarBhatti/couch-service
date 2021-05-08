<?php




session_start();

require '../admin/config.php';
require '../admin/functions.php';
require '../admin/connect_db.php';

if (isset($_SESSION['userid'])) {
	header('Location: ' . SITE_URL . '/controller/home.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// $data = $_POST;
	$username = filter_var(strtolower($_POST['username']), FILTER_SANITIZE_STRING);
	$email = filter_var(strtolower($_POST['email']), FILTER_SANITIZE_STRING);
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$status = 1;

	$errors = '';

    $sql= "INSERT INTO users (username, email, password, status) VALUES ('$username','$email','$password','$status')";
    $result = $connection->query($sql);

	// echo json_encode($result);
	// die();

	if ($result !== false) {
		$_SESSION['userid'] = $user['id'];
		$_SESSION['useremail'] = $user['email'];
		header('Location: ' . SITE_URL . '/controller/home.php');
	} else {
		$errors .= $connection->error;
	}
}


$title_page = 'Sign Up';
require '../views/header.view.php';
require '../views/register.view.php';
require '../views/footer.view.php';
