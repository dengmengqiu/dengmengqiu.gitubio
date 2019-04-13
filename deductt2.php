<?php
include("header.php");

$time = date('Y-m', time());
$nextpage = $_POST['nextpage'];
$page = $nextpage -1;
$uid=$_POST['uid'];
$name=$_POST['name'];
$department=$_POST['department'];
$position=$_POST['position'];
$earlyt=$_POST['earlyt'];
$absentt=$_POST['absentt'];
$vacatet=$_POST['vacatet'];
$latet=$_POST['latet'];
$deductt=$_POST['deductt'];
$pd=$_POST['pd'];

if($pd=="已录入"){
	             echo "<script>alert('不能重复录入')</script>";
                 echo "<script>location='detail_de.php?page={$page}'</script>";
                 exit;
                }


$sql="INSERT INTO deductt(uid,name,time,department,position,earlyt,latet,absentt,vacatet,deductt)  VALUES('$uid','$name','$time','$position','$department','$earlyt','$latet','$absentt','$vacatet','$deductt')";

mysqli_query($conn,$sql);
$n=mysqli_fetch_array(mysqli_query($conn,"select id from deductt where uid='$uid'"));
if(empty($n)){
            echo "<script>alert('请联系后台人员')</script>";
            echo "<script>location='detail_de.php?page={$page}'</script>";
        }else{echo "<script>alert('成功录入')</script>";
              echo "<script>location='detail_de.php?page={$page}'</script>";
             }

mysqli_close($conn);
?>