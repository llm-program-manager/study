<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-7-19
 * Time: 16:06
 */
//连接数据库
$con=mysql_connect("localhost","root","");
mysql_select_db("llm");
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");

//如果得到了当前id值
if(isset($_POST['nid'])){
    $res=mysql_query("SELECT * FROM `bullte` WHERE `id` > ".$_POST['nid']);
    $arr=array();
    //将数据库中的记录转换成数组，放在$arr中
    while($rs=mysql_fetch_assoc($res)){
        $arr[]=$rs;
    }
    echo json_encode($arr);
}else{//否则输出错误信息
    $res["result"]="-1";
    $res["msg"]="error";
    echo json_encode($res);
}