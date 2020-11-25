<?php

session_start();
$_SESSION['logged'] = false;

if(!defined('PDO::ATTR_DRIVER_NAME')) {
      echo "PDO não está disponivel. Ative no php.ini";
}

require_once('../acessoDB.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = $pdo->prepare("SELECT * FROM usuarios WHERE email='$email' && senha='$senha'");
$query->execute();
$resultado = $query->fetchAll();



$resultadoF = count($resultado);

if ($resultadoF == 1) {
      
      $_SESSION['logged'] = true;
      $_SESSION['nome'] = $resultado[0]['nome'];
      $_SESSION['id_user'] = $resultado[0]['id'];

      header('location: ../../web/pages/loggedin/html/index.html');
} else {
      header('location: ../suporte/teste.php');
};


?>