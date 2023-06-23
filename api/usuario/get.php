<?php
    /**
     * Método para 
     */
    require_once('../db/connection.inc.php');
    require_once('usuario.dao.php');

    $usuarioDAO = new UsuarioDAO($pdo);

    $usuarios = $usuarioDAO->getAll();
    
    $responseBody = json_encode($usuarios);

    header('Content-type: application/json');
    print_r($responseBody);

?>