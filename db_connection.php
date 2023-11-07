<?php
$servername = "localhost";
$username = "adm_webgenerator";
$password = "webgenerator2020";
$dbname = "webgenerator";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
