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
$id_renta = $_POST['id_renta']; // Obtener el número de cuenta del formulario.
$id_usuario = $_POST['id_usuario']; // Obtener el número de cuenta del formulario.
$id_consola = $_POST['id_consola']; // Obtener el número de cuenta del formulario.
$id_juego = $_POST['id_juego']; // Obtener el número de cuenta del formulario.
$hora_inicio = $_POST['hora_inicio']; // Obtener el nombre del formulario.
$hora_fin = $_POST['hora_fin']; // Obtener el apellido paterno del formulario.
$precio_hora  = 25; // Obtener el apellido materno del formulario.
$precio_total = $_POST['precio_total']; // Obtener la edad del formulario.

// Insertar los datos en la base de datos
$sql = "INSERT INTO rentas (id_renta, id_usuario, id_consola, id_juego, hora_inicio, hora_fin, precio_hora, precio_total)
        VALUES ('$id_renta', '$id_usuario', '$id_consola', '$id_juego', '$hora_inicio', '$hora_fin', '$precio_hora', '$precio_total')";

if ($conectar->query($sql) === TRUE) { // Ejecutar la consulta SQL y verificar si se ejecutó con éxito.
    echo "Registro insertado correctamente."; // Mostrar un mensaje de éxito si el registro se insertó correctamente.
} else {
    echo "Error al insertar el registro: " . $conectar->error; // Mostrar un mensaje de error si hubo un problema al insertar el registro.
}

// Cerrar la conexión
$conectar->close(); // Cerrar la conexión a la base de datos.
?>