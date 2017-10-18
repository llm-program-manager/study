<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-6
 * Time: 11:16
 */
//echo "hello world!";
//echo " <table  border='1px solid' width='200' height='100'>
//        <tr >
//            <td>11</td>
//            <td>12</td>
//            <td>13</td>
//        </tr>
//        <tr>
//            <td>21</td>
//            <td>22</td>
//            <td>23</td>
//        </tr>
//    </table><br>";
//检测数据类型
//$boo="01065566856";
//if(is_numeric($boo)){
//    //"\"转义字符
//    echo "yes,the $boo is a phone number<br>";
//    echo "yes,the \$boo is a phone number<br>";
//}else{
//    echo "sorry,this is an error!";
//}
//echo "<br>";
//定义一个常量
//define("message","hahaha");
//define("count","fffff");
//$name="message";
//echo constant($name);//访问常量，方式一
//constant("count");//访问常量，方式二
//echo "<br>";
//引用
//$i="span";
//$j=&$i;//$i和$j指向同一个内存地址
//$i="hello";
//echo $j;//输出hello,去掉$j=&$i;输出span
//echo "<br>";
//作用域
//$ex="函数外部";
//function fun(){
//    $ex="函数内部";
//    echo "内部输出：$ex<br>";
//}
//fun();
//echo "外部输出：$ex<br>";
//取消引用
//$num=123;
//$math=&$num;
//echo "\$math is:".$math."<br>";//123
//unset($math);//取消引用
//echo "\$math is:".$math."<br>";//空
//echo "\$num is:".$num;//123
$list=array("1"=>"商品名称","2"=>"价格");
$name=array("1"=>"数码相机","2"=>"瑞士手表");
$price=array("1"=>"2588","2"=>"2988");
$counts=array("1"=>"1","2"=>"3");
echo"<table width='580' border='1' cellspacing='0' cellpadding='0' bordercolor='red' bgcolor='blue'>";
echo "<tr>";
foreach($list as $key=>$value){
    echo "<td width='145' height='30' align='center'>".$value."</td>";
}
echo "</tr>";
echo "<tr>";
foreach ( $name as $key=>$value) {
    echo "<tr></tr><td width='145' height='30' align='center'>".$value."</td><td width='145' height='30' align='center'>".$price[$key]."</td></tr>";
    }
echo "</tr>";
echo"</table>";
?>
