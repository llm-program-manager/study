<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-13
 * Time: 15:46
 */
for($i=1;$i<10;$i++){
    echo "<br>";
    for($j=1;$j<10;$j++){
        if($i>=$j){
            echo "$i*$j=".$i*$j."   ";
        }
    }
}
?>