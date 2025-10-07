<?php
session_start();
include("auth.php");

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

// 如果沒有表單資料，設定預設值避免錯誤
$name = $_POST['name'] ?? '未填寫'; // 設定預設為"未填寫"
$status = $_POST['status'] ?? 'N/A'; // 預設為"N/A"
$dinner = $_POST['dinner'] ?? 'N/A'; // 預設為"N/A"

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>報名確認</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3>報名確認</h3>
        <p>姓名：<?= htmlspecialchars($name) ?></p>
        <p>身份：<?= htmlspecialchars($status) ?></p>
        <p>是否需要晚餐：<?= htmlspecialchars($dinner) ?></p>
    </div>
</body>
</html>
