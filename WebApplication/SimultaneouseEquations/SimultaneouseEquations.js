var answers = [
  [Math.floor(Math.random() * 10) * 100 + 500, Math.floor(Math.random() * 10) * 100],
  [Math.floor(Math.random() * 4) + 1 , Math.floor(Math.random() * 4) + 5],
  [Math.floor(Math.random() * 15) + 1 , Math.floor(Math.random() * 15) + 1],
  [Math.floor(Math.random() * 15) + 1 , Math.floor(Math.random() * 15) + 1],
  [Math.floor(Math.random() * 10) * 130 + 50 , Math.floor(Math.random() * 10) * 160 + 50],
  [Math.floor(Math.random() * 15) * 10 + 100 , Math.floor(Math.random() * 15) * 10 + 100 , Math.floor(Math.random() * 15) * 10 + 100],
  [Math.floor(Math.random() * 10) + 10  , Math.floor(Math.random() * 10) * 10],
  [Math.floor(Math.random() * 10) + 10 , Math.floor(Math.random() * 10) + 10 , Math.floor(Math.random() * 10) + 10],

] ;
var problem_texts = [
  "ある水族館の入館料は大人2人と中学生3人では" + (answers[0][0] * 2 + answers[0][1] * 3) + "円，大人1人と中学生4人では" + (answers[0][0] + answers[0][1] * 4) + "円である．大人1人と中学生1人の入館料をそれぞれ求めなさい．",
  "2桁の整数がある．この整数の十の位の数と一の位の数の和は" + (answers[1][0] + answers[1][1]) + "になる．また，この数の十の位と一の位を入れ替えてできる整数は元の整数よりも" + ( (answers[1][1] * 10 + answers[1][0]) - (answers[1][0] * 10 + answers[1][1]) ) + "大きくなる．元の整数の十の位と一の位を求めなさい．",
  "80円切手と120円切手を合計" + (answers[2][0] + answers[2][1]) + "枚買うと代金は" + (80 * answers[2][0] + 120 * answers[2][1]) + "円だった．80円切手と120円切手をそれぞれ何枚買ったか．",
  "家から学校まで" + (50 * answers[3][0] + 80 * answers[3][1]) + "ｍあり，途中の橋まで毎分50ｍの速さで歩き，橋から学校まで毎分80ｍの速さで歩いたら，合計で" + (answers[3][0] + answers[3][1]) + "分かかった．家から橋まで，橋から学校までそれぞれ何分歩いたか．",
  "ある学校の全校生徒" + (answers[4][0] + answers[4][1]) + "人のうちで徒歩で通学しているのは，男子生徒の50%，女子生徒の80%で，徒歩通学者は合計で" + (answers[4][0] * 0.5 + answers[4][1] * 0.8) + "人である．男子生徒の総数，女子生徒の総数はそれぞれ何人か．",
  "りんごとみかんとぶどうを買うときに，りんご2個とみかん5個を買うと代金は" + (answers[5][0] * 2 + answers[5][1] * 5) + "円になり，りんご4個とぶどう3個を買うと代金は" + (answers[5][0] * 4 + answers[5][2] * 3) + "円になり，りんご1個とみかん2個とぶどう2個を買うと代金は" + (answers[5][0] + answers[5][1] * 2 + answers[5][2] * 2) + "円になる．りんごとみかんとぶどうはそれぞれいくらか．",
  "ある酒屋で、赤ワイン4本白ワイン3本のセットで8,000円，赤ワイン2本白ワイン3本のセットを6,000円で販売している．ある日両セットの赤ワインは合計で" + (4 * answers[6][0] + 2 * answers[6][1]) + "本売れ、両セットの売上は全部で" + (8000 * answers[6][0] + 6000 * answers[6][1]) + "円であった．この日，各セットはそれぞれ何セット売れたか．",
  "ある居酒屋で以下の3種類のセットを販売している<ul><li>Aセット：15,000円（ワイン4本，ビール5本，日本酒6本）</li><li>Bセット：10,000円（ワイン2本，ビール3本，日本酒4本）</li><li>Cセット：20,000円（ワイン5本，ビール8本，日本酒8本）</li></ul>ある日，ワインは合計で" + (4 * answers[7][0] + 2 * answers[7][1] + 5 * answers[7][2]) + "本，ビールは合計" + (5 * answers[7][0] + 3 * answers[7][1] + 8 * answers[7][2]) + "本売れ，全セットの売り上げの合計は" + (15000 * answers[7][0] + 10000 * answers[7][1] + 20000 * answers[7][2]) + "円であった．この日，各セットは何セット売れたか．",
] ;
var selected_problems = [] ;
var selected_answers = [] ;
for (var i = 0 ; i < 5 ; i++) {
  var index = Math.floor(Math.random() * problem_texts.length) ;
  var text = problem_texts[index] ;
  var ans = answers[index] ;
  problem_texts.splice(index, 1) ;
  answers.splice(index, 1) ;
  selected_problems.push(text) ;
  selected_answers.push(ans) ;
}


function showProblem(pi) {
  document.write("<p><b>問題" + (pi + 1) + "：</b>" + selected_problems[pi] + "</p>") ;
}
function showAnswer(pi) {
  alert("答え：" + selected_answers[pi].join(",")) ;
}
