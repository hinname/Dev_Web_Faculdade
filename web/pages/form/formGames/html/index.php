<?php

require_once('../../../../../server/acessoDB.php');
session_start();


$query = $pdo->prepare("SELECT * FROM jogos");
$query->execute();
$resultado = $query->fetchAll();





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
<body onload="main()">
      
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
                        
                        <form id="cadastro" name="inscricaoTorneio" action="../../../../../server/user/insertTorneio.php" method="post" onchange="loadForm()">
                              <fieldset class="background">
                                    
                                    <div class="fields">
                                          <?php
                                                foreach($resultado as $game){
                                                      echo "<div class='game' id='" . $game['id'] .  "'>";
                                                      echo "<input type='checkbox' class='gameselect' name='" . $game['nome'] . "' id='jogo" . $game['id'] . "' value ='" . $game['id'] . "'>";
                                                      echo "<label for='" . $game['id'] . "'>{$game['nome']}</label>";
                                                      echo "<br>";
                                                      echo "<div class='torneio' id='torneios" . $game['id'] . "'>";
                                                      $sql = $pdo->prepare("SELECT * FROM torneios WHERE id_jogo={$game['id']}");
                                                      $sql->execute();
                                                      $torneios = $sql->fetchAll();
                                                      foreach($torneios as $torneio) {
                                                            echo "<input type='radio' name='torneio" . $game['id'] . "' id='torneio" . $torneio['id'] . "' value='" . $torneio['id'] . "'>";
                                                            echo "<label for='" . $torneio['id'] . "'>{$torneio['nome']} --------- ({$torneio['data_inicio']} até {$torneio['data_termino']})</label>";
                                                            echo "<br>";
                                                      }
                                                      echo "</div>";
                                                      echo "</div>";
                                                      echo "<hr>";
                                                }

                                          ?>
                                          
                                          
                                          <div class="input">
                                                <span><p id="valfinal">Valor: R$ 0 </p></span> 
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