<?php
include "../navigation.php";

$result = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target = isset($_POST['target']) ? trim($_POST['target']) : '';
    
    if (!empty($target)) {
            $result = shell_exec("ping -c 4 " . $target);
        } 
    } else {
        $result = "请输入要ping的地址";
    }

?>

<style>
.content-container02 {
    width: 95%;
    min-height: 80vh;
    background: white;
    margin: 20px auto;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    padding: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.ping-form {
    width: 100%;
    max-width: 600px;
    text-align: center;
}

.ping-form h2 {
    color: #333;
    margin-bottom: 30px;
}

.input-group {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

.input-group input {
    flex: 1;
    padding: 12px;
    border: 2px solid #ddd;
    border-radius: 6px;
    font-size: 16px;
}

.input-group button {
    padding: 12px 30px;
    background: #1890ff;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
}

.input-group button:hover {
    background: #096dd9;
}

.result {
    margin-top: 20px;
    padding: 15px;
    background: #f5f5f5;
    border-radius: 6px;
    text-align: left;
    font-family: monospace;
    white-space: pre-wrap;
    max-height: 300px;
    overflow-y: auto;
}
</style>

<div class='content-container02'>
    <div class="ping-form">
        <h2>Level 1 - Ping测试</h2>
        
        <form method="POST" action="">
            <div class="input-group">
                <input type="text" name="target" 
                       value="<?php echo htmlspecialchars($_POST['target'] ?? ''); ?>" 
                       placeholder="输入IP或域名，如：127.0.0.1 或 baidu.com" 
                       autocomplete="off">
                <button type="submit">Ping测试</button>
            </div>
        </form>
        
        <?php if (!empty($result)): ?>
            <div class="result"><?php echo htmlspecialchars($result); ?></div>
        <?php endif; ?>
    </div>
</div>