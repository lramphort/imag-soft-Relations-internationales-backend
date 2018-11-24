<?php
header('Content-Type: application/json');

try{
    $pdo = new PDO('mysql:host=localhost;port=8080;dbname=localDataBase;','root','root');
    $retour['success'] = true;
    $retour['message'] = "Connection réussie";
}catch(Exception $e){
    $retour['success'] = false;
    $retour['message'] = "Connection impossbile";
}

echo json_encode($retour);