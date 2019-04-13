<!DOCTYPE HTML>
<head>
    <meta charset="UTF-8">
    <title>Document</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <style type="text/css" src="css/index.css"></style>
  
</head>
<body>
    <div class="content">
        <div background="images/allbg.gif" leftmargin="8" topmargin="8">
            <table width="98%" border="0" align="center" cellpadding="3" cellspacing="1">
                <tbody>
                    <tr height="24" align="center">   
                        <td width="10%">账号</td>
                        <td width="10%">姓名</td>   
                        <td width="10%">密码</td> 
                        <td width="10%">性别</td>
                        <td width="10%">教育程度</td>  
                        <td width="10%">出生年月</td>
                        <td width="10%">时间</td>
                        <td width="10%">简历</td>
                        <td width="10%">修改</td>  
                        <td width="10%">删除</td>     
                    </tr>
                    <?php
                        include 'header.php';
                        $length=5;
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
                        $uid = $row['uid'];
                        $name = $row['name'];
                        $school = $row['school'];
                        $age = $row['age'];
                        $resume = $row['resume'];
                        $position = $row['position'];
                        $department = $row['department'];
                        $pass = $row['pass'];
                        $time = $row['time'];
                        $sex1 = $row['sex'];

                        if($sex1){
                            $sex='男';
                        }else{
                            $sex ='女';
                        }
                    

                        echo"  <form>
                            <tr align='center' height='24'> 
                            <td>$uid</td>
                            <td>$name</td>
                            <td>$pass</td>
                            <td>$sex</td>
                            <td>$school</td>
                            <td>$age</td>
                            <td>$time</td>
                            <td><a href='resume2.php?resume={$row['resume']}&nextpage={$nextpage}'><img src='images/eye.png' title='预览'' alt='预览' onclick='' style='cursor:pointer' border='0' width='30' height='30'></a></td>
                            <td><a href='staff.php?id={$row['id']}&nextpage={$nextpage}'><img src='images/edit.png' title='修改'' alt='修改'' width='20px' height='20px'></a></td>
                            <td><a href='staffde.php?resume={$row['resume']}&nextpage={$nextpage}'><img src='images/delete.png' width='30px' height='30px'></a></td>
                        </tr></form>";}
                        echo"<tr align='right'>
                            <td height='36' colspan='10' align='center'>
                                <div class='pagelistbox'>
                                <span><a class='' href='staff.php?page=1'>首页</a></span>
                                <a class='' href='staff.php?page={$prevage}'>上页</a>
                                <strong>1</strong>
                                    <a href='#'>2</a>
                                    <a href='#'>3</a>
                                    <a href='#'>...</a>
                                    <a href='#'>$pagetot</a>
                                    <a class='' href='staff.php?page={$nextpage}'>下页</a>
                                    <a class='endPage' href='staff.php?page=$pagetot'>末页</a>
                                </div>
                            </td>
                        </tr>";?>
                </tbody>
            </table> 
        </div>
    <div>
 
</body>
</html>
