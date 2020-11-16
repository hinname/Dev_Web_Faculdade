<!DOCTYPE html>
<html lang="pt-br">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Inicio projeto</title>
</head>
<body>
      <h2>Qual rota deseja acessar?</h2>
      <ul>
            <li><a href="web/pages/landingPage/html">Link para Landing Page (USER site)</a></li>
            <li><a href="web/pages/login/loginSuporte/html">Link para Login Suporte (CRUD site)</a></li>
      </ul>

      <?php
            require_once('server/acessoDB.php');
            $query = $pdo->prepare("SELECT id FROM funcionarios WHERE email='herivelton.PRo@gmail.com' && senha='servidor'");
            $query->execute();
            $resultado = $query->fetchAll();

            echo count($resultado);
      ?>
</body>
</html>