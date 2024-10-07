<?php
$host = "localhost"; // Dirección del servidor de la base de datos.
$usuario = "root"; // Nombre de usuario de la base de datos.
$password = ""; // Contraseña de la base de datos.
$basedatos = "xpress_gaming"; // Nombre de la base de datos que se desea utilizar.

$conectar = new mysqli($host, $usuario, $password, $basedatos); // Crear una nueva instancia de conexión a la base de datos.

if ($conectar->connect_error) { // Verificar si hay un error de conexión.
    die('Error en la conexion:' . $conectar->connect_error); // Mostrar un mensaje de error y detener la ejecución si la conexión no se pudo establecer.
}

// Recuperar los datos del formulario
$id_juego = $_POST['id_juego']; // Obtener el número de cuenta del formulario.
$nombre = $_POST['nombre']; // Obtener el nombre del formulario.
$no_jugadores = $_POST['no_jugadores']; // Obtener el apellido paterno del formulario.
$formato = $_POST['formato']; // Obtener el apellido materno del formulario.
$genero = $_POST['genero']; // Obtener la edad del formulario.
$fecha_lanzamiento = $_POST['fecha_lanzamiento']; // Obtener la materia del formulario.
$cantidad_discos = $_POST['cantidad_discos']; // Obtener la materia del formulario.

// Insertar los datos en la base de datos
$sql = "INSERT INTO juegos (id_juego, nombre, no_jugadores, formato, genero, fecha_lanzamiento, cantidad_discos)
        VALUES ('$id_juego', '$nombre', '$no_jugadores', '$formato', '$genero', '$fecha_lanzamiento', '$cantidad_discos')";

if ($conectar->query($sql) === TRUE) { // Ejecutar la consulta SQL y verificar si se ejecutó con éxito.
    echo "Registro insertado correctamente."; // Mostrar un mensaje de éxito si el registro se insertó correctamente.
} else {
    echo "Error al insertar el registro: " . $conectar->error; // Mostrar un mensaje de error si hubo un problema al insertar el registro.
}

// Cerrar la conexión
$conectar->close(); // Cerrar la conexión a la base de datos.
?>
