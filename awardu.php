<?php
$servername="localhost";
$username="root";
$password="";
$dbname="company";

$conn=mysqli_connect($servername,$username,$password,$dbname);
mysqli_query($conn,"set names utf8");
$sql="select*from bonus where id={$_GET['id']}";
$rst=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rst);
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>基本工资修改</title>
</head>
<body>
<center>
<h2>基本工资修改</h2>
<form action="awardu2.php" method="post">
<input type="hidden" name="id" value="<?php echo $row['id']?>">
名称:<input type="text" name="name" value="<?php echo $row['name']?>">
金额:<input type="text" name="money" value="<?php echo $row['money']?>">
规则:<input type="text" name="rule" value="<?php echo $row['rule']?>">
<input type="hidden" name="time" value="<?php echo $row['time']?>">
<input type="submit" value="提交">
</form>
</center>
</body>