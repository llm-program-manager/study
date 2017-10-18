<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-13
 * Time: 10:01
 */
$uname=$_GET['uname'];
$pwd=$_GET['pwd'];
if($uname=="admin"&&$pwd=="admin"){
    echo $uname."登录成功！";
}else{
    echo "用户名或密码错误！";
}
?>