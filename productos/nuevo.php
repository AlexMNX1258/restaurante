<?php
    require_once('funciones.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $categoria = $_POST['categoria'];
        $disponible = isset($_POST['disponible']) ; // Asigna "si" si el checkbox está seleccionado, "no" si no lo está

        // Llama a la función para guardar el nuevo producto
        agregarProducto($nombre, $precio, $descripcion, $categoria, $disponible);
        
        $mensaje = "Producto agregado correctamente.";
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
    <title>Agregar Nuevo Producto</title>
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo Producto</h1>
        <form action="nuevo.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
            <br>
            <label for="precio">Precio:</label>
            <input type="number" name="precio" required>
            <br>
            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" required>
            <br>
            <label for="categoria">Categoría:</label>
            <select name="categoria">
                <option value="Lácteos">Lácteos</option>
                <option value="Carnes">Carnes</option>
                <option value="Cereales">Cereales</option>
                <option value="Condimentos">Condimentos</option>
                <option value="Aceites">Aceites</option>
                <option value="Frutos secos">Frutos Secos</option>
            </select>
            <br>
            <label for="disponible">Disponible:</label>
            <input type="checkbox" name="disponible" value="si">
            <br>
            
            <button type="submit">Agregar Producto</button>
        </form>
    </div>
</body>
</html>
