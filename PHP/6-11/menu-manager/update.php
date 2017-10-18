<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-6-11
 * Time: 11:06
 */
//echo $_GET['id'];
include "conn.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $res = mysql_query("select * from food where f_id='" . $id . "'");
    $rs=mysql_fetch_assoc($res);
}
    if (isset($_POST['submit'])) {
        $f_id=$_POST['id'];
        $t_id = $_POST['t_id'];
        $f_name = $_POST['f_name'];
        $f_price = $_POST['f_price'];
        $f_img = $_FILES['f_img'];
        $f_description = $_POST['f_description'];
        $filename = date("y") . date("m") . date("d") . date("h") . date("i") . date("s");
        move_uploaded_file($f_img['tmp_name'], "images/" . $filename . ".jpg");
        $res=mysql_query("update `food` set `t_id`='".$t_id."',`f_name`='".$f_name."',`f_price`='".$f_price."',`f_img`='".$filename."',`f_description`='".$f_description."' where food.f_id='".$f_id."'");
        header("location:food.php");
    }
?>
<html>
<head>
    <meta charset="utf-8">
    <title>update-menu</title>
</head>
<body>
<form action="update.php" method="post" enctype="multipart/form-data">
    <input value="<?php echo $_GET['id']?>" name="id"><br>
    类型：<input type="text" name="t_id" value="<?php echo $rs['t_id']?>"><br>
    名称：<input type="text" name="f_name" value="<?php echo $rs['f_name']?>"><br>
    价格：<input type="text" name="f_price" value="<?php echo $rs['f_price']?>"><br>
    图片：<input type="file" name="f_img" ><br>
    描述：<input type="text" name="f_description" value="<?php echo $rs['f_description']?>"><br>
    <input type="submit" value="更新" name="submit">
</form>
</body>
</html>
