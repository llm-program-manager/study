<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/17
 * Time: 15:01
 */
$con=mysql_connect("localhost","root","");
//echo $con;
mysql_select_db("test");
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");
$nowpage=1;
if(isset($_POST['nowpage'])){
    $nowpage=$_POST['nowpage'];
}
$res=mysql_query("select * from food limit ".(($nowpage-1)*3).",3");
$arr=array();
while ($rs=mysql_fetch_assoc($res)){
    $arr[]=$rs;
}
echo json_encode($arr);



