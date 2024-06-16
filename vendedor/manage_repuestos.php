<?php
session_start();
if ($_SESSION['Tipo'] != 'Vendedor') {
    header('Location: ../index.php');
    exit();
}
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create'])) {
        $nombre = $_POST['NombreRepuesto'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $proveedor = $_POST['proveedor'];
        $query = "INSERT INTO repuestos (NombreRepuesto, CantidadStock, PrecioUnitario, Proveedor) VALUES ('$nombre', '$cantidad', '$precio', '$proveedor')";
        mysqli_query($conn, $query);
    } elseif (isset($_POST['update'])) {
        $nombre = $_POST['NombreRepuesto'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $proveedor = $_POST['proveedor'];
        $query = "UPDATE repuestos SET NombreRepuesto='$nombre', CantidadStock='$cantidad', PrecioUnitario='$precio', Proveedor='$proveedor' WHERE NombreRepuesto='$nombre'";
        mysqli_query($conn, $query);
    } elseif (isset($_POST['delete'])) {
        $nombre = $_POST['NombreRepuesto'];
        $query = "DELETE FROM repuestos WHERE NombreRepuesto='$nombre'";
        mysqli_query($conn, $query);
    }
}

$repuestos = mysqli_query($conn, "SELECT * FROM repuestos");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestionar Repuestos</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">

</head>
<body>
<div class="container">
    <h2>Gestionar Repuestos</h2>
    <form id="repuestosForm" action="manage_repuestos.php" method="POST">
        <label for="NombreRepuesto">Nombre:</label>
        <input type="text" id="NombreRepuesto" name="NombreRepuesto" required><br><br>
        <label for="cantidad">Cantidad en Stock:</label>
        <input type="number" id="cantidad" name="cantidad" required><br><br>
        <label for="precio">Precio Unitario:</label>
        <input type="number" id="precio" name="precio" step="0.01" required><br><br>
        <label for="proveedor">Proveedor:</label>
        <input type="text" id="proveedor" name="proveedor" required><br><br>
        <input type="hidden" name="id" id="id">
        <input type="submit" name="create" value="Crear">
        <input type="submit" name="update" value="Actualizar">
        <input type="submit" name="delete" value="Eliminar">
    </form>
        <a href="../index.php">Volver al Índice</a>

    <h2>Lista de Repuestos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad en Stock</th>
            <th>Precio Unitario</th>
            <th>Proveedor</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($repuestos)): ?>
        <tr>
            <td><?php echo $row['RepuestoID']; ?></td>
            <td><?php echo $row['NombreRepuesto']; ?></td>
            <td><?php echo $row['CantidadStock']; ?></td>
            <td><?php echo $row['PrecioUnitario']; ?></td>
            <td><?php echo $row['Proveedor']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
    <script src="../js/scripts.js"></script>
</body>
</html>
