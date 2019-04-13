<?php
//session_start();
include 'header.php';

$id = $_GET['id'];
$nextpage=$_GET['page'];
$pagenum=$nextpage-1;
$sql = "select*from mess where id=$id";
$rst = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($rst);

$cid = $row['audit'];

if($cid == 0){
	        $cid = 1;
                     }else{
            $cid = 0;	
             }

$sql="update mess set audit='$cid' where id='$id'";
mysqli_query($conn,$sql);

/*$sql="select*from essay where id='$id'";
$rst=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rst);
$cid=$row['cid'];*/
echo "<script>alert('修改成功')</script>";
echo "<script>location='ms.php?page={$pagenum}'</script>";

?>