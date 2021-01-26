<?php session_start();

if (isset($_SESSION['usuario'])) {
    require 'views/contentview.php';
} else {
    header('location: login.php');
}

?>