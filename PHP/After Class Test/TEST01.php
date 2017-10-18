<?php
/**
 * Created by PhpStorm.
 * User: 刘立淼
 * Date: 2017-5-12
 * Time: 22:08
 */
/*         *
 *         ***
 *         *****
 *         ***
 *         *
 * */

for($i=0;$i<=2;$i++){
    for($j=0;$j>=2*$i+1;$j++){
        echo "&nbsp;";
    }
    for($j=0;$j<2*$i+1;$j++){
        echo "*";
    }
    echo "<br>";
}
for($i=0;$i<=1;$i++){
    for($j=1;$j>=2*$i-1;$j--){
        echo "*";
    }
    echo "<br>";
}

?>