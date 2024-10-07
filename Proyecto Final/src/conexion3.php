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
$id_usuario = $_POST['id_usuario']; // Obtener el número de cuenta del formulario.
$nombre = $_POST['nombre']; // Obtener el nombre del formulario.
$email = $_POST['email']; // Obtener el apellido paterno del formulario.
$telefono = $_POST['telefono']; // Obtener el apellido materno del formulario.
$direccion = $_POST['direccion']; // Obtener la edad del formulario.
$fecha_registro = $_POST['fecha_registro']; // Obtener la materia del formulario.

// Insertar los datos en la base de datos
$sql = "INSERT INTO usuarios (id_usuario, nombre, email, telefono, direccion, fecha_registro)
        VALUES ('$id_usuario', '$nombre', '$email', '$telefono', '$direccion', '$fecha_registro')";

if ($conectar->query($sql) === TRUE) { // Ejecutar la consulta SQL y verificar si se ejecutó con éxito.
    echo "Registro insertado correctamente."; // Mostrar un mensaje de éxito si el registro se insertó correctamente.
} else {
    echo "Error al insertar el registro: " . $conectar->error; // Mostrar un mensaje de error si hubo un problema al insertar el registro.
}

// Cerrar la conexión
$conectar->close(); // Cerrar la conexión a la base de datos.
?>