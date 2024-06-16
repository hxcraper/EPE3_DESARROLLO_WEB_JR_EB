<!-- LISTO -->

<?php
session_start();

// Debugging: Check if session is started and 'Tipo' is set
if (!isset($_SESSION['Tipo'])) {
    echo "Tipo de sesión no configurado. Redireccionando al inicio de sesión.";
    header('Location: ../index.php');
    exit();

}

if ($_SESSION['Tipo'] != 'Administrador') {
    echo "El usuario no es un Vendedor. Redireccionando al inicio de sesión.";
    header('Location: ../index.php');
    exit();

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administrador</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">


</head>
<body>
<div class="container">

    <h2>Menú Administrador</h2>
    <ul >
        <li><a href="manage_users.php">Gestionar Usuarios</a></li>
        <li><a href="view_emails.php">Ver Correos</a></li>
        <li><a href="../logout.php">Cerrar sesión</a></li>

    </ul>
</div>


    <script src="../js/scripts.js"></script>
</body>
</html>
