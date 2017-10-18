<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-20
 * Time: 16:19
 */
//implode("分割符",字符数组); 将数组转换成字符串
$arr=array('h','e','l','l','o');
for($i=0;$i<count($arr);$i++){
    echo $arr[$i];
}
echo "<br>";
echo "<br>";
$str=implode(",",$arr);
var_dump($str);
echo "<br>";
//explode("分割符",字符串，数量);将前n个字符转换成数组
$str="w,o,r,l,d";
$arr=explode(",",$str,3);
var_dump($arr);
?>