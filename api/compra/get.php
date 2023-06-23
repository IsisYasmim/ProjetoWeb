<?php
    /**
     * Método para 
     */
    require_once('../db/connection.inc.php');
    require_once('compra.dao.php');

    $compraDAO = new CompraDAO($pdo);

    $compras = $compraDAO->getAll();
    
    $responseBody = json_encode($compras);

    header('Content-type: application/json');
    print_r($responseBody);

?>