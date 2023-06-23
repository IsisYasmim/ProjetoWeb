<?php
    $servername = 'localhost';
    $port = '3306';
    $username = 'root';
    $password = '';
    $dbname = 'videolocadora';

    $pdo = new PDO(
    "mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
?>