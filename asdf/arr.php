<?php

function array_empty_check($b, $c){
  //print_r($b);
  
  echo "start array_empty_check\n";
  for($count = 0; empty($b[$c[$count]]); $count++){
    echo "b {$c[$count]} is empty?\n";
    if(empty($b[$c[$count]])){
      echo "b array {$c[$count]} false\n";
      echo "b array next\n";
      //$count++;
    }
    /*
    }else{
      echo "b array {$count} true\n";
    }
     */
  }
  echo "b array {$c[$count]} true\n";
  echo "end array_empty_check\n";
  return $c[$count];
}
 

$a = [
  ["id" => 1, "start_date" =>"2019-10-19", "end_date" => "2019-10-25"],
  ["id" => 4, "start_date" =>"2019-10-18", "end_date" => "2019-10-30"],
  ["id" => 5, "start_date" =>"2019-10-22", "end_date" => "2019-10-22"],
  ["id" => 6, "start_date" =>"2019-10-22", "end_date" => "2019-10-23"]
];

$b = [
  ["id" => 1, "start_date" =>"2019-10-19", "end_date" => "2019-10-25"],
  ["id" => 2, "start_date" =>"2019-10-20", "end_date" => "2019-10-21"],
  ["id" => 3, "start_date" =>"2019-10-22", "end_date" => "2019-10-28"],
  ["id" => 4, "start_date" =>"2019-10-18", "end_date" => "2019-10-30"],
  ["id" => 5, "start_date" =>"2019-10-22", "end_date" => "2019-10-22"]
];
$o = count($b);
echo "b is array({$o})\n";
$b_array = [];
for($i = 0; $i < count($b); $i++){
  array_push($b_array, $i);
}
print_r($b_array);
//print(empty($b[0]));
/*
if(empty($b[0])){
  echo "b 0 false\n";
}else{
  echo "b 0 true\n";
}
//print(empty($b[5]));
if(empty($b[5])){
  echo "b 5 false\n";
}else{
  echo "b 5 true\n";
}
echo "unset b 0\n";
unset($b[0]);
if(empty($b[0])){
  echo "b 0 false\n";
}else{
  echo "b 0 true\n";
}
 */

/*
  echo "a\n";
foreach($a as $array){
  print_r($array);
}
  echo "b\n";
foreach($b as $array){
  print_r($array);
}
 */
//$c = array();
//array_unshift($c, $a);
//array_unshift($c, $b);
//$c = array_merge($a, $b);
//  //echo "array_unshift c\n";
//  echo "array_merge c\n";
//foreach($c as $array){
//  print_r($array);
//}
//echo "after b\n";


foreach($a as $array_a){
  echo "start foreach a\n";
  $i = array_empty_check($b, $b_array);
  //print_r($b);
  //echo "\n";
  //$i = 0;
  //echo "b {$i} is empty?\n";
  //print_r($b[$i]);
  //if($b[$i] == null){
  //if(empty($b[$i])){
  //  echo "b array {$i} false\n";
  //  echo "b array add 1\n";
  //  $i++;
  //}else{
  //  echo "b array {$i} true\n";
  //}
  foreach($b as $array_b){
    echo "start foreach b\n";
    echo "search now b array {$i}\n";
    echo "array_a id -> {$array_a["id"]}\n";
    echo "array_b id -> {$array_b["id"]}\n";
    if($array_a["id"] == $array_b["id"]){
      echo "unset b {$i}\n";
      unset($b[$i]);
      unset($b_array[$i]);
      print_r($b_array);
      $o = count($b);
      echo "b is array({$o})\n";
      //echo "b array add 1\n";
      //$i++;
      //print_r($b);
      $i = array_empty_check($b, $b_array);
      echo "b array change {$i}\n";
      break;
    }
    $i = array_empty_check($b, $b_array);
    echo "b array change {$i}\n";
    //$i++;
  }
}
print_r($b);
 

/*
foreach($b as $array){
  print_r($array);
}
 */



/*
function array_diff_recursive($keys, $array1, $array2){
  foreach($array2 as $arrayi){
    $array1 = array_udiff($array1, $arrayi, function($a, $b) use ($keys){
      $cmp = $a[$keys] <=> $b[$keys];
      if($cmp) return $cmp;
      foreach($keys as $key){
        $cmp = $a[$key] <=> $b[$key];
        if($cmp) return $cmp;
      }
      return $cmp;
    });
  }
  return $array1;
}


$c = array_diff_recursive("id", $a, $b);
print_r(array_keys($c));
 */
echo "\n";
//print_r($c);

