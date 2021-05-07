<?php

session_start();
if (isset($_SESSION['username'])) {


    require '../admin/config.php';
    require '../admin/functions.php';
    require '../admin/connect_db.php';

    $errors = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
	$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
	$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
	$state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
	$country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$status = 1;


	$errors = ''
    $id = $_POST['id'];
    $sql = "UPDATE users SET username='$username' WHERE id='$id'";
    //$sql= "INSERT INTO users (username, email, address, phone, city, state, country, password ,status) VALUES ('$username', '$email', '$address' , '$phone', '$city', '$state', '$country', '$password', '$status')";
    $result = $connection->query($sql);

	// echo json_encode($result);
	// die();

	if ($result !== false) {
		header('Location: ' . SITE_URL . '/controller/users.php');
	} else {
		$errors .= $connection->error;
	}
    }

    $title_page = 'Edit User';

    $user_id = $_GET['id'];
    $user = get_user_by_id($connection, $user_id);

    // echo json_encode($user);
    // die();

    require '../views/header.view.php';
    require '../views/navbar.view.php';
    require '../views/edit_user.view.php';
    require '../views/footer.view.php';
} else {
    header('Location: ' . SITE_URL . '/controller/login.php');
}
