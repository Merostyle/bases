<?php
include('../includes/conexion.php');

if (isset($_GET['ide_cli'])) {
    $id = intval($_GET['ide_cli']);
    $sql = "DELETE FROM clientes WHERE ide_cli = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?mensaje=Cliente eliminado con éxito");
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
} else {
    echo "ID no especificado.";
}

$conn->close();
?>
