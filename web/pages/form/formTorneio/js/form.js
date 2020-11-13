function outputCheckbox () {
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

