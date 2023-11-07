<?php
include('db_connection.php');

session_start();
if(!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];
$web_name = $_POST['web_name'];

$dominio = $web_name;

// Obtener el idUsuario a partir del email
$sql_idUsuario = "SELECT idUsuario FROM usuarios WHERE email='$email'";
$result_idUsuario = $conn->query($sql_idUsuario);

if ($result_idUsuario && $result_idUsuario->num_rows == 1) {
    $row_idUsuario = $result_idUsuario->fetch_assoc();
    $idUsuario = $row_idUsuario['idUsuario'];

    // Agregar a la base de datos
    $sql = "INSERT INTO webs (idUsuario, dominio) VALUES ('$idUsuario', '$dominio')";

    if ($conn->query($sql) === TRUE) {
        // Crear directorio y establecer permisos
        $path = "webs/$dominio";
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        // Ejecutar el script wix.sh
        exec("./wix.sh $path", $output, $returnCode);

        if ($returnCode === 0) {
            // Redireccionar a la página recién creada
            header("Location: $path");
        } else {
            echo "Error al ejecutar wix.sh";
        }
    } else {
        echo "Error al agregar a la base de datos";
    }
} else {
    echo "Error al obtener el idUsuario";
}

$conn->close();
?>
