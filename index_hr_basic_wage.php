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
            
            <form name='form1' action='wagea.php' method='post'>
                <table width="98%" border="0" cellpadding="2" cellspacing="1" align="center" style="margin-top:8px">
                    <tbody>
                        <tr>
                            <td height="28" colspan="10" background="images/tb" style="padding-left:10px;"> 员工 &gt;&gt; 员工基本工资</td>
                        </tr>
                        <tr align="center" height="25">
                            <td width="6%">账户</td>
                            <td width="6%">选择</td>
                            <td width="14%">姓名</td>
                            <td width="18%">部门</td>
                            <td width="18%">职位</td>
                            <td width="18%">基本工资</td>
                            <td width="10%">修改</td>
                            <td width="10%">删除</td>
            
                        </tr>
                        <tr align="center" height="26">
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
$addpage=$pagetot+1;

                        $sql="select*from staff order by id limit {$offset},{$length}";
                        $rst=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($rst)){
                            echo"<td>{$row['uid']}</td>
                                 <td><input class='select' type='checkbox' value=''></td>
                                 <td>{$row['name']}</td>
                                 <td>{$row['department']}</td>
                                 <td>{$row['position']}</td>";

                            $uid=$row['uid'];
                            $sql2="select*from salary where uid=$uid";
                            $rst2=mysqli_query($conn,$sql2);
                            $row2=mysqli_fetch_assoc($rst2);
                            $id=$row2['id'];

                            if(empty($id)){
                                echo"<td><input type='text'  name='wage' id='' value=''></td>";
                            }else{
                                echo"<td>{$row2['wage']}</td>";}

                            echo"<input type='hidden' value='$uid' name='uid'>";   
                            echo"<td><a href='wageu.php?id={$id}&nextpage={$nextpage}'><img src='images/edit.png' title='修改' alt='修改'' width='20px' height='20px'></a></td>
                                 <td><a href='waged.php?id={$id}&nextpage={$nextpage}'><img src='images/delete.png' title='删除' alt='删除' width='30px' height='30px'></a></td>
                        <tr>
                        <td height='36' colspan='10'>
                            &nbsp;
                            <a href='#' onclick='selectAll('select');'>全选</a>
                            <a href='#' onclick='deSelectAll('select')''>取消</span>
                            <a href='#'>&nbsp;删除&nbsp;</a>
                        </td>
                        </tr>
                        <tr align='right'>
                            <td height='36' colspan='10' align='center'>
                                <div class='pagelistbox'>
                                <span><a class='' href='index_hr_basic_wage.php?page=1'>首页</a></span>
                                <a class='' href='index_hr_basic_wage.php?page={$prevage}'>上页</a>
                                <strong>1</strong>
                                    <a href='#'>2</a>
                                    <a href='#'>3</a>
                                    <a href='#'>...</a>
                                    <a href='#'>$pagetot</a>
                                    <a class='' href='index_hr_basic_wage.php?page={$nextpage}'>下页</a>
                                    <a class='endPage' href='index_hr_basic_wage.php?page=$pagetot'>末页</a>
                                </div>
                            </td>
                            <input type='hidden' value='$nextpage' name='nextpage' id=''>
                            <center><input type='submit' value='提交'></center>
                        </tr>
                        ";}?>
                    </tbody>
                </table>                   
            </form>
        </div>
    </div>
</body>
</html>