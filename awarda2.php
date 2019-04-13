<?php
include "header.php";

$name=$_POST['name'];
$rule=$_POST['rule'];
$money=$_POST['money'];

$sql="INSERT INTO bonus(name,rule,money)  VALUES('$name','$rule','$money')";

mysqli_query($conn,$sql);

$n=mysqli_fetch_array(mysqli_query($conn,"select name from bonus where name='$name'"));
if(empty($n)){
            echo "<script>alert('增加失败')</script>";
            echo "<script>location='awarda.php'</script>";
        }else{
              echo "<script>alert('增加成功')</script>";
               echo "<script>location='index_hr_set_award.php'</script>";
             };


mysqli_close($conn);

?>

