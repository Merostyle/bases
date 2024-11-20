<?php
include('../includes/conexion.php');

if (isset($_GET['nro_fac'])) {
    $nro_fac = $conn->real_escape_string($_GET['nro_fac']);
    $sql = "SELECT * FROM facturas WHERE nro_fac = '$nro_fac'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Factura no encontrada.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nro_fac = $conn->real_escape_string($_POST['nro_fac']);
    $val_tot_fac = floatval($_POST['val_tot_fac']);
    $fec_fac = $conn->real_escape_string($_POST['fec_fac']);

    $sql = "UPDATE facturas 
            SET val_tot_fac = $val_tot_fac, fec_fac = '$fec_fac' 
            WHERE nro_fac = '$nro_fac'";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?mensaje=Factura actualizada con éxito");
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Factura</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Editar Factura</h1>
    </header>
    <form action="" method="POST">
        <input type="hidden" name="nro_fac" value="<?php echo $row['nro_fac']; ?>">
        <label>Valor Total:</label>
        <input type="number" name="val_tot_fac" step="0.01" value="<?php echo $row['val_tot_fac']; ?>" required>
        <label>Fecha:</label>
        <input type="date" name="fec_fac" value="<?php echo $row['fec_fac']; ?>" required>
        <button type="submit">Actualizar Factura</button>
    </form>
</body>
</html>
