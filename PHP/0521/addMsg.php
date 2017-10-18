<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-21
 * Time: 9:33
 */
session_start();//打开session,接收message
//判断是否提交了全部内容 title和txt
if(isset($_GET['title'])&&isset($_GET['txt'])){
    $name=$_SESSION['name'];
    $title=$_GET['title'];
    $txt=$_GET['txt'];
    $time=time();
//把传过来的name和title ,txt进行格式化存储，全球以后读取
    $str=$name."|".$title."|".$txt."|".$time."|"."<@>";
//打开文件
    $fp=fopen("msg.txt",'a');
//向msg.txt文件中写入内容 字符串$str
    fwrite($fp,$str);
//关闭文件
    fclose($fp);
//php中的方法 跳转界面
    header("location:message.php");
}else{
    echo "请补全内容！";
}
