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
$sql = "SELECT * FROM juegos";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Juegos</title>
    <link rel="stylesheet" href="../css/estilosxg.css"> <!-- Enlace al archivo CSS -->
</head>
<body>
    <h1>Lista de Juegos Disponibles</h1>

    <?php
    if ($result->num_rows > 0) {
        // Mostrar los datos en una tabla
        echo "<table border='1' style='width:100%; text-align:center;'>
                <tr>
                    <th>ID Juego</th>
                    <th>Nombre</th>
                    <th>Numero de Jugadores</th>
                    <th>Formato</th>
                    <th>Genero</th>
                    <th>Fecha de Lanzamiento</th>
                    <th>Cantidad discos</th>
                </tr>";
        // Recorrer los resultados y mostrarlos en la tabla
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['id_juego'] . "</td>
                    <td>" . $row['nombre'] . "</td>
                    <td>" . $row['no_jugadores'] . "</td>
                    <td>" . $row['formato'] . "</td>
                    <td>" . $row['genero'] . "</td>
                    <td>" . $row['fecha_lanzamiento'] . "</td>
                    <td>" . $row['cantidad_discos'] . "</td>
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
    <button onclick="location.href='visualizajuegos.html'">Regresar</button>

</body>
</html>