<?php

require_once('../../../../../server/acessoDB.php');


$query = $pdo->prepare("SELECT table_name FROM information_schema.tables WHERE table_schema = 'torneio_games_web';");
$query->execute();
$resultado = $query->fetchAll();




?>


<!DOCTYPE html>
<html lang="pt_br">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../../../global/css/global.css">
      <link rel="stylesheet" href="../../../form/formGlobal/formGlobal.css">
      <link rel="stylesheet" href="../../../form/formGlobal/formUser.css">
      <link rel="stylesheet" href="../css/styles.css">
      <title>CRUD</title>
      <script src="../js/script.js"></script>
      
</head>
<body onload="getNome()">
      <header>
            <ul class="navbar-options">
                  <li class="nav-link">
                        <button class="nav-button" id="logout" onclick="logout()" value="1" style="color:#fff">Logout</button>
                  </li>
            </ul>
      </header>

      <center>
            <p id="nome">
                  Olá 
            </p>
      </center>

      <div class="content">
      <h2>Selecione a tabela: </h2>
            <fieldset class="background">
            <form action="../../tabela/html/index.php" method="POST">

                  <?php
                        foreach($resultado as $tabela) {
                              $c = 1;
                              echo '<label for="radio'. $c .'">'. $tabela["table_name"] .'</label><input type="radio" name="tabela" id="radio'. $c .'" value="'. $tabela["table_name"] .'" checked> <br>';
                              $c = $c + 1;
                        }
      
                  ?>
                  <br>
                  <center><button type="submit">Mostrar tabela</button></center>
            </form>
            </fieldset>
      </div>
      
</body>
</html>