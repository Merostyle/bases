<?php
include('../includes/conexion.php');

if (isset($_GET['cod_pro'])) {
    $cod_pro = $conn->real_escape_string($_GET['cod_pro']);
    $sql = "DELETE FROM detalle_facturas WHERE cod_pro = '$cod_pro'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?mensaje=Detalle eliminado con éxito");
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
} else {
    echo "Código de producto no especificado.";
}

$conn->close();
?>
