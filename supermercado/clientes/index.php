<?php
include('../includes/conexion.php');

// Obtener todos los registros de clientes
$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Gestión</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Gestión de Clientes</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="insertar.php">Insertar Cliente</a></li>
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
                            <td>" . $row['ide_cli'] . "</td>
                            <td>" . $row['nomb_cli'] . "</td>
                            <td>" . $row['tel_cli'] . "</td>
                            <td>" . $row['dir_cli'] . "</td>
                            <td>
                                <a href='editar.php?ide_cli=" . $row['ide_cli'] . "'><button>Editar</button></a>
                                <a href='eliminar.php?ide_cli=" . $row['ide_cli'] . "'><button>Eliminar</button></a>
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
