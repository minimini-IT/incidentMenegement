<?php
$b = [
  ["id" => 1, "start_date" =>"2019-10-19", "end_date" => "2019-10-25"],
  ["id" => 2, "start_date" =>"2019-10-20", "end_date" => "2019-10-21"],
  ["id" => 3, "start_date" =>"2019-10-22", "end_date" => "2019-10-28"],
  ["id" => 4, "start_date" =>"2019-10-18", "end_date" => "2019-10-30"],
  ["id" => 5, "start_date" =>"2019-10-22", "end_date" => "2019-10-22"]
];
unset($b[0]);
print_r($b);
$b = array_values($b);
print_r($b);
