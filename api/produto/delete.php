<?php
// Abrir a conexão 
require_once('../db/connection.inc.php');
require_once('produto.dao.php');

// Instanciar o DAO
$produtoDAO = new ProdutoDAO($pdo);

//Receber os dados do cliente
$id_produto = $_REQUEST["id_produto"];

// Conteúdo da resposta para o cliente
$responseBody = "vc ta burro, n foi a função de deletar kkkkk";

// Inserir o usuário no banco de dados
$produto = $produtoDAO->delete($id_produto);
$responseBody = json_encode($produto); // Transforma em JSON

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);

?>