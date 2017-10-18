<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-6-4
 * Time: 9:37
 */
session_start();
$username=$_SESSION['name'];
//echo "<h2>欢迎".."留言</h2>";
//添加留言
include "conn.php";
if(isset($_POST['title'])&&isset($_POST['content'])){
    $resa=mysql_query("INSERT INTO `information` (`name`, `title`, `content`) VALUES ('".$_SESSION['name']."', '".$_POST['title']."', '".$_POST['content']."')");
}
//显示留言
function change($nowpage){
    $con=mysql_connect("localhost","root","");
    mysql_select_db("llm");
    mysql_query("set character set 'utf8'");
    mysql_query("set names 'utf8'");
//echo $con;//测试连接是否成功

    $res=mysql_query("select * from information order by information.id DESC limit ".(($nowpage-1)*3).",3");
    $str="";
    while($rs=mysql_fetch_assoc($res)){ //mysql_fetch_assoc($res) fetch游标
        // var_dump($s);
        //echo "<br>";
        $str.="<div class='msg-every'>
                    <div class='msg-uname'>
                        <p class='author'>作者信息</p>
                        <p class='author-name'>".$rs['name']."</p>
                    </div>
                    <p class='msg-info'>留言信息</p>
                    <div class='utitle'>标题：
                        <span>".$rs['title']."</span>
                    </div><hr>
                    <div class='ucontent'>
                        <span>".$rs['content']."</span>
                    </div>
               </div>";
    }
    echo "<div class='msg-list-content'>";
    echo $str;
    echo "</div>";
    mysql_close($con);
}

?>
<!--添加表单，提交留言-->
<html>
<head>
    <meta charset="UTF-8">
    <title>leave a message</title>
    <link rel="stylesheet" href="style/message.css">
</head>
<body>
<div class="msg-publish">
    <div class="msg-publish-header"><p>发表留言</p><p>欢迎,<?php echo $username?>留言</p></div>
    <div class="msg-publish-content">
        <form action="message.php" method="post">
            标题:<input class="msg-title" type="text" name="title"><br><br>
            内容:<textarea name="content" rows="10" cols="45"></textarea><br><br>
            <input class="msg-btn" type="submit" value="留言">
        </form>
    </div>

</div>

<div class="msg-list">
    <div class="msg-list-header"><p>留言列表</p></div>
    <?php
    $nowp=1;//默认第一页
    $num=mysql_query("select * from information");
    $rows=mysql_num_rows($num);//记录条数
    $pages=ceil($rows/3);//总页数
    if(isset($_GET['nowp'])){
        $nowp=$_GET['nowp'];
    }
    //上一页
    if($nowp==1){
        $prevpage=$pages;
    }else{
        $prevpage=$nowp-1;
    }
    //下一页
    if($nowp==$pages){
        $nextpage=1;
    }else{
        $nextpage=$nowp+1;
    }
    //最后一页
    $lastpage=$pages;
    change($nowp);
    ?>
</div>
<a href="message.php?nowp=1">第一页</a>
<a href="message.php?nowp=<?php echo $prevpage?>">上一页</a>
<a href="message.php?nowp=<?php echo $nextpage?>">下一页</a>
<a href="message.php?nowp=<?php echo $lastpage?>">最后一页</a>
</body>
</html>