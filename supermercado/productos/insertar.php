<?php
include('../includes/conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cod_pro = $conn->real_escape_string($_POST['cod_pro']);
    $nom_pro = $conn->real_escape_string($_POST['nom_pro']);
    $cant_pro = intval($_POST['cant_pro']);
    $fec_vec_pro = $conn->real_escape_string($_POST['fec_vec_pro']);

    $sql = "INSERT INTO productos (cod_pro, nom_pro, cant_pro, fec_vec_pro) 
            VALUES ('$cod_pro', '$nom_pro', $cant_pro, '$fec_vec_pro')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?mensaje=Producto insertado con éxito");
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
    <title>Insertar Producto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Insertar Producto</h1>
    </header>
    <form action="" method="POST">
        <label>Código Producto:</label>
        <input type="text" name="cod_pro" required>
        <label>Nombre del Producto:</label>
        <input type="text" name="nom_pro" required>
        <label>Cantidad:</label>
        <input type="number" name="cant_pro" required>
        <label>Fecha de Vencimiento:</label>
        <input type="date" name="fec_vec_pro" required>
        <button type="submit">Agregar Producto</button>
    </form>
</body>
</html>
