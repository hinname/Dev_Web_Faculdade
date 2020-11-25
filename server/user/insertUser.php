<?php

function formataTelefone($numero){
      $formata = substr($numero, 0, 2);
      $formata_2 = substr($numero, 3, 5);
      $formata_3 = substr($numero, 4, 4);
      return "(".$formata.") " . $formata_2 . "-". $formata_3;
}

require_once('../acessoDB.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha1'];
$sexo = $_POST['gender'];
$telefone = formataTelefone($_POST['telefone']);
$data_nasc = $_POST['datenasc'];


$row = [
      'nome' => $nome,
      'email' => $email,
      'senha' => $senha,
      'sexo' => $sexo,
      'telefone' => $telefone,
      'data_nasc' => $data_nasc
];


$sql = "INSERT INTO usuarios SET 
      nome=:nome, email=:email, senha=:senha, sexo=:sexo, telefone=:telefone, data_nasc=:data_nasc;";
$status = $pdo->prepare($sql)->execute($row);

if($status){

      header('location: sucessoInsertUser.php');
}else {
      echo "Erro no Insert do usuario";
}


?>