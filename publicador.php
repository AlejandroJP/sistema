<?php session_start();

if (isset($_SESSION['usuario'])) {
    /**Acá es el controlador de la vista */
    require 'assets/header.php';
    require 'views/publicadorview.php';
} else {
    header('location: login.php');
}

?>