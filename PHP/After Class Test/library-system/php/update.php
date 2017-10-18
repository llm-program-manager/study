<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-6-11
 * Time: 16:20
 */
include "conn.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $res = mysql_query("select * from book where b_id='" . $id . "'");
    $rs=mysql_fetch_assoc($res);
}
if (isset($_POST['submit'])) {
    $b_id=$_POST['id'];
    $t_id = $_POST['t_id'];
    $b_name = $_POST['b_name'];
    $b_state = $_POST['b_state'];
    $b_img = $_FILES['b_img'];
    $b_description = $_POST['b_description'];
    $filename = date("y") . date("m") . date("d") . date("h") . date("i") . date("s");
    move_uploaded_file($b_img['tmp_name'], "../image/" . $filename . ".jpg");
    $res=mysql_query("update `book` set `t_id`='".$t_id."',`b_name`='".$b_name."',`b_state`='".$b_state."',`b_img`='".$filename."',`b_description`='".$b_description."' where book.b_id='".$b_id."'");
    header("location:book.php");
}
?>
<html>
<head>
    <meta charset="utf-8">
    <title>update-book</title>
</head>
<body>
<form action="update.php" method="post" enctype="multipart/form-data">
    <input value="<?php echo $_GET['id']?>" name="id"><br>
    类型：<input type="text" name="t_id" value="<?php echo $rs['t_id']?>"><br>
    名称：<input type="text" name="b_name" value="<?php echo $rs['b_name']?>"><br>
    状态：<input type="text" name="b_state" value="<?php echo $rs['b_state']?>"><br>
    图片：<input type="file" name="b_img" ><br>
    描述：<input type="text" name="b_description" value="<?php echo $rs['b_description']?>"><br>
    <input type="submit" value="更新" name="submit">
</form>
</body>
</html>
