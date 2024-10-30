<?php
    require_once('funciones.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];


        // Aquí puedes agregar la función para guardar el nuevo Cliente
        agregarCliente($nombre, $correo, $telefono, $direccion, $stock);
        
        $mensaje = "Cliente agregado correctamente.";
        header("Location: index.php?mensaje=" . urlencode($mensaje));
        exit;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/styles.css">

    
    <title>Agregar Nuevo Cliente</title>
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo Cliente</h1>
        <form action="nuevo.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
            <br>
            <label for="correo">Correo:</label>
            <input type="email" name="correo" required>
            <br>
            <label for="telefono">Telefono:</label>
            <input type="text" name="telefono" required>
            <br>
            <label for="direccion">Direccion:</label>
            <input type="text" name="direccion">
            <br>
        
            <button type="submit">Agregar Cliente</button>
        </form>
    </div>
</body>
</html>
