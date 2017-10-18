<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <form action="1.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="upload">
        <input type="file" name="u_file">
        <input type="submit" value="上传">
    </form>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-7
 * Time: 14:59
 */
    if($_POST['action']=="upload"){
        $file_path="./uploads\\";   //路径./上级目录.php与图片同级的话，路径为空
        $picture_name=$_FILES[u_file][name];    //获取上传图片的名称
        $picture_name=strstr($picture_name,".");
        if($picture_name!=".jpg"){
            echo "上传格式有误！";
        }elseif($_FILES[u_file][tmp_name]){   //获取tmp_name临时文件的名称
            move_uploaded_file($_FILES[u_file][tmp_name],$file_path.$_FILES[u_file][name]);
            echo "上传成功！";
        }else{
            echo "上传失败!";
        }
    }
?>