<?php
// Abrir a conexão 
require_once('../db/connection.inc.php');
require_once('compra.dao.php');

// Instanciar o DAO
$compraDAO = new CompraDAO($pdo);

//Receber os dados do cliente
$id_compra = $_REQUEST["id_compra"];

// Conteúdo da resposta para o cliente
$responseBody = "vc ta burro, n foi a função de deletar kkkkk";

// Inserir a compra no banco de dados
$compra = $compraDAO->delete($id_compra);
$responseBody = json_encode($compra); // Transforma em JSON

// Gerar a resposta para o cliente
header("Content-type: application/json");
print_r($responseBody);

?>