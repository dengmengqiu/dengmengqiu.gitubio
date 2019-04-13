<?php
include("header.php");

$time = date('Y-m', time());
$nextpage = $_POST['nextpage'];
$page = $nextpage -1;
$uid=$_POST['uid'];
$name=$_POST['name'];
$department=$_POST['department'];
$position=$_POST['position'];
$pusht=$_POST['pusht'];
$add=$_POST['add'];
$wellt=$_POST['wellt'];
$present=$_POST['presentt'];
$pd=$_POST['pd'];

if($pd=="已录入"){
	             echo "<script>alert('不能重复录入')</script>";
                 echo "<script>location='detail_award.php?page={$page}'</script>";
                 exit;
                }


$sql="INSERT INTO addt(uid,name,time,department,position,presentt,pusht,wellt,addt)  VALUES('$uid','$name','$time','$position','$department','$present','$pusht','$wellt','$add')";

mysqli_query($conn,$sql);
$n=mysqli_fetch_array(mysqli_query($conn,"select id from addt where uid='$uid'"));
if(empty($n)){
            echo "<script>alert('请联系后台人员')</script>";
            echo "<script>location='detail_award.php?page={$page}'</script>";
        }else{echo "<script>alert('成功录入')</script>";
              echo "<script>location='detail_award.php?page={$page}'</script>";
             }

mysqli_close($conn);
?>