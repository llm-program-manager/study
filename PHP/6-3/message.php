<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-6-4
 * Time: 10:39
 */
session_start();
echo "欢迎".$_SESSION['name']."留言";