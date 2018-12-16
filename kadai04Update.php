<?php
// セッションの開始
session_start();

$id     = htmlspecialchars( $_POST[ 'uid' ], ENT_QUOTES, 'UTF-8' );
$name   = htmlspecialchars( $_POST[ 'name' ], ENT_QUOTES, 'UTF-8' );
$sex    = htmlspecialchars( $_POST[ 'sex' ], ENT_QUOTES, 'UTF-8' );
$height = htmlspecialchars( $_POST[ 'height' ], ENT_QUOTES, 'UTF-8' );
$weight = htmlspecialchars( $_POST[ 'weight' ], ENT_QUOTES, 'UTF-8' );
$bmi    = htmlspecialchars( $_POST[ 'bmi' ], ENT_QUOTES, 'UTF-8' );


// 接続設定
  $user = 'root';
  $pass = '';

  // データベースに接続
 $dsn = 'mysql:host=localhost;dbname=kadai;charset=utf8';
 $conn = new PDO($dsn, $user, $pass); //「$conn」は、任意のオブジェクト名

  // データの更新
 $sql = "UPDATE  user 
         SET name=('$name'),sex= ('$sex'),height = ('$height'),weight=('$weight'),bmi=('$bmi') 
         WHERE id=('$id')";
 $stmt = $conn -> prepare($sql);
 $stmt -> execute();


?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<TITLE>課題4</TITLE>
<link rel="stylesheet" href="kadai04.css" type="text/css">
<script type="text/javascript" src="kadai04.js"></script>
</head>
<body onLoad = "upd();">
<div id="header">
</div>



<form  action="kadai04b.php" name="f" method="post">
<TABLE class ="a" >

<TR>

<TD>
<table class = "b">

<th align="left"> 氏名
<p align="center"> 
<input type="text" required name="name"  size="35" style="width:200px;">
</p >
<p align="left">性別
</p>
<p>
<input type="radio" required name="seibetu" value="男"onclick="funcOtoko()">男
<input type="radio" required  name="seibetu" value="女"onclick="funcOnnna()">女　： 

<input type="text"  id="sex2" name="sex2" size="4"  style="background-color:yellow; "disabled="disabled" >
 <input type="text"  id="sex" name="sex"   maxlength='8' size="35" style="visibility:hidden;">
</p>


</th>
<th align="left">身長/体重
<p>


<input type="number"required  name="height" id="height" size="4" min="1" max="999" onchange="bmiKei1();">cm
<input type="number" required name="weight" id="weight" size="4"  min="1" max="999" onchange="bmiKei1();">kg
</p>
<p>
BMI　　　計算
</p>
<p>
<input type="text"  id="bmi2" name="bmi2" size="4"  style="background-color:yellow; "disabled="disabled" >

<input type="button" value="体型チェック"  name="keisan"   onclick="bmiKei();">

<input type="text" required  id="bmi" name="bmi" size="4"  style="background-color:yellow;  visibility:hidden;" >


</p>
</th>
</table>
</form>

<table class="c">

<tr>

<th > ※更新ID
<p align="center"> 
<input type="number"  name="uid" id="uid"  size="35" style="width:200px;"  >
</p>

<input input type="button"　required  value="確認する"  style = "width:200px; height:90px" onclick="on()" >



<div id="overlay"   onclick="//off()" >
 <form　name="name_chek">
<p id="chek">
入力された情報に間違いありませんか？
</p>
<br>
<br>
氏名 :
 <input type="text" disabled="true" id="new_name" value="" maxlength='8' size="35"
 style="width:200px;"><br>
<br>
性別 :
<input type="text" disabled="true" id="new_sex" value="" maxlength='8' size="35"
 style="width:100px;"><br>
<input type="button" id="ok" value="閉じる" style = "width:60px; height:30px;" onclick="closeBox();">
<input input type="submit" formaction="kadai04b.php" value="登録する"  style = "width:200px; height:100px;">
<input input type="submit" formaction="kadai04Update.php" value="更新する"  style = "width:200px; height:100px;"  >
</form>
</div>
<div id="modal">
</div>



</th>
</tr>


<th colspan=2> 削除する行のID

<form  action="kadai04Derete.php" name="form2" method="post">
<input type="number" required name="did" id="did" size="35" style="width:200px;"  >
<br>
<br>
<input type="submit" value="削除する"  style = "width:200px; height:60px;">
</form>
</th>

</th>

</table>
</TD>
</TR>
</TABLE>

<br>
<br>

<form  action="kadai04Search2.php" name="form2" method="post">
<input type="text"  name="search" id="search" size="35" style="width:200px;" style="ime-mode: disabled;";
' >
<br>
<br>
<input type="submit" value="検索する"  style = "width:200px; height:60px;">




<p>
<select name="by" id="by">
<option value="id">ID</option>
<option value="name">名前</option>
<option value="height">身長</option>
<option value="weight">体重</option>
<option value="bmi">BMI</option>
</select>

<select name="order" id="order">
<option value="ASC">昇順</option>
<option value="DESC">降順</option>
</select>

<input type="submit" formaction="kadai04order.php" value="並べ替える"></p>

</form>

<table class="d">
<tr>
<th>ID</th>
<th>氏名</th>
<th>性別</th>
<th>身長</th>
<th>体重</th>
<th>BMI</th>
</tr>

</teble>
<?php

$dsn = 'mysql:dbname=kadai;host=localhost';
$user = 'root';
$password = '';

try{
    

    $dbh = new PDO($dsn, $user, $password);
  
    $sql = 'select * from user';
    foreach ($dbh->query($sql) as $row) {
        $num = $row['id'];
        
        
        print('<tr>');
        
        print('<td >');
        print("<input type = button value = $num  onclick=update($num) >");
        print('</td>');
        print('<td >');
        print($row['name']);
        print('</td>');
        print('<td>');
        print($row['sex']);
        print('</td>');
        print('<td>');
        print($row['height']);
        print('</td>');
        print('<td>');
        print($row['weight']);
        print('</td>');
        print('<td>');
        print($row['bmi']);
        print('</td>');
        print('</tr>');
    
    }
}catch (PDOException $e){
    print('Error:'.$e->getMessage());
    die();
}

$dbh = null;

?>

<tr><td colspan=6 align="center">
<a href="#header">ページのトップへ戻る</a>
<td></tr>
</body>
</html>