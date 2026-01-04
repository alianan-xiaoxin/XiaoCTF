<?php
include "../navigation.php";
?>
<style>
.content-container02 {
    position: relative;
    width: 80%;
    max-width: 500px;
    min-height: 400px;
    background: white;
    margin: 50px auto;
    border-radius: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    padding: 30px;
    box-sizing: border-box;
}

.login-title {
    text-align: center;
    font-size: 24px;
    margin-bottom: 30px;
    color: #333;
    margin-top: 0;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #666;
    font-weight: 500;
}

.form-group input {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid var(--input-border);
    border-radius: 8px;
    font-size: 16px;
    box-sizing: border-box;
    transition: border-color 0.3s;
}

.form-group input:focus {
    outline: none;
    border-color: var(--primary-color);
}

.login-btn {
    width: 100%;
    padding: 12px;
    background-color: var(--primary-color);
    color: var(--text-color);
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-top: 10px;
}

.login-btn:hover {
    background-color: var(--btn-hover);
}

.msg {
    text-align: center;
    margin-top: 20px;
    font-size: 16px;
    color: #e63946;
}

</style>
</head>
<body>
<div class='content-container02'>
    
    <h2 class="login-title">登录</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="username">用户名</label>
            <input type="text" id="username" name="username" placeholder="请输入用户名" required>
        </div>
        
        <div class="form-group">
            <label for="password">密码</label>
            <input type="password" id="password" name="password" placeholder="请输入密码" required>
        </div>
        
        <button type="submit" class="login-btn">登录</button>
    </form>

    <div class="msg">
    <?php

    date_default_timezone_set('Asia/Shanghai');
    

    if (!file_exists("../../install/config/db-config.php")) {
        echo "错误：配置文件不存在！";
    } else {
        include "../../install/config/db-config.php";
        

        $user = isset($_POST['username']) ? trim($_POST['username']) : '';
        $pass = isset($_POST['password']) ? trim($_POST['password']) : '';
        
        if (!empty($user) && !empty($pass)) {

            $conn = mysqli_connect(constant('dbhost'), constant('dbuser'), constant('dbpasswd'), constant('dbtable'));
            
            if (!$conn) {
                echo "数据库连接失败：" . mysqli_connect_error();
            } else {

                mysqli_set_charset($conn, 'utf8mb4');
                

                $stmt = mysqli_prepare($conn, "SELECT id, username, password FROM users WHERE username = ? LIMIT 1");
                mysqli_stmt_bind_param($stmt, 's', $user);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                
                if (mysqli_num_rows($result) > 0) {
                    $userInfo = mysqli_fetch_assoc($result);
                    
                    if (md5($pass) === $userInfo['password']) {
                        echo "登录成功！".$user;
                        exit;
                    } else {
                        echo "错误：用户名或密码不正确！";
                    }
                } else {
                    echo "错误：用户名或密码不正确！";
                }
                
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
            }
        } elseif (!empty($user) || !empty($pass)) {
            echo "错误：用户名和密码不能为空！";
        }
    }
    ?>
    </div>
</div>