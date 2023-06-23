<?php

    require_once("lib/jwtutil.inc.php");
    require_once("../config.php");

    //Receber o JSON enviado pelo cliente
    //Obter o conteúdo do corpo da requisição

    $json = file_get_contents('php://input');

    //Transforma o JSON em um objeto PHP
    $credentials = json_decode($json);

    $responseBody = ''; //Variável para armazenar a resposta


    //Verificar se as credenciais são válidas
if($credentials->username == "admin" && $credentials->password == "1234") {
 

    $payload = [
        "id"=> 1,
        "username" => $credentials->username,
        "role"=> "admin"
    ];

    $token = JwtUtil::encode($payload, JWT_SECRET_KEY);

    $responseBody = '{"token": "'.$token.'"}';
}

else {
       http_response_code(401);
       $responseBody = '{ "message": "Credencial inválida" }';

    }

    print_r($responseBody);

?>