function isValidForm() {

  var validateDate = validateDate();
  var validatePass = validatePass();

  if (validateDate === false || validatePass === false) {
    window.alert("Validação falha")
    //window.history.back();
    return(false);
  }


  return(true)
}

function validateDate() {
  var date = document.getElementById("datenasc").value;
  var date2 = new Date(date)
  var dateNow = new Date()
  if(dateNow.getFullYear() - date2.getFullYear() < 14){
    window.alert('Idade mínima é 14 anos');
    return(false)
    }
    else if (dateNow.getFullYear() - date2.getFullYear() > 100) {
      window.alert('Digite uma idade valida!');
      return(false)
    }
    else{
      return(true)
    }

}

function validatePass() {
  var password = document.getElementById("senha1");
  var cpassword = document.getElementById("senha2");

  if (password.value != cpassword.value) {
    window.alert("Sua senha e confirmação de senha estão diferentes")
    cpassword.focus();
    return (false)
  }else{
    return (true)
  }
}