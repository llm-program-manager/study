<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-6-11
 * Time: 15:51
 */
include "conn.php";
if(isset($_POST['submit'])){
    $t_id=$_POST['t_id'];
    $b_name=$_POST['b_name'];
    $b_state=$_POST['b_state'];
    $b_img=$_FILES['b_img'];
    $b_description=$_POST['b_description'];
    $filename=date("y").date("m").date("d").date("h").date("i").date("s");
    echo $filename;
    move_uploaded_file($b_img['tmp_name'],"../image/".$filename.".jpg");
    $res=mysql_query("INSERT INTO `book` (`t_id`, `b_name`, `b_state`, `b_img`, `b_description`) VALUES ('".$t_id."', '".$b_name."', '".$b_state."', '".$filename."', '".$b_description."')");
    header("location:book.php");
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>add-book</title>
</head>
<body>
<form action="add.php" method="post" enctype="multipart/form-data">
    类型：<input type="text" name="t_id"><br>
    书名：<input type="text" name="b_name"><br>
    状态：<input type="text" name="b_state"><br>
    图片：<input type="file" name="b_img"><br>
    描述：<input type="text" name="b_description"><br>
    <input type="submit" value="添加" name="submit">
</form>
</body>
</html>
