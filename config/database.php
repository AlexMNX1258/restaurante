<?php
    require_once __DIR__.'/../vendor/autoload.php';
    $mongoClient = new MongoDB\Client("mongodb+srv://admin:HxkLuQhPcEKaVHPS@cluster0.hikyu.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0");
    $database = $mongoClient->selectDatabase('restaurant');
    $clientesCollection = $database->clientes;
    $productosCollection = $database->productos;
    $pedidosCollection = $database->pedidos;
?>


