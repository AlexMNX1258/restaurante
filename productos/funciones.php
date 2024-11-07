<?php
    require_once __DIR__ .'/../config/database.php';

    function obtenerProducto() {
        global $productosCollection;
        return $productosCollection->find();
    }

    function eliminarProducto($id) {
        global $productosCollection;
        $productosCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    }

    function obtenerProductoPorId($id) {
        global $productosCollection;
        return $productosCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    }

    function editarProducto($id, $nombre, $precio, $descripcion, $categoria, $disponible) {
        global $productosCollection;
        $productosCollection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId($id)],
            ['$set' => [
                'nombre' => $nombre,
                'precio' => $precio,
                'descripcion' => $descripcion,
                'categoria' => $categoria,
                'disponible' => $disponible

            ]]
        );
    }

    
    function agregarProducto($nombre, $precio, $descripcion, $categoria, $disponible) {
        global $productosCollection;
        $productosCollection->insertOne([
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'categoria' => $categoria,
            'disponible' => $disponible
        ]);
    }
    
?>
