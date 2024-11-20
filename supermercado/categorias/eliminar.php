<?php
include('../includes/conexion.php');

if (isset($_GET['cod_cat'])) {
    $cod_cat = $_GET['cod_cat'];

    // Eliminar la categoría
    $sql = "DELETE FROM categorias WHERE cod_cat = '$cod_cat'";

    if ($conn->query($sql) === TRUE) {
        echo "Categoría eliminada correctamente.";
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
