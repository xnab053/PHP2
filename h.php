<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<style>
body{
background-image:url(https://images.unsplash.com/photo-1714315015914-

50fd5c0c2d13?w=800&auto=format&fit=crop&q=60&ixlib=rb-
4.0.3&ixid=M3wxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwxNzF8fHxlbnwwfHx8fHw%3D);

}
table {
width: 70%;
height: 70%;
border-collapse: collapse;
}
table, th, td {
/* border: 1px solid black; */
}
th, td {
padding: 5px;
text-align: center;
}
th {
background-color: #f2f2f2;
}
.today {
background-color: #ffff99;
}
</style>
</head>
<body>
<?php
date_default_timezone_set('Asia/Taipei');
// 檢查GET請求中是否有年份和月份參數,如果有則使用,否則使用當前年份和月份
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
$month = isset($_GET['month']) ? $_GET['month'] : date('m');
// 計算前一個月和下一個月的年份和月份
$prevMonth = date('m', mktime(0, 0, 0, $month - 1, 1, $year));
$prevYear = date('Y', mktime(0, 0, 0, $month - 1, 1, $year));
$nextMonth = date('m', mktime(0, 0, 0, $month + 1, 1, $year));
$nextYear = date('Y', mktime(0, 0, 0, $month + 1, 1, $year));
// 其他變數初始化...
$firstDay = mktime(0, 0, 0, $month, 1, $year); // 取得這個月第一天的 timestamp
$dayOfWeek = date('w', $firstDay); // 第一天是星期幾
$daysInMonth = date('t', $firstDay); // 這個月總共有幾天
$today = date('Y-m-d'); // 今天是幾號
?>
<div style="width: 100%; text-align: center">

<a href="?year=<?php echo $prevYear; ?>&month=<?php echo $prevMonth; ?>">上個月
</a>
<!-- 顯示年份和月份 -->
<span><?php echo $year; ?> <?php echo $month; ?>月</span>
<a href="?year=<?php echo $nextYear; ?>&month=<?php echo $nextMonth; ?>">下個月
</a>
</div>
<table>
<tr>
<th>Sun</th>
<th>Mon</th>
<th>Tue</th>
<th>Wed</th>
<th>Thu</th>
<th>Fri</th>
<th>Sat</th>
</tr>
<tr>
<?php
// 填充空白天數
for ($i = 0; $i < $dayOfWeek; $i++) {
echo "<td></td>";
}
// 輸出當月所有天數
for ($day = 1; $day <= $daysInMonth; $day++) {
// 當達到一周的天數時,開始新的一行
if (($day + $dayOfWeek) % 7 == 0 || $day == $daysInMonth) {
$class = (date('Y-m-d', mktime(0, 0, 0, $month, $day, $year)) == $today) ? "today" :

"";

echo "<td class='{$class}'>{$day}</td></tr><tr>";
} else {
$class = (date('Y-m-d', mktime(0, 0, 0, $month, $day, $year)) == $today) ? "today" :

"";

echo "<td class='{$class}'>{$day}</td>";
}
}
?>
</tr>
</table>
</body>
</html>