<?php
include('../includes/conexion.php');

if (isset($_GET['nit_pro'])) {
    $nit_pro = $conn->real_escape_string($_GET['nit_pro']);
    $sql = "SELECT * FROM proveedores WHERE nit_pro = '$nit_pro'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Proveedor no encontrado.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nit_pro = $conn->real_escape_string($_POST['nit_pro']);
    $nom_pro = $conn->real_escape_string($_POST['nom_pro']);
    $tel_pro = $conn->real_escape_string($_POST['tel_pro']);
    $email_pro = $conn->real_escape_string($_POST['email_pro']);

    $sql = "UPDATE proveedores 
            SET nom_pro = '$nom_pro', tel_pro = '$tel_pro', email_pro = '$email_pro' 
            WHERE nit_pro = '$nit_pro'";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?mensaje=Proveedor actualizado con éxito");
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
    <title>Editar Proveedor</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Editar Proveedor</h1>
    </header>
    <form action="" method="POST">
        <input type="hidden" name="nit_pro" value="<?php echo $row['nit_pro']; ?>">
        <label>Nombre del Proveedor:</label>
        <input type="text" name="nom_pro" value="<?php echo $row['nom_pro']; ?>" required>
        <label>Teléfono:</label>
        <input type="text" name="tel_pro" value="<?php echo $row['tel_pro']; ?>" required>
        <label>Email:</label>
        <input type="email" name="email_pro" value="<?php echo $row['email_pro']; ?>" required>
        <button type="submit">Actualizar Proveedor</button>
    </form>
</body>
</html>
