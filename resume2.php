<?php
define('UTF32_BIG_ENDIAN_BOM', chr(0x00) . chr(0x00) . chr(0xFE) . chr(0xFF));  
define('UTF32_LITTLE_ENDIAN_BOM', chr(0xFF) . chr(0xFE) . chr(0x00) . chr(0x00));  
define('UTF16_BIG_ENDIAN_BOM', chr(0xFE) . chr(0xFF));  
define('UTF16_LITTLE_ENDIAN_BOM', chr(0xFF) . chr(0xFE));  
define('UTF8_BOM', chr(0xEF) . chr(0xBB) . chr(0xBF));  
 
$newPath=$_GET['resume'];
$nextpage=$_GET['nextpage'];
$page=$nextpage-1;

$text = file_get_contents($newPath);  
$first2 = substr($text, 0, 2);  
$first3 = substr($text, 0, 3);  
$first4 = substr($text, 0, 3);  
$encodType = "";  
if ($first3 == UTF8_BOM)  
    $encodType = 'UTF-8 BOM';  
else if ($first4 == UTF32_BIG_ENDIAN_BOM)  
    $encodType = 'UTF-32BE';  
else if ($first4 == UTF32_LITTLE_ENDIAN_BOM)  
    $encodType = 'UTF-32LE';  
else if ($first2 == UTF16_BIG_ENDIAN_BOM)  
    $encodType = 'UTF-16BE';  
else if ($first2 == UTF16_LITTLE_ENDIAN_BOM)  
    $encodType = 'UTF-16LE';  
  
$content = file_get_contents($newPath);  
  
$content = iconv($encodType, "utf-8", $content); 
echo"$content"; 
echo"<a href='staff.php?page={$page}'>关闭</a>";

?>