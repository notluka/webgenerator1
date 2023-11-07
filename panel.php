<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido a tu panel</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['logged_in'])) {
            // Verificar si la dirección de correo está definida en $_SESSION
            if(isset($_SESSION['email'])) {
                $email = $_SESSION['email'];
                echo '<h1>Bienvenido a tu panel</h1>';
                echo '<a href="logout.php">Cerrar sesión de ' . $email . '</a><br>';
                echo '<form action="generate_web.php" method="post">';
                echo 'Generar Web de: <input type="text" name="web_name" required><br>';

                // Verificar si idUsuario está definido en $_SESSION
                if(isset($_SESSION['idUsuario'])) {
                    echo '<input type="hidden" name="idUsuario" value="' . $_SESSION['idUsuario'] . '">';
                } else {
                    echo '<input type="hidden" name="idUsuario" value="">';
                }

                echo '<input type="submit" value="Crear web">';
                echo '</form>';
            } else {
                echo "Dirección de correo no disponible.";
            }
        } else {
            header("Location: login.php");
            exit();
        }

       
    ?>
</body>
</html>
