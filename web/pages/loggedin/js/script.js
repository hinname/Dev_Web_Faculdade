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



var autoriza = abrirConexao();

var url = '../../../../server/autorizaLogin.php';

autoriza.open("GET", url, true);

autoriza.send();

autoriza.onreadystatechange = function() {
  if(autoriza.readyState == 4 && autoriza.status == 200) {
    var resposta = autoriza.responseText;

    if (resposta == 'não autorizado') {
      document.body.style.display = "none";
      window.alert("Você não tem autorização para acessar essa página, faça login!");
      window.location.replace("http://localhost/Dev_Web_Faculdade/web/pages/landingPage/html/");
    }
    
  }
}

getNome();


function showContent() {
  var req = abrirConexao();

  var url = "http://localhost/Dev_Web_Faculdade/server/user/checkUserTorneio.php";
  req.open("GET", url, true);

  req.send();

  req.onreadystatechange = function() {
    if(req.readyState == 1) {
        document.getElementById('container').innerHTML = 'Buscando nome...';
    }
    if(req.readyState == 4 && req.status == 200) {
    var resposta = req.responseText;
    if(resposta == 'Participa torneio') {
      var x = document.getElementById('inscricao');
      x.style.display = "none";
    }
    else if (resposta == 'Nao participa torneio') {
      var x = document.getElementById('torneio');
      x.style.display = "none";
    }
    
    }
}

}



function getNome() {
  var req = abrirConexao();

  var url = "http://localhost/Dev_Web_Faculdade/server/listaNome.php";
  req.open("Get", url, true);
  req.onreadystatechange = function() {
      if(req.readyState == 1) {
          document.getElementById('nome').innerHTML = 'Buscando nome...';
      }
      if(req.readyState == 4 && req.status == 200) {
      var resposta = req.responseText;
      document.getElementById('nome').innerHTML = resposta;
      }
  }
  req.send(null);
  }



function logout() {
  

  var req = abrirConexao();

  var url =  '../../../../server/logout.php?logout=1';
  
  req.open("GET", url, true);

  req.send();
  req.onreadystatechange = function() {
    if(req.readyState == 4 && req.status == 200) {
      var resposta = req.responseText;

      if (resposta == 'logout') {
        window.location.replace("http://localhost/Dev_Web_Faculdade/web/pages/landingPage/html/");
      }
      
    }
  }
}