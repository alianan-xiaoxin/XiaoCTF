<?php
include "../navigation.php";

$message = "";
$upload_success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    
    // 简单的文件上传处理
    if ($file['error'] === UPLOAD_ERR_OK) {
        $filename = $file['name'];
        $tmp_name = $file['tmp_name'];
        $upload_dir = "file/";
        
        // 创建上传目录
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $target_path = $upload_dir . $filename;
        
        // 直接移动文件，没有任何过滤
        if (move_uploaded_file($tmp_name, $target_path)) {
            $message = "文件上传成功！路径: " . htmlspecialchars($target_path);
            $upload_success = true;
            
            
        } else {
            $message = "文件上传失败";
        }
    } else {
        $message = "上传错误: " . $file['error'];
    }
}
?>

<style>
.content-container01 {
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 80vh;
    padding: 40px 20px;
    background: #f0f2f5;
}

.upload-box {
    width: 100%;
    max-width: 600px;
    padding: 40px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
    text-align: center;
}

.title {
    color: #333;
    margin-bottom: 30px;
    font-size: 24px;
}

.upload-form {
    margin-bottom: 30px;
}

.file-input {
    width: 100%;
    padding: 20px;
    border: 2px dashed #1890ff;
    border-radius: 8px;
    background: #f8fbff;
    margin-bottom: 20px;
    cursor: pointer;
    transition: all 0.3s;
}

.file-input:hover {
    background: #e6f7ff;
    border-color: #096dd9;
}

.file-input input[type="file"] {
    width: 100%;
    padding: 10px;
}

.submit-btn {
    padding: 12px 40px;
    background: #1890ff;
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s;
}

.submit-btn:hover {
    background: #096dd9;
}

.message {
    padding: 15px;
    border-radius: 6px;
    margin-bottom: 20px;
    font-weight: bold;
}

.message.success {
    background: #f6ffed;
    border: 1px solid #b7eb8f;
    color: #52c41a;
}

.message.error {
    background: #fff2f0;
    border: 1px solid #ffccc7;
    color: #ff4d4f;
}


</style>

<div class='content-container01'>
    <div class="upload-box">
        <h2 class="title">第一个</h2>
        
        <form method="POST" action="" enctype="multipart/form-data" class="upload-form">
            <div class="file-input">
                <input type="file" name="file" required>
            </div>
            <button type="submit" class="submit-btn">上传文件</button>
        </form>
        
        <?php if ($message): ?>
            <div class="message <?php echo $upload_success ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
    </div>
</div>