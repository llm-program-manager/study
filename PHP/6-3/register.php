<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-6-3
 * Time: 15:20
 */
//$con=mysql_connect("localhost","root","");//本地连接，用户名，密码
//mysql_select_db("llm");
//echo $con;
////防止出现乱码
//mysql_query("set character set 'utf8'");
//mysql_query("set names 'utf8'");
include("conn.php");
if(isset($_GET['uname'])&&isset($_GET['upass'])){
    $name=$_GET['uname'];
    $pass=$_GET['upass'];
    $res=mysql_query("select uname from user where uname='".$name."'" );
    $rows=mysql_num_rows($res);
    if($rows>0){
        echo "用户名已存在！<a href='register.html'>重新输入</a>";
    }else{
        mysql_query("INSERT INTO `user` (`id`, `uname`, `upass`) VALUES (NULL, '".$name."', '".$pass."');");
        echo "注册成功!<a href='login.html'>登录</a>";
    }

}