<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-6-10
 * Time: 13:16
 */
include "conn.php";
if(isset($_GET['uname'])&&isset($_GET['upass'])){
    $uname=$_GET['uname'];
    $upass=$_GET['upass'];

    session_start();
    $_SESSION['name']=$uname;
}
$res=mysql_query("select * from user where u_name='".$uname."'and u_pass='".$upass."'");
$rows=mysql_num_rows($res);
if($rows>0){
    echo "登录成功！";
    header("location:food.php");
}else{
    echo "账号或密码有误！";
}
mysql_close($con);