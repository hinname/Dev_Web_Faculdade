<?php

session_start();

require_once('../acessoDB.php');

$query = $pdo->prepare("SELECT * FROM jogos");
$query->execute();
$resultado = $query->fetchAll();

$id_user = $_SESSION['id_user'];

foreach($resultado as $game){
      $id_jogo = $game['id'];
      if(isset($_POST["torneio{$id_jogo}"])){
            $id_torneio = $_POST["torneio{$id_jogo}"];

            $insert = "INSERT INTO usuario_torneio VALUES(null, {$id_user}, {$id_torneio})";
            $status = $pdo->prepare($insert);
            $status->execute();

            if($status){
                  echo "Inscrição confirmada! <br>";
            }else {
                  echo "falha na inscrição <br>";
            }
      }
}
header('location: ../../web/pages/form/formPagame/html');


?>