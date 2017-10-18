<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-7
 * Time: 10:11
 */
$pwd=$_POST['password'];
if(empty($pwd)||!is_numeric($pwd)){
    echo "输入的为空或不为数字!";
}else{
    if(strlen($pwd)>25){
        echo "error!";
    }else{
        echo "success!";
    }
}
?>


