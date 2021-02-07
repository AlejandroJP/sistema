<?php
session_start();
require_once 'connect.php';

if (isset($_SESSION['usuario'])) {
    header('location: index.php');
}

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario');
    $statement->bindParam('usuario', $usuario);
    $statement->execute();

    $resultado = $statement->fetch();

    if (empty($usuario) or empty($password)) {
            $errores .= '<li class="error">Rellena todos los campos</li>';
        } else {
            if (!$resultado) {
                $errores = '<li class="error">Datos incorrectos</li>';
            } else {
                if (password_verify($password, $resultado['pass'])) {
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['user_id'] = $resultado['id'];
                    $_SESSION['usuario'] = $usuario;                            
                    
                    // Redirect user to welcome page
                    header("location: content.php");
                } else {
                    $errores = '<li class="error">Datos incorrectos</li>';
                }
            }
        }
}

require 'views/loginview.php'

?>