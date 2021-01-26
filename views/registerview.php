<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regístrate</title>
</head>
<body>
    <div>
        <h1>Regístrate</h1>
        <form action="" method="POST" class="formulario" name="login">
        
        <div class="form-group">
            <input type="text" name="usuario" placeholder="Usuario">
        </div>
        <div>
            <input type="password" name="password" class="password" placeholder="Contraseña">
        </div>
        
        <div>
            <input type="password" name="confirmPassword" class="password" placeholder="Confirmar contraseña">
            <br><br>
            <button type="submit"">Registrarse</button>
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