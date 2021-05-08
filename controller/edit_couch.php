<?php

session_start();
if (isset($_SESSION['userid'])) {


    require '../admin/config.php';
    require '../admin/functions.php';
    require '../admin/connect_db.php';

    $errors = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//$user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_STRING);
	//$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	//$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
	$is_available = filter_var($_POST['is_available'], FILTER_SANITIZE_STRING);
	$from_date = filter_var($_POST['from_date'], FILTER_SANITIZE_STRING);
	$to_date = filter_var($_POST['to_date'], FILTER_SANITIZE_STRING);
	$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
	$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
	$country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
	$couch_img = filter_var($_POST['couch_img'], FILTER_SANITIZE_STRING);
	$wish_list = filter_var($_POST['wish_list'], FILTER_SANITIZE_STRING);

	$errors = '';
	//echo json_encode($_POST);
	//die();
    $id = $_POST['id'];
    $sql = "UPDATE couch SET is_available='$is_available' WHERE id='$id'";
    $result = $connection->query($sql);

	echo json_encode($result);
	die();

	if ($result !== false) {
		header('Location: ' . SITE_URL . '/controller/couch.php');
	} else {
		$errors .= $connection->error;
	}
    }

    $title_page = 'Couch Updation';

    $user_id = $_GET['id'];
    $user = get_couch_by_id($connection, $user_id);


    require '../views/header.view.php';
    require '../views/navbar.view.php';
    require '../views/edit_couch.view.php';
    require '../views/footer.view.php';
} else {
    header('Location: ' . SITE_URL . '/controller/login.php');
}
