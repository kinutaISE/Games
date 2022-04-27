//HTMLのcanvas情報をcanvasへ関連付け
let canvas = document.getElementById('field');
//コンテクストを取得
const ctx = canvas.getContext('2d');

//横幅取得
let width  = canvas.width;
//高さ取得
let height = canvas.height;

let degree = 0;

setInterval("rectRotate()", 20);


function rectRotate(){

  ctx.save();

  //基準点を中央に移動
  ctx.translate(parseInt(width / 2), parseInt(height / 2));
  ctx.rect(degree, -5, 10, 10) ;
  ctx.fill() ;

  ctx.clearRect( 0, 0, width, height );
  ctx.beginPath();
  //回転
  ctx.rotate(( ++degree * Math.PI) / 180);

  ctx.fillStyle = "black";
  //四角形を作成
  ctx.strokeRect(-50, -50, 100, 100);
  ctx.fill();




  ctx.restore();
}
