<?php
// Abrir a conexão 
require_once('../db/connection.inc.php');
require_once('produto.dao.php');

// Instanciar o DAO
$produtoDAO = new ProdutoDAO($pdo);

//Receber os dados do cliente
$json = file_get_contents('php://input');

//Criar um objeto a partir do JSON
$produto = json_decode($json);

// Conteúdo da resposta para o cliente
$responseBody = "vc ta burro";

// Inserir o usuário no banco de dados
$produto = $produtoDAO->insert($produto);
$responseBody = json_encode($produto); // Transforma em JSON

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);
