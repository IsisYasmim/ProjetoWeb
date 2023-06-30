<?php
// Abrir a conexão 
require_once('../db/connection.inc.php');
require_once('pessoa.dao.php');

// Instanciar o DAO
$pessoaDAO = new PessoaDAO($pdo);

//Receber os dados do cliente
$json = file_get_contents('php://input');

//Criar um objeto a partir do JSON
$pessoa = json_decode($json);

// Conteúdo da resposta para o cliente
$responseBody = "vc ta burro";

// Inserir o usuário no banco de dados
$pessoa = $pessoaDAO->insert($pessoa);
$responseBody = json_encode($pessoa); // Transforma em JSON

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);
