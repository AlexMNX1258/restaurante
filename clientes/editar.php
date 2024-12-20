<?php
    require_once ('funciones.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $Cliente = obtenerClientePorId($id);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];

        editarCliente($id, $nombre, $correo, $telefono, $direccion);
        
        $mensaje = "Cliente editado correctamente.";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Editar Cliente</title>
</head>
<body>
    <div class="container">
        <h1>Editar Cliente</h1>
        <form action="editar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($Cliente['_id']); ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($Cliente['nombre']); ?>" required>
            <br>
            <label for="correo">Correo:</label>
            <input type="email" name="correo" value="<?php echo htmlspecialchars($Cliente['correo']); ?>" required>
            <br>
            <label for="telefono">Telefono:</label>
            <input type="text" name="telefono" value="<?php echo htmlspecialchars($Cliente['telefono']); ?>" required>
            <br>
            <label for="direccion">Direccion:</label>
            <input type="text" name="direccion" value="<?php echo htmlspecialchars($Cliente['direccion']); ?>" required>
            <br>
            <button type="submit">Actualizar Cliente</button>
        </form>
    </div>
</body>
</html>
