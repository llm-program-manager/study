<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-20
 * Time: 15:55
 */
//正确显示小时，方式一
/*date_default_timezone_set(PRC);
$year=date('Y');
$month=date('m');
$date=date('d');
$hour=date('H');
$minute=date('i');
$second=date('s');
echo $year."-".$month."-".$date." ".$hour.":".$minute.":".$second;*/
echo "<br>";
//正确显示小时，方式二 北京时间与计算机时间差8小时
echo date("Y-m-d H:i:s",time()+8*60*60);
?>