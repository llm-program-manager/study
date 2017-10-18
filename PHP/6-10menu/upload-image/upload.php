<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-6-10
 * Time: 9:45
 */
if(isset($_FILES['file'])){
//    var_dump($_FILES['file']);
//    var_dump(is_uploaded_file($FILES['file']));
//    if($FILES['file']['size']>1024){
//        exit("上传失败");
//    }
    //以时间命名图片
    $filename=date("y").date("m").date("d").date("h").date("i").date("s");
}
//将图片保存在指定的文件夹中，指定文件的保存路径
move_uploaded_file($_FILES['file']["tmp_name"],"images/".$filename.".jpg");
include "conn.php";
mysql_query("insert into img(img_name) values(".$filename.")");
mysql_close($con);