<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/styles.css">

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
