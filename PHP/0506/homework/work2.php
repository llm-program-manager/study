<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-6
 * Time: 15:28
 */
//获取访问者电脑信息，如IP,端口号
//获取IP地址
$ip=$_SERVER['REMOTE_ADDR'];
echo "你的IP地址是：".$ip;
echo "<br>";
echo "你的端口号是：".$_SERVER['REMOTE_PORT'];
?>