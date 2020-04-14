<?php
$b = [1,2,3,1,5,6,7,6,9];
foreach($b as $c)
{
    $a[] = [
        "test" => 1,
        "exit" => $c
    ];
}
//var_dump($a);

foreach($a as $d)
{
    $e[] = $d["exit"];
}
$e = array_unique($e);

$a = null;
foreach($e as $f)
{
    $a[] = [
        "test" => 1,
        "exit" => $f
    ];
}
var_dump($a);
