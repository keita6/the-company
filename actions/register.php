<?php
include "../classes/user.php";
//Collct from data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$username = $_POST['username'];
$password = $_POST['password'];
$photo = 'profile.jpg';

$user = new User;

$user->createUser($first_name, $last_name, $username, $password, $photo);



?>