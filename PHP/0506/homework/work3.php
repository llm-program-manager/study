<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-7
 * Time: 9:02
 */
//echo  print printf print_r
$str="abc";
$num="999";
echo $str;
echo "<br>";
print $str;
echo "<br>";
printf("%u123412%s",$num,$str); //%占位符 %u:替换数字 %s:替换字符串
echo "<br>";
$a = array ('a' => 'apple', 'b' => 'banana', 'c' => array ('x','y','z'));
print_r ($a);//输出数组

?>