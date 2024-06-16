<?php
// Inicia una nueva sesión o reanuda la sesión existente
session_start();

// Incluye el archivo de conexión a la base de datos
include('db.php');

// Obtener los datos del formulario de inicio de sesión
$correo = $_POST['Correo'];
$password = $_POST['Contraseña'];

// Verificar si la conexión a la base de datos es exitosa
if (!$conn) {
    // Si la conexión falla, muestra un mensaje de error y detiene la ejecución del script
    die("Fallo de conexión: " . mysqli_connect_error());
}

// Consulta SQL para verificar las credenciales del usuario
$query = "SELECT * FROM usuarios WHERE Correo='$correo' AND Contraseña='$password'";
// Ejecutar la consulta
$result = mysqli_query($conn, $query);

// Verificar si la consulta se ejecutó correctamente
if (!$result) {
    // Si la consulta falla, muestra un mensaje de error y detiene la ejecución del script
    die("Error en la consulta: " . mysqli_error($conn));
}

// Comprobar si se encontró un usuario con las credenciales proporcionadas
if (mysqli_num_rows($result) == 1) {
    // Obtener los datos del usuario
    $user = mysqli_fetch_assoc($result);
    // Establecer variables de sesión con la información del usuario
    $_SESSION['Correo'] = $user['Correo'];
    $_SESSION['Tipo'] = $user['Tipo'];
    
    // Redirigir al usuario según su tipo
    if ($user['Tipo'] == 'Administrador') {
        header('Location: admin/index.php');
    } elseif ($user['Tipo'] == 'Vendedor') {
        header('Location: vendedor/index.php');
    } else {
        // Si el tipo de usuario no es reconocido, muestra un mensaje
        echo "Usuario sin acceso.";
    }
} else {
    // Si las credenciales no coinciden, muestra un mensaje de error
    echo "Correo o contraseña incorrectos.";
}
?>
