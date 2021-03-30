<?php 
include '../core/init.php';

if (!User::checkLogIn())
        header('location: ../login.php');

$show_id = $_GET['s_id'];
$user_id = $_SESSION['user_id'];

Seats::cancleTicket($show_id , $user_id);


header('location: ../profile.php')  ;