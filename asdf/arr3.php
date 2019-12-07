<?php
$a = [
  ["id" => 1, "start_date" =>"2019-10-19", "end_date" => "2019-10-25"],
  ["id" => 4, "start_date" =>"2019-10-18", "end_date" => "2019-10-30"],
  ["id" => 5, "start_date" =>"2019-10-22", "end_date" => "2019-10-22"]
];

$b = [
  ["id" => 1, "start_date" =>"2019-10-19", "end_date" => "2019-10-25"],
  ["id" => 2, "start_date" =>"2019-10-20", "end_date" => "2019-10-21"],
  ["id" => 3, "start_date" =>"2019-10-22", "end_date" => "2019-10-28"],
  ["id" => 4, "start_date" =>"2019-10-18", "end_date" => "2019-10-30"],
  ["id" => 5, "start_date" =>"2019-10-22", "end_date" => "2019-10-22"]
];
foreach($a as $array_a){
  echo "start foreach a\n";
  //$i = array_empty_check($b);
  $i = 0;
  foreach($b as $array_b){
    echo "start foreach b\n";
    echo "search now b array {$i}\n";
    echo "array_a id -> {$array_a["id"]}\n";
    echo "array_b id -> {$array_b["id"]}\n";
    if($array_a["id"] == $array_b["id"]){
      echo "unset b {$i}\n";
      unset($b[$i]);
      $b = array_values($b);
      //$i = array_empty_check($b, $b_array);
      echo "b array next search\n";
      break;
    }
    //$i = array_empty_check($b, $b_array);
    $i++;
    echo "b array add 1\n";
  }
}
print_r($b);
