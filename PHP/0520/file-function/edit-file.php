<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-20
 * Time: 16:03
 */
//创建并写入
//$file=fopen("info.txt","a");
//fwrite($file,"hello world!");
//fclose($file);
//读数据
$txt=fopen("info.txt","r");
$rfile=fread($txt,filesize("info.txt"));
fclose($txt);
echo $rfile;
?>