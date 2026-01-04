<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>小新Web靶场</title>
<style>
:root {
    --primary-color: #4195f5;
    --secondary-color: #2c7be5;
    --text-color: #ffffff;
    --hover-color: rgba(255,255,255,0.2);
    --content-bg: #f8f9fa;
    --border-radius: 8px;
    --card-shadow: 0 4px 6px rgba(0,0,0,0.1);
    --card-hover: 0 6px 12px rgba(0,0,0,0.15);
}

.content-container {
    position: relative;
    width: 95%;
    min-height: 80vh;
    background: rgba(255, 255, 255, 0.7);
    margin: 20px auto;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-sm);
    padding: 40px 30px;
    box-sizing: border-box;
}
   
body {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    <?php echo "background-image: url('http://".$_SERVER['HTTP_HOST']."/Data/Data/web.png');";?>
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed; 
    background-size: cover; 
    padding-top: 60px; 
}

.navbar {
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    margin: 0;
    padding: 0;
    background: rgba(66, 122, 241, 0.9); 
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    z-index: 1000;
    display: flex;
    align-items: center;
    height: 60px;
    justify-content: space-between;
}

.nav-list {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
    height: 100%;
    flex-grow: 1;
}

.nav-list-right {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
    height: 100%;
    margin-left: auto;
}

.nav-item {
    display: flex;
    align-items: center;
    position: relative;
}

.nav-link {
    display: block;
    color: var(--text-color);
    text-align: center;
    padding: 0 20px;
    text-decoration: none;
    height: 100%;
    display: flex;
    align-items: center;
    transition: all 0.3s ease;
    font-weight: 500;
}

.nav-link:hover {
    background-color: var(--hover-color);
}

.site-title {
    font-size: 20px;
    font-weight: 600;
    color: var(--text-color);
    text-decoration: none;
    padding: 0 20px;
    margin-right: 30px;
    display: flex;
    align-items: center;
}

.site-title:hover {
    text-decoration: none;
}

.list-title {
    font-size: 18px;
    font-weight: 600;
    color: #000;
    margin: 0 0 15px 0;
    padding-left: 4px;
    border-left: 3px solid var(--primary-color);
}

/* 用户头像样式 */
.user-avatar {
    display: flex;
    align-items: center;
    gap: 8px;
}

.avatar-img {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid rgba(255, 255, 255, 0.3);
    overflow: hidden;
}

.avatar-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.avatar-text {
    font-size: 16px;
    font-weight: 500;
}

/* 下拉菜单样式 */
.dropdown {
    position: relative;
    display: flex;
    align-items: center;
    height: 100%;
}

.dropdown-content {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background-color: #fff;
    min-width: 180px;
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    border-radius: 4px;
    z-index: 1001;
    overflow: hidden;
}

.dropdown-content a {
    color: #333;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
    transition: all 0.2s ease;
    border-bottom: 1px solid #f0f0f0;
}

.dropdown-content a:last-child {
    border-bottom: none;
}

.dropdown-content a:hover {
    background-color: #f1f1f1;
    color: var(--primary-color);
}

.dropdown:hover .dropdown-content {
    display: block;
}

/* 添加下拉箭头 */
.dropdown .nav-link::after {
    content: " ▼";
    font-size: 12px;
    margin-left: 5px;
    opacity: 0.8;
}

/* 如果没有头像图片，使用字体图标 */
.avatar-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 16px;
    font-weight: bold;
}
</style>
</head>
<body>

<nav class="navbar">
    <a href="#" class="site-title">小新Web靶场</a>
    <ul class="nav-list">
        <?php echo '<li class="nav-item"><a href="/?file=home" class="nav-link">首页</a></li>'?>
        <?php echo '<li class="nav-item"><a href="/?file=Brute-force" class="nav-link">暴力破解</a></li>'?>
        <?php echo '<li class="nav-item"><a href="/?file=include" class="nav-link">文件包含</a></li>'?>
        <?php //echo '<li class="nav-item"><a href="/?file=php-fan" class="nav-link">PHP反序列化</a></li>'?>
        <?php echo '<li class="nav-item"><a href="/?file=Downloads" class="nav-link">任意文件下载</a></li>'?>
        <?php //echo '<li class="nav-item"><a href="/?file=sql" class="nav-link">SQL注入</a></li>'?>
        <?php echo '<li class="nav-item"><a href="/?file=upload" class="nav-link">文件上传</a></li>'?>
        <?php //echo '<li class="nav-item"><a href="/?file=xss" class="nav-link">URL重定向</a></li>'?>
        <?php //echo '<li class="nav-item"><a href="/?file=xss" class="nav-link">过度权限</a></li>'?>
        <?php echo '<li class="nav-item"><a href="/?file=ssrf" class="nav-link">SSRF</a></li>'?>
        <?php //echo '<li class="nav-item"><a href="/?file=xss" class="nav-link">XXE</a></li>'?>
        <?php echo '<li class="nav-item"><a href="/?file=rce" class="nav-link">RCE</a></li>'?>
        <?php //echo '<li class="nav-item"><a href="/?file=xss" class="nav-link">CSRF</a></li>'?>
    </ul>
    
    <!-- 右侧菜单 - 带头像的用户菜单 -->                      
    <ul class="nav-list-right">
        <li class="nav-item dropdown">
            <a href="#" class="nav-link">
                <div class="user-avatar">
                    <div class="avatar-img"> 
                        <!-- <img src="/path/to/avatar.jpg" alt="用户头像"> -->
                        <div class="avatar-placeholder">小新</div>
                    </div>
                </div>
            </a>
            <div class="dropdown-content">
                <a href="/?web=delcookie">退出登录</a>
                <a href="/?web=phpinfo">PHP信息</a>
                <a href="/?web=update">更新</a>
                <?php
                

                    $config_file = 'install.onk';  
                    if (file_exists($config_file)) {
                        $content = file_get_contents($config_file);
                        if ($content !== false && stripos($content, 'kbl') !== false) {
                            echo '<a href="/?web=kbl">关闭看板娘</a>';
                        } else {
                            echo '<a href="/?web=kbl">打开看板娘</a>';
                        }
                    } else {

                        echo '<a href="/?web=kbl">打开看板娘</a>';
                    }
                    ?>
                             
            </div>
        </li>
    </ul>
</nav>
</body>
</html>