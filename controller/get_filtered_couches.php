<?php
session_start();

if (isset($_SESSION['userid'])) {
    require '../admin/config.php';
    require '../admin/functions.php';
    require '../admin/connect_db.php';

    $errors = '';

    //   if()

    // echo json_encode($_POST);
    // die();

    $data['is_available'] = 1;
    if (isset($_POST['search']) && $_POST['search'] != '') {
        $data['search'] = $_POST['search'];
    }
    if (isset($_POST['city']) && $_POST['city'] != '') {
        $data['city'] = $_POST['city'];
    }
    if (isset($_POST['country']) && $_POST['country'] != '') {
        $data['country'] = $_POST['country'];
    }

    $couches = get_filtered_couches($connection, $data);
    $html = '';
    if ($couches) {
        foreach ($couches as $couch) {
            // echo json_encode($couch);
            // die();
            $couch_image = get_single_couch_image($connection, $couch['id']);
            $html .= '
            <div class="col-4">
                <div class="block">
                    <div class="block-body">
                        <h5 class="couch_list_title">' . $couch['title'] . '</h5>
                        <img class="couch_list_img" src="../images/' . $couch_image['image'] . '" alt="placeholderjpg">
                        <div class="couch_list_details">
                            <h5 class="couch_list_desc_title">Description:</h5>
                            <p>' . $couch['description'] . '</p>
                            <h5 class="couch_list_desc_title">Address:</h5>
                            <p>' . $couch['address'] . ', ' . $couch['city'] . ', ' . $couch['country'] . '</p>
                        </div>
                            <button type="submit" onclick="get_couch(this);" class="btn btn-dark btn-block" data-id="' . $couch['id'] . '" data-toggle="modal" data-target="#editModal">Book Now</button>
                    </div>
                </div>
            </div>';
        }

        // <a href="../controler/view_couch?id='.$couch['id'].'" type="button" class="btn btn-info btn-block mb-2">View Couch</a>
    } else {
        $html .= '<div style="margin-left: 15px; margin-right: 15px;">No Data Found</div>';
    }

    echo $html;
    // echo json_encode($couches);
    // die();

} else {
    header('Location: ' . SITE_URL . '/controller/login.php');
}
