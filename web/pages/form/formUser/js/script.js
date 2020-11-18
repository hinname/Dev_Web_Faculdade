function isValidForm() {

  validateDate();
  validatePass();

  if (!validadeDate() && !validatePass()) {
    return false
  }

  return true
}

function validateDate() {
  var date = document.getElementById("datenasc").value;
  var date2 = new Date(date)
  var dateNow = new Date()
  if(dateNow.getFullYear() - date2.getFullYear() < 14){
    window.alert('Idade mínima é 14 anos');
    return false
    }
    else if (dateNow.getFullYear() - date2.getFullYear() > 100) {
      window.alert('Digite uma idade valida!');
      return false
    }
    else{
      return true
    }

}

function validatePass() {

}