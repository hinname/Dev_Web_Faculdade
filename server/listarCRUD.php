<?php

require_once('acessoDB.php');

header('Content-type: application/json');

if(!defined('PDO::ATTR_DRIVER_NAME')) {
      echo "PDO não está disponivel. Ative no php.ini";
}



$nomeTabela = $_GET['tabela'];

$sql = "SELECT * FROM $nomeTabela Order by id";
$statement = $pdo->prepare($sql);
$statement->execute();

$colums = "SHOW FIELDS FROM funcionarios FROM $dbname;";
$query = $pdo->prepare($colums);
$query->execute();

$dale = $query->fetchAll();

echo "<pre>";
var_dump($dale[0]["Field"]);
echo "</pre>";



if($statement->rowCount()) {

      echo json_encode($statement->fetchall(PDO::FETCH_ASSOC));

} elseif (!$statement->rowCount()) {
      echo "A tabela está vazia!";
}

header('location: ../web/pages/crud/tabela/html/index.html');



?>