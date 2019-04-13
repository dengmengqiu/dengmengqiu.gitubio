<?php
$servername="localhost";
$username="root";
$password="";
$dbname="company";

$conn=mysqli_connect($servername,$username,$password,$dbname);
mysqli_query($conn,"set names utf8");

$id=$_POST['id'];
$name=$_POST['name'];
$money=$_POST['money'];
$rule=$_POST['rule'];
$time=$_POST['time'];

$sql="update bonus set name='$name',money='$money',rule='$rule'where id='$id'";
mysqli_query($conn,$sql);
 
$sql="select*from bonus where id='$id'";
$rst=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rst);
$name2=$row['name'];
$money2=$row['money'];
$rule2=$row['rule'];

if($name2===$name&&$money2===$money&&$rule2===$rule){
	echo "<script>alert('修改成功')</script>";
	echo "<script>location='index_hr_set_award.php'</script>";
}else{
	echo "<script>alert('修改失败')</script>";
	echo "<script>location='index_hr_set_award.php'</script>";
}

?>

