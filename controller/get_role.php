<?php

session_start();
if (isset($_SESSION['userid'])) {


    require '../admin/config.php';
    require '../admin/functions.php';
    require '../admin/connect_db.php';

    $errors = '';
    
    $role = get_role_by_id($connection, $_POST['id']);
    echo json_encode($role);

} else {
    header('Location: ' . SITE_URL . '/controller/login.php');
}
