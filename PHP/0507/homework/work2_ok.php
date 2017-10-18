<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-7
 * Time: 11:48
 */
//验证用户身份证长度是否正确
$str=$_POST['code'];
if(empty($str)){
    echo "身份证号不能为空！";
}else{
    if(strlen($str)==18||strlen($str)==15){
        echo "成功!";
    }else{
        echo "证件号有误！";
    }
}
?>