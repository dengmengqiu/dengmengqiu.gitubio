<?php
include"header.php";

$id=$_POST['id'];
$name=$_POST['name'];
$position=$_POST['position'];
$department=$_POST['department'];
$wage=$_POST['wage'];
$page=$_POST['page'];

$sql="update salary set name='$name',position='$position',department='$department',wage='$wage' where id='$id'";
mysqli_query($conn,$sql);

$sql="select*from salary where id='$id'";
$rst=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rst);
$name2=$row['name'];
$position2=$row['position'];
$department2=$row['department'];
$wage2=$row['wage'];


if($name2===$name&&$position2===$position&&$wage2===$wage&&$department2===$department){
	echo "<script>alert('修改成功')</script>";
	echo "<script>location='index_hr_basic_wage.php?page={$page}'</script>";
}else{
	echo "<script>alert('修改失败')</script>";
	echo "<script>location='index_hr_basic_wage.php?page={$page}'</script>";
}

?>

