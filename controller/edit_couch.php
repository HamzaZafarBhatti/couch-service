<?php

session_start();
if (isset($_SESSION['userid'])) {


	require '../admin/config.php';
	require '../admin/functions.php';
	require '../admin/connect_db.php';

	$errors = '';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$id = $_POST['id'];
		$couch_images = get_couch_images($connection, $id);
		foreach ($couch_images as $couch) {
			if (file_exists("../" . $items_config['images_folder'] . $couch['image'])) {
				unlink("../" . $items_config['images_folder'] . $couch['image']);
			}
			$result = delete_couch_image($connection, $couch['id']);
		}
		$is_available = filter_var($_POST['is_available'], FILTER_SANITIZE_STRING);
		$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
		$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
		$country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
		$description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

		$sql = "UPDATE couches SET is_available='$is_available', address='$address', city='$city', country='$country', description='$description' WHERE id='$id'";
		$result = $connection->query($sql);

		if ($result !== false) {
			if ($_FILES) {
				foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
					if ($_FILES["images"]["tmp_name"][$key] !== '') {
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
						$sql = "INSERT INTO couch_images (couch_id, image) VALUES ('$id', '$filename')";
						$result = $connection->query($sql);
						if ($result == false) {
							$errors .= $connection->error;
						}
					}
				}
			}
			header('Location: ' . SITE_URL . '/controller/couches.php');
		} else {
			$errors .= $connection->error;
		}
	}

	$title_page = 'Update Couch';

	$couch_id = $_GET['id'];
	$couch = get_couch_by_id($connection, $couch_id);
	// $couch_images = get_couch_images($connection, $couch_id);

	require '../views/header.view.php';
	require '../views/navbar.view.php';
	require '../views/edit_couch.view.php';
	require '../views/footer.view.php';
} else {
	header('Location: ' . SITE_URL . '/controller/login.php');
}
