<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }
h2{
    text-align: center;
}

.block-table{
    margin: auto;
    width: 760px;
    display:flex;
    flex-wrap:wrap;
    justify-content: center;
    
}
.item{
    
    display:inline-block;
    width:100px;
    height:100px;
    position:relative;
    transition: all 0.3s;
    background:white;
    
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
/* 星期 */
.item-header{
    margin-left:1px;
    margin-top:1px;
    display:inline-block;
    width:100px;
    height:40px;
    /* border:1px solid black; */
    text-align: center;
    background-color: 	#E0E0E0; 
    color:black;
}
.item:hover{
    background:#F0F0F0;
    border-radius:50%;
    transform: scale(0.6);
    font-weight:bold;
    color:blue;
    transition: all 0.3s;
    z-index:10;

}

.holiday{
    color:red;
}
     
.nav{
    display:inline-block;
    width:32.5%;
    margin:5px 0;
}
    </style>
</head>
<body>
<h2>萬年曆</h2>

<?php     
$month=$_GET['month']??date("m");
$year=$_GET['year']??date("Y");
$firstDay=strtotime(date("$year-$month-1"));
$firstWeekStartDay=date("w",$firstDay);
$days=date("t",$firstDay);
$lastDay=strtotime(date("Y-$month-$days"));

$days=[];
for($i=0;$i<42;$i++){
    $diff=$i-$firstWeekStartDay;
    $days[]=date("Y-m-d",strtotime("$diff days",$firstDay));
}

if($month-1<1){
    $prev=12;
    $prev_year=$year-1;
}else{
    $prev=$month-1;
    $prev_year=$year;
}

if($month+1>12){
    $next=1;
    $next_year=$year+1;

}else{
    $next=$month+1;
    $next_year=$year;
}

?>
<div style="text-align: center;">
 <div class="nav">
     <a href="calendar.php?year=<?=$prev_year;?>&month=<?=$prev;?>">上一個月</a>
 </div>
 <div class="nav" >
     <?=$year;?>年 <?=$month;?>月
 </div>
 <div class="nav">
     <a href="calendar.php?year=<?=$next_year;?>&month=<?=$next;?>">下一個月</a>
 </div>
</div>

<?php

echo "<div class='block-table'>";
echo "<div class='item-header'>Sun</div>";
echo "<div class='item-header'>Mon</div>";
echo "<div class='item-header'>Tue</div>";
echo "<div class='item-header'>Wed</div>";
echo "<div class='item-header'>Thu</div>";
echo "<div class='item-header'>Fri</div>";
echo "<div class='item-header'>Sat</div>";

foreach($days as $day){
    $format=explode("-",$day)[2];
    $w=date("w",strtotime($day));
    $m=date("m",strtotime($day));
    if($month!=$m){
echo "<div class='item'></div>";
    }else if($w==0 || $w==6){

        echo "<div class='item holiday'>$format</div>";
    }else{

        echo "<div class='item'>";
        echo "<div class='date'>$format</div>";
        echo "</div>";
    }
}
echo "</div>";

?>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
