<?php
include('../includes/conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cod_pro = $conn->real_escape_string($_POST['cod_pro']);
    $val_unit_pro = floatval($_POST['val_unit_pro']);
    $val_total_pro = floatval($_POST['val_total_pro']);
    $cant_pro = intval($_POST['cant_pro']);

    $sql = "INSERT INTO detalle_facturas (cod_pro, val_unit_pro, val_total_pro, cant_pro) 
            VALUES ('$cod_pro', $val_unit_pro, $val_total_pro, $cant_pro)";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?mensaje=Detalle insertado con éxito");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Detalle</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Insertar Detalle Factura</h1>
    </header>
    <form action="" method="POST">
        <label>Código Producto:</label>
        <input type="text" name="cod_pro" required>
        <label>Valor Unitario:</label>
        <input type="number" name="val_unit_pro" step="0.01" required>
        <label>Valor Total:</label>
        <input type="number" name="val_total_pro" step="0.01" required>
        <label>Cantidad:</label>
        <input type="number" name="cant_pro" required>
        <button type="submit">Agregar Detalle</button>
    </form>
</body>
</html>
