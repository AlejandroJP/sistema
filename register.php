<?php 

session_start();

if (isset($_SESSION['usuario'])) {
    header('location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    
    $errores = '';

    $passhash = password_hash($password, PASSWORD_BCRYPT);
    $confirmhash = password_hash($confirmPassword, PASSWORD_BCRYPT);
    
    if ($password != $confirmPassword) {
        $errores .= '<li>Las contraseñas no son iguales</li>';
    } else {
        if (empty($usuario) or empty($password) or empty($confirmPassword)) {
            $errores .= '<li>Rellena todos los datos</li>';
        } else {

            require_once 'connect.php';

            $statement = $conexion->prepare('SELECT * FROM usuario WHERE usuario = :usuario LIMIT 1');
            $statement->execute(array(':usuario' => $usuario));
            $resultado = $statement->fetch();
            
            if ($resultado != false) {
                $errores .= '<li>El nombre de usuario ya existe</li>';
            } else {

                require_once 'connect.php';

                $insert = $conexion->prepare('INSERT INFO usuario (usuario, password) VALUES (:usuario, :password)');
                $insert->bindParam(':usuario', $usuario);
                $insert->bindParam(':password', $passhash);

                if ($insert->execute()) {
                    $errores = '<li>Usuario registrado</li>';
                } else {
                    $errores = '<li>Error desconocido</li>';
                }
            }
        }
    }
}

require 'views/registerview.php';

?>