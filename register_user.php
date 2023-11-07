<?php
include('db_connection.php');

$email = $_POST['email'];
$password = $_POST['password'];
$password_repeat = $_POST['password_repeat'];

if ($password != $password_repeat) {
    header("Location: register.php");
    exit();
}

$sql = "SELECT * FROM usuarios WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: register.php");
    exit();
} else {
    $sql = "INSERT INTO usuarios (email, password) VALUES ('$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        header("Location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
