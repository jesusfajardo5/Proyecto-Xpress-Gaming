<?php
// Obtener datos del formulario
$id_administrador = $_POST['id_administrador'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];

// Conectar a la base de datos
$servername = "localhost";
$username = "root"; // Usuario por defecto en XAMPP
$password = "";     // Contraseña vacía en XAMPP
$dbname = "xpress_gaming";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para verificar si los datos existen
$sql = "SELECT * FROM administradores WHERE id_administrador = '$id_administrador' AND email = '$email' AND contrasena = '$contrasena'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Iniciar sesión correctamente y redirigir
    header("Location: iniciosesion2.html"); // Redirigir a iniciosesion2.html
    exit(); // Detener la ejecución del script
} else {
    // Fallo en el inicio de sesión
    echo "<h2 style='color: red;'>ID Administrador, Email o Contraseña incorrectos.</h2>";
}

// Cerrar la conexión
$conn->close();
?>