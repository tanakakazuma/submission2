<?php
// セッションの開始
session_start();

$id = htmlspecialchars( $_SESSION[ 'id' ], ENT_QUOTES, 'UTF-8' );


// 接続設定
  $user = 'root';
  $pass = '';

  // データベースに接続
 $dsn = 'mysql:host=localhost;dbname=kadai;charset=utf8';
 $conn = new PDO($dsn, $user, $pass); //「$conn」は、任意のオブジェクト名

  // データの削除
 $sql = "DELETE FROM user 
         WHERE id=('$id')";
 $stmt = $conn -> prepare($sql);
 $stmt -> execute();


?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>削除ページ</title>
</head>

<body>
<p>データベースから削除しました</p>
<p><a href="kadai04.php">入力画面に戻る</a></p>
</body>
</html>