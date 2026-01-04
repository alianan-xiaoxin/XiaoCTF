<?php

$file=$_GET['id'];
$file=$file.".php";
if(strpos($file,"union") !== false){
   echo '抱歉了哈，这里没有洞洞';
   exit;
}

if(empty($_GET['id'])){
    include "home.php";
}else{
    include $file;
}

?>