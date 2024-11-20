<?php
include('../includes/conexion.php');

if (isset($_GET['cod_pro'])) {
    $cod_pro = $conn->real_escape_string($_GET['cod_pro']);
    $sql = "SELECT * FROM productos WHERE cod_pro = '$cod_pro'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Producto no encontrado.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cod_pro = $conn->real_escape_string($_POST['cod_pro']);
    $nom_pro = $conn->real_escape_string($_POST['nom_pro']);
    $cant_pro = intval($_POST['cant_pro']);
    $fec_vec_pro = $conn->real_escape_string($_POST['fec_vec_pro']);

    $sql = "UPDATE productos 
            SET nom_pro = '$nom_pro', cant_pro = $cant_pro, fec_vec_pro = '$fec_vec_pro' 
            WHERE cod_pro = '$cod_pro'";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?mensaje=Producto actualizado con éxito");
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
    <title>Editar Producto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Editar Producto</h1>
    </header>
    <form action="" method="POST">
        <input type="hidden" name="cod_pro" value="<?php echo $row['cod_pro']; ?>">
        <label>Nombre del Producto:</label>
        <input type="text" name="nom_pro" value="<?php echo $row['nom_pro']; ?>" required>
        <label>Cantidad:</label>
        <input type="number" name="cant_pro" value="<?php echo $row['cant_pro']; ?>" required>
        <label>Fecha de Vencimiento:</label>
        <input type="date" name="fec_vec_pro" value="<?php echo $row['fec_vec_pro']; ?>" required>
        <button type="submit">Actualizar Producto</button>
    </form>
</body>
</html>
