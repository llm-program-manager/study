<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-6-11
 * Time: 16:16
 */
include "conn.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
mysql_query("delete from book where b_id=".$id);
header("location:book.php");