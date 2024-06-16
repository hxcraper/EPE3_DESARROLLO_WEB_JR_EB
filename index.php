<?php
// Inicia una nueva sesión o reanuda la sesión existente
session_start();

// Verifica si la variable de sesión 'Tipo' está configurada
if (isset($_SESSION['Tipo'])) {
    // Si el tipo de usuario es 'Administrador'
    if ($_SESSION['Tipo'] == 'Administrador') {
        // Para propósitos de depuración, se imprime un mensaje
        echo "Redireccionando a la página de administrador.";
        // Redirige al usuario a la página de administrador
        header('Location: admin/index.php');
        // Detiene la ejecución del script para asegurarse de que la redirección se lleva a cabo
        exit();
    // Si el tipo de usuario es 'Vendedor'
    } elseif ($_SESSION['Tipo'] == 'Vendedor') {
        // Para propósitos de depuración, se imprime un mensaje
        echo "Redireccionando a la página de vendedor.";
        // Redirige al usuario a la página de vendedor
        header('Location: vendedor/index.php');
        // Detiene la ejecución del script para asegurarse de que la redirección se lleva a cabo
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Enlaza el archivo de estilos CSS externo -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <!-- Formulario de inicio de sesión -->
    
    <form action="login.php" method="POST">
        <!-- Etiqueta y campo de entrada para el correo electrónico -->
        <label for="Correo">Correo:</label>
        <input type="email" id="Correo" name="Correo" required><br><br>
        <!-- Etiqueta y campo de entrada para la contraseña -->
        <label for="Contraseña">Contraseña:</label>
        <input type="password" id="Contraseña" name="Contraseña" required><br><br>
        <!-- Botón de envío del formulario -->
        <input type="submit" value="Ingresar">
    </form>
</div>
</body>
</html>


