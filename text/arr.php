<?php
$a = ["test" => ""];
$b = ["test" => ["testtest", "test2test"]];

$a["test"] = ["testtest"];
array_push($a["test"], "test2test");
//$between = ["conditions" => ["CrewSends.period between '" . $periodSearchStartDay . "' and '" . $periodSearchEndDay . "'"]];
echo "a\n";
var_dump($a);
echo "b\n";
var_dump($b);
