<?php
$file=$_GET['level'];
$file=$file.".php";

if(empty($_GET['level'])){
    include "1.php";
}elseif(!file_exists($file)){
    include "1.php";
}else{
    include $file;
}
?>