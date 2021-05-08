<?php

session_start();
if (isset($_SESSION['userid'])) {


	require '../admin/config.php';
	require '../admin/functions.php';
	require '../admin/connect_db.php';

	$errors = '';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		// echo json_encode($_POST);
		// echo json_encode($_FILES);
		// die();


		$is_available = filter_var($_POST['is_available'], FILTER_SANITIZE_STRING);
		$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
		$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
		$country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
		$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
		$user_id = $_SESSION['userid'];

		$errors = '';
		$sql = "INSERT INTO couches (is_available, address, city, country, description, user_id) VALUES ('$is_available', '$address', '$city', '$country', '$description', '$user_id')";
		$result = $connection->query($sql);

		if ($result !== false) {
			$couch_id = $connection->insert_id;

			foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
				if($_FILES["images"]["tmp_name"][$key] !== ''){
					$file_name = $_FILES["images"]["name"][$key];
					$file_tmp = $_FILES["images"]["tmp_name"][$key];
					$ext = pathinfo($file_name, PATHINFO_EXTENSION);
					if (!file_exists("../" . $items_config['images_folder'] . $file_name)) {
						$filename = $file_name;
						move_uploaded_file($file_tmp = $_FILES["images"]["tmp_name"][$key], "../" . $items_config['images_folder'] . $filename);
					} else {
						$filename = basename($file_name, $ext) . time() . "." . $ext;
						move_uploaded_file($file_tmp = $_FILES["images"]["tmp_name"][$key], "../" . $items_config['images_folder'] . $filename);
					}
					$sql = "INSERT INTO couch_images (couch_id, image) VALUES ('$couch_id', '$filename')";
					$result = $connection->query($sql);
					if ($result == false) {
						$errors .= $connection->error;
					}
				}
			}
			header('Location: ' . SITE_URL . '/controller/couches.php');
		} else {
			$errors .= $connection->error;
		}
	}

	$title_page = 'Add Couch';

	require '../views/header.view.php';
	require '../views/navbar.view.php';
	require '../views/add_couch.view.php';
	require '../views/footer.view.php';
} else {
	header('Location: ' . SITE_URL . '/controller/login.php');
}
