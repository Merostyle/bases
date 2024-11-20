<?php
include('../includes/conexion.php');

if (isset($_GET['ide_cli'])) {
    $id = intval($_GET['ide_cli']);
    $sql = "SELECT * FROM clientes WHERE ide_cli = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Cliente no encontrado.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['ide_cli']);
    $nomb_cli = $conn->real_escape_string($_POST['nomb_cli']);
    $tel_cli = $conn->real_escape_string($_POST['tel_cli']);
    $dir_cli = $conn->real_escape_string($_POST['dir_cli']);

    $sql = "UPDATE clientes SET nomb_cli = '$nomb_cli', tel_cli = '$tel_cli', dir_cli = '$dir_cli' WHERE ide_cli = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?mensaje=Cliente actualizado con éxito");
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
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Editar Cliente</h1>
    </header>
    <form action="" method="POST">
        <input type="hidden" name="ide_cli" value="<?php echo $row['ide_cli']; ?>">
        <label>Nombre:</label>
        <input type="text" name="nomb_cli" value="<?php echo $row['nomb_cli']; ?>" required>
        <label>Teléfono:</label>
        <input type="text" name="tel_cli" value="<?php echo $row['tel_cli']; ?>">
        <label>Dirección:</label>
        <input type="text" name="dir_cli" value="<?php echo $row['dir_cli']; ?>">
        <button type="submit">Actualizar Cliente</button>
    </form>
</body>
</html>
