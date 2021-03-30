<?php 
include '../core/init.php';

if (!User::checkLogIn())
        header('location: ../login.php');

$category_id = $_GET['c_id'];
$user_id = $_SESSION['user_id'];
$data = [
    'category_id' => $category_id ,
    'user_id' => $user_id 
];
Category::create('category_user' , $data);

header('location: ../profile.php')  ;



