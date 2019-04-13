<?php
include"header.php";
$nextpage=$_GET['nextpage'];
$page=$nextpage-1;
$sql="select*from salary where id={$_GET['id']}";
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
<form action="wageu2.php" method="post">
<input type="hidden" name="page" value="<?php echo $page;?>">
<input type="int" name="id" value="<?php echo $row['id'];?>">
姓名:<input type="text" name="name" value="<?php echo $row['name'];?>">
职位:<input type="text" name="position" value="<?php echo $row['position'];?>">
部门:<input type="text" name="department" value="<?php echo $row['department'];?>">
基本工资:<input type="text" name="wage" value="<?php echo $row['wage'];?>">
<input type="submit" value="提&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;交">
</form>
</center>
</body>

