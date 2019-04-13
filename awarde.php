<?php
include"header.php";

$id = $_GET['id'];
$sql = "delete from bonus where id=$id";
mysqli_query($conn,$sql);

if(empty(mysqli_fetch_assoc(mysqli_query($conn,"select*from bonus where id='$id'")))){
	echo "<script>alert('删除成功')</script>";
	echo "<script>location='index_hr_set_award.php'</script>";
}else{
	echo "<script>alert('删除失败')</script>";
	echo "<script>location='index_hr_set_award.php'</script>";
}

?>
