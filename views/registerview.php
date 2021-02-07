<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístrate</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div>
        <h1>Regístrate</h1>
        <form action="" method="POST" class="formulario" name="login">
        <div class="form-element">
            <input type="text" name="usuario" placeholder="Usuario">
        </div>
        <div class="form-element">
            <input type="password" name="password" placeholder="Contraseña">
        </div>
        <div class="form-element">
            <input type="password" name="confirmPassword" placeholder="Confirmar contraseña">
            <br><br>
            <button type="submit">Registrarse</button>
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
            ¿Ya tienes cuenta? <br>
            <a href="login.php">Inicia Sesión</a>
        </p>
    </div>
</body>
</html>