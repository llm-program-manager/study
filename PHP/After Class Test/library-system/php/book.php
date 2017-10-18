<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-6-11
 * Time: 15:25
 */
include "conn.php";
session_start();
$_name=$_SESSION['_name'];
echo "欢迎".$_name."登录图书管理系统！";
echo "<br>";

//查询关键字
function change($nowpage){
    include "conn.php";
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
        $res=mysql_query("select * from book,type where book.t_id=type.t_id and b_name like  '%".$key."%'limit ".(($nowpage-1)*3).",3");
    }else{
        $res=mysql_query("select * from book,type where book.t_id=type.t_id and book.t_id='".$sel."'limit ".(($nowpage-1)*3).",3");
    }
    $str="";
    while($rs=mysql_fetch_assoc($res)){
        $str.="<tr><td>".$rs['b_id']."</td>
                <td>".$rs['t_name']."</td>
                <td>".$rs['b_name']."</td>
                <td>".$rs['b_state']."</td>
                <td><img width='100px' height='100px' src='../image/".$rs['b_img'].".jpg'></td>
                <td>".$rs['b_description']."</td>
                <td><a href='delete.php?id=".$rs['b_id']."'>删除</a>/<a href='update.php?id=".$rs['b_id']."'>修改</a></td>
            </tr>";
    }
    echo $str;
}
?>
<html>
<meta charset="utf-8">
<head>
    <title>图书管理系统</title>
    <link rel="stylesheet" href="../style/book-list.css">
</head>
<body>
<a href="add.php">添加图书</a><br><br>
<form action="book.php" method="get" name="f1">
    <select name="sel">
        <option value="0">全部</option>
        <option value="1">名著</option>
        <option value="2">小说</option>
        <option value="3">文学</option>
    </select>
    <input type="submit" value="查询"><br>
</form>
<form action="book.php" method="get" name="f2">
    关键字：<input type="text" name="key">
    <input type="submit" value="查询"><br>
</form>
<table>
    <tr>
        <td>id</td>
        <td>类型</td>
        <td>书名</td>
        <td>状态</td>
        <td>图片</td>
        <td>描述</td>
        <td>操作</td>
    </tr>
    <?php
    $nowpage=1;//默认第一页
    $res=mysql_query("select * from book,type where book.t_id=type.t_id");
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
<a href="book.php?nowpage=1">第一页</a>
<a href="book.php?nowpage=<?php echo $prevpage?>">上一页</a>
<a href="book.php?nowpage=<?php echo $nextpage?>">下一页</a>
<a href="book.php?nowpage=<?php echo $lastpage?>">最后一页</a>
</body>
</html>
