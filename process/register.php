<?php
session_start();

$lib =  include('../core/Library.php');


$name = $_POST['name'];
$email = $_POST['email'];
$password =  $_POST['password'];


if(!empty($name) && !empty($email) && !empty($password)) {
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sys =  new Library();

    $register =  $sys->register($email, $name, $password);

    if($register != 'failed') {
        $_SESSION['user'] = $register->id;
        $_SESSION['flash'] = 'Hello new user';
        header('location: ../home.php');
    } else {
        $_SESSION['flash'] = $register;
        header('location: ../register.php');
    }

    
    
} else {
    $_SESSION['flash'] = 'Field Empty';
    header('location: ../register.php');
}