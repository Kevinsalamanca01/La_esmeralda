<?php
$servername = "localhost";
$username = "root"; // O el usuario que estés usando para MySQL
$password = ""; // O la contraseña que uses para MySQL
$database = "laesmeralda"; // Nombre de la base de datos

$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}
?>

