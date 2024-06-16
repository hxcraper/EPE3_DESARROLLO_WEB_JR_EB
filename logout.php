<?php
// Inicia o reanuda la sesión existente
session_start();

// Destruye todos los datos registrados de la sesión actual
session_destroy();

// Redirige a la página de inicio
header('Location: index.php');

// Detiene la ejecución del script
exit();
?>
