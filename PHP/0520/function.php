<form action="function.php" method="get">
    <input type="text" name="row"><br>
    <input type="text" name="col"><br>
    <input type="submit" value="创建">
</form>
<style>
    table,tr{
        border:1px solid green;
    }
    td{
        border:1px solid red;
        width:50px;
        height:30px;
    }
</style>
<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-20
 * Time: 10:31
 */
//带返回值的函数
function myFun1(){
    return "yes";
    echo "yes";
}
$a=myFun1();//函数赋值给变量输出返回值
echo $a."<br>";

//带参数的函数
function myFun2($a,$b){
    return $a * $b;
}
echo myFun2(2,3);
echo "<br>";
//变量的作用域
function myFun3(){
    global $x;//全局变量
    $x=666;
    $y=777;//局部变量
    echo $y."内部定义局部变量<br>";
    echo $x."内部定义全局变量<br>";
}
myFun3();
echo "函数外部输出".$x."<br>".$y;

//动态创建表格
if(isset($_GET['row'])){
    $row=$_GET['row'];
    $col=$_GET['col'];

    createTable($row,$col);
}
function createTable($row,$col){
    $str="";
    $str.="<table>";// $str=$str."<table>";
    for($i=0;$i<$row;$i++){
        $str.="<tr>";
        for($j=0;$j<$col;$j++){
            $str.="<td></td>";
        }
        $str.="</tr>";
    }
    $str.="</table>";
    echo $str;
}
echo "<br>";
$arr=myFun(array(22,42,21,53));
for($i=0;$i<count($arr);$i++){
    echo $arr[$i]."<br>";
}

function myFun($array){
    for($i=0;$i<count($array)-1;$i++){
        for($j=$i+1;$j<count($array);$j++){
            if($array[$i]>$array[$j]){
                $t=$array[$i];
                $array[$i]=$array[$j];
                $array[$j]=$t;
            }
        }
    }
        return $array;
     }
?>