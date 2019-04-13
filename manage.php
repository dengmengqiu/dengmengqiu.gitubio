<?php
include"header.php";

$file = $_POST['uid'];
//$file = iconv('utf-8','gb2312',$_FILES["file"]["name"]);
if ($_FILES["file"]["error"] > 0)
  {
  echo "<script>>alert('文件错误')</script>";
  echo "<script>location='index_yr_info_manage.php'</script>";
  }


 if (file_exists("manage/".$file)) 
    {
      echo "<script>alert('文件已经存在')</script>";
      echo "<script>location='index_yr_info_manage.php'</script>";
      exit;
    }
else
    {
      move_uploaded_file($_FILES["file"]["tmp_name"],"manage/" .$file);
    }


$name = $_POST['name'];
$uid  = $_POST['uid'];
$department = $_POST['department'];
$position = $_POST['position'];
$school =$_POST['educatioin_back'];
$age = $_POST['birthdy'];

$gender = $_POST['gender'];
if($gender=='男'){
                  $sex=1;
            }else{
                 $sex=0;
                }

//$resume = "manage/" .$_FILES["file"]["name"];
$resume="manage/" .$file;

$sql = "INSERT INTO staff(name,uid,department,position,school,age,sex,resume)  VALUES('$name','$uid','$department','$position','$school','$age','$sex','$resume')";
mysqli_query($conn,$sql);
$n=mysqli_fetch_array(mysqli_query($conn,"select id from staff where uid='$uid'"));
if(empty($n)){
            echo "<script>alert('请检查后台')</script>";
            echo "<script>location='index_yr_info_manage.php'</script>";
        }else{echo "<script>alert('添加成功')</script>";
              echo "<script>location='index_yr_info_manage.php'</script>";
             }


mysqli_close($conn);

?>

