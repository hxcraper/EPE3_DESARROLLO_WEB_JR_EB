<?php
session_start();
if ($_SESSION['Tipo'] != 'Vendedor') {
    header('Location: ../index.php');
}
include('../db.php');

$query = "SELECT * FROM repuestos";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Ver Repuestos</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">

</head>
<body>
<div class="container">
    <h2>Ver Repuestos</h2>
    <ul>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <li><?php echo $row['NombreRepuesto'] . " - " . $row['CantidadStock'] . " - $" . $row['PrecioUnitario']; ?></li>
        <?php endwhile; ?>
    </ul>
    

    <a href="../index.php">Volver al Índice</a>
</div>

</body>
</html>
