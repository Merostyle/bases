<?php
include('../includes/conexion.php');

// Obtener todos los registros de cajeros
$sql = "SELECT * FROM cajeros";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cajeros - Gestión</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Gestión de Cajeros</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="insertar.php">Insertar Cajero</a></li>
            </ul>
        </nav>
    </header>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['ide_caj'] . "</td>
                            <td>" . $row['nom_caj'] . "</td>
                            <td>" . $row['tel_caj'] . "</td>
                            <td>" . $row['dir_caj'] . "</td>
                            <td>
                                <a href='editar.php?id=" . $row['ide_caj'] . "'><button>Editar</button></a>
                                <a href='eliminar.php?id=" . $row['ide_caj'] . "'><button>Eliminar</button></a>
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
