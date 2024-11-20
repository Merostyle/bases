<?php
include('../includes/conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ide_caj = $_POST['ide_caj'];
    $nom_caj = $_POST['nom_caj'];
    $tel_caj = $_POST['tel_caj'];
    $dir_caj = $_POST['dir_caj'];

    $sql = "INSERT INTO cajeros (ide_caj, nom_caj, tel_caj, dir_caj) VALUES ('$ide_caj', '$nom_caj', '$tel_caj', '$dir_caj')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo cajero agregado correctamente.";
        header('Location: index.php');
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
    <title>Insertar Cajero</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Insertar Nuevo Cajero</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="index.php">Ver Cajeros</a></li>
            </ul>
        </nav>
    </header>

    <form action="" method="POST">
        <label for="ide_caj">ID Cajero:</label>
        <input type="text" id="ide_caj" name="ide_caj" required>

        <label for="nom_caj">Nombre:</label>
        <input type="text" id="nom_caj" name="nom_caj" required>

        <label for="tel_caj">Teléfono:</label>
        <input type="text" id="tel_caj" name="tel_caj" required>

        <label for="dir_caj">Dirección:</label>
        <input type="text" id="dir_caj" name="dir_caj" required>

        <button type="submit">Insertar Cajero</button>
    </form>

    <footer>
        <p>© 2024 - Todos los derechos reservados.</p>
    </footer>
</body>
</html>
