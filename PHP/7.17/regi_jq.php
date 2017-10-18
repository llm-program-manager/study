<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-7-16
 * Time: 15:00
 */
if(isset($_GET['uname'])){
    $uname=$_GET['uname'];
    include "conn.php";
    $res=mysql_query("select * from user where u_name='".$uname."'");
    if(mysql_num_rows($res)>0){
        $data['result']="1";
        $data['msg']="user is exist!";
        $res_str=json_encode($data);
    }else{
        $data['result']="-1";
        $data['msg']="user is not exist!";
        $res_str=json_encode($data);
    }
    echo $res_str;
}