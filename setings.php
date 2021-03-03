<?php
session_start();
global $pdo;
global $id_Champ;
try{
    $pdo = new PDO("mysql:dbname=snooker;host=localhost","root","");
}
catch(PDOException $e){
    echo "Erro com a conexão de banco: ".$e->getMessage();
    exit;
}
?>