<?php
include('db_connection.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if ($password == $row['password']) {
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $email; // Añadir email a la sesión
        header("Location: panel.php");
        exit();
    }
}

header("Location: login.php");
exit();
?>
