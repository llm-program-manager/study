<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-13
 * Time: 10:43
 */
//方式一
$rmb=$_GET['rmb'];
$dollor=$_GET['dollor'];
if(isset($rmb)){
    $dolor=$rmb*6.8;
    echo $rmb."人民币转换".$dolor."美元<br>";
}
if(isset($dollor)){
    $remb=$dollor/6.8;
    echo $dollor."人民币转换".$remb."人民币";
}

//方式二
//if(isset($_GET['rmb'])){
//    $rmb=$_GET['rmb'];
//    $dollor=$rmb*6.8;
//    echo $rmb."人民币=".$dollor."美元<br>";
//}
//if(isset($_GET["dollor"])){
//    $dollor=$_GET['dollor'];
//    $rmb=$dollor/6.8;
//    echo $dollor."美元=".$rmb."人民币";
//}
?>