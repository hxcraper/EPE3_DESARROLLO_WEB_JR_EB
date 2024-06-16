<?php
// Detalles de conexión a la base de datos
$servername = "localhost"; // Nombre del servidor MySQL
$username = "root"; // Nombre de usuario de MySQL
$password = ""; // Contraseña de MySQL
$dbname = "taller"; // Nombre de la base de datos que deseas utilizar

// Establece la conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica si la conexión fue exitosa
if (!$conn) {
    // Si la conexión falla, muestra un mensaje de error y detiene la ejecución del script
    die("Fallo de conexión: " . mysqli_connect_error());
}
?>
