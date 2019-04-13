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
                        <td width="10%">内容</td>
                        <td width="10%">时间</td>   
                        <td width="10%">审核</td> 
                        <td width="10%">上传</td>  
                        <td width="10%">删除</td>       
                    </tr>

                    <?php
                        include 'header.php';
                        $length=5;
                        @$pagenum=$_GET['page']?$_GET['page']:1;

                        //总行数
                        $totsql="select count(*) from mess";
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

                        $sql="select*from mess order by id limit {$offset},{$length}";
                        $rst=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($rst)){
                        $content = $row['content'];
                        $time = $row['time'];
                        $audit1 = $row['audit'];
                        $up = $row['up'];
                        if($audit1){
                                   $audit='已审核';
                             }else{
                                   $audit='未审核';
                                  }

                     echo"  <form>
                            <tr align='center' height='24'> 
                            <td>$content</td>
                            <td>$time</td>
                            <td><a href='ms2.php?id={$row['id']}&page={$nextpage}'>$audit</a></td>
                            <td>$up</td>
                            <td><a href='msd.php?id={$row['id']}&page={$nextpage}'><img src='images/delete.png' width='30px' height='30px'></a></td>
                        </tr></form>";}
                        echo"<tr align='right'>
                            <td height='36' colspan='10' align='center'>
                                <div class='pagelistbox'>
                                <span><a class='' href='ms.php?page=1'>首页</a></span>
                                <a class='' href='ms.php?page={$prevage}'>上页</a>
                                <strong>1</strong>
                                    <a href='#'>2</a>
                                    <a href='#'>3</a>
                                    <a href='#'>...</a>
                                    <a href='#'>$pagetot</a>
                                    <a class='' href='ms.php?page={$nextpage}'>下页</a>
                                    <a class='endPage' href='ms.php?page=$pagetot'>末页</a>
                                </div>
                            </td>
                        </tr>";?>
                </tbody>
            </table> 
        </div>
    <div>
 
</body>
</html>