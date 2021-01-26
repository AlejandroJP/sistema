<?php session_start();

if (isset($_SESSION['usuario'])) {
    header('location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    
    $errores = '';
    
    if (empty($usuario) or empty($password) or empty($confirmPassword)) {
        $errores .= '<li>Rellena todos los datos</li>';
    } else {
        try {
            $conexion = new PDO('mysql: host = localhost; dbname = login', 'root','');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
        $statement->execute(array(':usuario' => $usuario));
        $resultado = $statement->fetch();
        
        if ($resultado != false) {
            $errores .= '<li>El nombre de usuario ya existe</li>';
        }
        
        $password = hash('sha512', $password);
        $confirmPassword = hash('sha512', $confirmPassword);
        
        if ($password != $confirmPassword) {
            $errores .= '<li>Las contraseñas no son iguales</li>';
        }
    }
}

require 'views/registerview.php';

?>