<?php
session_start();
$servername="localhost";
$username="root";
$password="";
$dbname="test";

//创建连接
$conn=mysqli_connect($servername,$username,$password,$dbname);
mysqli_query($conn,"set names utf8");

$name=$_POST['username'];
$password=$_POST['password'];
$name2=strtolower($name);
echo str_replace(' ','',$name2);
exit;
$code=$_POST['vcode'];
$vstr=$_SESSION['vstr'];
$remenber=$_POST['remenber'];//是否自动登录标示

$sql="select*from login where username='$username'";
$rst=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($rst);
$pass=$row['pass'];

if($remenber=="是"){//如果用户选择了，记录用户名和加了密的密码放到cookie里面
     setcookie("username",$username,time()+3600 * 24 * 365);
     setcookie("password",$password,time()+3600 * 24 * 365);
     echo"1";
     }else{
     	echo"0";
     }


if($password===$pass && $code===$vstr){
	 $_SESSION['username']=$username;
     echo "<script>alert('登陆成功')</script>";
     echo "<script>location='loginr2.php'</script>";
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