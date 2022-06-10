<?php

include('_parts/_header.php') ;

function add_cost_item()
{
  $item_name = trim(filter_input(INPUT_POST, 'cost_item_name')) ;
  $item_value = trim(filter_input(INPUT_POST, 'cost_item_value')) ;
  if ( $item_name !== '' && $item_value !== '' )
    $_SESSION['cost'][$item_name] = $item_value ;
}

function delete_cost_item()
{
  $item_name = trim(filter_input(INPUT_POST, 'cost_item_name')) ;
  $pos = array_search($item_name, array_keys($_SESSION['cost'])) ;
  if ($pos !== false)
    array_splice($_SESSION['cost'], $pos, 1) ;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = filter_input(INPUT_GET, 'action') ;
  switch ($action) {
    case 'add':
      add_cost_item() ;
      break ;
    case 'delete':
      delete_cost_item() ;
      break ;
    default:
      exit('Invalid post request!!') ;
  }
}

?>


<body>

  <h1>将来設計</h1>

  <form method="post" action="result.php">
    <!-- 基本情報 -->
    <h2>基本情報</h2>
    名前：<input type="text" name="user_name" placeholder="名前を記入してください">
    <br>
    年齢：<input type="text" name="user_age" placeholder="年齢を記入してください">
    <br>
    勤務地（都道府県）：
    <select name="prefecture_id">
      <option value="01">神奈川県</option>
      <option value="02">東京都</option>
    </select>
    <br>
    扶養人数：
    <select name="dependents_num">
      <?php for ($i = 0 ; $i <= 10 ; $i++) :?>
        <option value="<?= $i ;?>"><?= $i ;?>人</option>
      <?php endfor ;?>
    </select>

    <!-- 収入 -->
    <h2>収入に関する情報</h2>
    昨年度の年収価格帯：
    <br>
    <label><input type="radio" name="anual_income_type" value="年収価格帯A" checked="checked">年収価格帯A</label>
    <label><input type="radio" name="anual_income_type" value="年収価格帯B">年収価格帯B</label>
    <label><input type="radio" name="anual_income_type" value="年収価格帯C">年収価格帯C</label>
    <br>
    給与（額面）：<input type="text" name="income" placeholder="額面の給与を記入してください">円
    <br>
    <button>Send</button>
  </form>

  <!-- 支出 -->
  <h2>支出に関する情報</h2>
  <form method="post" action="?action=add">
    <input type="text" name="cost_item_name" placeholder="支出の項目名を記入してください">
    <input type="text" name="cost_item_value" placeholder="支出額を記入してください">
    <button>Add</button>
  </form>
  <ul>
  <?php foreach ($_SESSION['cost'] as $cost_key => $cost_value):?>
    <li>
      <?= $cost_key . ' : ' . number_format($cost_value) . '円' ; ?>
      <form method="post" action="?action=delete">
        <input type="hidden" name="cost_item_name" value="<?= $cost_key ; ?>">
        <button>削除</button>
      </form>
    </li>
  <?php endforeach ; ?>
  </ul>

</body>


<?php

include('_parts/_footer.php') ;
