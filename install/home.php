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
    <p>免责声明</p>
    <p>本 WEB 靶场仅用于网络安全技术学习与交流，旨在帮助学习者理解常见漏洞原理、掌握漏洞防御方法，提升网络安全防护意识与实战能力。<dr>
合规使用使用者必须遵守《中华人民共和国网络安全法》《中华人民共和国刑法》等相关法律法规，仅可在授权范围内开展技术测试。严禁利用本靶场的技术、工具或漏洞信息，对非授权的计算机系统、网络或数据进行攻击、入侵、破坏等违法违规行为。
风险自负本靶场提供的漏洞环境、测试案例仅供学习参考，靶场运营方不对使用者因不当操作引发的任何直接或间接损失承担责任。使用者在操作过程中应自行评估风险，谨慎进行各类测试。
知识产权本靶场的所有内容（包括但不限于代码、文档、漏洞案例）的知识产权归靶场运营方所有。未经授权，禁止擅自复制、传播、修改或用于商业用途。
免责声明本靶场不承担任何因使用者违规操作、恶意攻击等行为所产生的法律责任，相关责任由使用者自行承担。如发现任何违规使用行为，靶场运营方有权暂停或终止其使用权限，并保留追究其法律责任的权利。
网络安全，人人有责。 请共同维护安全、健康的网络环境。</p>

<div class="footer"><a href="install.php/?id=1" class="button">下一步</a></div>
</dev>

</body>
</html>