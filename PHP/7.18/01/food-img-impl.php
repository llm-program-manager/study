<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-7-19
 * Time: 10:27
 */
$con=mysql_connect("localhost","root","");
mysql_select_db("test");
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");

$page=1;
if(isset($_POST['page'])){
    $page=$_POST['page'];
}

$res=mysql_query("SELECT * FROM `food` LIMIT ".(($page-1)*4).",4");
$arr=array();
while($rs=mysql_fetch_assoc($res)){
    $arr[]=$rs;
}
echo json_encode($arr);