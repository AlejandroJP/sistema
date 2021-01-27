<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'login';

try {
    $conexion = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}

?>