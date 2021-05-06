<?php



/* URL PROJECT */

define ('SITE_URL', 'http://localhost/PHP/couch-service');

/* DATABASE CONFIGURATION */

$database = array(
'host' => 'localhost',
'db' => 'couch_service',
'user' => 'root',
'pass' => ''
);

$email_config = array(
'email_address' => 'hamza0952454@gmail.com',
'email_name' => 'Hamza Bhatti',
'email_password' => '2777a16b9398ac',
'email_subject' => 'Password Reset Code',
'email_username' => '28f97a1a718e43',
'smtp_host' => 'smtp.mailtrap.io',
'smtp_port' => '2525',
'smtp_encrypt' => 'tls'
);

$items_config = array(
    
    'items_per_page' => '8',
    'images_folder' => 'images/'
);


?>