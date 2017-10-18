<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-6-3
 * Time: 16:38
 */
$con=mysql_connect("localhost","root","");
mysql_select_db("db_library");//选择数据库
mysql_query("set character set 'utf8'");//读库
mysql_query("set names 'utf8'");//写库