<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Lista de Productos</title>
</head>
<body>
    <div class="container">
        <h1>Lista de Productos</h1>
        <?php if (isset($_GET['mensaje'])): ?>
            <p><?php echo htmlspecialchars($_GET['mensaje']); ?></p>
        <?php endif; ?>
        <div class="button" name="button">
            <a href="nuevo.php" class="button">Agregar Producto</a>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
                    <th>Categoria</th>
                    <th>Disponible</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once ('funciones.php');
                    if (isset($_GET['accion']) && $_GET['accion'] === 'eliminar' && isset($_GET['id'])) {
                        $count = eliminarProducto($_GET['id']);
                        $mensaje = $count > 0 ? "Producto eliminado con éxito." : "No se pudo eliminar el Producto.";
                    }
                    $Productos = obtenerProducto();
                    foreach ($Productos as $Producto):

                ?>
               <tr>
            <td><?php echo htmlspecialchars($Producto['nombre']); ?></td>
            <td><?php echo htmlspecialchars($Producto['precio']); ?></td>
            <td><?php echo htmlspecialchars($Producto['descripcion']); ?></td>
            <td><?php echo htmlspecialchars($Producto['categoria']); ?></td>
            <td><?php echo $Producto['disponible'] ? 'Sí' : 'No'; ?></td>
            <td class ="actions"> 
                <a href="editar.php?id=<?php echo $Producto['_id']; ?>" class ="btn btn-outline-warning">Editar</a>
                    </td>    
            <td class ="actions">
            <a href="index.php?accion=eliminar&id=<?php echo $Producto['_id']; ?>" class="btn btn-outline-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar el producto?');">Eliminar</a>           
            </td> 
        </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
