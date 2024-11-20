<?php
include('../includes/conexion.php');

if (isset($_GET['nro_fac'])) {
    $nro_fac = $conn->real_escape_string($_GET['nro_fac']);
    $sql = "DELETE FROM facturas WHERE nro_fac = '$nro_fac'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?mensaje=Factura eliminada con éxito");
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
} else {
    echo "Número de factura no especificado.";
}

$conn->close();
?>
