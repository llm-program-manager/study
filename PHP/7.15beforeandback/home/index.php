<?php
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
        $type_str.="<li class='current'><a href='#st".$num."'>".$type_rs['t_name']."</a><b>6</b></li>";
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
                            <div class='lt-lt'><img src='../admin/images/".$food_rs['f_img'].".jpg'></div>
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

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title></title>
<link rel="stylesheet" type="text/css" href="css/swiper.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>

<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="images/index/shop_1.jpg"></div>
        <div class="swiper-slide"><img src="images/index/shop_1.jpg"></div>
        <div class="swiper-slide"><img src="images/index/shop_1.jpg"></div>
    </div>
</div>

<div class="nav-lf">
<ul id="nav">
  <?php echo $type_str?>
</ul>
</div>

<div id="container" class="container">
    <?php echo $sec_str?>
</div>
<footer>
	<div class="ft-lt">
        <p>合计:<span id="total" class="total">163.00元</span><span class="nm">(<label class="share"></label>份)</span></p>
    </div>
    <div class="ft-rt">
    	<p>选好了</p>
    </div>
</footer>


<script type="text/javascript" src="js/Adaptive.js"></script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/swiper.min.js"></script>
<script type="text/javascript" src="js/jquery.nav.js"></script>
<script type="text/javascript">
var swiper = new Swiper('.swiper-container', {
	pagination: '.swiper-pagination',
	paginationClickable: true,
	spaceBetween: 30,
});

$(function(){
	$('#nav').onePageNav();
});

</script>
<script> 
$(function(){ 

$(".add").click(function(){
var t=$(this).parent().find('input[class*=result]'); 
t.val(parseInt(t.val())+1);
setTotal(); 
})
 
$(".minus").click(function(){ 
var t=$(this).parent().find('input[class*=result]'); 
t.val(parseInt(t.val())-1);
if(parseInt(t.val())<0){ 
t.val(0); 
} 
setTotal(); 


})
 
function setTotal(){ 
var s=0;
var v=0;
var n=0;
<!--计算总额--> 
$(".lt-rt").each(function(){ 
s+=parseInt($(this).find('input[class*=result]').val())*parseFloat($(this).siblings().find('span[class*=price]').text()); 

});

<!--计算菜种-->
var nIn = $("li.current a").attr("href");
$(nIn+" input[type='text']").each(function() {
	if($(this).val()!=0){
		n++;
	}
});

<!--计算总份数-->
$("input[type='text']").each(function(){
	v += parseInt($(this).val());
});
if(n>0){
	$(".current b").html(n).show();		
	}else{
	$(".current b").hide();		
		}	
$(".share").html(v);
$("#total").html(s.toFixed(2)); 
} 
setTotal(); 

}) 
</script> 
<script type="text/javascript" src="js/waypoints.min.js"></script>
<script type="text/javascript" src="js/navbar2.js"></script>
</body>
</html>