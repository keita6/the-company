<?php
session_start();
include "../classes/user.php";
var_dump($_FILES);
$user_id = $_SESSION['user_id'];
$photo_name = $_FILES['photo']['name'];
$photo_tmp = $_FILES['photo']['tmp_name'];

$user = new User;

$user->uploadPhoto($user_id, $photo_name, $photo_tmp);



?>