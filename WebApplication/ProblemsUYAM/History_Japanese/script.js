var texts_correct = [
  ""
] ;
var texts_incorrect = [
  "室町幕府を開いた足利尊氏は中国の明に使者を送り，正式に国交を結んで貿易を開始した。3代将軍...",
] ;

var problem_num = 5 ;
var choises_num = 5 ;
var problems = [] ;
for (var i = 0 ; i < problem_num ; i++)
  problems.push([]) ;
for (var i = 0 ; i < problem_num ; i++) {
  var correct = texts_correct[ Math.floor(Math.random() * texts_correct.length) ] ;
  problems[i].push(correct) ;
  for (var j = 0 ; j < choises_num - 1 ; j++) {
    var incorrect = texts_correct[ Math.floor(Math.random() * texts_incorrect.length) ]
    problems[i].push(incorrect) ;
  }
}
