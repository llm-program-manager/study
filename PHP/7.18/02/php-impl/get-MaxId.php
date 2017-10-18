<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-7-19
 * Time: 16:05
 */
// 连接数据库
$con=mysql_connect("localhost","root","");
mysql_select_db("llm");
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");

//查询表中id最大值
$res=mysql_query("SELECT MAX(id) as id FROM bullte");
//结果转换成数组
$rs=mysql_fetch_assoc($res);
//输出id值
echo json_encode($rs['id']);