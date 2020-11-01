function inputChange() {
  if (document.getElementById('formPagam2').checked) {
    document.getElementById('numCard').disabled = true;
    document.getElementById('nameCard').disabled = true;
    document.getElementById('datvenc').disabled = true;
    document.getElementById('codSeg').disabled = true;
  } else if (document.getElementById('formPagam1').checked) {
    document.getElementById('numCard').disabled = false;
    document.getElementById('nameCard').disabled = false;
    document.getElementById('datvenc').disabled = false;
    document.getElementById('codSeg').disabled = false;
  }

}