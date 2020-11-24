<?php
session_start();

$logged = $_SESSION['logged'] ?? NULL;

if (!$logged) die('Sai daqui!');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Sucesso no Cadastro</title>
      <link rel="stylesheet" href="../../web/pages/global/css/global.css">
</head>
<body>
      <center><h2>Cadastro Realizado com Sucesso!</h2></center>
      <center><a 
      href="../../web/pages/landingPage/html/index.html" 
      style="background-color: #ba401b;
      color: white;
      padding: 1em 1.5em;
      text-decoration: none;
      text-transform: uppercase;
      border-radius: 5%;"
      >
      Clique aqui para voltar para inicio (Você será deslogado)
      </a>
      </center>

      <br>
      <br>

      <center><a 
      href="../../web/pages/form/formGames/html/index.html" 
      style="background-color: #ba401b;
      color: white;
      padding: 1em 1.5em;
      text-decoration: none;
      text-transform: uppercase;
      border-radius: 5%;"
      >
      Clique aqui inscrever-se em um torneio
      </a>
      </center>
</body>
</html>