<?php
session_start();
if ($_SESSION['Tipo'] != 'Administrador') {
    header('Location: ../index.php');
    exit();
}
include('../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rut = $_POST['Rut'];
    $correo = $_POST['Correo'];
    $password = $_POST['Contraseña'];
    $tipo = $_POST['Tipo'];

    if (isset($_POST['create'])) {
        $stmt = $conn->prepare("INSERT INTO usuarios (Rut, Correo, Contraseña, Tipo) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $rut, $correo, $password, $tipo);
        if ($stmt->execute()) {
            echo "Usuario creado exitosamente.";
        } else {
            echo "Error al crear el usuario: " . $stmt->error;
        }
        $stmt->close();
    } elseif (isset($_POST['update'])) {
        $stmt = $conn->prepare("UPDATE usuarios SET Correo=?, Contraseña=?, Tipo=? WHERE Rut=?");
        $stmt->bind_param("ssss", $correo, $password, $tipo, $rut);
        if ($stmt->execute()) {
            echo "Usuario actualizado exitosamente.";
        } else {
            echo "Error al actualizar el usuario: " . $stmt->error;
        }
        $stmt->close();
    } elseif (isset($_POST['delete'])) {
        $stmt = $conn->prepare("DELETE FROM usuarios WHERE Rut=?");
        $stmt->bind_param("s", $rut);
        if ($stmt->execute()) {
            echo "Usuario eliminado exitosamente.";
        } else {
            echo "Error al eliminar el usuario: " . $stmt->error;
        }
        $stmt->close();
    }
}

$usuarios = mysqli_query($conn, "SELECT * FROM usuarios");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestionar Usuarios</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">

</head>
<body>
    <div class="container">
    <h2>Gestionar Usuarios</h2>
    <form id="usuariosForm" action="manage_users.php" method="POST">
        <label for="Rut">Rut:</label> <br>
        <input type="text" id="Rut" name="Rut" required><br>
        <label for="Correo">Correo:</label><br>
        <input type="email" id="Correo" name="Correo" required><br><br>
        <label for="Contraseña">Contraseña:</label><br>
        <input type="password" id="Contraseña" name="Contraseña" required><br><br>
        <label for="Tipo">Tipo:</label><br>
        <select id="Tipo" name="Tipo" required>
            <option value="Administrador">Administrador</option>
            <option value="Vendedor">Vendedor</option>
        </select><br><br>
        <input type="submit" name="create" value="Crear">
        <input type="submit" name="update" value="Actualizar">
        <input type="submit" name="delete" value="Eliminar">
        <a href="../index.php">Volver al Índice</a>

    </form>
    <h2>Lista de Usuarios</h2>
    <table>
        <tr>
            <th>Rut</th>
            <th>Correo</th>
            <th>Contraseña</th>
            <th>Tipo</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($usuarios)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['Rut']); ?></td>
            <td><?php echo htmlspecialchars($row['Correo']); ?></td>
            <td><?php echo htmlspecialchars($row['Contraseña']); ?></td>
            <td><?php echo htmlspecialchars($row['Tipo']); ?></td>
            
        </tr>
        <?php endwhile; ?>
    </table>
    </div>
    <script src="../js/scripts.js"></script>
</body>
</html>
