<?php
/*$username=$_COOKIE['username'];
echo"$username";
exit;
if(empty($_COOKIE['username'])||empty($_COOKIE['password'])){//如果session为空，并且用户没有选择记录登录状
	echo"0";}else{
	echo"1";	
	}*/
	var_dump($username=$_COOKIE['username']);
 setcookie('username', null, time() - 3600 * 24 * 365);
 setcookie('password', null, time() - 3600 * 24 * 365);
?>