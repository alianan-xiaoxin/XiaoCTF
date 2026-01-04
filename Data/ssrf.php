<?php
include "navigation.php";
?>
<style>
   

    .custom-list-wrapper {
        color: #000;
        width: 70%; 
        padding: 10px 0;
    }

    .list-title {
        font-size: 18px;
        font-weight: 600;
        color: #000;
        margin: 0 0 15px 0;
        padding-left: 4px;
        border-left: 3px solid var(--primary-color);
    }

    .custom-list {
        list-style: none;
        padding-left: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .custom-list li {
        padding: 12px 18px;
        background: #f9f9f9;
        border-radius: var(--border-radius);
        font-size: 16px;
        color: #000;
        box-shadow: var(--shadow-sm);
        border: 1px solid #eee;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
    }

    .custom-list a {
       color: #000;
    }

    .custom-list li:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-hover);
        border-color: var(--primary-color);
        background: #f5f8ff;
    }

    .custom-list li::before {
        content: "●";
        color: var(--primary-color);
        font-size: 10px;
        margin-right: 10px;
        opacity: 0.8;
    }
</style>
<div class='content-container'>
    <div class="custom-list-wrapper">
        <h3 class="list-title">服务端请求伪造</h3>
        <ul class="custom-list">
            <?php echo '<li><a href="Data/ssrf/go.php?level=1&url=http://'.$_SERVER['HTTP_HOST'].'/Data/Data/hello.php" class="nav-link">第一关:请求伪造（适用于win/linux）</a></li>'?>

        </ul>
    </div>
</div>