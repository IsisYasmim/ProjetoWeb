<?php
// Abrir a conexão 
require_once('../db/connection.inc.php');
require_once('pessoa.dao.php');

// Instanciar o DAO
$pessoaDAO = new PessoaDAO($pdo);

//Receber os dados do cliente
$id = $_REQUEST["id"];

// Conteúdo da resposta para o cliente
$responseBody = "vc ta burro, n foi a função de deletar kkkkk";

// Inserir o usuário no banco de dados
$pessoa = $pessoaDAO->delete($id);
$responseBody = json_encode($pessoa); // Transforma em JSON

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);

?>