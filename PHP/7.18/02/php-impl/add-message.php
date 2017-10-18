<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-7-19
 * Time: 16:04
 */

//连接数据库
$con=mysql_connect("localhost","root","");
mysql_select_db("llm");
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");

//若有内容,将用户发送的弹幕消息存入数据库
if(isset($_POST['content'])){
      mysql_query("INSERT INTO bullte (title, content) VALUES ('弹幕', '".$_POST['content']."')");
}

//检测是否有记录插入到数据库
$row=mysql_affected_rows();
if($row>0){
    $res["result"]="1";
    $res["msg"]="success";
}else{
    $res["result"]="-1";
    $res["msg"]="error";
}

//输出返回信息
echo json_encode($res);