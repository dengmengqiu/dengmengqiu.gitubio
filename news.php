<?php
include '../header.php';

$title=$_POST['title'];
$shorttitle=$_POST['shorttitle'];
$keywords=$_POST['keywords'];
$source=$_POST['source'];
$writer=$_POST['writer'];
$typeid=$_POST['typeid'];
$description=$_POST['description'];
$arcrank=$_POST['arcrank'];
$content=$_POST['dede_addonfields'];
$time=$_POST['pubdate'];

$sql="INSERT INTO news(title,shorttitle,keywords,source,writer,typeid,description,arcrank,content,time)  VALUES('$title','$shorttitle','$keywords','$source','$writer','$typeid','$description','$arcrank','$content','$time')";
var_dump($arcrank);
var_dump($time);
var_dump($content);
var_dump($typeid);
exit;
mysqli_query($conn,$sql);
var_dump($sql);
var_dump(mysqli_query($conn,$sql));

$n=mysqli_fetch_array(mysqli_query($conn,"select username from login where username='$username'"));
if(empty($n)){
            echo "<script>alert('请致电10086')</script>";
            echo "<script>location='reg.php'</script>";
        }else{
              $_SESSION['username']=$username;
              echo "<script>alert('注册成功')</script>";
               echo "<script>location='begin.php'</script>";
             };


mysqli_close($conn);

?>
