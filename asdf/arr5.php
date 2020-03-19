<?php
$a = [
  "aaa" => [
    "ddd",
    "eee"
  ],
  "bbb" => "fff",
  "ccc" => "ggg"
];

var_dump($a);
echo "\n";
var_dump(isset($a["aaa"]));
echo "\n";
/*
foreach($a as $aa){
  var_dump($aa);
  echo "\n";
}
 */
