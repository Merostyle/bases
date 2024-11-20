<?php
include('../includes/conexion.php');

// Obtener el ID del cajero
if (isset($_GET['id'])) {
    $ide_caj = $_GET['id'];

    // Eliminar el registro
    $sql = "DELETE FROM cajeros WHERE ide_caj = '$ide_caj'";

    if ($conn->query($sql) === TRUE) {
        echo "Cajero eliminado correctamente.";
        header('Location: index.php'); // Redirigir al listado después de eliminar
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
