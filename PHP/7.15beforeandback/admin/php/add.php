<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-6-11
 * Time: 10:15
 */
include "conn.php";
if(isset($_POST['submit'])){
    $t_id=$_POST['t_id'];
    $f_name=$_POST['f_name'];
    $f_price=$_POST['f_price'];
    $f_img=$_FILES['f_img'];
    $f_description=$_POST['f_description'];
    $filename=date("y").date("m").date("d").date("h").date("i").date("s");
    move_uploaded_file($f_img['tmp_name'],"../images/".$filename.".jpg");
    $res=mysql_query("INSERT INTO `food` (`t_id`, `f_name`, `f_price`, `f_img`, `f_description`) VALUES ('".$t_id."', '".$f_name."', '".$f_price."', '".$filename."', '".$f_description."')");
    header("location:food.php");
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>add-menu</title>
</head>
<body>
<form action="add.php" method="post" enctype="multipart/form-data">
    类型：<input type="text" name="t_id"><br>
    名称：<input type="text" name="f_name"><br>
    价格：<input type="text" name="f_price"><br>
    图片：<input type="file" name="f_img"><br>
    描述：<input type="text" name="f_description"><br>
    <input type="submit" value="添加" name="submit">
</form>
</body>
</html>
