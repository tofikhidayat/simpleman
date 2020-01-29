<?php
/**
 * Logout
 */

session_start();
unset($_SESSION['user']);

$_SESSION['flash'] = 'Logout success';
header('location: ../login.php');