<?php
include('../includes/conexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nit_pro = $conn->real_escape_string($_POST['nit_pro']);
    $nom_pro = $conn->real_escape_string($_POST['nom_pro']);
    $tel_pro = $conn->real_escape_string($_POST['tel_pro']);
    $email_pro = $conn->real_escape_string($_POST['email_pro']);

    $sql = "INSERT INTO proveedores (nit_pro, nom_pro, tel_pro, email_pro) 
            VALUES ('$nit_pro', '$nom_pro', '$tel_pro', '$email_pro')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?mensaje=Proveedor insertado con éxito");
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
    <title>Insertar Proveedor</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Insertar Proveedor</h1>
    </header>
    <form action="" method="POST">
        <label>NIT:</label>
        <input type="text" name="nit_pro" required>
        <label>Nombre del Proveedor:</label>
        <input type="text" name="nom_pro" required>
        <label>Teléfono:</label>
        <input type="text" name="tel_pro" required>
        <label>Email:</label>
        <input type="email" name="email_pro" required>
        <button type="submit">Agregar Proveedor</button>
    </form>
</body>
</html>
