<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-7-18
 * Time: 10:02
 */
$con=mysql_connect("localhost","root","");
mysql_select_db("test");
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");


$res=mysql_query("select * from food");
$arr=array();
while ($rs=mysql_fetch_assoc($res)){
    $arr[]=$rs;
}
echo json_encode($arr);