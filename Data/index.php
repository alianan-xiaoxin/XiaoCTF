<?php

$file=$_GET['file'];
$file=$file.".php";
if(strpos($file,"../") !== false){
    header("HTTP/1.1 403 Not Found");
    header("Status: 403 Not Found");
    exit();
}

if(empty($_GET['file'])){
    include "home.php";
}elseif(!file_exists(getcwd()."/Data/".$file)){
    include "home.php";
}else{
    include $file;
}

?>