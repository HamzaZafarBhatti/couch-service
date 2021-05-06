<?php

/*--------------------*/
// App Name: GoFit
// Author: Wicombit
// Author Profile: https://codecanyon.net/user/wicombit/portfolio
/*--------------------*/

// function connect($database){
//     try{
//         $connect = new PDO('mysql:host='. $database['host'] .';dbname='. $database['db'], $database['user'], $database['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
//         return $connect;

//     }catch (PDOException $e){
//         return false;
//     }
// }

function cleardata($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function actual_page()
{

    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

function number_pages($items_per_page, $connect)
{

    $total_places = $connect->prepare('SELECT FOUND_ROWS() AS total');
    $total_places->execute();
    $total_places = $total_places->fetch()['total'];

    $number_pages = ceil($total_places / $items_per_page);
    return $number_pages;
}

/////////////////////////////////////////////////////////////////////////////////// USERS

function get_all_users($connect)
{
    $sql = "SELECT * FROM users";
    $result = mysqli_query($connect, $sql);
    return $result ?? false;
}

function number_users($connect)
{
    $sql = 'SELECT * FROM users';
    $result = mysqli_query($connect, $sql);
    $total = mysqli_num_rows($result);
    return $total;
}

function id_user($id_user)
{
    return (int)cleardata($id_user);
}

function get_user_per_id($connect, $id_user)
{
    $sentence = $connect->query("SELECT * FROM users WHERE id = $id_user");
    $sentence = $sentence->fetch();
    return ($sentence) ? $sentence : false;
}

function get_user_by_email($connect, $email)
{
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connect, $sql);
    $user = mysqli_fetch_assoc($result);
    return $user ?? false;
}


/////////////////////////////////////////////////////////////////////////////////// ROLES

function get_all_roles($connect)
{
    $sql = "SELECT * FROM roles";
    $result = mysqli_query($connect, $sql);
    return $result ?? false;
}
function get_role_by_id($connect, $id)
{
    $sql = "SELECT * FROM roles WHERE id = $id";
    $result = mysqli_query($connect, $sql);
    return $result ? mysqli_fetch_assoc($result) : false;
}

function delete_role($connect, $id)
{
    $sql = "DELETE FROM roles WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);
    return $result ?? false;
}

function number_roles($connect)
{
    $sql = 'SELECT * FROM roles';
    $result = mysqli_query($connect, $sql);
    // $total = mysqli_num_rows($result);
    return $result ? mysqli_num_rows($result) : false;
}

/////////////////////////////////////////////////////////////////////////////////// CATEGORIES

function get_all_categories($connect)
{

    $sentence = $connect->prepare("SELECT * FROM categories ORDER BY category_id DESC");
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_category($id_category)
{
    return (int)cleardata($id_category);
}

function get_category_per_id($connect, $id_category)
{
    $sentence = $connect->query("SELECT * FROM categories WHERE category_id = $id_category LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_categories($connect)
{

    // $sql = 'SELECT * FROM users';
    // $total_numbers = $connect->query($sql);
    // echo json_encode($total_numbers);
    // die();
    // $total = count($total_numbers);
    // return $total;

}