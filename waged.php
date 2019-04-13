<?php
include"header.php";
$id = $_GET['id'];
$nextpage = $_GET['nextpage'];
$page = $nextpage-1;
$sql = "delete from salary where id={$_GET['id']}";

mysqli_query($conn,$sql);

if(empty(mysqli_fetch_assoc(mysqli_query($conn,"select name from salary where id='$id'")))){
	echo "<script>alert('删除成功')</script>";
	echo "<script>location='index_hr_basic_wage.php?page={$page}'</script>";
}else{
	echo "<script>alert('删除失败')</script>";
	echo "<script>location='index_hr_basic_wage.php?page={$page}'</script>";
}



?>