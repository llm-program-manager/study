<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-7
 * Time: 9:06
 */
//输出杨辉三角
//方式一
$n=10;
for($i=0;$i<$n;$i++){
    for($j=0;$j<=$i;$j++){
        if($j==0||$i==$j){
            $arr[$i][$j]=1;
        }else {
            $arr[$i][$j]=$arr[$i-1][$j]+$arr[$i-1][$j-1];
        }
        echo $arr[$i][$j]."\t";
    }
    echo "<br>";
}
echo "<br>";
//方式二
$min=1;
$max=10;
$arr[][]=array();
$arr[0][0]=1;
for($i=1;$i<$max;$i++){
    for($j=0;$j<$i+1;$j++){
        if($j==0||$i==$j){
            $arr[$i][$j]=1;
        }else{
            $arr[$i][$j]=$arr[$i-1][$j]+$arr[$i-1][$j-1];
        }
    }
}
//输出二维数组
foreach ($arr as $value){
    foreach ($value as $item) {
        echo $item."   ";
    }
    echo "<br>";
}
?>