<?php
include('../includes/conexion.php');

if (isset($_GET['nit_pro'])) {
    $nit_pro = $conn->real_escape_string($_GET['nit_pro']);
    $sql = "DELETE FROM proveedores WHERE nit_pro = '$nit_pro'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?mensaje=Proveedor eliminado con éxito");
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
} else {
    echo "NIT del proveedor no especificado.";
}

$conn->close();
?>
