<?php
include"header.php";
$id = $_GET['id'];
$nextpage = $_GET['page'];
$page = $nextpage-1;
$sql = "delete from mess where id={$_GET['id']}";
var_dump($page);

mysqli_query($conn,$sql);

if(empty(mysqli_fetch_assoc(mysqli_query($conn,"select content from mess where id='$id'")))){
	echo "<script>alert('删除成功')</script>";
	echo "<script>location='ms.php?page={$page}'</script>";
}else{
	echo "<script>alert('删除失败')</script>";
	echo "<script>location='ms.php?page={$page}'</script>";
}



?>