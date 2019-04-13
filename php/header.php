<?php
header("content-type:text/html;charset-utf-8");
$servername="localhost";
$username="root";
$password="";
$dbname="company";

//创建连接
$conn=mysqli_connect($servername,$username,$password,$dbname);
mysqli_query($conn,"set names utf8");
