<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-6-10
 * Time: 13:32
 */
include "conn.php";
session_start();
$name=$_SESSION['name'];
echo "欢迎".$name."登录菜品管理系统！";
echo "<br>";

//查询关键字
$key="";
if(isset($_GET['key'])){
    $key=$_GET['key'];
}
//下拉列表
$sel="0";
if(isset($_GET['sel'])){
    $sel=$_GET['sel'];
}

if($sel==0){
    $res=mysql_query("select * from food,type where food.t_id=type.t_id and f_name like  '%".$key."%'");
}else{
    $res=mysql_query("select * from food,type where food.t_id=type.t_id and food.t_id='".$sel."'");
}

$str="";
while($rs=mysql_fetch_assoc($res)){
    $str.="<tr><td>".$rs['f_id']."</td>
                <td>".$rs['t_name']."</td>
                <td>".$rs['f_name']."</td>
                <td>￥".$rs['f_price']."</td>
                <td><img width='100px' height='100px' src='images/".$rs['f_img'].".jpg'></td>
                <td>".$rs['f_description']."</td><td><a href='delete.php?id=".$rs['f_id']."'>删除</a>/修改</td>
            </tr>";
}
?>
<html>
<meta charset="utf-8">
<head>
    <title>菜品管理系统</title>
    <link rel="stylesheet" href="food-list.css">
</head>
<body>
<form action="food.php" method="get" name="f1">
    <select name="sel">
        <option value="0">全部</option>
        <option value="1">热菜</option>
        <option value="2">凉菜</option>
        <option value="3">酒水</option>
        <option value="4">主食</option>
    </select>
    <input type="submit" value="查询">
</form>
<form action="food.php" method="get" name="f2">
    关键字：<input type="text" name="key">
    <input type="submit" value="查询">
</form>
<table>
    <tr>
        <td>id</td>
        <td>类型</td>
        <td>名称</td>
        <td>价格</td>
        <td>图片</td>
        <td>描述</td>
        <td>操作</td>
    </tr>
    <?php echo $str?>
</table>
</body>
</html>
