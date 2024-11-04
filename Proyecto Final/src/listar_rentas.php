<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root"; // Usuario por defecto en XAMPP
$password = "";     // Contraseña vacía en XAMPP
$dbname = "xpress_gaming";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los datos de la tabla "juegos"
$sql = "SELECT * FROM rentas";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Rentas</title>
    <link rel="stylesheet" href="../css/estilosxg.css"> <!-- Enlace al archivo CSS -->
</head>
<body>
    <h1>Lista de Rentas Realizadas</h1>

    <?php
    if ($result->num_rows > 0) {
        // Mostrar los datos en una tabla
        echo "<table border='1' style='width:100%; text-align:center;'>
                <tr>
                    <th>ID Renta</th>
                    <th>ID Usuario</th>
                    <th>ID Consola</th>
                    <th>ID Juego</th>
                    <th>Hora Inicio</th>
                    <th>Hora Final</th>
                    <th>Precio por hora</th>
                    <th>Precio total</th>
                </tr>";
        // Recorrer los resultados y mostrarlos en la tabla
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['id_renta'] . "</td>
                    <td>" . $row['id_usuario'] . "</td>
                    <td>" . $row['id_consola'] . "</td>
                    <td>" . $row['id_juego'] . "</td>
                    <td>" . $row['hora_inicio'] . "</td>
                    <td>" . $row['hora_fin'] . "</td>
                    <td>" . $row['precio_hora'] . "</td>
                    <td>" . $row['precio_total'] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No se encontraron juegos en la base de datos.</p>";
    }

    // Cerrar la conexión
    $conn->close();
    ?>
    
    <br>
    <!-- Botón para regresar a la página de visualización de juegos -->
    <button onclick="location.href='visualizarentas.html'">Regresar</button>

</body>
</html>