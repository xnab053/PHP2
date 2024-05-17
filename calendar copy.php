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

        h2 {
            text-align: center;
        }

        /* body{
    background-image:linear-gradient(rgb(0, 0, 0, 0.3), rgb(0, 0, 0, 0.3)),url(https://picsum.photos/1600);
    font-family:"Comic Sans MS";
} */

        .box1 {
            width: 800px;
            height: 53vh;
            border-radius: 30px;
            background-color: #D3D3D3;
            margin: auto;
            display: flex;
            flex-direction: row;
        }

        .box2 {
            width: 35%;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border-radius: 30px;
        }

        .box2-box {
            width: 260px;
            height: 450px;
            background-color: #708090;
            border-radius: 30px;
            background: url(https://picsum.photos/260/450);
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* .box2-box:hover {
            width: 260px;
            height: 450px;
            background-color: #708090;
            border-radius: 30px;
            background: url(./images/p2.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        } */

        .box3 {
            width: 520px;
            border-radius: 30px;
            background-color: #D3D3D3;



        }

        .block-table {
            margin: auto;
            width: 520px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            /* background-color:rgb(248,248,255,0.4); */
            background-color: no-repeat, #e69999;
            border-radius: 30px;

        }
        .pochacco>img{
            position: absolute;
            top: 50px;
            right: 12%;
            
        }

        .pochacco1>img{
            position: absolute;
            bottom: 5%;
            left: 12%;
            
        }

        /* .today {
            background-color: blue;
        } */

        .item {

            display: inline-block;
            width: 70px;
            height: 70px;
            position: relative;
            transition: all 0.3s;
            /* background:white; */

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* 星期 */
        .item-header {
            margin-top: 10px;
            padding-top: 2px;
            width: 70px;
            height: 28px;
            /* border:1px solid black; */
            text-align: center;
            background-color: #8B7D6B;
            border-radius: 30px;
            color: white;
            box-shadow: 3px 4px 12px 0px #7A7567;
            text-shadow: 0 0 0.2em #F8F8FF;
        }

        .item:hover {
            background: #FFF5EE;
            border-radius: 50%;
            color: black;
            transform: scale(0.9);
            /* 
    font-weight:bold;
    transition: all 1s;
    z-index:10; */
            box-shadow: rgba(0, 0, 0, 0.5) 10px 5px 15px;
            text-shadow: 0 0 0.2em #F8F8FF, 0 0 0.2em #F8F8FF;
        }

        /* 假日 */
        .holiday {
            color: red;
        }

        /* 年分 月份 */
        .nav {
            /* display:inline-block;
    width:32.5%;
    margin:5px 0; */
            margin-top: -20px;
            text-align: center;
            font-size: 27px;
            font-weight: bold;
            text-shadow: 0 0 0.2em #F8F8FF, 0 0 0.2em #F8F8FF;
        }

        /* 上下個月 */
        .nav-p {
            border-radius: 40px;
            display: inline-block;
            margin-top: 20px;
            padding: 7px 15px;
            background-color: #8B7D6B;
        }

        .nav-p>a {
            color: white;
            text-decoration: none;
            text-shadow: 0 0 0.2em #F8F8FF;
            font-size: 12px;
        }

        .nav-p>a:hover {
            color: #ccc;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <h2>Calendar</h2>

    <?php     
$month=$_GET['month']??date("m");
$year=$_GET['year']??date("Y");
$firstDay=strtotime(date("$year-$month-1"));
$firstWeekStartDay=date("w",$firstDay);
$days=date("t",$firstDay);
$lastDay=strtotime(date("Y-$month-$days"));
$today = date('Y-m-d');


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

    <div class="nav">
        <?=$year;?>
        <?=strftime("%B", mktime(0, 0, 0, $month, 1, $year));?>
    </div>
<div class="pochacco">
    <img src="./images/pa.png" alt="">
</div>
<div class="pochacco1">
    <img src="./images/pa1.png" alt="">
</div>
    <div style="text-align: center;">
        <div class="nav-p">
            <a href="calendar.php?year=<?=$prev_year;?>&month=<?=$prev;?>">Last Month</a>
        </div>

        <?php
$currentYear = date("Y");
$currentMonth = date("m");
$currentMonthLink = "calendar.php?year=$currentYear&month=$currentMonth";
?>
        <div class="nav-p">
            <a href='<?= $currentMonthLink ?>'>New</a>
        </div>
        <div class="nav-p">
            <a href="calendar.php?year=<?=$next_year;?>&month=<?=$next;?>">Nest Month</a>
        </div>
    </div>
    <br>
    <div class="box1">
        <div class="box2">
            <div class="box2-box"></div>
        </div>
        <div class="box3">
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
        echo ($day == $today) ? " today" : "";
        echo "<div class='date'>$format</div>";
        echo "</div>";
    }
}
echo "</div>";

?>
        </div>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>

</body>

</html>