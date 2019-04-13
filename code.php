<?php
//开启session
session_start();

//准备资源
$im=imagecreatetruecolor(70,40);

//准备颜料
$gray=imagecolorallocate($im,200,200,200);
$black=imagecolorallocate($im,0,0,0);
$green=imagecolorallocate($im,0,255,0);
$blue=imagecolorallocate($im,0,0,255);
$grayred=imagecolorallocate($im,255,200,200);

//画布填充
imagefill($im,0,0,$gray);

//干扰线
for($i=0;$i<5;$i++){
	imageline($im,mt_rand(0,70),mt_rand(0,40),mt_rand(0,70),mt_rand(0,40),$black);
}
//干扰点
for($i=0;$i<5;$i++){
	imagesetpixel($im,mt_rand(0,70),mt_rand(0,40),$black);
}

//准备文字
$strarr=array_merge(range(0,9),range('a','z'),range('A','Z'));
shuffle($strarr);
$str=join('',array_slice($strarr,0,4));

//使所有页面都可使用
$_SESSION['vstr']=$str;
imagestring($im,4,20,13,$str,$black);

//输出最终图像或保存图像
header('Content-type:image/png');
imagepng($im);

//释放画布资源
imagedestroy($im);
?>


