<?php
    /**
     * Método para 
     */
    require_once('../db/connection.inc.php');
    require_once('categoria.dao.php');

    $categoriaDAO = new CategoriaDAO($pdo);

    $categorias = $categoriaDAO->getAll();
    
    $responseBody = json_encode($categorias);

    header('Content-type: application/json');
    print_r($responseBody);

?>