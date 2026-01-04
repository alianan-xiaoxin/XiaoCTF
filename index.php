<?php
if(!empty($_GET['web'])){

        if($_GET['web']=="update"){
            include 'upload.php';
        }

        if($_GET['web']=="phpinfo"){
            phpinfo();
            exit;
        }

        if($_GET['web']=="kbl"){
            
            if (stripos(file_get_contents(getcwd().'/install.onk'), 'kbl') !== false) {
                           file_put_contents(getcwd().'/install.onk', 'no');
                        } else {
                            file_put_contents(getcwd().'/install.onk', 'kbl');
                        }
             header("Location: ".$_SERVER['HTTP_REFERER']);
        }

        if($_GET['web']=="delcookie"){
            setcookie(
                            "user", 
                            $token, 
                            time() + 3600,  
                            "/",           
                            "",             
                            false,         
                            true          
                        );
            header("Location: /");
            exit;
        }
    
}else{
    date_default_timezone_set('Asia/Shanghai');
header('Content-type:text/html;charset=utf-8');


if (!file_exists('install.onk')) {
    header("Location: install/install.php");
    exit;
}

if(file_get_contents('install.onk')=="kbl"){

   echo '<script src="https://fastly.jsdelivr.net/npm/live2d-widgets@1.0.0-rc.4/dist/autoload.js"></script>';

}

include "install/config/db-config.php";


$userToken = !empty($_COOKIE['user']) ? trim($_COOKIE['user']) : '';


$tokenValid = false;


$conn = mysqli_connect(constant('dbhost'), constant('dbuser'), constant('dbpasswd'), constant('dbtable'));
if ($conn) {
    mysqli_set_charset($conn, 'utf8mb4');

    $stmt = mysqli_prepare($conn, "SELECT 1 FROM users WHERE token = ? LIMIT 1");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $userToken);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                $tokenValid = true;
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}


if ($tokenValid) {
    include "Data/index.php";
} else {
    header("Location: /login.php");
    exit; 
}
}
?>