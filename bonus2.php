<?php
include"./header.php";

$uid=$_POST['uid'];
$name=$_POST['name'];
$push1=$_POST['push'];
$well1=$_POST['well'];
$present1=$_POST['present'];
$department=$_POST['department'];
$time = date('Y-m', time());
$nextpage=$_POST['nextpage'];
$pagenum=$nextpage-1;

if($well1=='是'){
            $well=1;
              }else{
            $well=0;
              }

if($present1=='是'){
            $present=1;
              }else{
            $present=0;
              }

if(empty($push1)){
             $push=0;
                 }else{
    $push=$push1;
                 }

$num = mysqli_fetch_array(mysqli_query($conn,"select*from allocation where uid='$uid' limit 1"));
if($num['id']!='')
        {
            echo "<script>alert('该数据已插入!')</script>";
            echo "<script>location='index_hr_award_lodge.php?page={$pagenum}'</script>";
            exit;
        }

$sql="INSERT INTO allocation(uid,name,time,push,department,present,well)  VALUES('$uid','$name','$time','$push','$department','$present','$well')";
mysqli_query($conn,$sql);


$n=mysqli_fetch_array(mysqli_query($conn,"select name from allocation where uid='$uid'"));
if(empty($n)){
            echo "<script>alert('请联系后台人员')</script>";
            echo "<script>location='index_hr_award_lodge.php?page={$pagenum}'</script>";
        }else{echo "<script>alert('成功登入')</script>";
              echo "<script>location='index_hr_award_lodge.php?page={$nextpage}'</script>";
             }

mysqli_close($conn);
?>