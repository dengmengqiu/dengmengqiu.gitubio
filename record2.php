<?php
include"header.php";
$uid=$_POST['uid'];
$name=$_POST['name'];
$late=$_POST['late'];
$early=$_POST['early'];
$absent=$_POST['absent'];
$vacate=$_POST['vacate'];
$nextpage=$_POST['nextpage'];
$time = date('Y-m', time());
$pagenum=$nextpage-1;

$num = mysqli_fetch_array(mysqli_query($conn,"select*from timecard where uid='$uid' limit 1"));
if(!empty($n))
        {
            echo "<script>alert('该数据已录入!')</script>";
            echo "<script>location='index_hr_check_w._lodge.php.php?page={$pagenum}'</script>";
            exit;
        }

$sql="INSERT INTO timecard(uid,name,late,early,absent,vacate,time)  VALUES('$uid','$name','$late','$early','$absent','$vacate','$time')";
mysqli_query($conn,$sql);

$n=mysqli_fetch_array(mysqli_query($conn,"select name from timecard where uid='$uid'"));
if(empty($n)){
            echo "<script>alert('请联系后台人员')</script>";
            echo "<script>location='index_hr_check_w._lodge.php?page={$pagenum}'</script>";
        }else{echo "<script>alert('成功录入')</script>";
              echo "<script>location='index_hr_check_w._lodge.php?page={$nextpage}'</script>";
             }

mysqli_close($conn);
?>