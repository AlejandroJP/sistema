<?php session_start();

if (isset($_SESSION['usuario'])) {
    header('location: content.php');
} else {
    header('location: register.php');
}

?>