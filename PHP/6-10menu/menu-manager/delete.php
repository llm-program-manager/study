<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-6-10
 * Time: 16:44
 */
include "conn.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
mysql_query("delete from food where f_id=".$id);
header("location:food.php");