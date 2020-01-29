<?php
session_start();

$lib =  include('../core/Library.php');

$email = $_POST['email'];
$password =  $_POST['password'];

$sys = new Library();
$user = $sys->login($email);

if($user == 'failed') {
    $_SESSION['flash'] = 'Anda tidak terdaftar';
    return header('location: ../login.php');
} else {
    $isValid = password_verify($password, $user->password);
    if($isValid) {
        $_SESSION['user'] = $user->id;
        $_SESSION['flash'] = 'Berhasil login hore :v';
        return header('location: ../home.php');
    }
    $_SESSION['flash'] = 'Email atau password salah';
    return header('location: ../login.php');
    
}