function abrirConexao() {
  var conexao;
  // Verificando Browser
  if (window.XMLHttpRequest) {
    conexao = new XMLHttpRequest();
  }
  else if (window.ActiveXObject) {
    conexao = new ActiveXObject("Microsoft.XMLHTTP");
  } else {
    Alert("Problema de suporte ao Ajax.")
  }
  return conexao;
}

function checkSession() {
  var req = abrirConexao();

  var url = '../../../../../server/autorizaLogin.php';

  req.open("GET", url, true);

  req.send();

  req.onreadystatechange = function() {
    if(req.readyState == 4 && req.status == 200) {
      var resposta = req.responseText;
  
      if (resposta != 'não autorizado') {

      }else {
        window.alert("Você não tem autorização para acessar essa página, faça login!")
        window.location.replace("http://localhost/Dev_Web_Faculdade/web/pages/login/loginUser/html/");
      }
    }
  }
}


function showTorneios() {
  var game1 = document.getElementById('jogo1');
  var game2 = document.getElementById('jogo2');
  var game3 = document.getElementById('jogo3');
  var game4 = document.getElementById('jogo4');

  if(game1.checked){
    document.getElementById('torneios1').style.display = "block";
    //document.getElementById('torneio1').disabled = true;
  }else {
    document.getElementById('torneios1').style.display = "none";
    //document.getElementById('torneio1').disabled = false;
  }

  if(game2.checked){
    document.getElementById('torneios2').style.display = "block";
    //document.getElementById('torneio2').checked = true;
  }else {
    document.getElementById('torneios2').style.display = "none";
    //document.getElementById('torneio2').checked = false;
  }

  if(game3.checked){
    document.getElementById('torneios3').style.display = "block";
    //document.getElementById('torneio4').checked = true;
  }else {
    document.getElementById('torneios3').style.display = "none";
    //document.getElementById('torneio4').checked = false;
  }

  if(game4.checked){
    document.getElementById('torneios4').style.display = "block";
    //document.getElementById('torneio3').checked = true;
  }else {
    document.getElementById('torneios4').style.display = "none";
    //document.getElementById('torneio3').checked = false;
  }
}


function outputSoma() {
  var inputGame =  document.querySelectorAll(".gameselect:checked");


  //var inputGameArr = Array.from(inputGame);
  //console.log(inputGame);
  //console.log(inputGameArr);
  soma = 0;
  //s = 0;
  soma = inputGame.length * 10;
  //console.log(s);
  
  //console.log(soma);
  document.getElementById("valfinal").innerHTML = `Valor: R$ ${soma}`;
  //return soma;
}




function main() {
  checkSession();
  var torneios = document.getElementsByClassName("torneio");
  var i;
    for (i = 0; i < torneios.length; i++) {
    torneios[i].style.display = "none";
  }
  
}

function loadForm () {
  outputSoma();
  showTorneios();
}





