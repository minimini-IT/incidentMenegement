<?php
$a = "a";
if($a = dev($a))
{
    echo $a . "\n";
    echo "OK\n";
}else
{
    echo $a . "\n";
    echo "NO\n";
}

function dev($a)
{
    $a = 3;
    return $a;
}
