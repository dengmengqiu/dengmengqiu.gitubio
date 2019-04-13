<!DOCTYPE HTML>
<head>
    <meta charset="UTF-8">
    <title>Document</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" charset="utf-8" src="js/index.js"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/js" href="js/index.js">
    <style type="text/css" src="css/index.css"></style>
</head>
<body>
    <div class="content">
        <div leftmargin="8">
            
            <form name="form2" action="record2.php" method="post">
                <table width="98%" border="0" cellpadding="2" cellspacing="1" align="center" style="margin-top:8px">
                    <tbody>
                        <tr>
                            <td height="28" colspan="10" style="padding-left:10px;"> 员工 &gt;&gt; 员工基本工资</td>
                        </tr>
                        <tr align="center">
                            <td height="28" colspan="10"> <input type="submit" name"submit" value="提交"></td>
                        </tr>
                        <tr align="center" height="25">
                            <td width="8%">账号</td>
                            <td width="16%">姓名</td>
                            <td width="18%">部门</td>
                            <td width="18%">迟到</td>
                            <td width="18%">早退</td>
                            <td width="12%">请假</td>
                            <td width="12%">旷到</td>
            
                        </tr>
                         <?php
                        include 'header.php';
                        $length=1;
@$pagenum=$_GET['page']?$_GET['page']:1;

//总行数
$totsql="select count(*) from staff";
$totarr=mysqli_fetch_row(mysqli_query($conn,$totsql));

$pagetot=ceil($totarr[0]/$length);

//限制最大页数
if($pagenum>=$pagetot){
    $pagenum=$pagetot;
}
$offset=($pagenum-1)*$length;


//计算上一页和下一页
$prevage=$pagenum-1;
$nextpage=$pagenum+1;

                        $sql="select*from staff order by id limit {$offset},{$length}";
                        $rst=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($rst)){
                            $uid=$row['uid'];
                            $time = date('Y-m', time());
                            $sql2="select *from timecard where uid='$uid'&&time='$time'";
                            $rst2=mysqli_query($conn,$sql2);
                            $row2=mysqli_fetch_assoc($rst2);
                            $id2=$row2['id'];
                            echo"<center><h2>$time</h2></center>";
                            echo"<td><input type='int'  name='uid' id='' value='{$row['uid']}'></td>
                            <td><input type='text'  name='name' id='' value='{$row['name']}'></td>
                            <td><input type='text'  name='department' id='' value='{$row['department']}'></td>";
                            if(!empty($id2)){
                                echo"<td><input type='text'  name='late' id='' value='{$row2['late']}'></td>";
                                echo"<td><input type='text'  name='early' id='' value='{$row2['early']}'></td>";
                                echo"<td><input type='text'  name='absent' id='' value='{$row2['absent']}'></td>";
                                echo"<td><input type='text'  name='vacate' id='' value='{$row2['vacate']}'></td>";
                            }else{
                            echo"<td><input type='text'  name='late' id='' value=''></td>";
                            echo"<td><input type='text'  name='early' id='' value=''></td>";
                            echo"<td><input type='text'  name='absent' id='' value=''></td>";
                            echo"<td><input type='text'  name='vacate' id='' value=''></td>";}
                            echo"</tr>";
                            if(!empty($id2)){
                            echo"<a href=''>修改</a>";}else{
                                echo"<a href=''>未录入</a>";
                            }
                            echo"
                            <input type='hidden' value='$nextpage' name='nextpage' id=''>
                        <tr align='right'>
                            <td height='36' colspan='10' align='center'>
                                <a href='index_hr_check_w._lodge.php?page={$prevage}'><u>上一个</u></a> | 
                                <a href='index_hr_check_w._lodge.php?page={$nextpage}'><u>下一个</u></a>
                        </div>
                            </td>
                        </tr>";}?>
                    </tbody>
                </table>                   
            </form>
        </div>
    </div>
</body>
</html>