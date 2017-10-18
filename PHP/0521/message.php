<html>
<head>
    <title> 留言</title>
    <style>
        body{
            background:url("images/bg.jpg");
            background-size:100% 100%;
        }
        td {
            color: white;
            font-size: 20px;
        }
    </style>
</head>
<body>

</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-21
 * Time: 9:27
 */
date_default_timezone_set('PRC');
session_start();//打开session
if(isset($_GET['name'])){
    $_SESSION['name']=$_GET['name'];//接收用户提交的数据
}
//留言板标题
echo "<h1 style='color:white;text-align:center;'>欢迎--".$_SESSION['name']."--留言</h1>";
//读取留言
$fp=fopen('msg.txt','r');
$str=fread($fp,filesize('msg.txt'));
fclose($fp);


$arr=explode("<@>",$str);//切割每一句
$msg="";
for($i=count($arr)-2;$i>0;$i--){
    $s=$arr[$i];
    $txt=explode("|",$s);//分开每一段
    $msg.="<hr><div style='height: 150px;'><p style='width: 150px;height: 150px;float: left;margin: 0px;border-right:1px solid #ccc;'><br><br>". $txt[0] . "留言<br><br>". date("Y-m-d H:i:s",$txt[3])."</p><span style='font-size:15px;'>标题:" . $txt[1] . "<hr></span><p style='margin:0px;style='font-size:15px;'>内容:" . $txt[2] . "</p></div>";
}
?>


<form action="addMsg.php">
    <table>
        <tr>
            <td>标题：</td>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <td>内容：</td>
            <td><textarea name="txt" cols="150" rows="10"></textarea></td>
        </tr>

        <tr>
            <td>内容：</td>
            <td><input type="hidden" name="time"></td>
        </tr>
        <tr>
            <td><input type="submit" value="留言"></td>
            <td><input type="reset" value="取消"></td>
        </tr>
    </table>

</form>
<?php
    echo $msg;
?>
