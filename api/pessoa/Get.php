<?php
    /**
     * Método para 
     */
    require_once('../db/connection.inc.php');
    require_once('pessoa.dao.php');

    $pessoaDAO = new PessoaDAO($pdo);

    $pessoas = $pessoaDAO->getAll();
    
    $responseBody = json_encode($pessoas);

    header('Content-type: application/json');
    print_r($responseBody);

?>