<?php

$a = array(array("file_name" => null, "error" => 4));
var_dump($a);
if(empty($a["file_name"])){
  echo "true\n";
}else{
  echo "false\n";
}

