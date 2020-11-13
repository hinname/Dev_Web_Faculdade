function inputChange() {
  var creditDiv = document.getElementById("credit");

  if (document.getElementById('formPagam2').checked) {

    creditDiv.style.display = "none";

  } else if (document.getElementById('formPagam1').checked) {

    creditDiv.style.display = "block";
    
  }

}