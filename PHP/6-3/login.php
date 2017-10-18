<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-6-3
 * Time: 9:08
 */
//$con=mysql_connect("localhost","root","");//本地连接，用户名，密码
//mysql_select_db("llm");
////echo $con;
////防止出现乱码
//mysql_query("set character set 'utf8'");
//mysql_query("set names 'utf8'");
include("conn.php");
if(isset($_GET['uname'])&&isset($_GET['upass'])){
    $name=$_GET['uname'];
    $pass=$_GET['upass'];
    session_start();
    $_SESSION['name']=$name;
    $res=mysql_query("select * from user where uname='".$name."'and upass='".$pass."';");
    $rows=mysql_num_rows($res);
    echo $rows."条<br>";
    if($rows>0){
        echo "登录成功!";
        header("location:message.php");
    }else{
        echo "error!<a href='register.html'>注册</a>";
    }
}