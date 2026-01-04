<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>小新Web靶场安装程序</title>

<style>
:root {
    --primary-color: #4195f5;
    --text-color: #ffffff;
    --hover-color: rgba(255,255,255,0.2);
    --content-bg: #f8f9fa;
}

body {
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: var(--content-bg);
    padding-top: 60px; 
}

.navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 60px;
    background-color: var(--primary-color);
    display: flex;
    align-items: center;
    z-index: 1000;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.site-title {
    font-size: 20px;
    font-weight: 600;
    color: var(--text-color);
    text-decoration: none;
    padding: 0 20px;
}


.nav-list {
    margin-left: auto;
    list-style: none;
    padding: 0;
    margin-right: 20px; 
}

.nav-item {
    display: inline-block; 
}


 .content-container {
    position: relative;
    width: 80%;
    min-height: 80vh;
    background: white;
    margin: 20px auto;
    border-radius: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    padding: 30px;
    box-sizing: border-box;
}

.content-container p {
    text-align: center;
}

.footer {
position: absolute;
bottom: 0;
left: 50%;
transform: translateX(-50%);
padding: 10px 20px;
}

.button {

  display: inline-block; 
  width: 150px;
  height: 40px;
  line-height: 40px; 
  text-align: center; 


  background-color: #4195f5;
  color: #FFFFFF;
  border-radius: 40px;
  text-decoration: none; 


  cursor: pointer;
  margin: 5px;
}
</style>
</head>
<body>

<nav class="navbar">
    <p class="site-title">是小新呀</p>
    <ul class="nav-list">
        <li class="nav-item"><p class="site-title">小新Web靶场安装程序1.0.0V</p></li>
    </ul>
</nav>

   
<div class='content-container'>
<?php

$db_name = isset($_POST['db_name']) ? trim($_POST['db_name']) : '';
$db_host = isset($_POST['db_host']) ? trim($_POST['db_host']) : '';
$db_user = isset($_POST['db_user']) ? trim($_POST['db_user']) : '';
$db_pass = isset($_POST['db_pass']) ? trim($_POST['db_pass']) : '';
$user_name = isset($_POST['user_name']) ? trim($_POST['user_name']) : '';
$user_passwd = isset($_POST['user_passwd']) ? trim($_POST['user_passwd']) : '';


if(empty($db_name) || empty($db_host) || empty($db_user) || empty($user_name) || empty($user_passwd)){
    header("Location: /?id=1");
    exit;
}


$db_name = preg_replace('/[^a-zA-Z0-9_]/', '', $db_name);
$db_host = preg_replace('/[^a-zA-Z0-9.:]/', '', $db_host);
$db_user = preg_replace('/[^a-zA-Z0-9_]/', '', $db_user);
$user_name = preg_replace('/[^a-zA-Z0-9_]/', '', $user_name);


$conn = mysqli_connect($db_host, $db_user, $db_pass);
if (!$conn) {
    die("数据库连接失败，原因：" . mysqli_connect_error());
}
echo 'MySQL 数据库连接成功！<br>';


mysqli_set_charset($conn, 'utf8mb4');


if (!mysqli_select_db($conn, $db_name)) {
    $create_db_sql = "CREATE DATABASE IF NOT EXISTS `{$db_name}` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
    if (mysqli_query($conn, $create_db_sql)) {
        echo "数据库 '{$db_name}' 创建成功，并已选择。<br>";
        mysqli_select_db($conn, $db_name);
    } else {
        die("选择数据库失败，且创建数据库也失败: " . mysqli_error($conn));
    }
} else {
    echo "已成功选择数据库 '{$db_name}'。<br>";
}

echo "字符集设置为 utf8mb4 成功。<br>";


$sql1 = "CREATE TABLE IF NOT EXISTS `users` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `token` VARCHAR(255) NOT NULL DEFAULT '',
    PRIMARY KEY (`id`),
    UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

if (mysqli_query($conn, $sql1)) {
    echo "Table 'users' created successfully or already exists.<br>";
} else {
    echo "Error creating table 'users': " . mysqli_error($conn) . "<br>";
}


$sql2 = "CREATE TABLE IF NOT EXISTS `guestbook` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `userid` INT(10) UNSIGNED NOT NULL,
    `txtName` VARCHAR(100) NOT NULL,
    `txtMessage` TEXT NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

if (mysqli_query($conn, $sql2)) {
    echo "Table 'guestbook' created successfully or already exists.<br>";
} else {
    echo "Error creating table 'guestbook': " . mysqli_error($conn) . "<br>";
}


$username = 'admin';
$password = 'sb10086';
$token = md5(uniqid(mt_rand(), true));

$stmt = mysqli_prepare($conn, "INSERT IGNORE INTO users (username, password, token) VALUES (?, ?, ?)");
$hashed_password = md5($password);
mysqli_stmt_bind_param($stmt, 'sss', $username, $hashed_password, $token);

if (mysqli_stmt_execute($stmt)) {
    $affected_rows = mysqli_affected_rows($conn);
    if ($affected_rows > 0) {
        echo "登录账户创建成功！<br>";
    } else if ($affected_rows === 0) {
        echo "登录账户已存在，无需重复创建<br>";
    } else {
        echo "操作未影响任何行<br>";
    }
} else {
    echo "登录账户创建失败: " . mysqli_error($conn) . "<br>";
}
mysqli_stmt_close($stmt);



$token = md5(uniqid(mt_rand(), true));
$stmt = mysqli_prepare($conn, "INSERT IGNORE INTO users (username, password, token) VALUES (?, ?, ?)");
$password = md5($user_passwd);
mysqli_stmt_bind_param($stmt, 'sss', $user_name, $password, $token);

if (mysqli_stmt_execute($stmt)) {
    if(mysqli_affected_rows($conn) > 0){
        echo "登录账户创建成功！<br>";
    }else{
        echo "登录账户已存在，无需重复创建<br>";
    }
} else {
    echo "登录账户创建失败: " . mysqli_error($conn) . "<br>";
}




$username = 'user';
$password = '123456';
$token = md5(uniqid(mt_rand(), true));

$stmt = mysqli_prepare($conn, "INSERT IGNORE INTO users (username, password, token) VALUES (?, ?, ?)");
$hashed_password = md5($password);
mysqli_stmt_bind_param($stmt, 'sss', $username, $hashed_password, $token);

if (mysqli_stmt_execute($stmt)) {
    $affected_rows = mysqli_affected_rows($conn);
    if ($affected_rows > 0) {
        echo "登录账户创建成功！<br>";
    } else if ($affected_rows === 0) {
        echo "登录账户已存在，无需重复创建<br>";
    } else {
        echo "操作未影响任何行<br>";
    }
} else {
    echo "登录账户创建失败: " . mysqli_error($conn) . "<br>";
}
mysqli_stmt_close($stmt);





mysqli_close($conn);
echo "数据库连接已关闭。<br>";


$file = 'config/db-config.php';

$dir = dirname($file);
if(!is_dir($dir)){
    mkdir($dir, 0755, true);
}

$content = "<?php
define('dbhost','{$db_host}');  
define('dbtable','{$db_name}');  
define('dbuser','{$db_user}') ; 
define('dbpasswd','{$db_pass}');  
?>";


if (file_put_contents($file, $content)) {

    chmod($file, 0644);
} else {
    echo "写入失败（检查目录权限）<br>";
}


touch('../install.onk');

if(empty($_POST['kbl'])){
    if($_GET['kbl']=="kbl"){
        file_put_contents("../install.onk","kbl");
    }
}
?>
<div class="footer"><a href="/login.php" class="button">登录</a></div>
</div>

</body>
</html>