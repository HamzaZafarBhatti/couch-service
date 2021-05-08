<?php
session_start();

if (isset($_SESSION['userid'])) {
    require '../admin/config.php';
    require '../admin/functions.php';
    require '../admin/connect_db.php';

    $errors = '';

    $couch_id = $_POST['id'];
    $date_from = date('Y-m-d H:i:s', strtotime($_POST['date_from']));
    $date_to = date('Y-m-d H:i:s', strtotime($_POST['date_to']));
    $user_id = $_SESSION['userid'];


    $sql = "INSERT INTO bookings (couch_id, user_id, date_from, date_to) VALUES ('$couch_id', '$user_id', '$date_from', '$date_to')";
    $result = $connection->query($sql);

    if ($result !== false) {
    } else {
        $errors .= $connection->error;
    }
    header('Location: ' . SITE_URL . '/controller/couch_list.php');


    //   echo json_encode($_POST);
    //   die();

} else {
    header('Location: ' . SITE_URL . '/controller/login.php');
}
