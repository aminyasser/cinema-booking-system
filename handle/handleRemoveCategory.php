<?php 
include '../core/init.php';

if (!User::checkLogIn())
        header('location: ../login.php');

$category_id = $_GET['c_id'];
$user_id = $_SESSION['user_id'];

Category::deleteCategory($category_id , $user_id);


header('location: ../profile.php')  ;
