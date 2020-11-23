<?php

require_once('../../../../../server/acessoDB.php');
session_start();

$nomeTabela = $_SESSION["tabela"];
$escolha = $_POST["escolha"];
if($escolha != 0){
      $id = $_POST["rd{$nomeTabela}"];
      $_SESSION['id_tabela'] = $id;

      if($escolha == 1) {
            $titulo = "Alterar - {$nomeTabela}";
            $button = '<center><button type="submit" name="escolha" value="1">Alterar</button></center>';
      }else if($escolha == 2) {
            $titulo = "Excluir - {$nomeTabela}";
            header('location: ../../../../../server/suporte/manut_tabela.php');
      }

      $sql = "SELECT * FROM $nomeTabela WHERE id = {$id}";
      $statement = $pdo->prepare($sql);
      $statement->execute();
      $linha = $statement->fetch();

}else {

      $titulo = "Inserir - {$nomeTabela}";
      $button = '<center><button type="submit" name="escolha" value="0">Inserir</button></center>';

}

$colums = "SHOW FIELDS FROM $nomeTabela FROM $dbname;";
$query = $pdo->prepare($colums);
$query->execute();
$resultado = $query->fetchAll();




?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>
            <?php echo"{$titulo}"; ?>
      </title>
      <link rel="stylesheet" href="../../../global/css/global.css">
      <link rel="stylesheet" href="../../../form/formGlobal/formGlobal.css">
      <link rel="stylesheet" href="../../../form/formGlobal/formUser.css">
      <script src="../js/script.js"></script>
</head>
<body>
      <header>
            <ul class="navbar-options">
                  <li class="nav-link">
                        <button class="nav-button" id="logout" onclick="logout()" value="1" style="color:#fff">Logout</button>
                  </li>
            </ul>
      </header>
      <div class = "content">
            <form id="formCampo" action="../../../../../server/suporte/manut_tabela.php" method="POST">
            <fieldset class="background"> 
            <?php
            if($escolha == 0) {
                  $cont = 0;
                  foreach ($resultado as $campo){
                        $cont += 1;
                        if($cont == 1){
                              echo '<label for="' . $campo['Field'] . '">'. $campo['Field'] . '</label> <input type="text" name="'. $campo['Field'] . '" id="' . $campo['Field'] . '" disabled value="Id será inserido automaticamente"> ';
                        }else{
                              echo '<label for="' . $campo['Field'] . '">'. $campo['Field'] . '</label> <input type="text" name="'. $campo['Field'] . '" id="' . $campo['Field'] . '">';
                        }
                        
                  }
            } else if ($escolha == 1) {
                  $cont = 0;
                  foreach($resultado as $campo) {
                        $field = $campo['Field'];
                        if($cont == 0){
                              echo '<label for="' . $campo['Field'] . '">'. $campo['Field'] . '</label> <input type="text" name="'. $campo['Field'] . '" id="' . $campo['Field'] . '" disabled value="'. $linha[$field] . '"> ';
                        }else{
                              echo '<label for="' . $campo['Field'] . '">'. $campo['Field'] . '</label> <input type="text" name="'. $campo['Field'] . '" id="' . $campo['Field'] . '" value="' . $linha[$field] . '">';
                        }

                        $cont += 1;
                  }
            }
            

            echo"<br> <br>";
            echo $button;
            ?>
            </form>
      </div>
</body>
</html>