<?php
// Abrir a conexão 
require_once('../db/connection.inc.php');
require_once('pessoa.dao.php');

// Instanciar o DAO
$pessoaDAO = new PessoaDAO($pdo);

// Conteúdo da resposta para o cliente
$responseBody = "vc ta burro";

//obtendo o parâmetro id vindo pela URL da requisição
$id = $_REQUEST["id"];

if (!$id) {
    $responseBody = '{ "message": "Usuário não informado"}';
    http_response_code(404);
} else {
    //Receber os dados do cliente
    $json = file_get_contents('php://input');

    //Criar um objeto a partir do JSON
    $pessoa = json_decode($json);

    // Inserir o usuário no banco de dados
    $pessoa = $pessoaDAO->update($id, $pessoa);
    $responseBody = json_encode($pessoa); // Transforma em JSON
}

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);
