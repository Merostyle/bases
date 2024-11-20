<?php
include('../includes/conexion.php');

// Obtener todos los registros de productos
$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos - Gestión</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Gestión de Productos</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="insertar.php">Insertar Producto</a></li>
            </ul>
        </nav>
    </header>

    <table>
        <thead>
            <tr>
                <th>Código Producto</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Fecha de Vencimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['cod_pro'] . "</td>
                            <td>" . $row['nom_pro'] . "</td>
                            <td>" . $row['cant_pro'] . "</td>
                            <td>" . $row['fec_vec_pro'] . "</td>
                            <td>
                                <a href='editar.php?cod_pro=" . $row['cod_pro'] . "'><button>Editar</button></a>
                                <a href='eliminar.php?cod_pro=" . $row['cod_pro'] . "'><button>Eliminar</button></a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay registros</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <footer>
        <p>© 2024 - Todos los derechos reservados.</p>
    </footer>
</body>
</html>
