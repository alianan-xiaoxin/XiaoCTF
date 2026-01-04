<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>小新Web靶场更新程序</title>
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
    <?php echo "background-image: url('http://".$_SERVER['HTTP_HOST']."/Data/Data/web.png');";?>
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: fixed; 
    background-size: cover; 
    padding-top: 60px; 
}

.navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 60px;
    background: rgba(39, 124, 252, 0.5);
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
  border: none; 


  cursor: pointer;
  margin: 5px;
}


.button:hover {
  background-color: #307bcd;
}


.form-group {
  display: flex; 
  align-items: center; 
  margin-bottom: 15px; 
}

.form-group label {
  width: 120px; 
  text-align: right; 
  margin-right: 10px; 
}

.form-group input,
.form-group textarea {
  flex-grow: 1; 
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.form-group textarea {
  min-height: 80px; 
  resize: vertical; 
}


.content-container .footer {
    text-align: center;
    margin-top: 20px; 

    position: relative;
    bottom: auto;
    left: auto;
    transform: none;
    padding-top: 20px;
    border-top: 1px solid #eee;
}

.content-container p {
    text-align: center;
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
<p>更新模式</p>
    <form action="install.php/?id=2" method="post">

        <div class="form-group">
            <label for="db_host">数据库地址：</label>

            <input type="text" id="db_host" name="db_host" Value='127.0.0.1'  required>
        </div>

        <div class="form-group">
            <label for="db_name">数据库名称：</label>

            <input type="text" id="db_name" name="db_name"  required>
        </div>


        <div class="form-group">
            <label for="db_user">数据库用户名：</label>

            <input type="text" id="db_user" name="db_user"  required>
        </div>

        <div class="form-group">
            <label for="db_pass">数据库密码：</label>
            <input type="password" id="db_pass" name="db_pass"  required>
        </div>
        <hr style="border-style: dashed;" />
         <div class="form-group">
            <label for="user_name">用户名：</label>
            <input type="text" id="user_name" name="user_name"  required>
        </div>
         <div class="form-group">
            <label for="user_passwd">密码：</label>
            <input type="text" id="user_passwd" name="user_passwd"  required>
        </div>
        <hr style="border-style: dashed;" />
        <div class="form-group">
            <label for="kbl">看板娘(yes/no):</label>
            <input type="text" id="kbl" name="kbl" Value='no' required>
        </div>

        <div class="footer">
            <button type="submit" class="button">下一步</button>
        </div>
    </form>
    <p>mysql端口默认3306</p>
</div> 

</body>
</html>