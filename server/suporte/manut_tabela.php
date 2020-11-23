<?php
require_once('../acessoDB.php');
session_start();

$nomeTabela = $_SESSION["tabela"];
$escolha = $_POST["escolha"];

$colums = "SHOW FIELDS FROM $nomeTabela FROM $dbname;";
$query = $pdo->prepare($colums);
$query->execute();
$resultado = $query->fetchAll();



if($escolha == 0){
      foreach($resultado as $linha){

            $campo = $linha['Field'];

            if($campo == 'id'){
                  $value = NULL;
            }else{
                  $value = $_POST[$campo];
            }
            
            if(is_numeric($value)){

                  $insert = "INSERT INTO {$nomeTabela} ({$campo}) VALUES ({$value});";
                  $sql = $pdo->prepare($insert);
                  $sql->execute();
            }else{
                  $insert = " INSERT INTO {$nomeTabela} ({$campo}) VALUES ( ' " . $value . "  '); ";
                  $sql = $pdo->prepare($insert);
                  $sql->execute();
            }

            

      }
      header('location: ../../web/pages/crud/tabela/html/index.php');

}else if ($escolha == 1) {
      $id = $_SESSION['id_tabela'];
      foreach($resultado as $linha){
            $campo = $linha['Field'];
            $value = $_POST[$campo];

            if(is_numeric($value)){
                  $update = "UPDATE {$nomeTabela} SET {$campo} = {$value} WHERE id={$id};";
                  $sql = $pdo->prepare($update);
                  $sql->execute();
            }else {
                  $update = "UPDATE {$nomeTabela} SET {$campo} = '" . $value . "' WHERE id={$id};";
                  $sql = $pdo->prepare($update);
                  $sql->execute();
            }
      }
      header('location: ../../web/pages/crud/tabela/html/index.php');

}else if ($escolha == 3) {
      $id = $_SESSION['id_tabela'];

      $delete = "DELETE FROM {$nomeTabela} WHERE id={$id}";
      $sql = $pdo->prepare($delete);
      $sql->execute();
      header('location: ../../web/pages/crud/tabela/html/index.php');
}

?>