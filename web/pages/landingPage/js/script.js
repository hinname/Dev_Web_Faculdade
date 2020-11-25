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

  var url = '../../../../server/autorizaLogin.php';

  req.open("GET", url, true);

  req.send();

  req.onreadystatechange = function() {
    if(req.readyState == 4 && req.status == 200) {
      var resposta = req.responseText;
  
      if (resposta == 'não autorizado') {
        window.location.replace("http://localhost/Dev_Web_Faculdade/web/pages/login/loginUser/html/");

      }else if(resposta == 'autorizado') {
        window.location.replace("http://localhost/Dev_Web_Faculdade/web/pages/loggedin/html/");
      }
    }
  }
}