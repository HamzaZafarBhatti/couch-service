<?php
session_start();

require '../admin/config.php';
require '../admin/functions.php';
require '../admin/connect_db.php';

$users = get_hosts_and_travellers($connection);

// $result = $statement->fetchAll();

$output = '
<table class="table table-striped table-bordered" cellspacing="0" width="100%" style="border-radius: 5px;">
<thead>
 <tr>
  <td>Name</td>
  <td>Username</td>
  <td>Status</td>
  <td>Action</td>
 </tr>
</thead>
<tfoot>
 <tr>
  <td>Name</td>
  <td>Username</td>
  <td>Status</td>
  <td>Action</td>
 </tr>
</tfoot>
<tbody>
';

foreach ($users as $user) {
    if ($user['is_online']) {
        $status = '<span class="badge badge-success">Online</span>';
    } else {
        $status = '<span class="badge badge-danger">Offline</span>';
    }
    $output .= '
 <tr>
  <td>' . $user['name'] . '</td>
  <td>' . $user['username'] . '</td>
  <td>' . $status . '</td>
  <td><button type="button" class="btn btn-dark btn-small start_chat" data-touserid="' . $user['id'] . '" data-toname="' . $user['name'] . '" data-tousername="' . $user['username'] . '"><i class="fa fa-comment"></i> Message</button></td>
 </tr>
 ';
}

$output .= '</tbody></table>';

echo $output;
