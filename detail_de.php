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
                        <td width="8%">账号</td>  
                        <td width="10%">姓名</td>    
                        <td width="10%">部门</td>   
                        <td width="9%">迟到</td>  
                        <td width="9%">早退</td>    
                        <td width="9%">请假</td> 
                        <td width="9%">旷到</td>  
                        <td width="10%">扣除</td>  
                        <td width="10%">扣除</td> 
                        <td width="8%">是否提交</td> 
                        <td width="8%">操作</td>     
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
                        $addpage=$pagetot+1;
                        $sql="select*from staff order by id limit {$offset},{$length}";
                        $rst=mysqli_query($conn,$sql);
                        $time = date('Y-m', time());
                        echo"<h2><center>$time</h2></center>";
                        while($row=mysqli_fetch_assoc($rst)){
                        $uid = $row['uid'];
                        $name = $row['name'];
                        $position = $row['position'];
                        $department = $row['department'];

                        $rst2 = mysqli_query($conn,"select*from timecard where uid='$uid'");
                        $row2 = mysqli_fetch_assoc($rst2);
                        $late = $row2['late'];
                        $early = $row2['early'];
                        $absent = $row2['absent'];
                        $vacate = $row2['vacate'];


                        $rst5 = mysqli_query($conn,"select*from payroll where id='1'");
                        $row5 = mysqli_fetch_assoc($rst5);
                        $latem = $row5['late'];
                        $earlym = $row5['early'];
                        $absentm = $row5['absent'];
                        $vacatem = $row5['vacate'];

                        $latet = $late*$latem;
                        $earlyt = $early*$earlym ;
                        $absentt = $absent*$absentm; 
                        $vacatet = $vacate*$vacatem;
                        $deductt = $latet+$earlyt+$absentt+$vacatet;


                        $n=mysqli_fetch_array(mysqli_query($conn,"select name from deductt where uid='$uid'&&time='$time'"));
                        if(empty($n)){
                                      $pd='未录入';
                                }else{
                                      $pd='已录入';
                                     }
                        echo"<form name='form1' action='deductt2.php' method='post'>
                            <tr align='center' height='24'> 
                            <th><input type='int'  name='uid' id='' value='$uid'></th>
                            <td><input type='text'  name='name' id='' value='$name'></td>
                            <td><input type='int'  name='department' id='' value='$department'></td>
                            <td><input type='int'  name='position' id='' value='$position'></td>
                            <td><input type='int'  name='latet' id='' value='$latet'></td>
                            <td><input type='int'  name='earlyt' id='' value='$earlyt'></td>
                            <td><input type='int'  name='absentt' id='' value='$absentt'></td>
                            <td><input type='int'  name='vacatet' id='' value='$vacatet'></td>
                            <td><input type='int'  name='deductt' id='' value='$deductt'></td>
                            <td><input value='$pd'></td>
                            <td><input type='submit' value='提交'><td></a><img src='images/push.png' width='30px' height='30px' margin-bottom='-3px'></td>
                            <input type='hidden' value='$pd' name='pd' id=''>
                            <input type='hidden' name='nextpage' value='$nextpage'>
                        </tr></form>";}
                            echo"<tr align='right'>
                            <td height='36' colspan='10' align='center'>
                                <div class='pagelistbox'>
                                <span><a class='' href='detail_award.php?page=1'>首页</a></span>
                                <a class='' href='detail_award.php?page={$prevage}'>上页</a>
                                <strong>1</strong>
                                    <a href='#'>2</a>
                                    <a href='#'>3</a>
                                    <a href='#'>...</a>
                                    <a href='#'>$pagetot</a>
                                    <a class='' href='detail_de.php?page={$nextpage}'>下页</a>
                                    <a class='endPage' href='detail_de.php?page=$pagetot'>末页</a>
                                </div>
                            </td>
                        </tr>";?>
                </tbody>
            </table> 
        </div>
    <div>
 
</body>
</html>