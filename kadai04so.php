<?php

// セッションの開始
session_start();

$search   = htmlspecialchars( $_POST[ 'search' ], ENT_QUOTES, 'UTF-8' );
$by   = htmlspecialchars( $_POST[ 'by' ], ENT_QUOTES, 'UTF-8' );
$order   = htmlspecialchars( $_POST[ 'order' ], ENT_QUOTES, 'UTF-8' );


// 入力値をセッション変数に格納
$_SESSION['search']   = $search;



?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
<TITLE>課題4</TITLE>
<link rel="stylesheet" href="kadai04.css" type="text/css">
<script type="text/javascript" src="kadai04.js"></script>
</head>
<body>


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
<input type="radio" name="seibetu" value="男"onclick="funcOtoko()">男
<input type="radio" name="seibetu1" value="女"onclick="funcOnnna()">女　： 

<input type="text"  id="sex2" name="sex2" size="4"  style="background-color:yellow; "disabled="disabled" >
 <input type="text"  id="sex" name="sex" required  maxlength='8' size="35" style="visibility:hidden;">
</p>


</th>
<th align="left">身長/体重
<p>


<input type="text"required  name="height" id="height" size="4" style="ime-mode: disabled;" onkeypress='
if(event.keyCode<"0".charCodeAt(0) || "9".charCodeAt(0)<event.keyCode)return false;
' >cm
<input type="text" required name="weight" id="weight" size="4" style="ime-mode: disabled;" onkeypress='
if(event.keyCode<"0".charCodeAt(0) || "9".charCodeAt(0)<event.keyCode)return false;
' >kg
</p>
<p>
BMI
</p>
<p>
<input type="text" required id="bmi2" name="bmi2" size="4"  style="background-color:yellow; "disabled="disabled" >

<input type="button" value="計算" style = "width:60px; height:30px;" onclick="bmiKei();">

<input type="text" required id="bmi" name="bmi" size="4"  style="background-color:yellow;  visibility:hidden;" >

</p>
</th>
</table>
</form>

<table class="c">

<tr>
<th>
<input type="submit" value="登録する"  style = "width:200px; height:100px;">
</th>

<th > ID
<p align="center"> 
<input type="text"  name="uid" id="uid"  size="35" style="width:200px; ime-mode: disabled;"onkeypress='
if(event.keyCode<"0".charCodeAt(0) || "9".charCodeAt(0)<event.keyCode)return false;
' >
</p>
<input input type="submit" formaction="kadai04Update.php" value="更新する"  style = "width:200px; height:90px;"  >

</th>
</tr>


<th colspan=2> 削除する行のID

<form  action="kadai04Derete.php" name="form2" method="post">
<input type="text" required name="did" id="did" size="35" style="width:200px;" style="ime-mode: disabled;"onkeypress='
if(event.keyCode<"0".charCodeAt(0) || "9".charCodeAt(0)<event.keyCode)return false;
' >
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
<input type="text" required name="search" id="search" size="35" style="width:200px;" style="ime-mode: disabled;";
' >

<input type="submit" value="検索する"  style = "width:200px; height:60px;">
</form>

<form method="post" action="kadai04order.php">

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

<input type="submit" value="並べ替える"></p>

</form>

<table class="a">
<tr>
<th>ID</th>
<th>氏名</th>
<th>性別</th>
<th>身長</th>
<th>体重</th>
<th>BMI</th>
</tr>
<h2>検索した値:<?php echo $search; ?></h2>
</teble>
<?php

$search   = htmlspecialchars( $_POST[ 'search' ], ENT_QUOTES, 'UTF-8' );

// 入力値をセッション変数に格納
$_SESSION['search']   = $search;

$dsn = 'mysql:dbname=kadai;host=localhost';
$user = 'root';
$password = '';

try{
    $dbh = new PDO($dsn, $user, $password);

    $sql = "SELECT * FROM user
            WHERE (id LIKE '%$search%'
            OR name LIKE '%$search%'
            OR sex LIKE '%$search%'
            OR height LIKE '%$search%'
            OR weight LIKE '%$search%'
            OR bmi LIKE '%$search%')
            ORDER BY $by $order ";
    foreach ($dbh->query($sql) as $row) {
        print('<tr>');
        print('<td >');
        print($row['id']);
        print('</td>');
        print('<td>');
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
<p><a href="kadai04.php">検索結果をリセットする</a></p>
</body>
</html>