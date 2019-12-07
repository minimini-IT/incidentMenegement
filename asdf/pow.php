<?php
function fileSizeCheck($size){
  $b = 1024;
  $mb = pow($b, 2);
  $gb = pow($b, 3);
  switch(true){
  case $size >= $gb:
    $target = $gb;
    $unit = "GB";
    break;
  
  case $size >= $mb:
    $target = $mb;
    $unit = "MB";
    break;
  
  default:
    $target = $b;
    $unit = "KB";
    break;
  }
  $new_size = round($size / $target, 2);
  $file_size = number_format($new_size, 2, ".", ",") . $unit;
  return $file_size;
}
$size = fileSizeCheck(filesize("/home/acsw/ダウンロード/cpeu258.exe"));
print($size);
echo "\n";
?>
