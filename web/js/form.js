function outputCheckbox () {
  var inputGame =  document.querySelectorAll(".gameselect:checked");
  var inputGameArr = Array.from(inputGame);
  console.log(inputGameArr);

  soma = 0;

  inputGameArr.forEach(element => {
    soma += 10; 
  });

  //document.getElementById('result').innerHTML = soma;
  console.log(soma);

  return soma;

}