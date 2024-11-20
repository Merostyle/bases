<?php
include('../includes/conexion.php');

// Obtener todos los registros de proveedores
$sql = "SELECT * FROM proveedores";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores - Gestión</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Gestión de Proveedores</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="insertar.php">Insertar Proveedor</a></li>
            </ul>
        </nav>
    </header>

    <table>
        <thead>
            <tr>
                <th>NIT</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['nit_pro'] . "</td>
                            <td>" . $row['nom_pro'] . "</td>
                            <td>" . $row['tel_pro'] . "</td>
                            <td>" . $row['email_pro'] . "</td>
                            <td>
                                <a href='editar.php?nit_pro=" . $row['nit_pro'] . "'><button>Editar</button></a>
                                <a href='eliminar.php?nit_pro=" . $row['nit_pro'] . "'><button>Eliminar</button></a>
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
