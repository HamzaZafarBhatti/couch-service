<?php
session_start();

require '../admin/config.php';
require '../admin/functions.php';
require '../admin/connect_db.php';

$status = 1;
$to_user_id = $_POST['to_user_id'];
$from_user_id = $_SESSION['userid'];
$message = $_POST['message'];

// echo json_encode($_POST);
// die();

$sql = "INSERT INTO messages (to_user_id, from_user_id, message, status) VALUES ('$to_user_id', '$from_user_id','$message', '$status')";
$result = $connection->query($sql);

if($result != false)
{
 echo fetch_user_chat_history($connection, $_SESSION['userid'], $_POST['to_user_id']);
}
