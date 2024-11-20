<?php
include('../includes/conexion.php');

if (isset($_GET['cod_cat'])) {
    $cod_cat = $_GET['cod_cat'];

    // Obtener datos de la categoría
    $sql = "SELECT * FROM categorias WHERE cod_cat = '$cod_cat'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cod_cat = $_POST['cod_cat'];
    $nom_cat = $_POST['nom_cat'];

    // Actualizar la categoría
    $sql = "UPDATE categorias SET nom_cat = '$nom_cat' WHERE cod_cat = '$cod_cat'";

    if ($conn->query($sql) === TRUE) {
        echo "Categoría actualizada correctamente.";
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
    <title>Editar Categoría</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Editar Categoría</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="index.php">Ver Categorías</a></li>
            </ul>
        </nav>
    </header>

    <form action="" method="POST">
        <label for="cod_cat">Código de Categoría:</label>
        <input type="text" id="cod_cat" name="cod_cat" value="<?php echo $row['cod_cat']; ?>" readonly>

        <label for="nom_cat">Nombre:</label>
        <input type="text" id="nom_cat" name="nom_cat" value="<?php echo $row['nom_cat']; ?>" required>

        <button type="submit">Actualizar Categoría</button>
    </form>

    <footer>
        <p>© 2024 - Todos los derechos reservados.</p>
    </footer>
</body>
</html>
