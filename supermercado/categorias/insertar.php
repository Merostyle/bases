<?php
include('../includes/conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cod_cat = $_POST['cod_cat'];
    $nom_cat = $_POST['nom_cat'];

    // Insertar categoría
    $sql = "INSERT INTO categorias (cod_cat, nom_cat) VALUES ('$cod_cat', '$nom_cat')";

    if ($conn->query($sql) === TRUE) {
        echo "Categoría agregada correctamente.";
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
    <title>Insertar Categoría</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Insertar Nueva Categoría</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="index.php">Ver Categorías</a></li>
            </ul>
        </nav>
    </header>

    <form action="" method="POST">
        <label for="cod_cat">Código de Categoría:</label>
        <input type="text" id="cod_cat" name="cod_cat" required>

        <label for="nom_cat">Nombre:</label>
        <input type="text" id="nom_cat" name="nom_cat" required>

        <button type="submit">Insertar Categoría</button>
    </form>

    <footer>
        <p>© 2024 - Todos los derechos reservados.</p>
    </footer>
</body>
</html>
