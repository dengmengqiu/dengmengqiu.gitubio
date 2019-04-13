<?php
session_start();
include 'header.php';

$name=$_POST['username'];
$password=$_POST['passkey'];
$code1=$_POST['vcode'];
$vstr1=$_SESSION['vstr'];
$code2=strtolower($code1);
$code=str_replace(' ','',$code2);
$vstr=strtolower($vstr1);
echo"$vstr";
echo"$code";

$sql="select*from backlogin where name='$name'";
$rst=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rst);
$pass=$row['pass'];


if($password===$pass && $code===$vstr){
	 //$_SESSION['username']=$username;
     echo "<script>alert('登陆成功')</script>";
     echo "<script>location='login.php'</script>";
}else{
	switch(false){
    case($password===$pass):
        echo "<script>alert('密码错误')</script>";
        echo "<script>location='login.php'</script>";
    case($code===$vstr):
        echo "<script>alert('验证码有误')</script>";
        echo "<script>location='login.php'</script>";
    default:
        echo "<script>alert('请联系后台')</script>";
        echo "<script>location='login.php'</script>";
}}
?>