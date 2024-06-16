<?php
// Inicia la sesión
session_start();

// Debugging: Verifica si la sesión está iniciada y si 'Tipo' está configurado
if (!isset($_SESSION['Tipo'])) {
    // Si 'Tipo' no está configurado, muestra un mensaje y redirecciona al inicio de sesión
    echo "Tipo de sesión no configurado. Redireccionando al inicio de sesión.";
    header('Location: ../index.php'); // Redirecciona al usuario al inicio de sesión
    exit(); // Termina el script para evitar que se procese más código
}

// Verifica si el tipo de usuario es Vendedor
if ($_SESSION['Tipo'] != 'Vendedor') {
    // Si el tipo de usuario no es Vendedor, muestra un mensaje y redirecciona al inicio de sesión
    echo "El usuario no es un Vendedor. Redireccionando al inicio de sesión.";
    header('Location: ../index.php'); // Redirecciona al usuario al inicio de sesión
    exit(); // Termina el script
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Panel de Vendedor</title>
    <!-- Enlace al CSS -->
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h2>Panel de Vendedor</h2>
        <ul>
            <li><a href="manage_repuestos.php">Gestionar Repuestos</a></li>
            <li><a href="view_repuestos.php">Ver Repuestos</a></li>
            <li><a href="../logout.php">Cerrar sesión</a></li>
        </ul>
    </div>
    <!-- Asegúrate de que el enlace al archivo JavaScript sea correcto -->
    <script src="../js/scripts.js"></script>
</body>
</html>
