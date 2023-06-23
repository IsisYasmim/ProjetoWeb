<?php
// Abrir a conexão 
require_once('../db/connection.inc.php');
require_once('produto.dao.php');

// Instanciar o DAO
$produtoDAO = new ProdutoDAO($pdo);

// Conteúdo da resposta para o cliente
$responseBody = "vc ta burro";

//obtendo o parâmetro id vindo pela URL da requisição
$id_produto = $_REQUEST["id_produto"];

if (!$id_produto) {
    $responseBody = '{ "message": "Produto não informado"}';
    http_response_code(404);
} else {
    //Receber os dados do cliente
    $json = file_get_contents('php://input');

    //Criar um objeto a partir do JSON
    $produto = json_decode($json);

    // Inserir o usuário no banco de dados
    $produto = $produtoDAO->update($id_produto, $produto);
    $responseBody = json_encode($produto); // Transforma em JSON
}

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);
