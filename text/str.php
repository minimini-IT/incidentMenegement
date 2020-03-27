<?php
//$str = "http://example.com?name=riki&page=30&count=100";
//preg_match('/name=(\w+)/', $str, $match);
$url = "/risk-detections/malmail";
preg_match('/detections\/(\w+)/', $url, $match);
var_dump($match);
$action = $match[1];
echo "\n";
echo $action;
echo "\n";

