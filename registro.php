<?php
$servername = "192.168.2.101";
$username = "pablitoo";
$password = "Andres1774yt!";
$database = "tu_base_de_datos";

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear la base de datos si no existe
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos creada o ya existente.";
} else {
    echo "Error al crear la base de datos: " . $conn->error;
}

// Seleccionar la base de datos
$conn->select_db($database);

// Crear tabla si no existe
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    edad INT NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'usuarios' creada o ya existente.";
} else {
    echo "Error al crear la tabla: " . $conn->error;
}

// Procesar el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $edad = $_POST["edad"];

    // Insertar datos en la tabla
    $sql = "INSERT INTO usuarios (nombre, apellido, edad) VALUES ('$nombre', '$apellido', $edad)";
    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso.";
    } else {
        echo "Error al registrar: " . $conn->error;
    }
}

// Cerrar conexión
$conn->close();
?>
