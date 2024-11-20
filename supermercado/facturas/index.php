<?php
include('../includes/conexion.php');

// Obtener todos los registros de facturas
$sql = "SELECT * FROM facturas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas - Gestión</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Gestión de Facturas</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="insertar.php">Insertar Factura</a></li>
            </ul>
        </nav>
    </header>

    <table>
        <thead>
            <tr>
                <th>Número Factura</th>
                <th>Valor Total</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['nro_fac'] . "</td>
                            <td>" . $row['val_tot_fac'] . "</td>
                            <td>" . $row['fec_fac'] . "</td>
                            <td>
                                <a href='editar.php?nro_fac=" . $row['nro_fac'] . "'><button>Editar</button></a>
                                <a href='eliminar.php?nro_fac=" . $row['nro_fac'] . "'><button>Eliminar</button></a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No hay registros</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <footer>
        <p>© 2024 - Todos los derechos reservados.</p>
    </footer>
</body>
</html>
