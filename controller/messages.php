<?php
session_start();

if(isset($_SESSION['userid']))
{
  require '../admin/config.php';
  require '../admin/functions.php';
  require '../admin/connect_db.php';

  $errors = '';

  $users = get_hosts_and_travellers($connection);

  // echo json_encode($users);
  // die();


  

	$title_page = 'Messages';

	require '../views/header.view.php';
	require '../views/navbar.view.php';
	require '../views/messages.view.php';
	require '../views/footer.view.php';

} else {
	header('Location: ' . SITE_URL . '/controller/login.php');
}

?>