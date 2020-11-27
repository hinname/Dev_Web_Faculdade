<?php
require_once('../acessoDB.php');
session_start();

$nomeTabela = $_SESSION['tabela'];

if (isset($_SESSION['excluir_tabela']) && $_SESSION['excluir_tabela'] == TRUE) {
      $id = $_SESSION['id_tabela'];

      $delete = "DELETE FROM {$nomeTabela} WHERE id={$id}";
      $sql = $pdo->prepare($delete);
      $sql->execute();
      $_SESSION['excluir_tabela'] == FALSE;
      header('location: ../../web/pages/crud/home/html/index.php');
}


$escolha = $_POST['definicao'] ?? 'nada';

$colums = "SHOW FIELDS FROM $nomeTabela FROM $dbname;";
$query = $pdo->prepare($colums);
$query->execute();
$resultado = $query->fetchAll();


if($escolha === '0'){
      $values = "";
      foreach($resultado as $linha){

            $campo = $linha['Field'];

            if($campo == 'id'){
                  $value = 'null';
            }else{
                  $value = $_POST[$campo];
            }
            
            if(is_numeric($value) || $value == 'null'){
                  if($campo == 'id'){
                        $values = $values . $value;
                  }else{
                        $values = $values . ", " . $value;
                  }
            }else{
                  $values = $values . ", '" . $value . "'";
            }

      }

      $insert = "INSERT INTO {$nomeTabela} VALUES ({$values})";
      var_dump($insert);
      $sql = $pdo->prepare($insert);
      $sql->execute();
      echo "<script>window.alert('Sucesso!!')</script>";
      header('location: ../../web/pages/crud/home/html/index.php');

}else if ($escolha === '1') {
      $id = $_SESSION['id_tabela'];
      $cont = 0;
      $updates = "";
      foreach($resultado as $linha){
            $campo = $linha['Field'];
            $value = $_POST[$campo];

            if($campo == 'id'){

            }else {
                  $cont += 1;
                  if(is_numeric($value)){
                        if($cont == 1){
                              $updates = $updates . $campo . "=" . $value;
                        }else {
                              $updates = $updates . ", " . $campo . "=" . $value;
                        }
                        
                  }else {
                        if($cont == 1){
                              $updates = $updates . $campo . "=" . "'".$value."'";
                        }else {
                              $updates = $updates . ", " . $campo . "=" . "'".$value."'";
                        }
                  }
            }

            
      }
      $update = "UPDATE {$nomeTabela} SET {$updates} WHERE id={$id};";
      $sql = $pdo->prepare($update);
      $sql->execute();
      header('location: ../../web/pages/crud/home/html/index.php');

}

?>