<?php
// 在文件最开头添加输出缓冲
ob_start();

include "../navigation.php";

if(!empty($_GET['file'])){
    $filename = $_GET['file'];
    $filepath = $filename;

    if (file_exists($filepath)) {
        // 清除缓冲区
        ob_end_clean();
        
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Content-Length: ' . filesize($filepath));
        header('Pragma: no-cache');
        header('Expires: 0');
        
        readfile($filepath);
        exit;
    } 
}




?>
<style>
.content-container02 {
    position: relative;
    width: 95%;
    min-height: 80vh;
    background: white;
    margin: 20px auto;
    border-radius: var(--border-radius);
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    padding: 30px;
    box-sizing: border-box;
}



</style>
<div class='content-container02'>
    <h3 class="list-title">任意文件下载</h3>
    <a href="/Data/Downloads/go.php?level=1&file=../Data/1.png"><img src="/Data/Downloads/go.php?level=1&file=../Data/1.png" while="200px" height="200px"></a>
    <a href="/Data/Downloads/go.php?level=1&file=../Data/2.png"><img src="/Data/Downloads/go.php?level=1&file=../Data/2.png" while="200px" height="200px"></a>
    <a href="/Data/Downloads/go.php?level=1&file=../Data/3.png"><img src="/Data/Downloads/go.php?level=1&file=../Data/3.png" while="200px" height="200px"></a>
    <a href="/Data/Downloads/go.php?level=1&file=../Data/4.png"><img src="/Data/Downloads/go.php?level=1&file=../Data/4.png" while="200px" height="200px"></a>
    <a href="/Data/Downloads/go.php?level=1&file=../Data/5.png"><img src="/Data/Downloads/go.php?level=1&file=../Data/5.png" while="200px" height="200px"></a>
    <a href="/Data/Downloads/go.php?level=1&file=../Data/6.png"><img src="/Data/Downloads/go.php?level=1&file=../Data/6.png" while="200px" height="200px"></a>
</dev>