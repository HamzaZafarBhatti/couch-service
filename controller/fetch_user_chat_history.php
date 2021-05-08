<?php

session_start();

require '../admin/config.php';
require '../admin/functions.php';
require '../admin/connect_db.php';

echo fetch_user_chat_history($connection, $_SESSION['userid'], $_POST['to_user_id']);

?>