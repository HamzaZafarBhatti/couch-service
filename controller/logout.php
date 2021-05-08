<?php

require '../admin/config.php';
require '../admin/connect_db.php';


session_start();

$id = $_SESSION['userid'];
$sql = "UPDATE users SET is_online = 0 WHERE id = '$id'";
$result = $connection->query($sql);

session_destroy();
$_SESSION = array ();

header('Location: ' . SITE_URL . '/controller/login.php');


?>