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

function outputGames () {

  var req = abrirConexao();
  var url = 'http://localhost/Dev_Web_Faculdade/server/user/getGames.php';
  req.open("GET", url, true);

  req.send();
  req.onreadystatechange = function() {
    if(req.readyState == 4 && req.status == 200) {
      var resposta = JSON.parse(req.responseText);
      trataJSONGame(resposta);
    }
  }

  function trataJSONGame(vetJSon) {
    var respRadio = "";
    var respCheckbox = "";
    var c;
    for (c = 0; c < vetJSon.length; c++) {
      if (c == 0) {
        respRadio += `<label for="gamerad${vetJSon[c].id}">${vetJSon[c].nome}</label> <input type="radio" id="gamerad${vetJSon[c].id}" name="gamerad" class="radiogame" value="${vetJSon[c].id}" checked >`
        respCheckbox += `<input type="checkbox" id="checkbox${vetJSon[c].id}" class="gameselect" name="gameCheckbox[]" value="${vetJSon[c].id}"> <label for="checkbox${vetJSon[c].id}">${vetJSon[c].nome}</label>`
  
      } else {
        respRadio += `<label for="gamerad${vetJSon[c].id}">${vetJSon[c].nome}</label> <input type="radio" id="gamerad${vetJSon[c].id}" name="gamerad" class="radiogame" value="${vetJSon[c].id}">`
        respCheckbox += `<input type="checkbox" id="checkbox${vetJSon[c].id}" class="gameselect" name="gameCheckbox[]" value="${vetJSon[c].id}"> <label for="checkbox${vetJSon[c].id}">${vetJSon[c].nome}</label>`
      
      }
    }
    document.getElementById('radioGame').innerHTML = respRadio;
    document.getElementById('checkboxGame').innerHTML = respCheckbox;
  }
  
  
}


function outputSoma() {
  var inputGame =  document.querySelectorAll(".gameselect:checked");
  var myInputRadio = document.querySelector(".radiogame:checked");

  console.log(inputGame);
  console.log(myInputRadio);
  //var inputGameArr = Array.from(inputGame);
  //console.log(inputGame);
  //console.log(inputGameArr);
  soma = 10;
  //s = 0;
  //s = inputGameArr.length * 10;
  //console.log(s);
  for(checkbox of inputGame){
    if(checkbox.labels[0].innerHTML != myInputRadio.labels[0].innerHTML){
        // SE FOR DIFERENTE, CONTA + 10
        soma += 10;
        console.log("Conta");
    }

}
  //console.log(soma);
  document.getElementById("valfinal").innerHTML = `Valor: R$ ${soma}`;
  //return soma;
}




function main() {
  checkSession();
  outputGames();

  
}

function loadForm () {
  outputSoma();
}





