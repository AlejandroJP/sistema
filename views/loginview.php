<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <div>
        <h1>Iniciar Sesión</h1>
        <form action="" method="POST" class="formulario" name="login">
        
        <div>
            <input type="text" name="usuario" class="usuario" placeholder="Usuario">
        </div>
        <div>
            <input type="password" name="password" class="password_btn" placeholder="Contraseña">
            <br><br>
            <button type="submit">Iniciar Sesión</button>
        </div>
        
        <!--Mensaje de error-->
        
        <?php if (!empty($errores)): ?>
        <div>
            <ul>
                <?php echo $errores; ?>
            </ul>
        </div>
        <?php endif; ?>
        </form>
        
        <p>
            ¿Aun no tienes cuenta? <br>
            <a href="register.php">Registrarse</a>
        </p>
    </div>
</body>
</html>