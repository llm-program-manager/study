<html>
<head>
    <meta charset="utf-8">
    <title>检索关键字</title>
</head>
<body>
<form action="work3.php" method="post">
    <input type="text" name="string">
</form>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-7
 * Time: 12:01
 */
$content=$_POST['string'];
$str="hello";
echo str_ireplace($str,"<font color='red'><strong>".$str."</strong></font>",$content);
?>