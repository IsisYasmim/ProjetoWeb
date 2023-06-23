<?php
    /**
     * Método para 
     */
    require_once('../db/connection.inc.php');
    require_once('produto.dao.php');

    $produtoDAO = new ProdutoDAO($pdo);

    $produtos = $produtoDAO->getAll();
    
    $responseBody = json_encode($produtos);

    header('Content-type: application/json');
    print_r($responseBody);

?>