<?php
    require_once __DIR__ .'/../config/database.php';

    function obtenerClientes() {
        global $clientesCollection;
        return $clientesCollection->find();
    }

    function eliminarCliente($id) {
        global $clientesCollection;
        $clientesCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    }

    function obtenerClientePorId($id) {
        global $clientesCollection;
        return $clientesCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    }

    function editarCliente($id, $nombre, $correo, $telefono, $direccion) {
        global $clientesCollection;
        $clientesCollection->updateOne(
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
        global $clientesCollection;
        $clientesCollection->insertOne([
            'nombre' => $nombre,
            'correo' => $correo,
            'telefono' => $telefono,
            'direccion' => $direccion 
        ]);
    }
    
?>
