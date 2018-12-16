<?php
// セッションの開始
session_start();

$id   = htmlspecialchars( $_POST[ 'did' ], ENT_QUOTES, 'UTF-8' );



// 入力値をセッション変数に格納
$_SESSION['id']   = $id;

?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>削除フォーム</title>
</head>

<body>
<p>ユーザー削除フォーム・確認画面</p>
<form action="kadai04Derete2.php" method="post">
<h2>ID:</th><td><?php echo $id; ?>　
<?php

$id   = htmlspecialchars( $_POST[ 'did' ], ENT_QUOTES, 'UTF-8' );



// 入力値をセッション変数に格納
$_SESSION['id']   = $id;

$dsn = 'mysql:dbname=kadai;host=localhost';
$user = 'root';
$password = '';

try{
    $dbh = new PDO($dsn, $user, $password);

    $sql = "select name from user
            where id = ('$id')";
    foreach ($dbh->query($sql) as $row) {
        print('<br>');
        print('名前：');
        print($row['name']);
     
    }
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;

?>　のデータを</h2>

<h1>本当に削除しますか</h1>
</br>
<input type="submit" value="データベースから削除"　 style = "width:200px; height:30px;">
</form>
<p><a href="kadai04.php">入力画面に戻る</a></p>
</body>
</html>