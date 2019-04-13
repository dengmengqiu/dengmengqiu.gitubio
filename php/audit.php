<?php
session_start();
include 'header.php';

$length=10;
@$pagenum=$_GET['page']?$_GET['page']:1;

//总行数
$totsql="select count(*) from essay";
$totarr=mysqli_fetch_row(mysqli_query($conn,$totsql));

$pagetot=ceil($totarr[0]/$length);

//限制最大页数
if($pagenum>=$pagetot){
	$pagenum=$pagetot;
}
$offset=($pagenum-1)*$length;

//$username=$_SESSION['name'];
$sql="select*from essay order by id limit {$offset},{$length}";
$rst=mysqli_query($conn,$sql);

//计算上一页和下一页
$prevage=$pagenum-1;
$nextpage=$pagenum+1;

echo"<center>";
echo"<h2>文章审核</h2>";
echo "<table width='700px' border='1'>";
while($row=mysqli_fetch_assoc($rst)){
if($row['cid']==1){
	$check='已审核';
}else{
	$check='待审核';
}
echo "<tr>";
echo "<td>{$row['id']}</td>";
echo "<td>{$row['title']}</td>";
echo "<td>{$row['name']}</td>";
echo "<td>{$row['time']}</td>";
echo "<td>{$row['content']}</td>";
echo "<td>{$row['tpname']}</td>";
echo "<td><a href='audittp.php?id={$row['id']}'>预览</a></td>";
echo "<td><a href='audit2.php?id={$row['id']}&page={$nextpage}'>$check</a></td>";
echo "<td><a href='adelete.php?id={$row['id']}&page={$nextpage}'>删除</a></td>";
echo "<td><a href='##.php?id={$row['id']}'>上传</a></td>";
echo "</tr>";
}
echo"</table>";




//页面下方的上一页和下一页超链接
echo "<h2><a href='audit.php?page={$prevage}'>上一篇</a>|<a href='audit.php?page={$nextpage}'>下一篇</a></h2>";
echo"</center>";

//释放结果集
mysqli_free_result($rst);

//释放连接资源
mysqli_close($conn);
?>