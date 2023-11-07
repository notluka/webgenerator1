<!DOCTYPE html>
<html>
<head>
    <title>Registrarte es simple.</title>
</head>
<body>
    <h1>Registrarte es simple.</h1>
    <form action="register_user.php" method="post">
        Email: <input type="email" name="email" required><br>
        Contraseña: <input type="password" name="password" required><br>
        Repetir Contraseña: <input type="password" name="password_repeat" required><br>
        <input type="submit" value="Registrarte">
    </form>
    <a href="login.php">Iniciar Sesión</a>
</body>
</html>
