<?php
    require_once __DIR__ .'/../config/database.php';

    function obtenerClientes() {
        global $booksCollection;
        return $booksCollection->find();
    }

    function eliminarCliente($id) {
        global $booksCollection;
        $booksCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    }

    function obtenerClientePorId($id) {
        global $booksCollection;
        return $booksCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    }

    function editarCliente($id, $nombre, $correo, $telefono, $direccion) {
        global $booksCollection;
        $booksCollection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId($id)],
            ['$set' => [
                'nombre' => $nombre,
                'correo' => $correo,
                'telefono' => $telefono,
                'direccion' => $direccion
            ]]
        );
    }

    
    function agregarCliente($nombre, $correo, $telefono, $direccion) {
        global $booksCollection;
        $booksCollection->insertOne([
            'nombre' => $nombre,
            'correo' => $correo,
            'telefono' => $telefono,
            'direccion' => $direccion 
        ]);
    }
    
?>
