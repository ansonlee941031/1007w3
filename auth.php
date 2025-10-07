<?php
session_start();

if (!isset($_SESSION["user"])) {
    // 未登入就記錄原本想去的頁面
    $_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
    // 載入 login.php 在 iframe
    echo "<script>
        window.location.href = 'login.php';
    </script>";
    exit();
}
?>
