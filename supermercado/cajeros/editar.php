<?php
include('../includes/conexion.php');

// Obtener el ID del cajero
if (isset($_GET['id'])) {
    $ide_caj = $_GET['id'];

    // Obtener el registro del cajero
    $sql = "SELECT * FROM cajeros WHERE ide_caj = '$ide_caj'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Registro no encontrado.";
        exit();
    }
}

// Comprobar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom_caj = $_POST['nom_caj'];
    $tel_caj = $_POST['tel_caj'];
    $dir_caj = $_POST['dir_caj'];

    // Actualizar el registro
    $sql = "UPDATE cajeros SET nom_caj='$nom_caj', tel_caj='$tel_caj', dir_caj='$dir_caj' WHERE ide_caj='$ide_caj'";

    if ($conn->query($sql) === TRUE) {
        echo "Cajero actualizado correctamente.";
        header('Location: index.php'); // Redirigir al listado después de actualizar
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cajero</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Editar Cajero</h1>
    <form method="POST">
        <label for="nom_caj">Nombre:</label>
        <input type="text" name="nom_caj" value="<?= $row['nom_caj']; ?>" required><br><br>

        <label for="tel_caj">Teléfono:</label>
        <input type="text" name="tel_caj" value="<?= $row['tel_caj']; ?>" required><br><br>

        <label for="dir_caj">Dirección:</label>
        <input type="text" name="dir_caj" value="<?= $row['dir_caj']; ?>" required><br><br>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
