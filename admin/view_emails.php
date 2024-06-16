<!-- LISTO -->


<?php
session_start();
if ($_SESSION['Tipo'] != 'Administrador') {
    header('Location: ../index.php');
}
include('../db.php');

$query = "SELECT correo FROM usuarios";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Ver Correos</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">

</head>
<body>
<div class="container">
    <h2>Ver Correos</h2>
    <ul>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <li><?php echo $row['correo']; ?></li>
        <?php endwhile; ?>
        <a href="../index.php">Volver al Índice</a>
    </ul>
</div>
    <br>
    
    <script src="../js/scripts.js"></script>
</body>
</html>
