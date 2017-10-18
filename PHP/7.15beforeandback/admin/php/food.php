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
echo "<div style='width:100%;height:100px;background-color:darkgray'><h1 style='font-family:楷体;line-height:100px;'>欢迎".$name."登录菜品管理系统！</h1></div>";
echo "<br><br>";

//查询关键字
function change($nowpage){
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
        $res=mysql_query("select * from food,type where food.t_id=type.t_id and f_name like  '%".$key."%'limit ".(($nowpage-1)*2).",2");
    }else{
        $res=mysql_query("select * from food,type where food.t_id=type.t_id and food.t_id='".$sel."'limit ".(($nowpage-1)*2).",2");
    }

    $str="";
    while($rs=mysql_fetch_assoc($res)){
        $str.="<tr><td>".$rs['f_id']."</td>
                <td>".$rs['t_name']."</td>
                <td>".$rs['f_name']."</td>
                <td>￥".$rs['f_price']."</td>
                <td><img width='100px' height='100px' src='../images/".$rs['f_img'].".jpg'></td>
                <td>".$rs['f_description']."</td><td><a href='delete.php?id=".$rs['f_id']."'>删除</a>/<a href='update.php?id=".$rs['f_id']."'>修改</a></td>
            </tr>";
    }
    echo $str;
}
?>
<html>
<meta charset="utf-8">
<head>
    <title>菜品管理系统</title>
    <link rel="stylesheet" href="food-list.css">
</head>
<body>
<a href="add.php">添加菜品</a><br><br>
<form action="food.php" method="get" name="f1">
    <select name="sel" class="select-tip">
        <option value="0">全部</option>
        <option value="1">热菜</option>
        <option value="2">凉菜</option>
        <option value="3">酒水</option>
        <option value="4">主食</option>
    </select>
    <input type="submit" value="查询" class="submit1">
</form>
<br>
<form action="food.php" method="get" name="f2">
    <label class="tip">搜索关键字</label><input type="text" name="key" class="key">
    <input type="submit" value="查询" class="submit2">
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
    <?php
    $nowpage=1;//默认第一页
    $res=mysql_query("select * from food,type where food.t_id=type.t_id");
    $rows=mysql_num_rows($res);//记录条数
    $pages=ceil($rows/2);//总页数
    //echo $pages;
    if(isset($_GET['nowpage'])){
        $nowpage=$_GET['nowpage'];
    }
    //上一页
    if($nowpage==1){
        $prevpage=$pages;
    }else{
        $prevpage=$nowpage-1;
    }
    //下一页
    if($nowpage==$pages){
        $nextpage=1;
    }else{
        $nextpage=$nowpage+1;
    }
    //最后一页
    $lastpage=$pages;
    change($nowpage);

    ?>
</table>
<a href="food.php?nowpage=1">第一页</a>
<a href="food.php?nowpage=<?php echo $prevpage?>">上一页</a>
<a href="food.php?nowpage=<?php echo $nextpage?>">下一页</a>
<a href="food.php?nowpage=<?php echo $lastpage?>">最后一页</a>
</body>
</html>
