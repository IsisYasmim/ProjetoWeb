<?php
// Abrir a conexão 
require_once('../db/connection.inc.php');
require_once('compra.dao.php');

// Instanciar o DAO
$compraDAO = new CompraDAO($pdo);

// Conteúdo da resposta para o cliente
$responseBody = "vc ta burro";

//obtendo o parâmetro id vindo pela URL da requisição
$id_compra = $_REQUEST["id_compra"];

if (!$id_compra) {
    $responseBody = '{ "message": "Compra não informado"}';
    http_response_code(404);
} else {
    //Receber os dados do cliente
    $json = file_get_contents('php://input');

    //Criar um objeto a partir do JSON
    $compra = json_decode($json);

    // Inserir a compra no banco de dados
    $compra = $compraDAO->update($id_compra, $compra);
    $responseBody = json_encode($compra); // Transforma em JSON
}

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);
