// 厳密なエラーチェック
'use strict' ;

{
  // 全てのチェックボックスを取得する
  const checkboxes = document.querySelectorAll('input[type="checkbox"]') ;
  // これら全てに対してイベントを設定する
  // 各要素を checkbox として、処理を行う
  checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', () =>{
      // フォームの送信
      checkbox.parentNode.submit() ;
    }) ;
  }) ;

  const deletes = document.querySelectorAll('.delete') ;
  deletes.forEach(span => {
    span.addEventListener('click', () => {
      if (! confirm('Are you sure?'))
        return ;
      span.parentNode.submit() ;
    }) ;
  }) ;
}
