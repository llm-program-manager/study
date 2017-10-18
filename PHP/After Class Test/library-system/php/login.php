<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-6-10
 * Time: 13:16
 */
include "conn.php";
if(isset($_GET['u_name'])&&isset($_GET['u_pass'])){
    $u_name=$_GET['u_name'];
    $u_pass=$_GET['u_pass'];

    session_start();
    $_SESSION['_name']=$u_name;
}
$res=mysql_query("select * from user where u_name='".$u_name."'and u_pass='".$u_pass."'");
$rows=mysql_num_rows($res);
if($rows>0){
    echo "登录成功！";
    header("location:book.php");
}else{
    echo "账号或密码错误！";
}
mysql_close($con);