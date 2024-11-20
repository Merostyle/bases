<?php
include('../includes/conexion.php');

// Obtener todos los registros de categorías
$sql = "SELECT * FROM categorias";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías - Gestión</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Gestión de Categorías</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="insertar.php">Insertar Categoría</a></li>
            </ul>
        </nav>
    </header>

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['cod_cat'] . "</td>
                            <td>" . $row['nom_cat'] . "</td>
                            <td>
                                <a href='editar.php?cod_cat=" . $row['cod_cat'] . "'><button>Editar</button></a>
                                <a href='eliminar.php?cod_cat=" . $row['cod_cat'] . "'><button>Eliminar</button></a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No hay registros</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <footer>
        <p>© 2024 - Todos los derechos reservados.</p>
    </footer>
</body>
</html>
