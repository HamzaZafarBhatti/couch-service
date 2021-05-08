<?php

session_start();
if (isset($_SESSION['userid'])) {


    require '../admin/config.php';
    require '../admin/functions.php';
    require '../admin/connect_db.php';

    $errors = '';

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $errors = '';
        // echo json_encode($_GET);
        // die();
        $id = $_GET['id'];

		$couch_images = get_couch_images($connection, $id);
		foreach ($couch_images as $couch) {
			if (file_exists("../" . $items_config['images_folder'] . $couch['image'])) {
				unlink("../" . $items_config['images_folder'] . $couch['image']);
			}
			delete_couch_image($connection, $couch['id']);
		}

        $result = delete_couch($connection, $id);

        if ($result !== false) {
            header('Location: ' . SITE_URL . '/controller/couches.php');
        } else {
            $errors .= $connection->error;
        }
    }
} else {
    header('Location: ' . SITE_URL . '/controller/login.php');
}
