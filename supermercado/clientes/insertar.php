<?php
include('../includes/conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ide_cli = $conn->real_escape_string($_POST['ide_cli']);
    $nomb_cli = $conn->real_escape_string($_POST['nomb_cli']);
    $tel_cli = $conn->real_escape_string($_POST['tel_cli']);
    $dir_cli = $conn->real_escape_string($_POST['dir_cli']);

    // Incluir ide_cli en la consulta
    $sql = "INSERT INTO clientes (ide_cli, nomb_cli, tel_cli, dir_cli) VALUES ('$ide_cli', '$nomb_cli', '$tel_cli', '$dir_cli')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?mensaje=Cliente agregado con éxito");
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
    <title>Insertar Cliente</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Insertar Cliente</h1>
    </header>
    <form action="" method="POST">
        <label>Id Cliente:</label>
        <input type="number" name="ide_cli" required>
        <label>Nombre:</label>
        <input type="text" name="nomb_cli" required>
        <label>Teléfono:</label>
        <input type="text" name="tel_cli">
        <label>Dirección:</label>
        <input type="text" name="dir_cli">
        <button type="submit">Agregar Cliente</button>
    </form>
</body>
</html>
