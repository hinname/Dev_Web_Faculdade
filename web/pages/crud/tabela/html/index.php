<?php

require_once('../../../../../server/acessoDB.php');

if(!defined('PDO::ATTR_DRIVER_NAME')) {
      echo "PDO não está disponivel. Ative no php.ini";
}

$nomeTabela = $_POST['tabela'];

$_SESSION['tabela'] = $nomeTabela;

$sql = "SELECT * FROM $nomeTabela Order by id";
$statement = $pdo->prepare($sql);
$statement->execute();
$linhas = $statement->fetchAll();

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
      <title>Tabela </title>
      <link rel="stylesheet" href="../../../global/css/global.css">
      <link rel="stylesheet" href="../../../form/formGlobal/formGlobal.css">
      <link rel="stylesheet" href="../../../form/formGlobal/formUser.css">
      <script src="../js/tabela.js"></script>
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
            <form id="formTabela" action="../../manut_tabela/html/index.php" method="POST">
            <fieldset class="background"> 
            <?php
            echo "<table border=1>";

            foreach($resultado as $columname){
                  echo "<th>{$columname['Field']}</th>";
            }

            if($statement->rowCount()) {
                  $cont=0;
                  for($i = 0; $i < count($linhas); $i++){
                        echo "<tr>";
                        foreach($linhas[$i] as $linha){
                              $cont += 1;
                              if($cont == 1){
                                    echo "<td><input type=radio name=rd{$nomeTabela} value={$linha} checked>{$linha}</td>";
                              }else {
                                    echo "<td>{$linha}</td>";
                              }
                        }
                        $cont=0;
                        echo "</tr>";
                  }
            } else if (!$statement->rowCount()) {
                  echo "A tabela está vazia!";
            }
            echo "</table>";
            ?>

            <button type="submit" name="escolha" value="0">Inserir novo <?php echo "{$nomeTabela}" ?></button>
            <button type="submit" name="escolha" value="1">Alterar um <?php echo "{$nomeTabela}" ?> </button>
            <button type="submit" name="escolha" value="2">Excluir um <?php echo "{$nomeTabela}" ?></button>

            </form>
      </div>
</body>
</html>