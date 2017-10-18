<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-20
 * Time: 9:45
 */
$arr=array();
$arr[0]=0;
$arr[1]=1;
$arr[2]=2;
var_dump($arr); //输出数组的类型和值
echo "<br>";
$arr=array(1,2,3,4);
var_dump($arr);
echo "<br>";
$arr=array(0=>1,"two"=>2,"three"=>3);
var_dump($arr);
echo "<br>";
$arr[]=3000;
var_dump($arr);
echo "<br>";
$arr=array(33,22,55,12,90);
$max=$arr[0];
for($i=0;$i<count($arr);$i++){
    if($max<$arr[$i]){
        $max=$arr[$i];
    }
}
echo '$max='.$max;
echo "<br>";
$min=$arr[0];
for($i=0;$i<count($arr);$i++){
    if($min>$arr[$i]){
        $min=$arr[$i];
    }
}
echo '$min='.$min;
echo "<br>";
$sum=0;
for($i=0;$i<count($arr);$i++){
    $sum=$sum+$arr[$i];
}
echo '$sum='.$sum;
echo "<br>";
echo '$avg='.$sum/count($arr);
echo "<br>";
foreach ($arr as $key=>$value){
    echo $key."=>".$value."<br>";
}
$arr=array("one"=>array(1,2,3),"two"=>array(a,b,c));
foreach ($arr as $key => $value){
    echo "$key=>";
    foreach ($value as $item) {
        echo $item;
    }
}
?>