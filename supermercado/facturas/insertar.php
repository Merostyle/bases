<?php
include('../includes/conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nro_fac = $conn->real_escape_string($_POST['nro_fac']);
    $val_tot_fac = floatval($_POST['val_tot_fac']);
    $fec_fac = $conn->real_escape_string($_POST['fec_fac']);

    $sql = "INSERT INTO facturas (nro_fac, val_tot_fac, fec_fac) 
            VALUES ('$nro_fac', $val_tot_fac, '$fec_fac')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?mensaje=Factura insertada con éxito");
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
    <title>Insertar Factura</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Insertar Factura</h1>
    </header>
    <form action="" method="POST">
        <label>Número de Factura:</label>
        <input type="text" name="nro_fac" required>
        <label>Valor Total:</label>
        <input type="number" name="val_tot_fac" step="0.01" required>
        <label>Fecha:</label>
        <input type="date" name="fec_fac" required>
        <button type="submit">Agregar Factura</button>
    </form>
</body>
</html>
