<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-7-15
 * Time: 15:32
 */
include "conn.php";
$type_res=mysql_query("select * from type");
$type_str="";
$num=1;
$sec_str="";
$food_str="";
while($type_rs=mysql_fetch_assoc($type_res)){
    //var_dump($type_rs);
    //echo "<hr>";
    if($num==1){
        $type_str.="<li class='current'><a href='#st'".$num."'>".$type_rs['t_name']."</a><b>6</b>></li>";
    }else{
        $type_str.="<li><a href='#st".$num."'>".$type_rs['t_name']."</a><b>6</b></li>";
    }
    $food_str=getfood($type_rs['t_id']);
    $sec_str.="<div class='section' id='st".$num."'>".$food_str."</div>";
    $num++;
}
function getfood($t_id){
    include "conn.php";
    $food_res=mysql_query("select * from food where t_id=".$t_id);
    $food_info="";
    while($food_rs=mysql_fetch_assoc($food_res)){
        //var_dump($food_rs);
        //echo "<hr>";
        $food_info.="<div class='prt-lt'>
                            <div class='lt-lt'><img src='../admin/images/'".$food_rs['f_img'].".jpg></div>
                            <div class='lt-ct'>
                                <p>".$food_rs['f_name']."</p>
                                <p class='pr'>￥<span class='price'>".$food_rs['f_price']."</span></p>
                            </div>
                            <div class='lt-rt'>
                                <input type='button' class='minus' value='-'>
                                <input type='text' class='result' value='0'>
                                <input type='button' class='add' value='+'>
                            </div>
                      </div>";
    }
    return $food_info;
}
?>