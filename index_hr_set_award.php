<?php
include"header.php";

$sql="select*from bonus";
$rst=mysqli_query($conn,$sql);

?>
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
            
            <form name="form2">
                <table width="98%" border="0" cellpadding="2" cellspacing="1" align="center" style="margin-top:8px">
                    <tbody>
                        <tr>
                            <td height="28" colspan="10" background="images/tb" style="padding-left:10px;"> 员工 &gt;&gt; 奖金设置</td>
                        </tr>
                        <tr align="center" height="25">
                            <td width="6%">ID</td>
                            <td width="6%">奖励名称</td>
                            <td width="14%">奖励金额</td>
                            <td width="26%">奖励规则</td>
                            <td width="20%">设置时间</td>
                            <td width="18%">修改</td>
                            <td width="10%">删除</td>
            
                        </tr>
                        <?php
while($row=mysqli_fetch_assoc($rst)){
echo "<tr align='center' height='26'>";
echo "<td nowrap=''>{$row['id']}</td>";
echo "<td>{$row['name']}</td>";
echo "<td>{$row['money']}</td>";
echo "<td>{$row['rule']}</td>";
echo "<td>{$row['time']}</td>";
echo "<td><a href='awardu.php?id={$row['id']}'><img src='images/edit.png' width='20px' height='20px'></a></td>";
echo "<td><a href='awarde.php?id={$row['id']}'><img src='images/delete.png' width='30px' height='30px'></a></td>";
echo"</tr>";
}?>
                      <tr align="center">
                            <td height="36" colspan="10">
                            <button onclick="tz()">增&nbsp加</button>
                            <script>
                            function tz(){
                                          window.location.href='awarda.php';
                                          }
                            </script>
                            </td>
                        </tr>
                    </tbody>
                </table>                   
            </form>
        </div>
    </div>
</body>
</html>