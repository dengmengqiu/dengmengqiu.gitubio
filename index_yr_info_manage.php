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
            <form action="manage.php" method="post" name="form2" enctype="multipart/form-data">
                <table width="98%" border="0" cellpadding="2" cellspacing="1" style="margin-top:8px">
                    <tbody>
                        <tr>
                            <td height="28" colspan="10" style="padding-left:10px;">员工管理 &gt;&gt;员工信息登记</td>
                        </tr>
                        <form>
                        <tr>
                            <td width="40%" align="right">姓 &nbsp;&nbsp;&nbsp;&nbsp; 名：</td>
                            <td><input type="text" name="name"></td>
                        </tr>
                        <tr>
                            <td width="40%" align="right">帐 &nbsp;&nbsp;&nbsp;&nbsp; 号：</td>
                            <td><input type="text" name="uid"></td>
                        </tr>
                        <tr>
                            <td width="40%" align="right">部 &nbsp;&nbsp;&nbsp;&nbsp; 门：</td>
                            <td><input type="text" name="department"></td>
                        </tr>
                        <tr>
                            <td width="40%" align="right">职 &nbsp;&nbsp;&nbsp;&nbsp; 位：</td>
                            <td><input type="text" name="position"></td>
                        </tr>
                        <tr>
                            <td width="40%" align="right">性 &nbsp;&nbsp;&nbsp;&nbsp; 别：</td>
                            <td><input type="text" name="gender"></td>
                            <tr>
                                <td width="40%" align="right">学 &nbsp;&nbsp;&nbsp;&nbsp; 历：</td>
                                <td><input type="text" name="educatioin_back"></td>
                            </tr>
                        </tr>
                        <tr>
                            <td width="40%" align="right">出生年月：</td>
                            <td><input type="text" name="birthdy"></td>
                        </tr>
                        <tr>
                            <td width="40%" align="right"><label for="file">简&nbsp;&nbsp;&nbsp;&nbsp; 历：</label></td>
                            <td><input type="file" name="file" id="file" /></td>
                        </tr>
                        <tr>
                            <td width="40%" align="right"><input type="submit" value="提交" margin-left="2em"></td>
                            <td><input type="button" onclick="location='index_yr_info_manage.php';" value="重置"></td>
                        </tr>
                        </form>
                    </tbody>
                </table>                   
            </form>
        </div>
    </div>
</body>
</html>