<?php
    //$time = Time::now();
    //$today = $time->year . "-" . $time->month . "-" . $time->day;
//echo date("Y-m-d", strtotime("1 day"));
$days = array();
//$today = date("Y-m-d");
//$days[] = $today;
for($i = 1; $i < 7; $i++){
  $today = date("Y-m-d", strtotime("{$i} day"));
  $days[] = $today;
} 
$days_2 = array();
for($i = 4; $i < 10; $i++){
  $today = date("Y-m-d", strtotime("{$i} day"));
  $days_2[] = $today;
} 


//$today = date("Y-m-d", strtotime("today"));
//echo $today;
//var_dump($days);
//var_dump($days_2);
$days_3 = array_diff($days_2, $days);
var_dump($days_3);
echo "\n";
    

/*
//echo date("w", strtotime("now"));
$now = date("w", strtotime("now"));
//echo strtotime("now");

echo date("Y/m/d", strtotime("-{$now} day", strtotime("now")));
echo "\n";
 */
?>
