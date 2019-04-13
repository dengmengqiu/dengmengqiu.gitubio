<?php
include"header.php";

$uid = $_POST['uid'];
$wage = $_POST['wage'];
$sql="select*from staff where uid='$uid'";
$rst=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rst);
$name = $row['name'];
$position = $row['position'];
$department = $row['department'];
$nextpage = $_POST['nextpage'];
$page = $nextpage-1;

$n=mysqli_fetch_array(mysqli_query($conn,"select id from salary where uid='$uid'"));
                         if(!empty($n)){
	                                echo "<script>alert('不能重复录入')</script>";
                 echo "<script>location='index_hr_basic_wage.php?page={$page}'</script>";
                 exit;
                }

$sql="INSERT INTO salary(uid,name,department,position,wage)  VALUES('$uid','$name','$department','$position','$wage')";
mysqli_query($conn,$sql);
$n=mysqli_fetch_array(mysqli_query($conn,"select id from salary where uid='$uid'"));
if(empty($n)){
            echo "<script>alert('请联系后台人员')</script>";
            echo "<script>location='index_hr_basic_wage.php?page={$page}'</script>";
        }else{echo "<script>alert('成功录入')</script>";
              echo "<script>location='index_hr_basic_wage.php?page={$nextpage}'</script>";
             }

mysqli_close($conn);
?>

?>