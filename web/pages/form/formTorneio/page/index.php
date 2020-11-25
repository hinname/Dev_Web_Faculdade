<?php

require_once('../../../../../server/acessoDB.php');

session_start();

if(!isset($_SESSION['logged']) || $_SESSION['logged'] == false) {
      echo "<script>Window.alert('você não tem autorização para acessar página, faça login')</script>";
      header('location: ../../../login/loginUser/html');
}

$id_jogo = $_POST['gamerad'] ?? NULL;


$query = $pdo->prepare("SELECT * FROM torneios WHERE id_jogo = $id_jogo");
$query->execute();
$resultado = $query->fetchAll();

$query = $pdo->prepare("SELECT nome FROM jogos WHERE id = $id_jogo");
$query->execute();
$resultadoGame = $query->fetch();



if(isset($_POST['gameCheckbox'])) {
      $gamelen = count($_POST['gameCheckbox']);
      $query = $pdo->prepare("SELECT * FROM torneios");
      $query->execute();
      $resultados = $query->fetchAll();
      $torneiolen = count($resultados);
}





?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../../../global/css/global.css">
      <link type="text/css" rel="stylesheet" href="../../formGlobal/formGlobal.css">
      <link type="text/css" rel="stylesheet" href="../css/formTorneio.css">
      <title>Cadastro torneios</title>
      <script src="../js/form.js"></script>
</head>
<body>
      
            <div class="interface">
                  <header>
                        <div class="navbar-brand">
                              <a class="active" href="../../../landingPage/html/">Torneio de Games</a>
                              <img src="../../../../assets/logo.png" width="200">
                        </div>
                        <ul class="navbar-options">
                              <li class="nav-link">
                                    <a class="nav-link" href="../../../landingPage/html/index.html">Home </a>
                              </li>
                              <li class="nav-link">
                                    <a class="nav-link" href="../../../info/html/info.html">Informações</a>
                              </li>
                        </ul>
                        
                  </header>

                  <div class="content">
                        <div class="view-text">
                              <h1>Inscrição Torneio</h1>
                        </div>
                        
                        <form id="cadastro" action="../../../../../server/user/insertTorneio.php" method="post">
                              <fieldset class="background">
                                    
                                    <div class="fields">
                                          <div class="input">
                                                <?php
                                                      echo "<p>{$resultadoGame['nome']}</p> <br>";
                                                      for($i = 0; $i < count($resultado); $i ++) {
                                                            echo '<label for="dataradio' . $i . '">' . $resultado[$i]['data_inicio'] . ' até ' . $resultado[$i]['data_termino'] . '</label> <input type="radio" id="dataradio' . $i . '">';
                                                      }
                                                      if(isset($gamelen)){
                                                            for($i = 0 ; $i < $gamelen; $i++) {
                                                                  $query = $pdo->prepare("SELECT nome FROM jogos WHERE id = {$resultados[$i]['id_jogo']}"); 
                                                                  $query->execute();
                                                                  $resultadosGames = $query->fetch();
                                                                  echo "<hr>";
                                                                  echo "<p>{$resultadosGames['nome']}</p> <br>";
                                                                  echo '<label for="dataradio' . $i . '">' . $resultados[$i]['data_inicio'] . ' até ' . $resultados[$i]['data_termino'] . '</label> <input type="radio" name="datacheck ' . $resultados[$i]['id'] . '" id="dataradio' . $i . '"> ';
                                                            };
                                                      }
                                                      
                                                ?>
                                          </div>
                                          <div class="info">
                                                * = campo obrigatório
                                          </div>
                                                      <center><button class="btnSubmit" type="submit">Continuar</button></center>
                                          
                                    </div>
                              </fieldset>
                        </form>
                  </div>
            </div>
            
      <footer>
            Versão alpha
      </footer>
      
</body>
</html>