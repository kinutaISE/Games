function change() {
  changeHeader() ;
  var dd1 = document.getElementById("d1") ;
  dd1.innerHTML = "こんにちは" ;
  dd1.id = "lightblueBack" ;
  var dd2 = document.getElementById("d2") ;
  dd2.innerHTML = "さようなら" ;
  dd2.id = "yellowBack" ;
}
function changeHeader() {
  var h = document.getElementById("Header") ;
  h.innerHTML = "あいさつ" ;
}
