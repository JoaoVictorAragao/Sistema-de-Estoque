<?php


$host = "localhost";
$user = "root";
$pass = "";
$dbname = "users";
$port = 3306;

try{
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
    
}catch(PDOException $err){
    echo "Erro: falha na conexão com o banco de dados. Erro: " . $err->getMessage();
}