<?php
// Abrir a conexão 
require_once('../db/connection.inc.php');
require_once('categoria.dao.php');

// Instanciar o DAO
$categoriaDAO = new CategoriaDAO($pdo);

// Conteúdo da resposta para o cliente
$responseBody = "vc ta burro";

//obtendo o parâmetro id vindo pela URL da requisição
$id_categoria = $_REQUEST["id_categoria"];

if (!$id_categoria) {
    $responseBody = '{ "message": "Categoria não informada"}';
    http_response_code(404);
} else {
    //Receber os dados do cliente
    $json = file_get_contents('php://input');

    //Criar um objeto a partir do JSON
    $categoria = json_decode($json);

    // Inserir o usuário no banco de dados
    $categoria = $categoriaDAO->update($id_categoria, $categoria);
    $responseBody = json_encode($categoria); // Transforma em JSON
}

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);
