<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Lista de Clientes</title>
</head>
<body>
    <div class="container">
        <h1>Lista de Clientes</h1>
        <?php if (isset($_GET['mensaje'])): ?>
            <p><?php echo htmlspecialchars($_GET['mensaje']); ?></p>
        <?php endif; ?>
        <div class="button" name="button">
            <a href="nuevo.php" class="button">Agregar Cliente</a>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Dirección</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once ('funciones.php');
                    $clientes = obtenerClientes();
                    foreach ($clientes as $cliente):
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($cliente['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($cliente['correo']); ?></td>
                    <td><?php echo htmlspecialchars($cliente['telefono']); ?></td>
                    <td><?php echo htmlspecialchars($cliente['direccion']); ?></td>
                    <td></td>
                    <td class="actions">
                        <a href="editar.php?id=<?php echo $cliente['_id']; ?>" class="button">Editar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
