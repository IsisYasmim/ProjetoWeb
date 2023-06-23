<?php

// Abrir a conexão 
require_once('../db/connection.inc.php');
require_once('categoria.dao.php');

// Instanciar o DAO
$categoriaDAO = new CategoriaDAO($pdo);

//Receber os dados do cliente
$json = file_get_contents('php://input');

//Criar um objeto a partir do JSON
$categoria = json_decode($json);

// Conteúdo da resposta para o cliente
$responseBody = "vc ta burro";

// Inserir o usuário no banco de dados
$categoria = $categoriaDAO->insert($categoria);
$responseBody = json_encode($categoria); // Transforma em JSON

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);
