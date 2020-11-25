<?php

require_once('../acessoDB.php');

session_start();
if (isset($_SESSION['id_user'])) {
      $busca = "SELECT * FROM usuario_torneio WHERE id_user='" . $_SESSION['id_user'] . "'";
      $query = $pdo->prepare($busca);
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