<?php
$target ='/home/u653409102/domains/aakar.ajiet.edu.in/Project/storage/app/public';
$link = $_SERVER['DOCUMENT_ROOT'].'/storage';
symlink($target, $link);
echo $target;
?> 