<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-7-16
 * Time: 14:56
 */
if(isset($_GET['uname']) && isset($_GET['upass'])){
    $uname=$_GET['uname'];
    $upass=$_GET['upass'];

    //连接数据库
    $con=mysql_connect("localhost","root","");
    mysql_select_db("test");
    mysql_query("set character set 'utf8'");
    mysql_query("set name 'utf8'");

    //查询记录
    $res=mysql_query("select * from user where u_name=".uname."and u_pass=".upass);

    //判断记录是否存在
    if(mysql_num_rows($res)>0){
        $data['result']=1;
        $data['msg']="成功！";
        $res_str=json_encode($data);
    }else{
        $data['result']=-1;
        $data['msg']="失败！";
        $res_str=json_encode($data);
    }
    echo $res_str;
}