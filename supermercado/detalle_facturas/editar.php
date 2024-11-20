<?php
include('../includes/conexion.php');

if (isset($_GET['cod_pro'])) {
    $cod_pro = $conn->real_escape_string($_GET['cod_pro']);
    $sql = "SELECT * FROM detalle_facturas WHERE cod_pro = '$cod_pro'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Detalle no encontrado.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cod_pro = $conn->real_escape_string($_POST['cod_pro']);
    $val_unit_pro = floatval($_POST['val_unit_pro']);
    $val_total_pro = floatval($_POST['val_total_pro']);
    $cant_pro = intval($_POST['cant_pro']);

    $sql = "UPDATE detalle_facturas 
            SET val_unit_pro = $val_unit_pro, val_total_pro = $val_total_pro, cant_pro = $cant_pro 
            WHERE cod_pro = '$cod_pro'";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?mensaje=Detalle actualizado con éxito");
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
    <title>Editar Detalle</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Editar Detalle Factura</h1>
    </header>
    <form action="" method="POST">
        <input type="hidden" name="cod_pro" value="<?php echo $row['cod_pro']; ?>">
        <label>Valor Unitario:</label>
        <input type="number" name="val_unit_pro" step="0.01" value="<?php echo $row['val_unit_pro']; ?>" required>
        <label>Valor Total:</label>
        <input type="number" name="val_total_pro" step="0.01" value="<?php echo $row['val_total_pro']; ?>" required>
        <label>Cantidad:</label>
        <input type="number" name="cant_pro" value="<?php echo $row['cant_pro']; ?>" required>
        <button type="submit">Actualizar Detalle</button>
    </form>
</body>
</html>
