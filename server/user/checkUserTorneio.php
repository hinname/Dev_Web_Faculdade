<?php

require_once('../acessoDB.php');

session_start();
if (isset($_SESSION['id'])) {
      $query = $pdo->prepare("SELECT * FROM usuario_torneio WHERE id_user='{$_SESSION['id']}'");
      $query->execute();
      $resultado = $query->fetchAll();

      $resultadoF = count($resultado);

      if ($resultadoF > 0) {
            echo "Participa torneio";
      } else {
            echo "Nao participa torneio";
      };
}


?>