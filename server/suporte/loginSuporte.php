<?php

session_start();


if(!defined('PDO::ATTR_DRIVER_NAME')) {
      echo "PDO não está disponivel. Ative no php.ini";
}

require_once('acessoDB.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = $pdo->prepare("SELECT id FROM funcionarios WHERE email='$email' && senha='$senha'");
$query->execute();
$resultado = $query->fetchAll();

$resultado = count($resultado);

if ($resultado == 1) {

      $_SESSION['status'] = 'logged';
      $_SESSION['email'] = $email;

      header('location:../web/pages/crud/home/html/index.html');
} else {
      header('location: teste.php');
};

?>