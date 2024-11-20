<?php
$host = 'localhost';
$user = 'root';  // Usuario de la base de datos
$password = '';  // Contraseña de la base de datos
$dbname = 'supermercado';  // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
