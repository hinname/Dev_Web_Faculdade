<?php

session_start();

require_once('../acessoDB.php');

$query = $pdo->prepare("SELECT * FROM jogos");
$query->execute();
$resultado = $query->fetchAll();


echo json_encode($resultado);

?>