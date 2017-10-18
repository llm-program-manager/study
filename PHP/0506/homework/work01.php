<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-7
 * Time: 9:06
 */
//循环语句输出任意 二维数组
$arr=array('name'=>array('111','222','333'),'height'=>array('121','122','123'));
foreach ($arr as $key=>$value){
    echo $key."=>";
    foreach ($value as $item) {
        echo  $item." ";
    }
    echo "<br>";
}
?>