<?php
include"header.php";
$resume = $_GET['resume'];
$nextpage = $_GET['nextpage'];
$page = $nextpage-1; 

$sql = "delete from staff where resume='$resume'";

mysqli_query($conn,$sql);

if(empty(mysqli_fetch_assoc(mysqli_query($conn,"select name from staff where resume='$resume'")))){
	unlink("$resume");
	echo "<script>alert('删除成功')</script>";
	echo "<script>location='staff.php?page={$page}'</script>";
}else{
	echo "<script>alert('删除失败')</script>";
	echo "<script>location='staff.php?page={$page}'</script>";
}



?>

?>